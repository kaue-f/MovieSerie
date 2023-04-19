@section('', ('Adicionar Anime'))

<form class="mx-auto mt-16 max-w-xl sm:mt-2 font-mono" action="" method="post">
    @csrf

    <h1 class="" style="margin-block: 1rem">Adicionar Anime</h1>

        <!-- Titulo -->
    <div class="sm:col-span-2" style="margin-block: 0.8rem">
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Titulo</label>
            <div class="mt-2.5">
              <x-input type="text" placeholder="Titulo" name="a-titulo" id="a-titulo"/>
            </div>
          </div>

          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 0.8rem">
          <!-- Temporada -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Temporada</label>
            <div class="mt-2.5">
                <x-input type="text" placeholder="Temporada" name="a-temporada" id="a-temporada"/>
            </div>
          </div>
          
          <!--  Episodio -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Episódio</label>
            <div class="mt-2.5">
                <x-input type="text" placeholder="Quantidade de Episódio" name="a-episodio" id="a-episodio"/>
            </div>
          </div>
         </div>
          <!-- Capa -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label class="block text-sm font-semibold leading-6 text-gray-900">Capa</label>
            <div class="mt-2.5">
                <x-input name='a-capa' placeholder="URL da Imagem"/>
            </div>
          </div>

          <!-- Genero -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label for="company" class="block text-sm font-semibold leading-6 text-gray-900">Gênero</label>
            <div class="mt-2.5">
                <x-select
                    name='a-genero'
                    placeholder="Selecionar Gênero"
                    multiselect
                    :options="['Ação', 'Aventura', 'Comédia', 'Comédia romântica', 'Dança', 'Documentário', 'Drama', 'Faroeste', 'Fantasia', 'Ficção científica', 'Mistério', 'Musical', 'Romance', 'Terror']"
                    wire:model.defer="model"
                />
            </div>
          </div>

          <!-- Classificacao -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label for="email" class="block text-sm font-semibold leading-6 text-gray-900">Classificação</label>
            <div class="mt-2.5">
                <x-select
                    name='a-classificacao'
                    placeholder="Selecionar Classificação"
                    :options="['L', '10', '12', '14', '16', '18']"
                    wire:model.defer="model"
                />
            </div>
          </div>

          <!-- Sinopse -->
          <div class="sm:col-span-2" style="margin-block: 0.8rem">
            <label for="message" class="block text-sm font-semibold leading-6 text-gray-900">Sinopse</label>
            <div class="mt-2.5">
              <textarea name="a-sinopse" id="a-sinopse" rows="4" class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"></textarea>
            </div>
          </div>


          <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2" style="margin-block: 1rem">
          <!-- Duracao -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Duração</label>
            <div class="mt-2.5">
                <x-time-picker 
                    name='a-duracao'
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
                    name='a-lancamento'
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
            <div name='assistiu' class="mt-2.5">
                <x-radio name="a-sim" id="left-label" label="Sim" wire:model.defer="model" />
                <x-radio name="a-nao" id="right-label" label="Não" wire:model.defer="model" />
            </div>
          </div>
          
          <!-- Avaliacao -->
          <div>
            <label class="block text-sm font-semibold leading-6 text-gray-900">Avaliação</label>
            <x-select
                name='a-nota'
                placeholder="Avalie"
                :options="[
                    ['name' => '⭐',  'id' => 1, 'description' => 'Péssimo'],
                    ['name' => '⭐⭐', 'id' => 2, 'description' => 'Ruim'],
                    ['name' => '⭐⭐⭐',   'id' => 3, 'description' => 'Regular'],
                    ['name' => '⭐⭐⭐⭐',    'id' => 4, 'description' => 'Bom'],
                    ['name' => '⭐⭐⭐⭐⭐',    'id' => 4, 'description' => 'Excelente'],
                ]"
                option-label="name"
                option-value="id"
                wire:model.defer="model"
            />
            <div class="mt-2.5">
            </div>
          </div>
        </div>

          <x-button type="submit" label="Salvar" positive icon="check" />

    </div>
</form>