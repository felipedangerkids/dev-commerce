<div class="fixed z-100 inset-0 overflow-y-auto ease-out duration-400">
      <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                  <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->

            <div class="inline-block grid-cols-3 align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-6xl sm:w-full"
                  role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                  <form enctype="multipart/form-data">
                        <div class=" bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                              <div class="sm:grid gap-4 grid-cols-3">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Código do produto"
                                                wire:model="code">
                                          @error('code') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4 col-start-2 col-end-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Nome do Produto"
                                                wire:model="name">
                                          @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>

                              </div>
                              <div class="sm:grid gap-4 grid-cols-1">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Breve
                                                Descrição:</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Breve descrição do produto"
                                                wire:model="short_description">
                                          @error('short_description') <span
                                                class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-3">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Cor
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Cor do Produto"
                                                wire:model="colors">
                                          @error('colors') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Familia
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Familia do Produto"
                                                wire:model="family">
                                          @error('family') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Tipo da
                                                venda:</label>
                                          <select wire:model="type_sale"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option>Selecione o tipo</option>
                                                <option value="0">Por Unidade</option>
                                                <option value="1">Por Medida</option>
                                                @error('type_sale') <span
                                                      class="text-red-500">{{ $message }}</span>@enderror
                                          </select>

                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-3">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Preço
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="price" placeholder="Preço do Produto"
                                                wire:model="price">
                                          @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Preço Promocional
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="price_promotional" placeholder="Preço em promoção"
                                                wire:model="promotional_price">
                                          @error('promotional_price') <span
                                                class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Marca
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Marca do Produto"
                                                wire:model="brand">
                                          @error('brand') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-4">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Tamanho
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Tamanho do Produto"
                                                wire:model="width">
                                          @error('width') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Altura
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Altura do Produto"
                                                wire:model="height">
                                          @error('height') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Diametro
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Diametro do Produto"
                                                wire:model="diameter">
                                          @error('diameter') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Peso
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Peso do Produto"
                                                wire:model="weight">
                                          @error('weight') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-2">
                                    <div class="mb-4">



                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Foto do produto
                                                :</label>
                                          <input type="file"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                wire:model="images" multiple>

                                    </div>
                                    <div class="mb-4">

                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-1 ">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Categorias
                                                :</label>
                                          <div class="" wire:ignore>
                                                <select
                                                      class="js-example-basic-multiple  shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                      name="category" multiple="multiple">
                                                      <option value="0">Sem Categoria</option>
                                                      @foreach ($categories as $category)
                                                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                      @endforeach

                                                </select>
                                          </div>
                                          @error('category_id') <span
                                                class="text-red-500">{{ $message }}</span>@enderror

                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-1">
                                    <div class="mb-4" wire:model.debounce.365ms="description" wire:ignore>
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Descrição
                                                :</label>
                                          <input type="hidden"  id="body" 
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                         
                                         <trix-editor input="body"></trix-editor>
                                                @error('description') <span
                                                class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                              @if ($selected_id)
                              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click="update()" type="button"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Update
                                    </button>
                              </span>

                              @else
                              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click="store()" type="button"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Criar
                                    </button>
                              </span>
                              @endif

                              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModal()" type="button"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Cancelar
                                    </button>
                              </span>
                        </div>
                  </form>
            </div>

      </div>
</div>

</div>


<script>
      $(document).ready(function() {
$('.js-example-basic-multiple').select2({
// tags: true,
}).on('change', function(e){


@this.set('category', $('.js-example-basic-multiple').val());

});
// $('.js-example-basic-multiple').select2();
});
document.addEventListener("livewire:load", () => {
Livewire.hook('message.processed', (message, component) => {
$('.js-example-basic-multiple').select2()

});
});
   $('#price').maskMoney({
         allowNegative: false,
         thousands: '.',
         decimal:  ','
   });
   $('#price_promotional').maskMoney({
         allowNegative: false,
         thousands: '.',
         decimal:  ','
   });
</script>