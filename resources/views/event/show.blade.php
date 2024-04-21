<x-app-layout>
    <h1>{{ $event->title }}</h1>
    <p>Game: {{ $event->game->name }}</p>
    <p>Occurs at: {{ $event->occurs_at }}</p>
    <p>Body: {{ $event->body }}</p>
    @if ($event->img_path)
        <img src="{{ asset('storage/' . $event->img_path) }}" alt="Event Image">
    @else
        <p>No image available</p>
    @endif

    @php
        $user = auth()->user();
        $discordRoleId = '1231000750642167989';
        $gameRoleId = $event->game->role_id;
        $isParticipant = $user && $event->participants->contains('user_id', $user->id);
        $isEventPassed = now()->isAfter($event->occurs_at);

    @endphp

    @if (!$user)
        <p>You are not logged in</p>
    @elseif (!in_array($discordRoleId, $userRoles))
        <p>You are not on Discord</p>
    @elseif (!in_array($gameRoleId, $userRoles))
        <p>You don't have the role "{{ $event->game->name }}", get it in the "Salon et rôles" channel</p>
    @elseif ($isEventPassed)
        <p>The event has already passed</p>
    @elseif ($event->participants->count() >= $event->participants_limit)
        <p>The event is full</p>
    @else
        @if ($isParticipant)
            <form method="POST" action="{{ route('event.unparticipate', $event->id) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">I don't participate anymore</button>
            </form>
        @else
            <form method="POST" action="{{ route('event.participate', $event->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">I participate</button>
            </form>
        @endif
    @endif

    @auth
        @if ($hasPermission)
            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-primary">Edit</a>

            <form method="POST" action="{{ route('event.destroy', $event->id) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
            </form>
        @endif
    @endauth

    <a href="{{ route('event.participants', $event->id) }}" class="btn btn-info">View Participants</a>
</x-app-layout>
