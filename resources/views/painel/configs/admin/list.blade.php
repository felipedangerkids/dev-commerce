@extends('layouts.app')


@section('content')
<div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                  <a href="{{ url('products-create') }}"> <button
                              class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 border-b-4 border-green-700 hover:border-green-500 rounded">Criar
                              Produto</button></a>

                  <table class="table-fixed w-full text-gray-600">
                        <thead>
                              <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">ID.</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Acão</th>
                              </tr>
                        </thead>
                        <tbody>
                              @forelse ($users as $user)
                              @if ($user->permission != 0)
                              <tr>

                                    <td class="border px-4 py-2">{{ $user->id }} </td>
                                    <td class="border px-4 py-2">{{ $user->name }} </td>
                                    <td class="border px-4 py-2">{{ $user->email }}</td>


                                    <td class="border px-4 py-2">
                                          <div class="">
                                           


                                                <a href="{{ url('admin-edit/'.$user->id) }}"> <button
                                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                            Editar
                                                      </button></a>

                                          </div>
                                    </td>
                              </tr>
                              @endif
                              @empty


                              @endforelse

                        </tbody>
                  </table>
            </div>
      </div>
</div>
@endsection