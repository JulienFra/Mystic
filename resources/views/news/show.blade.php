<x-app-layout>
    <div class="container">
        <h1>{{ $news->title }}</h1>
        <p>Date: {{ $news->published_at }}</p>
        <p>{{ $news->body }}</p>
    </div>
</x-app-layout>
