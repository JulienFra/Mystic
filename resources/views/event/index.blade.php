<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8 p-8">
        <div class="container">
            <h1 class="text-3xl font-bold mb-8 text-white">Liste des événements</h1>
            @auth
                <form action="{{ route('event') }}" method="GET" class="mb-3">
                    @csrf
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="participating" name="participating"
                            {{ $participating ? 'checked' : '' }}>
                        <label class="form-check-label text-white" for="participating">
                            Afficher uniquement les événements auxquels je participe
                        </label>
                    </div>
                    <button type="submit" class="text-white">Filtrer</button>
                </form>
            @endauth
            @auth
                @if ($hasPermission)
                    <a href="{{ route('event.create') }}"
                        class="block w-full text-center bg-custom-color text-white font-semibold py-2 px-4 rounded-md hover:bg-purple-700">Ajouter
                        un événement
                    </a>
                @endif
            @endauth
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 pt-8 pb-8">
                @foreach ($events as $event)
                    <div class="bg-white rounded-lg shadow-md p-4 relative">
                        <h2 class="text-lg font-semibold mb-2 truncate">{{ $event->title }}</h2>
                        <p class="text-gray-600 mb-2">Jeu: {{ $event->game->name }}</p>
                        <p class="text-gray-600 mb-4">Date: {{ $event->occurs_at }}</p>
                        @if ($event->occurs_at < now())
                            <span
                                class="absolute top-0 right-0 bg-red-500 text-white m-1 px-2 py-1 text-xs rounded-full">Passé</span>
                        @endif

                        <a href="{{ route('event.show', $event->id) }}"
                            class="block w-full text-center bg-custom-color text-white font-semibold py-2 px-4 rounded-md hover:bg-purple-700">
                            Voir les détails
                        </a>
                    </div>
                @endforeach

            </div>
            
            {{ $events->links() }}

        </div>
    </div>
</x-app-layout>
