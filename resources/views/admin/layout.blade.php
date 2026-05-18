<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — TravelBooking</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>body { font-family: 'Poppins', sans-serif; }</style>
</head>
<body class="bg-gray-950 text-white min-h-screen flex">

{{-- SIDEBAR --}}
<aside class="w-64 bg-gray-900 border-r border-purple-500 min-h-screen fixed">
    <div class="p-6 border-b border-gray-800">
        <h1 class="text-xl font-bold" style="background: linear-gradient(to right, #a855f7, #ec4899); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            ⚙️ Admin Panel
        </h1>
        <p class="text-gray-400 text-sm mt-1">{{ auth()->user()->name }}</p>
    </div>
    <nav class="p-4 space-y-2">
        <a href="/admin/dashboard" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->is('admin/dashboard') ? 'bg-gray-800 text-purple-400' : 'text-gray-300' }}">
            📊 Dashboard
        </a>
        <a href="/admin/flights" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->is('admin/flights*') ? 'bg-gray-800 text-purple-400' : 'text-gray-300' }}">
            ✈️ Vols
        </a>
        <a href="/admin/hotels" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->is('admin/hotels*') ? 'bg-gray-800 text-purple-400' : 'text-gray-300' }}">
            🏨 Hôtels
        </a>
        <a href="/admin/users" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition {{ request()->is('admin/users*') ? 'bg-gray-800 text-purple-400' : 'text-gray-300' }}">
            👥 Utilisateurs
        </a>
        <hr class="border-gray-800 my-4">
        <a href="/" class="flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-gray-800 transition text-gray-300">
            🌐 Voir le site
        </a>
        <form method="POST" action="/logout">
            @csrf
            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-lg hover:bg-red-500/20 text-red-400 transition">
                🚪 Déconnexion
            </button>
        </form>
    </nav>
</aside>

{{-- CONTENU --}}
<main class="ml-64 flex-1 p-8">
    @if(session('success'))
    <div class="bg-green-500/20 border border-green-500 text-green-400 px-6 py-3 rounded-lg mb-6">
        ✅ {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div class="bg-red-500/20 border border-red-500 text-red-400 px-6 py-3 rounded-lg mb-6">
        ❌ {{ session('error') }}
    </div>
    @endif

    @yield('content')
</main>

</body>
</html>