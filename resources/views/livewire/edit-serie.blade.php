<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title', ('Editar Série'))
    <wireui:scripts />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')
    <livewire:styles/>
</head>
<body>  
<form class="mx-auto mt-16 max-w-xl sm:mt-2 font-mono" action="{{route('update.serie', $editserie->id)}}" method="post">
    @csrf

    <h1 class="" style="margin-block: 1rem">Adicionar Série</h1>

        <!-- Titulo -->
    <div class="sm:col-span-2" style="margin-block: 0.8rem">
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Titulo</label>
            <div class="mt-2.5">
              <x-input type="text" placeholder="Titulo" name="titulo" id="titulo" value="{{$editserie->titulo}}" disabled/>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 0.8rem">
          <!-- Temporada -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Temporada</label>
            <div class="mt-2.5">
                <x-input type="number" placeholder="Temporada" name="temporada" id="temporada" value="{{{$editserie->temporada}}}" autocomplete="off"/>
            </div>
          </div>
          
          <!--  Episodio -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Episódio</label>
            <div class="mt-2.5">
                <x-input type="number" placeholder="Quantidade de Episódio" name="episodio" id="episodio" value="{{{$editserie->episodio}}}" autocomplete="off"/>
            </div>
          </div>
         </div>
          <!-- Capa -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Capa</label>
            <div class="mt-2.5">
                <x-input name='capa' placeholder="URL da Imagem" value="{{{$editserie->capa}}}" autocomplete="off"/>
            </div>
          </div>

          <!-- Genero -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Gênero</label>
            <div class="mt-2.5">
                <x-select
                    autocomplete="off"
                    name='genero'
                    placeholder="Selecionar Gênero"
                    multiselect
                    :options="['Ação', 'Aventura', 'Animação', 'Baseado em fatos reais', 'Comédia', 'Comédia romântica', 'Dança', 'Documentário', 'Drama', 'Fantasia', 'Faroeste', 'Ficção científica', 'Guerra','Mistério', 'Musical', 'Romance', 'Suspense','Terror']"
                    value="{{{$editserie->genero}}}"
                />
            </div>
          </div>

          <!-- Classificacao -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Classificação</label>
            <div class="mt-2.5">
                <x-select
                    autocomplete="off"
                    name='classificacao'
                    placeholder="Selecionar Classificação"
                    :options="['L', '10', '12', '14', '16', '18']"
                    value="{{{$editserie->classificacao}}}"
                />
            </div>
          </div>

          <!-- Assistiu -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Já Assistiu ?</label>
            <div class="mt-2.5">
              <x-select
                autocomplete="off"
                name='finalizou'
                placeholder="Selecionar Classificação"
                :options="['Sim', 'Não', 'Assistindo']"
                value="{{{$editserie->finalizou}}}"
              />
            </div>
          </div>
          
          <!-- Avaliacao -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Avaliação</label>
            <div class="mt-2.5">
            <x-select   
                autocomplete="off"
                name='nota'
                placeholder="Avalie"
                :options="[
                    ['name' => '⭐',  'id' => '⭐', 'description' => 'Péssimo'],
                    ['name' => '⭐⭐', 'id' => '⭐⭐', 'description' => 'Ruim'],
                    ['name' => '⭐⭐⭐',   'id' => '⭐⭐⭐', 'description' => 'Regular'],
                    ['name' => '⭐⭐⭐⭐',    'id' => '⭐⭐⭐⭐', 'description' => 'Bom'],
                    ['name' => '⭐⭐⭐⭐⭐',    'id' => '⭐⭐⭐⭐⭐', 'description' => 'Excelente'],
                ]"
                option-label="name"
                option-value="id"
                value="{{{$editserie->nota}}}"
            />
            </div>
          </div>
        </div>

          <x-button type="submit" label="Salvar" positive icon="check" />

    </div>
</form>
</body>
