<nav x-data="{ open: false }" class="bg-custom-color text-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <div class="flex items-center mr-4 cursor-pointer">
                    <a href="{{ route('homepage') }}" class="flex items-center">
                        <span class="font-semibold text-lg">MysticCorp</span>
                    </a>
                </div>
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
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = !open" class="text-white hover:text-gray-300 focus:outline-none focus:text-gray-300">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path x-show="!open" fill-rule="evenodd" clip-rule="evenodd" d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z"></path>
                        <path x-show="open" fill-rule="evenodd" clip-rule="evenodd" d="M6 18h12v-2H6v2zm0-7h12V9H6v2zm0-7h12V2H6v2z"></path>
                    </svg>
                </button>
            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
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
    </div>
    <div x-show="open" class="sm:hidden bg-custom-color">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="{{ route('event') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white">Events</a>
            <a href="{{ route('news') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white">News</a>
            @auth
                @if ($hasPermission)
                    <a href="{{ route('game') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white">Games</a>
                @endif
                <a href="{{ route('profile.edit') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white">Profile</a>
            @else
                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white">Connexion</a>
            @endauth
        </div>
    </div>
</nav>
