@extends('admin.layout')
@section('content')

<div class="max-w-2xl">
    <h1 class="text-3xl font-bold text-white mb-8">✏️ Modifier le vol</h1>

    <form method="POST" action="/admin/flights/{{ $flight->id }}" class="bg-gray-900 border border-gray-800 rounded-2xl p-8 space-y-5">
        @csrf @method('PUT')
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-400 text-sm block mb-1">Compagnie</label>
                <input name="airline" required value="{{ $flight->airline }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Numéro de vol</label>
                <input name="flight_number" required value="{{ $flight->flight_number }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Origine</label>
                <input name="origin" required value="{{ $flight->origin }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Destination</label>
                <input name="destination" required value="{{ $flight->destination }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Date de départ</label>
                <input name="departure_at" type="datetime-local" required
                    value="{{ \Carbon\Carbon::parse($flight->departure_at)->format('Y-m-d\TH:i') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Date d'arrivée</label>
                <input name="arrival_at" type="datetime-local" required
                    value="{{ \Carbon\Carbon::parse($flight->arrival_at)->format('Y-m-d\TH:i') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Prix (€)</label>
                <input name="price" type="number" step="0.01" required value="{{ $flight->price }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Places disponibles</label>
                <input name="seats_available" type="number" required value="{{ $flight->seats_available }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-purple-500 focus:outline-none">
            </div>
        </div>
        <div class="flex gap-4 pt-4">
            <button class="bg-gradient-to-r from-purple-500 to-pink-500 px-8 py-3 rounded-xl font-bold hover:opacity-90 transition">
                💾 Sauvegarder
            </button>
            <a href="/admin/flights" class="bg-gray-700 hover:bg-gray-600 px-8 py-3 rounded-xl font-semibold transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection