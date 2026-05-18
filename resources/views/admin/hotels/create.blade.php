@extends('admin.layout')
@section('content')
<div class="max-w-2xl">
    <h1 class="text-3xl font-bold text-white mb-8">➕ Ajouter un hôtel</h1>

    @if($errors->any())
    <div class="bg-red-500/20 border border-red-500 text-red-400 px-4 py-3 rounded-lg mb-6">
        @foreach($errors->all() as $error)<p>❌ {{ $error }}</p>@endforeach
    </div>
    @endif

    <form method="POST" action="/admin/hotels" class="bg-gray-900 border border-gray-800 rounded-2xl p-8 space-y-5">
        @csrf
        <div class="grid grid-cols-2 gap-4">
            <div class="col-span-2">
                <label class="text-gray-400 text-sm block mb-1">Nom de l'hôtel</label>
                <input name="name" required value="{{ old('name') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Ville</label>
                <input name="city" required value="{{ old('city') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Pays</label>
                <input name="country" required value="{{ old('country') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div class="col-span-2">
                <label class="text-gray-400 text-sm block mb-1">Adresse</label>
                <input name="address" required value="{{ old('address') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Prix par nuit (€)</label>
                <input name="price_per_night" type="number" step="0.01" required value="{{ old('price_per_night') }}"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
            </div>
            <div>
                <label class="text-gray-400 text-sm block mb-1">Étoiles</label>
                <select name="stars" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">
                    @for($i=1;$i<=5;$i++)
                    <option value="{{ $i }}" {{ old('stars')==$i?'selected':'' }}>{{ str_repeat('⭐',$i) }}</option>
                    @endfor
                </select>
            </div>
            <div class="col-span-2">
                <label class="text-gray-400 text-sm block mb-1">Description</label>
                <textarea name="description" rows="3"
                    class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-3 text-white focus:border-yellow-500 focus:outline-none">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="flex gap-4 pt-4">
            <button style="background: linear-gradient(to right, #eab308, #f97316);" class="text-gray-900 px-8 py-3 rounded-xl font-bold hover:opacity-90 transition">
                ✅ Créer l'hôtel
            </button>
            <a href="/admin/hotels" class="bg-gray-700 hover:bg-gray-600 px-8 py-3 rounded-xl font-semibold transition">
                Annuler
            </a>
        </div>
    </form>
</div>
@endsection