<div>
    @section('title', __('Dashboard'))

    <div class="font-mono container mx-auto px-6 md:px-12 xl:px-32">
        <div class="mb-20 text-center">
            <h2 class="mb-4 text-center text-2xl text-gray-900 font-bold md:text-4xl">Tailus blocks leadership</h2>
        </div>
        <div class="grid gap-12 items-center md:grid-cols-3">

            <div class="hover:scale-125 space-y-4 text-center">
                <a href="{{route('catalogo.series')}}">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-72 md:h-96 lg:w-96 lg:h-[36rem]" 
                        src="" width="640" height="805">
                </a>
                <div>
                    <h4 class="text-4xl">Séries</h4>
                </div>
            </div>

            <div class="hover:scale-125 space-y-4 text-center">
                <a href="{{route('catalogo.filmes')}}">
                    <img class=" w-64 h-64 mx-auto object-cover rounded-xl md:w-72 md:h-96 lg:w-96 lg:h-[36rem]" 
                        src="" width="1000" height="667">
                </a>
                <div>
                    <h4 class="text-4xl">Filmes</h4>
                </div>
            </div>

            <div class="hover:scale-125 space-y-4 text-center">
                <a href="{{route('catalogo.animes')}}">
                    <img class="w-64 h-64 mx-auto object-cover rounded-xl md:w-72 md:h-96 lg:w-96 lg:h-[36rem]" 
                        src="" width="1000" height="667">
                </a>
                <div>
                    <h4 class="text-4xl">Animes</h4>
                </div>

            </div>
        </div>
    </div>
</div>