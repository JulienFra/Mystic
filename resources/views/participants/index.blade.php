<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex flex-col justify-start items-center rounded m-8 py-8">
        <!-- Réduction du padding du conteneur parent à 0 -->
        <div class="container px-4">
            <h2 class="text-3xl font-bold text-white mb-4">Liste des participants</h2>
            <ul class="text-gray-300">
                @foreach ($event->participants as $participant)
                    <li class="mb-2">
                        <!-- Affiche le nom d'utilisateur -->
                        {{ $participant->user->username }}

                        <!-- Vérifie si l'avatar est disponible -->
                        @if ($participant->user->avatar)
                            <!-- Affiche l'avatar -->
                            <img class="h-8 w-8 rounded-full object-cover ml-2"
                                src="{{ $participant->user->getAvatar(['extension' => 'webp', 'size' => 32]) }}"
                                alt="">
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
