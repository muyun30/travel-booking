@extends('admin.layout')
@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-white">🏨 Gestion des hôtels</h1>
    <a href="/admin/hotels/create" class="bg-gradient-to-r from-yellow-400 to-orange-500 text-gray-900 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
        + Ajouter un hôtel
    </a>
</div>

<div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-800">
            <tr class="text-gray-400 text-sm">
                <th class="text-left px-6 py-4">Hôtel</th>
                <th class="text-left px-6 py-4">Ville</th>
                <th class="text-left px-6 py-4">Étoiles</th>
                <th class="text-left px-6 py-4">Prix/nuit</th>
                <th class="text-left px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($hotels as $hotel)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4">
                    <div class="font-semibold text-white">{{ $hotel->name }}</div>
                    <div class="text-gray-400 text-sm">{{ $hotel->country }}</div>
                </td>
                <td class="px-6 py-4 text-gray-300">{{ $hotel->city }}</td>
                <td class="px-6 py-4">{{ str_repeat('⭐', $hotel->stars) }}</td>
                <td class="px-6 py-4 text-yellow-400 font-bold">{{ $hotel->price_per_night }} €</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="/admin/hotels/{{ $hotel->id }}/edit" class="bg-blue-500/20 hover:bg-blue-500 text-blue-400 hover:text-white px-3 py-1 rounded-lg text-sm transition">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="/admin/hotels/{{ $hotel->id }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Supprimer cet hôtel ?')"
                                class="bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white px-3 py-1 rounded-lg text-sm transition">
                                🗑️ Supprimer
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $hotels->links() }}</div>
@endsection