@section('title', ('Editar Filmes'))
<div class="font-mono container mx-auto  md:px-8 xl:px-32">
    <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
         <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Editar de Filmes</h2>
     </div> 
     
     <div class="grid gap-8 mb-8 lg:mb-12 md:grid-cols-2">
        @foreach ($viewEfilme as $filme)
         <div class="items-center w-[32rem] bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">   
             <!-- Capa -->
                 <img class="h-[16rem] w-[14rem] " src="{{$filme->capa}}">

             <div class="p-4">
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
                 <p class="text-gray-800 dark:text-gray-600">Classificação <br><span class="text-lg font-black">
                     {{$filme->classificacao}}
                 </span></p>

                 <ul class="flex space-x-4 sm:mt-0">
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
                <div class="space-x-14" >
                    <a href="{{route('edit.filme', $filme->id)}}"><i class="fa-solid fa-pen text-lg"></i></a>

                    <label for="my-modal"><i class="fa-solid fa-trash text-lg cursor-pointer"></i></label>

                    <input type="checkbox" id="my-modal" class="modal-toggle" />
                    <div class="modal">
                    <div class="modal-box">
                    <h3 class="font-bold text-lg">Excluir</h3>
                    <p class="py-4"> Deseja excluir permanentemente {{$filme->titulo}}?</p>
                    <div class="modal-action">
                    
                        <label for="my-modal" class="btn">Ops, Me Enganei</label>

                    <form action="{{route('delete.filme', $filme->id)}}" method="post">
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
     {{ $viewEfilme->links() }}
     </div>
</div>