<x-app-layout>
<h1>Edit Game</h1>
    <form method="POST" action="{{ route('game.update', $game->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input id="name" type="text" class="form-control" name="name" value="{{ $game->name }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="role_id">Role ID</label>
            <input id="role_id" type="text" class="form-control" name="role_id" value="{{ $game->role_id }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-app-layout>

