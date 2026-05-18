@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-bold mb-2" style="background: linear-gradient(to right, #eab308, #f97316); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    🏨 Trouver un hôtel
</h1>
<p class="text-gray-400 mb-8">Des hôtels de qualité partout dans le monde</p>

{{-- RECHERCHE --}}
<form method="GET" action="/hotels" class="bg-gray-900 rounded-2xl p-6 mb-8 border border-yellow-500/50">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="text-gray-400 text-sm block mb-1">📍 Ville</label>
            <input name="city" value="{{ request('city') }}" placeholder="Ex: Paris, Dubai, Tokyo..."
                class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-yellow-500 focus:outline-none text-white">
        </div>
        <div>
            <label class="text-gray-400 text-sm block mb-1">⭐ Nombre d'étoiles</label>
            <select name="stars" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-orange-500 focus:outline-none text-white">
                <option value="">Toutes les catégories</option>
                @for($i=1; $i<=5; $i++)
                <option value="{{ $i }}" {{ request('stars') == $i ? 'selected' : '' }}>
                    {{ str_repeat('⭐', $i) }} — {{ $i }} étoile{{ $i > 1 ? 's' : '' }}
                </option>
                @endfor
            </select>
        </div>
    </div>
    <div class="flex gap-3 mt-4">
        <button style="background: linear-gradient(to right, #eab308, #f97316);" class="px-8 py-3 rounded-xl font-bold text-gray-900 hover:opacity-90 transition">
            🔍 Rechercher
        </button>
        @if(request()->hasAny(['city','stars']))
        <a href="/hotels" class="bg-gray-700 hover:bg-gray-600 px-6 py-3 rounded-xl font-semibold transition">
            ✕ Effacer
        </a>
        @endif
    </div>
</form>

<div class="flex justify-between items-center mb-4">
    <p class="text-gray-400">{{ $hotels->total() }} hôtel(s) trouvé(s)</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    @forelse($hotels as $hotel)
    <div class="bg-gray-900 border border-gray-800 hover:border-yellow-500 rounded-2xl p-6 transition flex flex-col justify-between">
        <div>
            <div class="text-xl mb-2">{{ str_repeat('⭐', $hotel->stars) }}</div>
            <h3 class="text-xl font-bold text-white mb-1">{{ $hotel->name }}</h3>
            <p class="text-gray-400 text-sm mb-1">📍 {{ $hotel->city }}, {{ $hotel->country }}</p>
            <p class="text-gray-500 text-sm mb-2">🗺️ {{ $hotel->address }}</p>
            @if($hotel->description)
            <p class="text-gray-400 text-sm mb-4 leading-relaxed">{{ Str::limit($hotel->description, 100) }}</p>
            @endif
        </div>
        <div class="border-t border-gray-800 pt-4 mt-4">
            <div class="flex justify-between items-center mb-3">
                <div>
                    <span class="text-2xl font-bold text-orange-400">{{ number_format($hotel->price_per_night, 0) }} €</span>
                    <span class="text-gray-500 text-sm"> / nuit</span>
                </div>
                <span class="text-gray-400 text-xs bg-gray-800 px-2 py-1 rounded">
                    3 nuits = {{ number_format($hotel->price_per_night * 3, 0) }} €
                </span>
            </div>
            @auth
            <form method="POST" action="/bookings">
                @csrf
                <input type="hidden" name="bookable_type" value="hotel">
                <input type="hidden" name="bookable_id"   value="{{ $hotel->id }}">
                <input type="hidden" name="start_date"    value="{{ now()->format('Y-m-d') }}">
                <input type="hidden" name="end_date"      value="{{ now()->addDays(3)->format('Y-m-d') }}">
                <input type="hidden" name="total_price"   value="{{ $hotel->price_per_night * 3 }}">
                <button style="background: linear-gradient(to right, #eab308, #f97316);" class="w-full text-gray-900 py-2 rounded-lg font-semibold hover:opacity-90 transition">
                    Réserver cet hôtel
                </button>
            </form>
            @else
            <a href="/login" class="block text-center bg-gray-700 hover:bg-gray-600 py-2 rounded-lg font-semibold transition text-sm">
                 Connectez-vous pour réserver
            </a>
            @endauth
        </div>
    </div>
    @empty
    <div class="col-span-3 text-center text-gray-400 py-20 bg-gray-900 rounded-2xl border border-gray-800">
        <div class="text-6xl mb-4">🏨</div>
        <p class="text-xl font-semibold mb-2">Aucun hôtel trouvé</p>
        <p class="text-gray-500">Essayez une autre ville ou catégorie</p>
    </div>
    @endforelse
</div>

<div class="mt-8">{{ $hotels->links() }}</div>
@endsection
