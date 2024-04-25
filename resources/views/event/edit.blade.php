<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold text-white mb-4">Éditer l'événement</h1>

            <form method="POST" action="{{ route('event.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="title" class="block text-white font-bold mb-2">Titre</label>
                    <input type="text" class="form-input rounded-md border-gray-300 w-1/3" id="title" name="title"
                        value="{{ old('title', $event->title) }}" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-white font-bold mb-2">Texte</label>
                    <textarea class="form-textarea rounded-md border-gray-300 h-32 w-2/3" id="body" name="body" rows="5" required>{{ old('body', $event->body) }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="occurs_at" class="block text-white font-bold mb-2">Date</label>
                    <input type="datetime-local" class="form-input rounded-md border-gray-300" id="occurs_at"
                        name="occurs_at"
                        value="{{ old('occurs_at', date('Y-m-d\TH:i', strtotime($event->occurs_at))) }}" required>
                </div>

                <div class="mb-4">
                    <label for="img_path" class="block text-white font-bold mb-2">Image</label>
                    <input type="file" class="form-input rounded-md border-gray-300" id="img_path" name="img_path"
                        value="{{ old('img_path') }}">
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">Mettre à jour
                    l'événement</button>
            </form>
        </div>
    </div>
</x-app-layout>
