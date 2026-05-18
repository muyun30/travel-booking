@extends('admin.layout')
@section('content')

<h1 class="text-3xl font-bold mb-8" style="background: linear-gradient(to right, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    📊 Tableau de bord
</h1>

{{-- STATS --}}
<div class="grid grid-cols-3 gap-6 mb-10">
    <div class="bg-gray-900 border border-purple-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-purple-400">{{ $stats['users'] }}</div>
        <div class="text-gray-400 mt-1">👥 Utilisateurs</div>
    </div>
    <div class="bg-gray-900 border border-blue-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-blue-400">{{ $stats['flights'] }}</div>
        <div class="text-gray-400 mt-1">✈️ Vols</div>
    </div>
    <div class="bg-gray-900 border border-yellow-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-yellow-400">{{ $stats['hotels'] }}</div>
        <div class="text-gray-400 mt-1">🏨 Hôtels</div>
    </div>
    <div class="bg-gray-900 border border-pink-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-pink-400">{{ $stats['bookings'] }}</div>
        <div class="text-gray-400 mt-1">📋 Réservations</div>
    </div>
    <div class="bg-gray-900 border border-orange-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-orange-400">{{ $stats['pending'] }}</div>
        <div class="text-gray-400 mt-1">⏳ En attente</div>
    </div>
    <div class="bg-gray-900 border border-green-500/50 rounded-2xl p-6">
        <div class="text-4xl font-bold text-green-400">{{ number_format($stats['revenue'], 0) }} €</div>
        <div class="text-gray-400 mt-1">💰 Revenus totaux</div>
    </div>
</div>

{{-- DERNIÈRES RÉSERVATIONS --}}
<div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
    <h2 class="text-xl font-bold mb-6">📋 Dernières réservations</h2>
    <table class="w-full">
        <thead>
            <tr class="text-gray-400 text-sm border-b border-gray-800">
                <th class="text-left pb-3">Utilisateur</th>
                <th class="text-left pb-3">Type</th>
                <th class="text-left pb-3">Prestataire</th>
                <th class="text-left pb-3">Prix</th>
                <th class="text-left pb-3">Statut</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($recentBookings as $booking)
            <tr class="text-sm">
                <td class="py-3 text-white">{{ $booking->user->name ?? '-' }}</td>
                <td class="py-3 text-gray-400">
                    {{ str_contains($booking->bookable_type, 'Flight') ? '✈️ Vol' : '🏨 Hôtel' }}
                </td>
                <td class="py-3 text-gray-300">
                    {{ $booking->bookable->airline ?? $booking->bookable->name ?? '-' }}
                </td>
                <td class="py-3 text-yellow-400 font-semibold">{{ $booking->total_price }} €</td>
                <td class="py-3">
                    <span class="px-2 py-1 rounded-full text-xs font-bold
                        @if($booking->status === 'confirmed') bg-green-500/20 text-green-400
                        @elseif($booking->status === 'cancelled') bg-red-500/20 text-red-400
                        @else bg-yellow-500/20 text-yellow-400 @endif">
                        {{ strtoupper($booking->status) }}
                    </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection