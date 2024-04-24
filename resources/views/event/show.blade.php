<x-app-layout>
    <div
        class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8 p-8">
        <div class="container mx-auto px-4 py-8">
            <h1 class="text-3xl font-bold text-white mb-4">{{ $event->title }}</h1>
            <img src="{{ asset('storage/' . $event->img_path) }}" alt="Event Image"
                class="w-full h-auto rounded-lg mb-4 max-w-md">

            <p class="text-gray-300 mb-2">Jeux: {{ $event->game->name }}</p>
            <p class="text-gray-300 mb-2">Date: {{ $event->occurs_at }}</p>
            <div class="text-gray-300 mb-4 w-full">{{ $event->body }}</div>
            @auth
                @php
                    $user = auth()->user();
                    $discordRoleId = '1231000750642167989';
                    $gameRoleId = $event->game->role_id;
                    $isParticipant = $user && $event->participants->contains('user_id', $user->id);
                    $isEventPassed = now()->isAfter($event->occurs_at);
                @endphp

                @if (!in_array($discordRoleId, $userRoles))
                    <p class="text-red-500">Vous n'êtes pas sur le discord</p>
                @elseif (!in_array($gameRoleId, $userRoles))
                    <p class="text-red-500">Vous n'avez pas le rôle "{{ $event->game->name }}", vous pouvez le recevoir dans
                        le channel : Salons et rôles</p>
                @elseif ($isEventPassed)
                    <p class="text-red-500">L'événement est déjà passé</p>
                @else
                    @if ($isParticipant)
                        <form method="POST" action="{{ route('event.unparticipate', $event->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="block w-full text-center bg-red-500 text-white font-semibold py-2 px-4 rounded-md mb-2 hover:bg-red-700">
                                Je ne participe plus
                            </button>
                        </form>
                    @elseif ($event->participants->count() >= $event->participants_limit)
                        @if ($isParticipant)
                            <form method="POST" action="{{ route('event.unparticipate', $event->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="block w-full text-center bg-red-500 text-white font-semibold py-2 px-4 rounded-md mb-2 hover:bg-red-700">
                                    Je ne participe plus
                                </button>
                            </form>
                        @else
                            <p class="text-red-500">L'événement est plein</p>
                        @endif
                    @else
                        <form method="POST" action="{{ route('event.participate', $event->id) }}">
                            @csrf
                            <button type="submit"
                                class="block w-full text-center bg-blue-500 text-white font-semibold py-2 px-4 rounded-md mb-2 hover:bg-blue-700">
                                Je participe
                            </button>
                        </form>
                    @endif
                @endif
            @else
                <p class="text-red-500 mb-4">Vous n'êtes pas connecté</p>
            @endauth

            @auth
                @if ($hasPermission)
                    <a href="{{ route('event.edit', $event->id) }}"
                        class="block w-full text-center bg-green-500 text-white font-semibold py-2 px-4 rounded-md mb-2 hover:bg-green-700">Modifier</a>

                    <form method="POST" action="{{ route('event.destroy', $event->id) }}" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="block w-full text-center bg-red-500 text-white font-semibold py-2 px-4 rounded-md mb-2 hover:bg-red-700 border border-custom-color"
                            onclick="return confirm('Are you sure you want to delete this event?')">Supprimer</button>
                    </form>
                @endif
            @endauth

            <a href="{{ route('event.participants', $event->id) }}"
                class="block w-full text-center bg-custom-color text-white font-semibold py-2 px-4 rounded-md hover:bg-purple-700">Voir
                les participants</a>
        </div>
    </div>
</x-app-layout>
