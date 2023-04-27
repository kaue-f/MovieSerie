<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @section('title', ('Editar Filmes'))
    <wireui:scripts />
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('styles')
    @stack('scripts')
    <livewire:styles/>
</head>
<body>
<form class="mx-auto mt-16 max-w-xl sm:mt-2 font-mono"  action="{{route('update.filme', $editfilme->id)}}" method="post">
    @csrf

        <h1 class="" style="margin-block: 1rem">Edita Filme</h1>

        <!-- Titulo -->
        <div class="sm:col-span-2" style="margin-block: 0.8rem">
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Titulo</label>
            <div class="mt-2.5">
              <x-input type="text" placeholder="Titulo" name="titulo" id="titulo" value="{{$editfilme->titulo}}" disabled/>
            </div>
          </div>

          <!-- Capa -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Capa</label>
            <div class="mt-2.5">
                <x-input name='capa' value='{{$editfilme->capa}}' placeholder="URL da Imagem"/>
            </div>
          </div>

          <!-- Genero -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Gênero</label>
            <div class="mt-2.5">
                <x-select
                    name='genero'
                    placeholder="Selecionar Gênero"
                    multiselect
                    :options="['Ação', 'Aventura', 'Animação', 'Baseado em fatos reais', 'Comédia', 'Comédia romântica', 'Dança', 'Documentário', 'Drama', 'Fantasia', 'Faroeste', 'Ficção científica', 'Guerra','Mistério', 'Musical', 'Romance', 'Suspense','Terror']"
                    value="{{$editfilme->genero}}"
                    />
            </div>
          </div>

          <!-- Classificacao -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Classificação</label>
            <div class="mt-2.5">
                <x-select
                    name='classificacao'
                    placeholder="Selecionar Classificação"
                    :options="['L', '10', '12', '14', '16', '18']"
                    value="{{$editfilme->classificacao}}"
                />
            </div>
          </div>

          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 1rem">
    
            <!-- Assistiu -->
            <div>
                <label class="block text-sm font-semibold leading-6 text-gray-900">Já Assistiu ?</label>
                <div class="mt-2.5">
                    <x-radio name='finalizou' id="left-label" value="1" label="Sim" wire:model.defer="model"/>
                    <x-radio name='finalizou' id="right-label" value="0" label="Não" wire:model.defer="model" />
                </div>
              </div>
            
            <!-- Avaliacao -->
            <div>
                <label class="block text-sm font-semibold leading-6 text-gray-900">Avaliação</label>
                <div class="mt-2.5">
                <x-select
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
                    value="{{$editfilme->nota}}"
                />
                </div>
              </div>
            </div>

          <x-button type="submit" label="Salvar" positive icon="check" />

        </div>
</form>
</body>