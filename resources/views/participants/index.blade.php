<x-app-layout>
<div class="mt-3">
    <h2>Participants List</h2>
    <ul>
        @foreach ($event->participants as $participant)
            <li>
                <!-- Affiche le nom d'utilisateur -->
                {{ $participant->user->username }}

                <!-- Vérifie si l'avatar est disponible -->
                @if ($participant->user->avatar)
                    <!-- Affiche l'avatar -->
                    <img class="h-8 w-8 rounded-full object-cover mr-2" src="{{ $participant->user->getAvatar(['extension' => 'webp', 'size' => 32]) }}" alt="Avatar">
                @endif
            </li>
        @endforeach
    </ul>
</div>
</x-app-layout>

