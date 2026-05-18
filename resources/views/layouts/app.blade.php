<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>✈️ TravelBooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        .gradient-text {
            background: linear-gradient(to right, #a855f7, #ec4899);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-950 text-white min-h-screen">

<nav class="bg-gray-900 border-b border-purple-500 shadow-lg sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="text-2xl font-bold gradient-text">✈️ TravelBooking</a>
        <div class="flex gap-6 items-center">
            <a href="/flights" class="hover:text-purple-400 transition font-medium">Vols</a>
            <a href="/hotels"  class="hover:text-pink-400 transition font-medium">Hôtels</a>
          @auth
    <a href="/bookings" class="hover:text-yellow-400 transition font-medium">Mes Réservations</a>
    <a href="/profile"  class="hover:text-pink-400 transition font-medium">Mon Profil</a>
    @if(auth()->user()->isAdmin())
    <a href="/admin/dashboard" class="bg-purple-500/20 border border-purple-500 text-purple-400 hover:bg-purple-500 hover:text-white px-3 py-1 rounded-lg text-sm transition">
        ⚙️ Admin
    </a>
    @endif
    <span class="text-gray-500">|</span>
    <span class="text-gray-300 text-sm">👤 {{ auth()->user()->name }}</span>
    <form method="POST" action="/logout" class="inline">
        @csrf
        <button class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-lg text-sm font-semibold transition">
            Déconnexion
        </button>
    </form>
@else
                <a href="/login" class="hover:text-purple-400 transition font-medium">Connexion</a>
                <a href="/register" class="bg-gradient-to-r from-purple-500 to-pink-500 hover:opacity-90 px-4 py-2 rounded-lg text-sm font-semibold transition">
                    S'inscrire
                </a>
            @endauth
        </div>
    </div>
</nav>

@if(session('success'))
<div class="max-w-7xl mx-auto px-6 mt-4">
    <div class="bg-green-500/20 border border-green-500 text-green-400 px-6 py-3 rounded-lg">
         {{ session('success') }}
    </div>
</div>
@endif

@if(session('error'))
<div class="max-w-7xl mx-auto px-6 mt-4">
    <div class="bg-red-500/20 border border-red-500 text-red-400 px-6 py-3 rounded-lg">
     {{ session('error') }}
    </div>
</div>
@endif

<main class="max-w-7xl mx-auto px-6 py-10">
    @yield('content')
</main>

<footer class="text-center text-gray-500 py-8 border-t border-gray-800 mt-10">
    © 2025 TravelBooking — Tous droits réservés 
</footer>
</body>
</html>
