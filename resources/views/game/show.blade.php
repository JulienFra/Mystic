<x-app-layout>
    <h1>{{ $game->name }}</h1>
    <p>{{ $game->role_id}}</p>

    <a href="{{ route('game.edit', $game->id) }}" class="btn btn-primary">Edit</a>

    <form method="POST" action="{{ route('game.destroy', $game->id) }}" style="display: inline-block;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this game?')">Delete</button>
    </form>

</x-app-layout>
