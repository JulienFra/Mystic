<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-2xl font-bold text-white mb-4">{{ $game->name }}</h1>
            <p class="text-gray-300 mb-4">{{ $game->role_id }}</p>

            <a href="{{ route('game.edit', $game->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-green-600 transition w-full text-center mb-2">Modifier</a>

            <form method="POST" action="{{ route('game.destroy', $game->id) }}" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-red-600 transition w-full text-center mb-2" onclick="return confirm('Are you sure you want to delete this game?')">Supprimer</button>
            </form>
        </div>
    </div>
</x-app-layout>
