@section('title', ('Editar Filmes'))
<div class="font-mono container mx-auto  md:px-8 xl:px-32">
    <div class="mx-auto max-w-screen-sm text-center mb-4 lg:mb-8">
         <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Editar de Filmes</h2>
     </div> 
     
     <div class="grid gap-8 mb-8 lg:mb-12 md:grid-cols-3">
        @foreach ($viewEfilme as $filme)
         <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-gray-800 dark:border-gray-700">   
             <!-- Capa -->
                 <img class="h-[16rem] w-[10rem] " src="{{$filme->capa}}">

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
                <div class="space-y-1" >
                    <a href="{{route('edit.filme', $filme->id)}}"><i class="fa-solid fa-pen text-lg"></i></a>
                    <form action="{{route('delete.filme', $filme->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                       <button type="submit"><i class="fa-solid fa-trash text-lg"></i></button>
                    </form>
                </div>
             </div>
         </div> 
     @endforeach
     </div>
</div>