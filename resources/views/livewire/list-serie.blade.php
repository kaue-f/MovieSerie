@section('title', ('Catálogo Séries'))
    <div class="font-mono container mx-auto px-4 md:px-8 xl:px-32">
       <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Catálogo de Séries</h2>
        </div> 
        
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
         @foreach ($series as $serie )
            <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">   
                <!-- Capa -->
                    <img class="h-[18rem] w-[18rem] " src="{{$serie->capa}}">
                <div class="p-5">

                    <!-- Titulo -->
                    <h3 class="text-xl font-bold tracking-tight text-black dark:text-white">{{$serie->titulo}}</h3>

                    <!-- Genero-->
                    <span class="text-gray-800 dark:text-gray-600">
                    @php
                        $gene = trim($serie->genero, '[]""');
                        $gene = strtr($gene, '"', " ");
                    @endphp
                    {{$gene}}
                    </span>

                    <!-- Classificação -->
                    <p class="text-gray-800 dark:text-gray-600">Classificação: <span class="text-lg font-black">
                        {{$serie->classificacao}}
                    </span></p>

                    <!-- Sinopse -->
                    <p class="mb-4 font-light text-gray-800 dark:text-gray-600">Sinopse</p>
                    <p style="margin-top: -2rem"><a href="{{route('view.serie', $serie->id)}}"><i class="fa-solid fa-bars"></i></a></p>

                    <ul class="flex space-x-12 sm:mt-0">
                        <li><!-- Temporada -->
                            <p class="text-gray-800 dark:text-gray-600">Temporada: <span class="text-lg font-black">
                                {{$serie->temporada}}
                            </span></p>
                        </li>
                        <li><!-- Episodio -->
                            <p class="text-gray-800 dark:text-gray-600">Episódio: <span class="text-lg font-black">
                                {{$serie->episodio}}
                            </span></p>
                        </li>
                    </ul>

                    <ul class="flex space-x-4 sm:mt-0">
                        <li><!-- lancamento -->
                            <p class="text-gray-800 dark:text-gray-600">Lançamento <span class="text-lg text-black	">
                            @php
                                $lanca = new DateTime($serie->lancamento);
                             @endphp
                             {{$lanca->format('d/m/Y')}}
                            </span></p>
                        </li>

                        <li><!-- Assisitu -->
                            <p class="text-gray-800 dark:text-gray-600">Assistiu <span class="text-lg text-black">
                                {{$serie->finalizou}}
                            </span></p>
                        </li>

                        <li><!-- nota -->
                            <p class="text-gray-800 dark:text-gray-600">Nota <span>
                                {{$serie->nota}}
                        </li>
                    </ul>
                </div>
            </div> 
        @endforeach
        </div>
</div>
