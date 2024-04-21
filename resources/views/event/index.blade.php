<x-app-layout>
    <div class="container">
        <h1>List of Events</h1>
        <form action="{{ route('event') }}" method="GET" class="mb-3">
            @csrf
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="participating" name="participating"
                    {{ $participating ? 'checked' : '' }}>
                <label class="form-check-label" for="participating">
                    Afficher uniquement les événements auxquels je participe
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Filtrer</button>
        </form>
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
