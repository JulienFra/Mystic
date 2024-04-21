<nav x-data="{ open: false }" class="bg-custom-color border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('homepage') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('event')">
                        Events
                    </x-nav-link>
                </div>
            </div>
            @auth
                @if ($hasPermission)
                    <x-nav-link :href="route('game')">
                        games
                    </x-nav-link>
                @endif
            @endauth

            @auth
                <a href="{{ route('profile.edit') }}" class="hidden sm:flex items-center sm:ml-6">
                    <img class="h-8 w-8 rounded-full object-cover mr-2"
                        src="{{ Auth::user()->getAvatar(['extension' => 'webp', 'size' => 32]) }}"
                        alt="{{ Auth::user()->getTagAttribute() }}" />
                    <div style="display: flex; flex-direction: column; align-items: flex-start;">
                        {{ Auth::user()->getTagAttribute() }}
                    </div>
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">{{ __('Log in') }}</a>
            @endauth
</nav>
