<x-app-layout>
    <div class="container">
        <h1>Create News</h1>

        <form method="POST" action="{{ route('news.store') }}">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Create News</button>
        </form>
    </div>
</x-app-layout>
