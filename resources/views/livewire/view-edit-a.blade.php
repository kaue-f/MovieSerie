@section('title', ('Editar Animes'))
<div class="font-mono container md:px-6 xl:px-28">
    <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
         <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Editar de Animes</h2>
     </div> 
     
     <div class="grid gap-8 mb-8 lg:mb-12 md:grid-cols-2">
        @foreach ($viewEanimes as $anime)
         <div class="items-center  bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">   
             <!-- Capa -->
                 <img class="h-[16rem] w-[14rem]" src="{{$anime->capa}}">

             <div class="p-4">
                 <!-- Titulo -->
                 <h3 class="text-xl font-bold tracking-tight text-black dark:text-white">{{$anime->titulo}}</h3>

                 <!-- Genero-->
                 <span class="text-gray-800 dark:text-gray-600">
                 @php
                     $gene = trim($anime->genero, '[]""');
                     $gene = strtr($gene, '"', " ");
                 @endphp
                 {{$gene}}
                 </span>

                 <ul class="flex space-x-12 sm:mt-0">
                    <li><!-- Temporada -->
                        <p class="text-gray-800 dark:text-gray-600">Temporada <span class="text-lg font-black">
                            {{$anime->temporada}}
                        </span></p>
                    </li>
                    <li><!-- Episodio -->
                        <p class="text-gray-800 dark:text-gray-600">Episódio <span class="text-lg font-black">
                            {{$anime->episodio}}
                        </span></p>
                    </li>
                </ul> 

                 <!-- Classificação -->
                 <p class="text-gray-800 dark:text-gray-600">Classificação <br><span class="text-lg font-black">
                     {{$anime->classificacao}}
                 </span></p>

                 <ul class="flex space-x-14 sm:mt-0">
                     <li><!-- Assisitu -->
                        <p class="text-gray-800 dark:text-gray-600">Assistiu <br><span class="text-lg text-black">
                            {{$anime->finalizou}}
                        </span></p>
                     </li>

                     <li><!-- nota -->
                         <p class="text-gray-800 dark:text-gray-600">Nota <br><span>
                             {{$anime->nota}}
                     </li>
                 </ul>
                <div class="space-x-14" >
                    <a href="{{route('edit.anime', $anime->id)}}"><i class="fa-solid fa-pen text-lg"></i></a>

                    <label for="my-modal"><i class="fa-solid fa-trash text-lg cursor-pointer"></i></label>

                    <input type="checkbox" id="my-modal" class="modal-toggle" />
                    <div class="modal">
                    <div class="modal-box">
                    <h3 class="font-bold text-lg">Excluir</h3>
                    <p class="py-4"> Deseja excluir permanentemente {{$anime->titulo}}?</p>
                    <div class="modal-action">
                    
                        <label for="my-modal" class="btn">Ops, Me Enganei</label>

                    <form action="{{route('delete.anime', $anime->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button for="my-modal" class="btn" type="submit">Tenho Certeza!</button>
                    </form>
                    </div>
                    </div>
                    </div>
                    
                </div>
             </div>
         </div> 
     @endforeach
     {{ $viewEanimes->links() }}
     </div>
</div>