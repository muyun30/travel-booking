@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto">
    <div class="bg-gray-900 border border-purple-500 rounded-2xl p-8 shadow-2xl shadow-purple-500/10">
        <div class="text-center mb-8">
            <div class="text-5xl mb-4"></div>
            <h2 class="text-3xl font-bold" style="background: linear-gradient(to right, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Connexion
            </h2>
            <p class="text-gray-400 mt-2">Content de vous revoir !</p>
        </div>

        @if($errors->any())
        <div class="bg-red-500/20 border border-red-500 rounded-lg px-4 py-3 mb-6 text-red-400 text-sm">
             {{ $errors->first() }}
        </div>
        @endif

        <form method="POST" action="/login" class="space-y-5">
            @csrf
            <div>
                <label class="text-gray-400 text-sm block mb-1"> Adresse email</label>
                <input name="email" type="email" required value="{{ old('email') }}" placeholder="john@example.com"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-purple-500 focus:outline-none text-white">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1"> Mot de passe</label>
                <input name="password" type="password" required placeholder="••••••••"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 focus:border-purple-500 focus:outline-none text-white">
            </div>
            <button class="w-full bg-gradient-to-r from-purple-500 to-pink-500 py-3 rounded-xl font-bold hover:opacity-90 transition text-lg">
                Se connecter →
            </button>
        </form>

        <p class="text-center text-gray-400 mt-6 text-sm">
            Pas encore de compte ?
            <a href="/register" class="text-purple-400 hover:underline font-semibold">S'inscrire gratuitement</a>
        </p>
    </div>
</div>
@endsection
