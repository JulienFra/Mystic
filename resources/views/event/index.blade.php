<x-app-layout>
    <div class="container">
        <h1>List of Events</h1>
        @auth
            @if ($hasPermission)
                <a href="{{ route('event.create') }}" class="btn btn-success mb-3">ajouter un event</a>
            @endif
        @endauth
        @foreach ($events as $event)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $event->title }}</h5>
                    <p class="card-text">Game: {{ $event->game->name }}</p>
                    <p class="card-text">Occurs at: {{ $event->occurs_at }}</p>
                    <a href="{{ route('event.show', $event->id) }}" class="btn btn-primary">Voir les détails</a>
                </div>
            </div>
        @endforeach
        {{ $events->links() }}

    </div>
</x-app-layout>
