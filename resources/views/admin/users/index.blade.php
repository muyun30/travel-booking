@extends('admin.layout')
@section('content')

<h1 class="text-3xl font-bold text-white mb-8">👥 Gestion des utilisateurs</h1>

<div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-800">
            <tr class="text-gray-400 text-sm">
                <th class="text-left px-6 py-4">Utilisateur</th>
                <th class="text-left px-6 py-4">Email</th>
                <th class="text-left px-6 py-4">Rôle</th>
                <th class="text-left px-6 py-4">Réservations</th>
                <th class="text-left px-6 py-4">Inscrit le</th>
                <th class="text-left px-6 py-4">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-800">
            @foreach($users as $user)
            <tr class="hover:bg-gray-800/50 transition">
                <td class="px-6 py-4 font-semibold text-white">{{ $user->name }}</td>
                <td class="px-6 py-4 text-gray-400">{{ $user->email }}</td>
                <td class="px-6 py-4">
                    <span class="px-2 py-1 rounded-full text-xs font-bold {{ $user->role === 'admin' ? 'bg-purple-500/20 text-purple-400' : 'bg-gray-700 text-gray-300' }}">
                        {{ strtoupper($user->role) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-gray-300">{{ $user->bookings_count }}</td>
                <td class="px-6 py-4 text-gray-400 text-sm">{{ $user->created_at->format('d/m/Y') }}</td>
                <td class="px-6 py-4">
                    @if(!$user->isAdmin())
                    <form method="POST" action="/admin/users/{{ $user->id }}">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Supprimer cet utilisateur ?')"
                            class="bg-red-500/20 hover:bg-red-500 text-red-400 hover:text-white px-3 py-1 rounded-lg text-sm transition">
                            🗑️ Supprimer
                        </button>
                    </form>
                    @else
                    <span class="text-gray-600 text-sm">Protégé</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="mt-6">{{ $users->links() }}</div>
@endsection