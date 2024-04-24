<x-app-layout>
    <div class="mx-auto my-8">
        <h2 class="font-semibold text-xl text-white leading-tight bg-custom-color p-4">
            Profile
        </h2>
        <p class="text-white bg-custom-color p-4">
            Déconnectez-vous de votre compte ou bien supprimez-le.
        </p>
    </div>

    <div class="mx-auto my-8">
        <div class="p-4 sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                @include('profile.partials.disconnect')
            </div>
        </div>

        <div class="p-4 sm:p-8 shadow sm:rounded-lg bg-custom-color">
            <div class="max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</x-app-layout>
