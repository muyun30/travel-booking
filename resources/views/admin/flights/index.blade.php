@extends('admin.layout')
@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-white">✈️ Gestion des vols</h1>
    <a href="/admin/flights/create" class="bg-gradient-to-r from-purple-500 to-pink-500 px-6 py-3 rounded-xl font-bold hover:opacity-90 transition">
        + Ajouter un vol
    </a>
</div>

<div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-800">
            <tr class="text-gray-400 text-sm">
                <th class="text-left px-6 py-4">Vol</th>
                <th class="text-left px-6 py-4">Trajet</th>
                <th class="text-left px-6 py-4">Départ</th>
                <th class="text-left px-6 py-4">Prix</th>
                <th class="text-left px-6 py-4">Places</th>
                <th class="text-left px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($flights as $flight)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4">
                    <div class="font-semibold text-white">{{ $flight->airline }}</div>
                    <div class="text-gray-400 text-sm">#{{ $flight->flight_number }}</div>
                </td>
                <td class="px-6 py-4 text-gray-300">{{ $flight->origin }} → {{ $flight->destination }}</td>
                <td class="px-6 py-4 text-gray-400 text-sm">{{ \Carbon\Carbon::parse($flight->departure_at)->format('d/m/Y H:i') }}</td>
                <td class="px-6 py-4 text-yellow-400 font-bold">{{ $flight->price }} €</td>
                <td class="px-6 py-4 text-gray-300">{{ $flight->seats_available }}</td>
                <td class="px-6 py-4">
                    <div class="flex gap-2">
                        <a href="/admin/flights/{{ $flight->id }}/edit" class="bg-blue-500/20 hover:bg-blue-500 text-blue-400 hover:text-white px-3 py-1 rounded-lg text-sm transition">
                            ✏️ Modifier
                        </a>
                        <form method="POST" action="/admin/flights/{{ $flight->id }}">
                            @csrf @method('DELETE')
                            <button onclick="return confirm('Supprimer ce vol ?')"
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
<div class="mt-6">{{ $flights->links() }}</div>
@endsection