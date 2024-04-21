<x-app-layout>
    <div class="container">
        <h1>Add Event</h1>

        <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="game_id">Game</label>
                <select class="form-control" id="game_id" name="game_id" required>
                    @foreach ($games as $game)
                        <option value="{{ $game->id }}">{{ $game->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>

            <div class="form-group">
                <label for="participants_limit">Participants Limit</label>
                <input type="number" class="form-control" id="participants_limit" name="participants_limit"
                    min="0" required>
            </div>

            <div class="form-group">
                <label for="occurs_at">Occurs At</label>
                <input type="datetime-local" class="form-control" id="occurs_at" name="occurs_at" required>
            </div>

            <div class="form-group">
                <label for="img_path">Image</label>
                <input type="file" class="form-control-file" id="img_path" name="img_path" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Event</button>
        </form>
    </div>
</x-app-layout>
