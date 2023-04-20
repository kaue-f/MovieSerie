    <div class="font-mono container mx-auto px-4 md:px-8 xl:px-32">
       <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Catálogo de Filmes</h2>
        </div> 
        
        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2">
         @foreach ($filmes as $filme )
            <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">   
                <!-- Capa -->

                    <img class="h-[18rem] w-[18rem] " src="{{$filme->capa}}">

                <div class="p-5">
                    <!-- Titulo -->
                    <h3 class="text-xl font-bold tracking-tight text-black dark:text-white">{{$filme->titulo}}</h3>
                    <!-- Genero-->
                    <span class="text-gray-800 dark:text-gray-600">
                    @php
                        $gene = trim($filme->genero, '[]""');
                        $gene = strtr($gene, '"', " ");
                    @endphp
                    {{$gene}}
                    </span>
                    <!-- Sinopse -->
                    <p class="mt-3 mb-4 font-light text-gray-800 dark:text-gray-600">{{$filme->sinopse}}</p>

                    <ul class="flex space-x-4 sm:mt-0">
                        <li><!-- classificação -->
                            <p class="text-gray-800 dark:text-gray-600">Classificação <span class="text-lg text-black	">{{$filme->classificacao}}</span></p>
                        </li>
                        <li><!-- lancamento -->
                            <p class="text-gray-800 dark:text-gray-600">Lançamento <span class="text-lg text-black	">
                            @php
                                $lanca = new DateTime($filme->lancamento);
                             @endphp
                             {{$lanca->format('d/m/Y')}}
                            </span></p>
                        </li>
                        <li><!-- Duração -->
                            <p class="text-gray-800 dark:text-gray-600">Duração <span class="text-lg text-black">
                            @php
                                $dura = new DateTime($filme->duracao);
                            @endphp
                            {{$dura->format('H:i')}}
                            </span></p>
                        </li>
                        <li><!-- Assisitu -->
                            <p class="text-gray-800 dark:text-gray-600">Assistiu <span class="text-lg text-black">
                            @php
                                $finali = $filme->finalizou;
                                if ($finali == 1) {
                                    $finali = "Sim";
                                }
                                else {
                                    $finali = "Não";
                                }
                            @endphp
                              {{$finali}}  
                            </span></p>
                        </li>
                        <li><!-- nota -->
                            <p class="text-gray-800 dark:text-gray-600">Nota <span>{{$filme->nota}}</span></p>
                        </li>
                    </ul>
                </div>
            </div> 
        @endforeach
        </div>
</div>