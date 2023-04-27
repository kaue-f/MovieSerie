@section('title', ('Adicionar Série'))

<form class="mx-auto mt-16 max-w-xl sm:mt-2 font-mono" action="{{route('dados.serie')}}" method="post">
    @csrf

    <h1 class="" style="margin-block: 1rem">Adicionar Série</h1>

        <!-- Titulo -->
    <div class="sm:col-span-2" style="margin-block: 0.8rem">
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Titulo</label>
            <div class="mt-2.5">
              <x-input type="text" placeholder="Titulo" name="titulo" id="titulo" autocomplete="off"/>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 0.8rem">
          <!-- Temporada -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Temporada</label>
            <div class="mt-2.5">
                <x-input type="number" placeholder="Temporada" name="temporada" id="temporada" autocomplete="off"/>
            </div>
          </div>
          
          <!--  Episodio -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Episódio</label>
            <div class="mt-2.5">
                <x-input type="number" placeholder="Quantidade de Episódio" name="episodio" id="episodio" autocomplete="off"/>
            </div>
          </div>
         </div>
          <!-- Capa -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Capa</label>
            <div class="mt-2.5">
                <x-input name='capa' placeholder="URL da Imagem" autocomplete="off"/>
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
                    wire:model.defer="model"
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
                    wire:model.defer="model"
                />
            </div>
          </div>

          <!-- Sinopse -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Sinopse</label>
            <div class="mt-2.5">
              <textarea name="sinopse" id="sinopse" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" autocomplete="off"></textarea>
            </div>
          </div>


          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 1rem">
          <!-- Duracao -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Duração</label>
            <div class="mt-2.5">
                <x-time-picker 
                    autocomplete="off"
                    name='duracao'
                    placeholder="Duração do Episódio"
                    format="24"
                    interval="1"
                    timezone
                    wire:model.defer="timePicker"
                />
            </div>
          </div>
          
          <!-- Lancamento -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Lançamento</label>
            <div class="mt-2.5">
                <x-datetime-picker
                    autocomplete="off"
                    name='lancamento'
                    without-time
                    display-format="YYYY-MM-DD"
                    placeholder="Data de Lançamento"
                    wire:model="normalPicker"
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
                wire:model.defer="model"
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
                wire:model.defer="model"
            />
            </div>
          </div>
        </div>

          <x-button type="submit" label="Salvar" positive icon="check" />

    </div>
</form>