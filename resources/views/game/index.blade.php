<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <div class="flex justify-between items-center mb-4">
                <h1 class="text-2xl font-bold text-white">Liste des jeux</h1>
                <a href="{{ route('game.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">Créer un jeu</a>
            </div>

            <ul>
                @foreach ($games as $game)
                    <li class="mb-2">
                        <a class="flex bg-white rounded-md p-5 w-full" href="{{ route('game.show', $game) }}">
                            {{ $game->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
