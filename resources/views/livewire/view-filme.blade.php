<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title', ('Filme'))
    <wireui:scripts />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')
    <livewire:styles/>
</head>
<body>
    <div class="dark:bg-gray-900">
        <div class="container grid mx-auto ">
            <div class="flex flex-col lg:flex-row justify-center items-strech mx-24">
                <div class="lg:w-6/12 flex justify-center items-center">
                    <div>
                        <h1 class="dark:text-white text-4x1 font-semibold text-black ">{{$viewfilme->titulo}}</h1>

                        <p class="text-gray-800 dark:text-gray-600">
                        @php
                            $gene = trim($viewfilme->genero, '[]""');
                            $gene = strtr($gene, '"', " ");
                        @endphp
                        {{$gene}}
                        </span>
                        </p>
                        
                        <p class="text-gray-800 dark:text-gray-600">Classificação: <span class="text-lg">
                            {{$viewfilme->classificacao}}
                        </span></p>

                        <p class="mt-3 mb-4 font-light text-black dark:text-gray-600">{{$viewfilme->sinopse}}</p>

                        <ul class="flex space-x-4 sm:mt-0">
                            <li><!-- lancamento -->
                                <p class="text-gray-800 dark:text-gray-600">Lançamento <span class="text-lg text-black">
                                @php
                                    $lanca = new DateTime($viewfilme->lancamento);
                                 @endphp
                                 {{$lanca->format('d/m/Y')}}
                                </span></p>
                            </li>

                            <li>
                                <p class="text-gray-800 dark:text-gray-600">Duração <span class="text-lg text-black">
                                    @php
                                        $dura = new DateTime ($viewfilme->duracao);    
                                    @endphp
                                    {{$dura->format('H:i')}}
                                </span>
                            </li>
    
                            <li><!-- Assisitu -->
                                <p class="text-gray-800 dark:text-gray-600">Assistiu <span class="text-lg text-black">
                                @php
                                    $finali = $viewfilme->finalizou;
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
                                <p class="text-gray-800 dark:text-gray-600">Nota <span>
                                    {{$viewfilme->nota}}
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="lg:w-8/12 mt-4 md:mt-6 lg:mt-4 mx-8">
                    <div class="relative w-full h-full">
                        <img src="{{$viewfilme->capa}}" class="w-[760px] h-[980px] relative" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>