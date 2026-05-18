@extends('layouts.app')
@section('content')

<h1 class="text-4xl font-bold mb-8" style="background: linear-gradient(to right, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    👤 Mon Profil
</h1>

<div class="grid grid-cols-2 gap-8">

    {{-- INFOS PERSONNELLES --}}
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
        <h2 class="text-xl font-bold mb-6 text-white">✏️ Informations personnelles</h2>

        @if($errors->any())
        <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-4 text-sm">
            {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/profile" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="text-gray-400 text-sm block mb-1">Nom complet</label>
                <input name="name" required value="{{ $user->name }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Email</label>
                <input name="email" type="email" required value="{{ $user->email }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Rôle</label>
                <input value="{{ strtoupper($user->role) }}" disabled
                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-3 text-gray-500 cursor-not-allowed">
            </div>
            <button class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
                💾 Mettre à jour
            </button>
        </form>
    </div>

    {{-- CHANGER MOT DE PASSE --}}
    <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6">
        <h2 class="text-xl font-bold mb-6 text-white">🔒 Changer le mot de passe</h2>
        <form method="POST" action="/profile/password" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="text-gray-400 text-sm block mb-1">Mot de passe actuel</label>
                <input name="current_password" type="password" required placeholder="••••••••"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Nouveau mot de passe</label>
                <input name="password" type="password" required placeholder="Minimum 8 caractères"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Confirmer</label>
                <input name="password_confirmation" type="password" required placeholder="••••••••"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <button class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
                🔑 Changer le mot de passe
            </button>
        </form>
    </div>

    {{-- DERNIÈRES RÉSERVATIONS --}}
    <div class="col-span-2 bg-gray-900 border border-gray-800 rounded-2xl p-6">
        <h2 class="text-xl font-bold mb-6 text-white">📋 Mes dernières réservations</h2>
        @if($bookings->isEmpty())
        <p class="text-gray-400">Aucune réservation pour le moment.</p>
        @else
        <div class="space-y-3">
            @foreach($bookings as $booking)
            <div class="flex justify-between items-center bg-gray-800 rounded-xl px-5 py-4">
                <div class="flex items-center gap-3">
                    <span class="text-2xl">{{ str_contains($booking->bookable_type, 'Flight') ? '✈️' : '🏨' }}</span>
                    <div>
                        <div class="font-semibold text-white">
                            {{ $booking->bookable->airline ?? $booking->bookable->name ?? 'Inconnu' }}
                        </div>
                        <div class="text-gray-400 text-sm">{{ $booking->start_date }}</div>
                    </div>
                </div>
                <div class="text-right">
                    <div class="text-yellow-400 font-bold">{{ $booking->total_price }} €</div>
                    <span class="text-xs px-2 py-1 rounded-full
                        @if($booking->status === 'confirmed') bg-green-500/20 text-green-400
                        @elseif($booking->status === 'cancelled') bg-red-500/20 text-red-400
                        @else bg-yellow-500/20 text-yellow-400 @endif">
                        {{ strtoupper($booking->status) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <a href="/bookings" class="inline-block mt-4 text-purple-400 hover:underline text-sm">
            Voir toutes mes réservations →
        </a>
    </div>
</div>
@endsection