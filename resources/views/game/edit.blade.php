<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-2xl font-bold text-white mb-4">Modifier le jeu</h1>
            <form method="POST" action="{{ route('game.update', $game->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-12">
                    <label for="name" class="block text-white font-bold mb-2">Jeu</label>
                    <input id="name" type="text" class="form-input rounded-md border-gray-300" name="name" value="{{ $game->name }}" required autofocus>
                </div>

                <div class="mb-12">
                    <label for="role_id" class="block text-white font-bold mb-2">Role ID</label>
                    <input id="role_id" type="text" class="form-input rounded-md border-gray-300" name="role_id" value="{{ $game->role_id }}" required>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition w-full text-center mt-16">Modifier</button>
            </form>
        </div>
    </div>
</x-app-layout>
