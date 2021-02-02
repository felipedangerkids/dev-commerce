@extends('layouts.app')


@section('content')
@if(Session::has('message'))
<script type="text/javascript">
      Swal.fire({
    icon: 'success',
    title: 'Muito bom!',
    text: "{{Session::get('message')}}",
    
    }).then((value) => {
    location.reload();
    }).catch(swal.noop);
</script>
@endif
                  <form enctype="multipart/form-data" method="POST" action="{{ url('products-store') }}">
                       
                       @csrf
                        <div class=" bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                              <div class="sm:grid gap-4 grid-cols-3">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Código:</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Código do produto"
                                                name="code" required>
                                          @error('code') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4 col-start-2 col-end-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Nome do Produto"
                                                name="name" required>
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
                                                name="short_description">
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
                                               name="colors">
                                          @error('colors') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Familia
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Familia do Produto"
                                              name="family">
                                          @error('family') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Tipo da
                                                venda:</label>
                                          <select name="type_sale"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                <option>Selecione o tipo</option>
                                                <option value="0">Por Unidade</option>
                                                {{-- <option value="1">Por Medida</option> --}}
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
                                                id="price" placeholder="Preço do Produto" name="price">
                                          @error('price') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Preço Promocional
                                                :</label>
                                          <input type="text"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="price_promotional" placeholder="Preço em promoção"
                                                name="promotional_price">
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
                                                name="brand">
                                          @error('brand') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-4">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Tamanho
                                                :</label>
                                          <input type="number"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Tamanho do Produto"
                                               name="width">
                                          @error('width') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Altura
                                                :</label>
                                          <input type="number"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Altura do Produto"
                                                name="height">
                                          @error('height') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Diametro
                                                :</label>
                                          <input type="number"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Diametro do Produto"
                                                name="diameter">
                                          @error('diameter') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Peso
                                                :</label>
                                          <input type="number"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                id="exampleFormControlInput1" placeholder="Peso do Produto"
                                               name="weight">
                                          @error('weight') <span class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-1">
                                    <div class="mb-4">



                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Foto do produto
                                                :</label>
                                          {{-- <input type="file"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                name="images[]" multiple> --}}
                                                <div class="input-field shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                                      <div class="input-images-1 " style="padding-top: .5rem;"></div>
                                                </div>

                                    </div>
                                    <div class="mb-4">

                                    </div>
                              </div>
                              <div class="sm:grid gap-4 grid-cols-1 ">
                                    <div class="mb-4">
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Categorias
                                                :</label>
                                          <div class="">
                                                <select
                                                      class="js-example-basic-multiple  shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                                      name="category[]" multiple="multiple">
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
                                    <div class="mb-4"  >
                                          <label for="exampleFormControlInput1"
                                                class="block text-gray-700 text-sm font-bold mb-2">Descrição
                                                :</label>
                                          <input type="hidden" name="description" id="body"
                                                class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">

                                          <trix-editor input="body"></trix-editor>
                                          @error('description') <span
                                                class="text-red-500">{{ $message }}</span>@enderror
                                    </div>
                              </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                              {{-- <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button wire:click="update()" type="button"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Update
                                    </button>
                              </span>

                           --}}
                              <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button  type="submit"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Criar
                                    </button>
                              </span>


                              <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                    <button wire:click="closeModal()" type="button"
                                          class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                          Cancelar
                                    </button>
                              </span>
                        </div>
                  </form>



@endsection