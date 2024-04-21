<x-app-layout>
    <div class="container">
        <h1>News</h1>

        @auth
            @if ($hasPermission)
                <a href="{{ route('news.create') }}" class="btn btn-primary">Create News</a>
            @endif
        @endauth
        @if ($news->isEmpty())
            <p>No news available.</p>
        @else
            <ul>
                @foreach ($news as $new)
                    <li>
                        <!-- Rendre le titre cliquable pour accéder aux détails de la news -->
                        <a href="{{ route('news.show', $new->id) }}">
                        <h2>{{ $new->title }}</h2>
                        </a>
                        <p>{{ $new->published_at }}</p>
                        <p>{{ $new->body }}</p>
                    </li>
                @endforeach
            </ul>
            {{ $news->links() }}

        @endif
    </div>
</x-app-layout>
