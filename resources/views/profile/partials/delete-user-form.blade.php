<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-white">
            Supprimez votre compte !
        </h2>

        <p class="mt-1 text-sm text-white">
            Une fois votre compte supprimé, toutes les données liées à celui-ci seront supprimées.
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Supprimez votre compte</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>

        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                Êtes-vous sûr de vouloir supprimer votre compte ?
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                Une fois votre compte supprimé, toutes les données liées à celui-ci seront supprimées.
            </p>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    Annuler
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    Suppression
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
