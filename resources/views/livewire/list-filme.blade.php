@section('title', ('Catálogo Filmes'))
    <div class="font-mono container mx-auto px-4 md:px-8 xl:px-32">
       <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Catálogo de Filmes</h2>
        </div> 
        
                {{-- Filtro de pesquisa --}}
                <section class="section">
                    <form action="{{{route('catalogo.filmes')}}}" method="get">
                        @csrf
                        <div class="flex flex-row-reverse">
        
                                <div class="form-control w-80">
                                    <div class="input-group">
                                      <input type="text" name="search_id" id="search_id" placeholder="Pesquisar.." class="input input-bordered input-sm" autocomplete="off"/>
                                      <button type="submit" class="btn btn-active btn-success btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" /></svg>
                                      </button>
                                    </div>
                                </div>
                        </div>
                        <div class="flex flex-row-reverse mt-2">
                            <a href="{{route('catalogo.filmes')}}">
                                Exibir Todos
                            </a>
                        </div>
                    </form>
                </section>

        <div class="grid gap-8 mb-6 mt-4 lg:mb-16 md:grid-cols-2">
         @foreach ($filmes as $filme )
            <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700 hover:scale-105 hover:shadow-lg hover:shadow-slate-500">   
                <!-- Capa -->
                <a href="{{route('view.filme', $filme->id)}}">
                    <img class="h-[18rem] w-[14rem] " src="{{$filme->capa}}">
                </a>
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

                    <!-- Classificação -->
                    <p class="text-gray-800 dark:text-gray-600">Classificação: <span class="text-lg font-black">
                        {{$filme->classificacao}}
                    </span></p>
                    
                    <!-- Sinopse -->
                    <p class="mt-3 mb-4 font-light text-gray-800 dark:text-gray-600">
                        Sinopse
                    </p>
                    <p style="margin-top: -2rem"><a href="{{route('view.filme', $filme->id)}}"><i class="fa-solid fa-bars"></i></a></p>

                    <ul class="flex space-x-8 sm:mt-0">
                        <li><!-- lancamento -->
                            <p class="text-gray-800 dark:text-gray-600">Lançamento <br><span class="text-lg text-black	">
                            @php
                                $lanca = new DateTime($filme->lancamento);
                             @endphp
                             {{$lanca->format('d/m/Y')}}
                            </span></p>
                        </li>

                        <li><!-- Assisitu -->
                            <p class="text-gray-800 dark:text-gray-600">Assistiu <br><span class="text-lg text-black">
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
                            <p class="text-gray-800 dark:text-gray-600">Nota <br><span>
                                {{$filme->nota}}
                        </li>
                    </ul>
                </div>
            </div> 
        @endforeach
        <div>
            {{ $filmes->links() }}
        </div>
    </div>
</div>