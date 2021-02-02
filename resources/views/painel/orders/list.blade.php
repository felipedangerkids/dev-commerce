@extends('layouts.app')


@section('content')

<div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
             <h1>Vendas realizadas pelo site</h1>

                  <table class="table-fixed w-full text-gray-600">
                        <thead>
                              <tr class="bg-gray-100">
                                    <th class="px-4 py-2 w-20">ID.</th>
                                    <th class="px-4 py-2">Nome</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Acão</th>
                              </tr>
                        </thead>
                        <tbody>
                              @forelse ($orders as $order)

                              <tr>

                                    <td class="border px-4 py-2">{{ $order->id }} </td>
                                    <td class="border px-4 py-2"> {{ $order->user->name }} </td>
                                    <td class="border px-4 py-2">{{ $order->user->email }}</td>
                                    <td class="border px-4 py-2">@if ($order->pagseguro_status == 1)
                                        Aguardando Pagamento
                                        @elseif ($order->pagseguro_status == 2)
                                        Processando Pagamento
                                        @elseif($order->pagseguro_status == 3)
                                        Não Processada
                                        @elseif($order->pagseguro_status == 4)
                                        Suspensa
                                        @elseif($order->pagseguro_status == 5)
                                        Paga
                                        @elseif($order->pagseguro_status == 6)
                                          Não Paga
                                    @endif</td>
                                    
                                    <td class="border px-4 py-2">
                                          <div class="">
                                            


                                                <a href="{{ url('orders-show/'.$order->id) }}"> <button
                                                            class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
                                                            Ver
                                                      </button></a>

                                          </div>
                                    </td>
                                    @empty
                              </tr>
                              @endforelse

                        </tbody>
                  </table>
            </div>
      </div>
</div>

@endsection