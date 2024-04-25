<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-3xl font-bold mb-4">Ajouter un événement</h1>

            <form method="POST" action="{{ route('event.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-white font-bold mb-2">Titre</label>
                    <input type="text" class="form-input rounded-md border-gray-300 w-1/3" id="title" name="title"
                        required>
                </div>

                <div class="mb-4">
                    <label for="game_id" class="block text-white font-bold mb-2">Jeu</label>
                    <select class="form-select rounded-md border-gray-300" id="game_id" name="game_id" required>
                        @foreach ($games as $game)
                            <option value="{{ $game->id }}">{{ $game->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-white font-bold mb-2">Texte</label>
                    <textarea class="form-textarea rounded-md border-gray-300 h-32 w-2/3" id="body" name="body" rows="5" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="participants_limit" class="block text-white font-bold mb-2">
                        Limite de participants
                    </label>
                    <input type="number" class="form-input rounded-md border-gray-300" id="participants_limit"
                        name="participants_limit" min="0" required>
                </div>

                <div class="mb-4">
                    <label for="occurs_at" class="block text-white font-bold mb-2">Date</label>
                    <input type="datetime-local" class="form-input rounded-md border-gray-300" id="occurs_at"
                        name="occurs_at" required>
                </div>

                <div class="mb-4">
                    <label for="img_path" class="block text-white font-bold mb-2">Image</label>
                    <input type="file" class="form-input rounded-md border-gray-300 max-w-full" id="img_path" name="img_path" required>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-700">Ajouter l'événement</button>
            </form>
        </div>
    </div>
</x-app-layout>
