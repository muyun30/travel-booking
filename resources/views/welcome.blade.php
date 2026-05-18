@extends('layouts.app')
@section('content')

{{-- HERO --}}
<div class="text-center py-20">
    <div class="inline-block bg-purple-500/20 border border-purple-500 text-purple-400 px-4 py-2 rounded-full text-sm font-semibold mb-6">
        🌍 La meilleure plateforme de voyage
    </div>
    <h1 class="text-6xl font-bold mb-6" style="background: linear-gradient(to right, #a855f7, #ec4899, #eab308); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Voyagez sans limites ✈️
    </h1>
    <p class="text-xl text-gray-400 mb-10 max-w-2xl mx-auto">
        Trouvez les meilleurs vols et hôtels au meilleur prix. Réservez en quelques clics depuis n'importe où dans le monde.
    </p>
    <div class="flex justify-center gap-4 flex-wrap">
        <a href="/flights" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:opacity-90 px-8 py-4 rounded-xl font-bold text-lg transition shadow-lg shadow-purple-500/25">
            🛫 Rechercher un vol
        </a>
        <a href="/hotels" style="background: linear-gradient(to right, #eab308, #f97316);" class="hover:opacity-90 px-8 py-4 rounded-xl font-bold text-lg text-gray-900 transition shadow-lg shadow-yellow-500/25">
            🏨 Trouver un hôtel
        </a>
    </div>
</div>

{{-- STATS --}}
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 my-16">
    <div class="bg-gray-900 border border-purple-500/50 rounded-2xl p-8 text-center hover:border-purple-500 transition">
        <div class="text-5xl font-bold text-purple-400 mb-2">500+</div>
        <div class="text-gray-400">Destinations disponibles</div>
    </div>
    <div class="bg-gray-900 border border-pink-500/50 rounded-2xl p-8 text-center hover:border-pink-500 transition">
        <div class="text-5xl font-bold text-pink-400 mb-2">1200+</div>
        <div class="text-gray-400">Hôtels partenaires</div>
    </div>
    <div class="bg-gray-900 border border-yellow-500/50 rounded-2xl p-8 text-center hover:border-yellow-500 transition">
        <div class="text-5xl font-bold text-yellow-400 mb-2">50K+</div>
        <div class="text-gray-400">Voyageurs satisfaits</div>
    </div>
</div>

{{-- FEATURES --}}
<div class="text-center mb-10">
    <h2 class="text-3xl font-bold">Pourquoi choisir TravelBooking ?</h2>
    <p class="text-gray-400 mt-2">Tout ce dont vous avez besoin pour voyager sereinement</p>
</div>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
    <div class="bg-gray-900 rounded-2xl p-6 border border-gray-800 hover:border-purple-500 transition">
        <div class="text-4xl mb-4">🔒</div>
        <h3 class="text-xl font-bold text-purple-400 mb-2">Paiement sécurisé</h3>
        <p class="text-gray-400">Vos données sont protégées à 100% avec un chiffrement SSL</p>
    </div>
    <div class="bg-gray-900 rounded-2xl p-6 border border-gray-800 hover:border-pink-500 transition">
        <div class="text-4xl mb-4">⚡</div>
        <h3 class="text-xl font-bold text-pink-400 mb-2">Réservation rapide</h3>
        <p class="text-gray-400">Réservez votre vol ou hôtel en moins de 2 minutes</p>
    </div>
    <div class="bg-gray-900 rounded-2xl p-6 border border-gray-800 hover:border-yellow-500 transition">
        <div class="text-4xl mb-4">🌍</div>
        <h3 class="text-xl font-bold text-yellow-400 mb-2">Partout dans le monde</h3>
        <p class="text-gray-400">Plus de 500 destinations disponibles sur tous les continents</p>
    </div>
</div>

{{-- CTA FINAL --}}
@guest
<div class="text-center bg-gray-900 border border-gray-800 rounded-2xl p-12">
    <h2 class="text-3xl font-bold mb-4">Prêt à voyager ? 🚀</h2>
    <p class="text-gray-400 mb-6">Créez votre compte gratuitement et commencez à explorer le monde</p>
    <a href="/register" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:opacity-90 px-8 py-4 rounded-xl font-bold text-lg transition">
        Créer mon compte gratuitement
    </a>
</div>
@endguest

@endsection
