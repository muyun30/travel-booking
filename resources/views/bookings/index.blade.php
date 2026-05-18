@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-bold mb-2" style="background: linear-gradient(to right, #ec4899, #a855f7); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    📋 Mes Réservations
</h1>
<p class="text-gray-400 mb-8">Bonjour {{ auth()->user()->name }}, voici vos réservations</p>

@if($bookings->isEmpty())
<div class="text-center text-gray-400 py-20 bg-gray-900 rounded-2xl border border-gray-800">
    <div class="text-6xl mb-4">📭</div>
    <p class="text-xl font-semibold mb-2">Aucune réservation pour le moment</p>
    <p class="text-gray-500 mb-8">Commencez par explorer nos vols et hôtels</p>
    <div class="flex justify-center gap-4">
        <a href="/flights" class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
            🛫 Voir les vols
        </a>
        <a href="/hotels" style="background: linear-gradient(to right, #eab308, #f97316);" class="text-gray-900 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
            🏨 Voir les hôtels
        </a>
    </div>
</div>
@else

{{-- STATS RAPIDES --}}
<div class="grid grid-cols-3 gap-4 mb-8">
    <div class="bg-gray-900 border border-green-500/30 rounded-xl p-4 text-center">
        <div class="text-2xl font-bold text-green-400">{{ $bookings->where('status','confirmed')->count() }}</div>
        <div class="text-gray-400 text-sm">Confirmées</div>
    </div>
    <div class="bg-gray-900 border border-yellow-500/30 rounded-xl p-4 text-center">
        <div class="text-2xl font-bold text-yellow-400">{{ $bookings->where('status','pending')->count() }}</div>
        <div class="text-gray-400 text-sm">En attente</div>
    </div>
    <div class="bg-gray-900 border border-red-500/30 rounded-xl p-4 text-center">
        <div class="text-2xl font-bold text-red-400">{{ $bookings->where('status','cancelled')->count() }}</div>
        <div class="text-gray-400 text-sm">Annulées</div>
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @foreach($bookings as $booking)
    <div class="bg-gray-900 rounded-2xl p-6 border transition
        {{ $booking->status === 'cancelled' ? 'border-red-800/50 opacity-60' : 'border-gray-800 hover:border-pink-500' }}">

        <div class="flex justify-between items-start mb-4">
            <div class="flex items-center gap-3">
                <span class="text-3xl">{{ str_contains($booking->bookable_type, 'Flight') ? '✈️' : '🏨' }}</span>
                <div>
                    <div class="font-bold text-white">
                        @if(str_contains($booking->bookable_type, 'Flight'))
                            {{ $booking->bookable->airline ?? 'Vol' }} — {{ $booking->bookable->flight_number ?? '' }}
                        @else
                            {{ $booking->bookable->name ?? 'Hôtel' }}
                        @endif
                    </div>
                    <div class="text-gray-400 text-sm">
                        @if(str_contains($booking->bookable_type, 'Flight'))
                            {{ $booking->bookable->origin ?? '' }} → {{ $booking->bookable->destination ?? '' }}
                        @else
                            📍 {{ $booking->bookable->city ?? '' }}, {{ $booking->bookable->country ?? '' }}
                        @endif
                    </div>
                </div>
            </div>
            <span class="px-3 py-1 rounded-full text-xs font-bold
                @if($booking->status === 'confirmed') bg-green-500/20 text-green-400 border border-green-500
                @elseif($booking->status === 'cancelled') bg-red-500/20 text-red-400 border border-red-500
                @else bg-yellow-500/20 text-yellow-400 border border-yellow-500
                @endif">
                {{ strtoupper($booking->status) }}
            </span>
        </div>

        <div class="bg-gray-800 rounded-xl p-4 mb-4 text-sm space-y-2">
            <div class="flex justify-between">
                <span class="text-gray-400">📅 Date début</span>
                <span class="text-white font-semibold">{{ $booking->start_date }}</span>
            </div>
            @if($booking->end_date)
            <div class="flex justify-between">
                <span class="text-gray-400">📅 Date fin</span>
                <span class="text-white font-semibold">{{ $booking->end_date }}</span>
            </div>
            @endif
            <div class="flex justify-between border-t border-gray-700 pt-2 mt-2">
                <span class="text-gray-400"> Total payé</span>
                <span class="text-yellow-400 font-bold text-lg">{{ number_format($booking->total_price, 2) }} €</span>
            </div>
        </div>

        @if($booking->status !== 'cancelled')
        <form method="POST" action="/bookings/{{ $booking->id }}/cancel">
            @csrf
            <button onclick="return confirm('Êtes-vous sûr de vouloir annuler cette réservation ?')"
                class="w-full bg-red-500/20 hover:bg-red-500 border border-red-500 text-red-400 hover:text-white py-2 rounded-lg font-semibold transition text-sm">
                 Annuler cette réservation
            </button>
        </form>
        @else
        <div class="text-center text-gray-500 text-sm py-2 border border-gray-700 rounded-lg">
            Réservation annulée
        </div>
        @endif
    </div>
    @endforeach
</div>
<div class="mt-8">{{ $bookings->links() }}</div>
@endif
@endsection
