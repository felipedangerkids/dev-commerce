@extends('layouts.app')


@section('content')

<form enctype="multipart/form-data" method="POST" action="{{ url('admin-update/'. $user->id) }}">

      @csrf
      <div class="  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:grid gap-4 grid-cols-2">
                  <div class="mb-4">
                        <label for="exampleFormControlInput1"
                              class="block text-gray-700 text-sm font-bold mb-2">Nome:</label>
                        <input type="text"
                              class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Nome completo" value="{{ $user->name }}" name="name">
                        @error('name') <span class="text-red-500">{{ $message }}</span>@enderror
                  </div>
                  <div class="mb-4 ">
                        <label for="exampleFormControlInput1"
                              class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
                        <input type="email"
                              class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Email" value="{{ $user->email }}" name="email">
                        @error('email') <span class="text-red-500">{{ $message }}</span>@enderror
                  </div>

            </div>
       
      </div>
  <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
      <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button type="submit"
                  class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                  Atualizar
            </button>
      </span>

</div>
</form>
<form enctype="multipart/form-data" method="POST" action="{{ url('admin-pass-update/'. $user->id) }}">

      @csrf
      <div class="  px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
            <div class="sm:grid gap-4 grid-cols-2">
                  <div class="mb-4">
                        <label for="exampleFormControlInput1"
                              class="block text-gray-700 text-sm font-bold mb-2">Senha:</label>
                        <input type="password"
                              class="shadow appearance-none border rounded  w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                              id="exampleFormControlInput1" placeholder="Senha"  name="password">
                        @error('password') <span class="text-red-500">{{ $message }}</span>@enderror
                  </div>


            </div>
      </div>
      <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                  <button type="submit"
                        class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-green-500 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-white focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                        Atualizar Senha
                  </button>
            </span>
      
      </div>
</form>


@endsection