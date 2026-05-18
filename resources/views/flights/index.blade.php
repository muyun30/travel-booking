@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-bold mb-2" style="background: linear-gradient(to right, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    🛫 Rechercher un vol
</h1>
<p class="text-gray-400 mb-8">Trouvez le meilleur vol pour votre destination</p>

{{-- RECHERCHE --}}
<form method="GET" action="/flights" class="bg-gray-900 rounded-2xl p-6 mb-8 border border-purple-500/50">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
            <label class="text-gray-400 text-sm block mb-1">🛫 Ville de départ</label>
            <input name="origin" value="{{ request('origin') }}" placeholder="Ex: Paris"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-purple-500 focus:outline-none text-white">
        </div>
        <div>
            <label class="text-gray-400 text-sm block mb-1">🛬 Destination</label>
            <input name="destination" value="{{ request('destination') }}" placeholder="Ex: New York"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-pink-500 focus:outline-none text-white">
        </div>
        <div>
            <label class="text-gray-400 text-sm block mb-1">📅 Date de départ</label>
            <input name="date" type="date" value="{{ request('date') }}"
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-yellow-500 focus:outline-none text-white">
        </div>
    </div>
    <div class="flex gap-3 mt-4">
        <button class="bg-gradient-to-r from-purple-500 to-pink-500 px-8 py-3 rounded-xl font-bold hover:opacity-90 transition">
            🔍 Rechercher
        </button>
        @if(request()->hasAny(['origin','destination','date']))
        <a href="/flights" class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl font-semibold transition">
            ✕ Effacer
        </a>
        @endif
    </div>
</form>

{{-- RÉSULTATS --}}
<div class="flex justify-between items-center mb-4">
    <p class="text-gray-400">{{ $flights->total() }} vol(s) trouvé(s)</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    @forelse($flights as $flight)
    <div class="bg-gray-900 border border-gray-800 hover:border-purple-500 rounded-2xl p-6 transition">
        <div class="flex justify-between items-start mb-4">
            <div>
                <span class="text-purple-400 font-bold text-lg">{{ $flight->airline }}</span>
                <span class="text-gray-500 text-sm ml-2 bg-gray-800 px-2 py-1 rounded">#{{ $flight->flight_number }}</span>
            </div>
            <span class="text-2xl font-bold text-yellow-400">{{ number_format($flight->price, 0) }} €</span>
        </div>

        <div class="flex items-center gap-4 mb-4 bg-gray-800 rounded-xl p-4">
            <div class="text-center flex-1">
                <div class="text-white font-bold text-2xl">{{ $flight->origin }}</div>
                <div class="text-gray-400 text-xs mt-1">{{ \Carbon\Carbon::parse($flight->departure_at)->format('d/m/Y') }}</div>
                <div class="text-purple-400 font-semibold">{{ \Carbon\Carbon::parse($flight->departure_at)->format('H:i') }}</div>
            </div>
            <div class="flex-1 text-center">
                <div class="text-gray-500 text-xs mb-1">✈️</div>
                <div class="border-t-2 border-dashed border-gray-600"></div>
                <div class="text-gray-500 text-xs mt-1">Direct</div>
            </div>
            <div class="text-center flex-1">
                <div class="text-white font-bold text-2xl">{{ $flight->destination }}</div>
                <div class="text-gray-400 text-xs mt-1">{{ \Carbon\Carbon::parse($flight->arrival_at)->format('d/m/Y') }}</div>
                <div class="text-pink-400 font-semibold">{{ \Carbon\Carbon::parse($flight->arrival_at)->format('H:i') }}</div>
            </div>
        </div>

        <div class="flex justify-between items-center">
            <span class="text-gray-400 text-sm">💺 {{ $flight->seats_available }} places disponibles</span>
            @auth
            <form method="POST" action="/bookings">
                @csrf
                <input type="hidden" name="bookable_type" value="flight">
                <input type="hidden" name="bookable_id"   value="{{ $flight->id }}">
                <input type="hidden" name="start_date"    value="{{ \Carbon\Carbon::parse($flight->departure_at)->format('Y-m-d') }}">
                <input type="hidden" name="total_price"   value="{{ $flight->price }}">
                <button class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-2 rounded-lg font-semibold hover:opacity-90 transition">
                    Réserver ce vol
                </button>
            </form>
            @else
            <a href="/login" class="bg-gray-700 hover:bg-gray-600 px-5 py-2 rounded-lg font-semibold transition text-sm">
                 Connectez-vous pour réserver
            </a>
            @endauth
        </div>
    </div>
    @empty
    <div class="col-span-2 text-center text-gray-400 py-20 bg-gray-900 rounded-2xl border border-gray-800">
        <div class="text-6xl mb-4">🔍</div>
        <p class="text-xl font-semibold mb-2">Aucun vol trouvé</p>
        <p class="text-gray-500">Essayez d'autres critères de recherche</p>
    </div>
    @endforelse
</div>

<div class="mt-8">{{ $flights->links() }}</div>
@endsection
