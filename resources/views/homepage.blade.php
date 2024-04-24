<x-app-layout>
    <div class="bg-gradient-to-br from-purple-900 to-indigo-900 min-h-screen flex justify-center items-center rounded m-8 p-8">
        <div class="max-w-6xl mx-auto flex flex-col items-center md:flex-row">
            <div class="w-full md:w-2/3 pr-0 md:pr-8 mb-8 md:mb-0 text-center md:text-left">
                <h1 class="text-white text-5xl font-bold mb-8">Un discord pour tout le monde !</h1>
                <p class="text-white text-lg mb-8">
                    Viens nous rejoindre dans notre aventure! Des Events seront organisés sur différents jeux comme par exemple : League of Legends, Rocket League ou bien même Kculture.
                </p>
                <p class="text-white text-lg mb-8">
                    Viens nous rejoindre pour notre même passion : Le Jeu-Vidéo
                </p>
                <div class="text-center md:text-left">
                    <a href="https://discord.gg/Brt8YUAqWs"
                        class="bg-custom-color hover:bg-purple-900 text-white font-bold py-2 px-4 rounded-lg inline-block w-full md:w-auto">
                        Nous rejoindre
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 flex justify-center">
                <img src="{{ asset('storage/images/gaming2.jpg') }}" alt="Votre Image" class="w-full h-auto rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
