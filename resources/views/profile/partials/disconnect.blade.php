<section class="space-y-6">
    <header>
    </header>
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <x-danger-button :href="route('logout')"
            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    Déconnexion
        </x-danger-button>
    </form>
</section>
