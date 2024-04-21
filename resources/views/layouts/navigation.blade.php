<nav x-data="{ open: false }" class="bg-custom-color text-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <!-- Logo -->
                <div class="flex items-center mr-4 cursor-pointer">
                    <a href="{{ route('homepage') }}" class="flex items-center">
                        <span class="font-semibold text-lg">MysticCorp</span>
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:flex sm:items-center sm:ml-auto">
                    <a href="{{ route('event') }}" class="text-white">Events</a>
                    <a href="{{ route('news') }}" class="text-white">News</a>
                    @auth
                        @if ($hasPermission)
                            <a href="{{ route('game') }}" class="text-white">Games</a>
                        @endif
                    @endauth
                </div>
            </div>
            @auth
                <div class="flex items-center">
                    <a href="{{ route('profile.edit') }}" class="flex items-center mr-4">
                        <img class="h-8 w-8 rounded-full object-cover mr-2"
                            src="{{ Auth::user()->getAvatar(['extension' => 'webp', 'size' => 32]) }}"
                            alt="{{ Auth::user()->getTagAttribute() }}" />
                        <span>{{ Auth::user()->getTagAttribute() }}</span>
                    </a>
                </div>
            @else
                <a href="{{ route('login') }}"
                    class="flex items-center justify-center font-semibold text-white hover:text-gray-200 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                    Connexion
                </a>
            @endauth
        </div>
    </div>
</nav>
