@section('title', ('Editar Animes'))
<div aria-label="group of cards" tabindex="0" class="focus:outline-none py-8 w-full">
    <div class="lg:flex items-center justify-center w-full">
        @foreach ($viewEanimes as $anime)
        <div tabindex="0" aria-label="card 1" class="focus:outline-none lg:w-4/12 lg:mr-7 lg:mb-0 mb-7 bg-white dark:bg-gray-800  p-6 shadow rounded">
            <div class="flex items-center border-b border-gray-200 dark:border-gray-700  pb-6">
                <img src="{{$anime->capa}}" alt="coin avatar" class="w-16 h-16 rounded-full" />
                <div class="flex items-start justify-between w-full">
                    <div class="pl-3 w-full">
                        <p tabindex="0" class="focus:outline-none text-xl font-medium leading-5 text-gray-800 dark:text-white ">{{$anime->titulo}}</p>
                        <p tabindex="0" class="focus:outline-none text-sm leading-normal pt-2 text-gray-500 dark:text-gray-200 ">
                            <span class="text-gray-800 dark:text-gray-600">
                                @php
                                    $gene = trim($anime->genero, '[]""');
                                    $gene = strtr($gene, '"', " ");
                                @endphp
                                {{$gene}}
                            </span>
                        </p>
                        <ul class="flex space-x-12 sm:mt-0">
                            <li><!-- Temporada -->
                                <p class="text-gray-800 dark:text-gray-600">Temporada: <span class="text-lg font-black">
                                    {{$anime->temporada}}
                                </span></p>
                            </li>
                            <li><!-- Episodio -->
                                <p class="text-gray-800 dark:text-gray-600">Episódio: <span class="text-lg font-black">
                                    {{$anime->episodio}}
                                </span></p>
                            </li>
                        </ul>    
                    </div>
                </div>
            </div>
            <div class="px-2">
                <ul class="flex space-x4">
                    <li class="text-gray-800 dark:text-gray-600 mt-2">Classificação: <span class="text-lg font-black">
                        {{$anime->classificacao}}
                    </span>
                     </li>

                    <li><!-- lancamento -->
                        <p class="text-gray-800 dark:text-gray-600">Lançamento: <span class="text-lg text-black	">
                        @php
                            $lanca = new DateTime($anime->lancamento);
                         @endphp
                         {{$lanca->format('d/m/Y')}}
                        </span></p>
                    </li>

                    <li><!-- Assisitu -->
                        <p class="text-gray-800 dark:text-gray-600">Assistiu: <span class="text-lg text-black">
                            {{$anime->finalizou}} 
                        </span></p>
                    </li>

                    <li><!-- nota -->
                        <p class="text-gray-800 dark:text-gray-600">Nota <span>
                            {{$anime->nota}}
                    </li>
                </ul>
                <div tabindex="0" class="focus:outline-none flex mt-2">
                    <div class="py-2 px-4 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100"><a href=""><i class="fa-solid fa-pen"></i></a></div>
                    <div class="py-2 px-4 ml-3 text-xs leading-3 text-indigo-700 rounded-full bg-indigo-100"><a href=""><button type="submit"><i class="fa-solid fa-trash-can"></i></button></div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
