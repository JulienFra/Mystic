<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-2xl font-bold text-white mb-4">Actualités</h1>

            @auth
                @if ($hasPermission)
                    <a href="{{ route('news.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition">Créer une actualité</a>
                @endif
            @endauth

            @if ($news->isEmpty())
                <p class="text-white mt-1">Aucune actualité disponible.</p>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4 mb-4">
                    @foreach ($news as $new)
                        <a href="{{ route('news.show', $new->id) }}" class="bg-white rounded-lg shadow-md p-4 hover:shadow-lg hover:scale-105 transition">
                            <h2 class="text-lg font-semibold mb-2">{{ $new->title }}</h2>
                            <p class="text-gray-600 mb-2">{{ $new->published_at }}</p>
                        </a>
                    @endforeach
                </div>
                {{ $news->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
