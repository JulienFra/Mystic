<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8">
        <div class="container mx-auto px-4 py-8 rounded-lg">
            <h1 class="text-3xl font-bold text-white mb-4">Créer une actualité</h1>

            <form method="POST" action="{{ route('news.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block text-white font-bold mb-2">Titre</label>
                    <input type="text" class="form-input rounded-md border-gray-300 w-1/3" id="title"
                        name="title" required>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-white font-bold mb-2">Texte</label>
                    <textarea class="form-textarea rounded-md border-gray-300 h-32 w-2/3" id="body" name="body" rows="10"
                        required></textarea>
                </div>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-600 transition w-full">Créer
                    l'actualité</button>
            </form>
        </div>
    </div>
</x-app-layout>
