<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-3xl font-bold text-white mb-4">{{ $news->title }}</h1>
            <p class="text-gray-300 mb-2">Date: {{ $news->published_at }}</p>
            <p class="text-white">{{ $news->body }}</p>
            @auth
                @if ($hasPermission)
                    <form method="POST" action="{{ route('news.destroy', $news->id) }}" class="mt-8">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                            Supprimer
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</x-app-layout>
