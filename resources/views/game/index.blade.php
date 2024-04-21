<x-app-layout>
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Liste des jeux</h1>
            <a href="{{ route('game.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">Créer un jeu</a>
        </div>
        <ul>
            @foreach ($games as $game)
                <a class="flex bg-white rounded-md shadow-md p-5 w-full hover:shadow-lg hover:scale-105 transition"
                    href="{{ route('game.show', $game) }}">
                    {{ $game->name }}
                </a>
            @endforeach
        </ul>
</x-app-layout>
