<x-app-layout>
    <div class="container">
        <h1>Edit Event</h1>

        <form method="POST" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $event->title) }}" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required>{{ old('body', $event->body) }}</textarea>
            </div>

            <div class="form-group">
                <label for="occurs_at">Occurs At</label>
                <input type="datetime-local" class="form-control" id="occurs_at" name="occurs_at"
                    value="{{ old('occurs_at', date('Y-m-d\TH:i', strtotime($event->occurs_at))) }}" required>
            </div>

            <div class="form-group">
                <label for="img_path">Image</label>
                <input type="file" class="form-control-file" id="img_path" name="img_path" value="{{ old('img_path') }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Event</button>
        </form>
    </div>
</x-app-layout>
