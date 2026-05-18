@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-gray-900 border border-pink-500 rounded-2xl p-8 shadow-2xl shadow-pink-500/10">
        <div class="text-center mb-8">
            <div class="text-5xl mb-4">🌍</div>
            <h2 class="text-3xl font-bold" style="background: linear-gradient(to right, #ec4899, #eab308); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Créer un compte
            </h2>
            <p class="text-gray-400 mt-2">Rejoignez 50 000+ voyageurs</p>
        </div>

        @if($errors->any())
        <div class="bg-red-500/20 border border-red-500 rounded-lg px-4 py-3 mb-6 text-red-400 text-sm">
            ❌ {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/register" class="space-y-5">
            @csrf
            <div>
                <label class="text-gray-400 text-sm block mb-1">👤 Nom complet</label>
                <input name="name" required value="{{ old('name') }}" placeholder="John Doe"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-pink-500 focus:outline-none text-white">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">📧 Adresse email</label>
                <input name="email" type="email" required value="{{ old('email') }}" placeholder="john@example.com"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-pink-500 focus:outline-none text-white">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1"> Mot de passe</label>
                <input name="password" type="password" required placeholder="Minimum 8 caractères"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-pink-500 focus:outline-none text-white">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Confirmer le mot de passe</label>
                <input name="password_confirmation" type="password" required placeholder="••••••••"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-pink-500 focus:outline-none text-white">
            </div>
            <button style="background: linear-gradient(to right, #ec4899, #eab308);" class="w-full text-gray-900 py-3 rounded-xl font-bold hover:opacity-90 transition text-lg">
                Créer mon compte →
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6 text-sm">
            Déjà un compte ?
            <a href="/login" class="text-pink-400 hover:underline font-semibold">Se connecter</a>
        </p>
    </div>
</div>
@endsection
