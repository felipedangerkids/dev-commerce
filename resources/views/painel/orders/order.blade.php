@extends('layouts.app')


@section('content')

<div class="w-full md:w-3/5 mx-auto p-8">
      <p>Informação do pedido {{ $order->reference }}</p>
      <div class="shadow-md">
            {{-- <div class="tab w-full overflow-hidden border-t">
                  <input class="absolute opacity-0 " id="tab-multi-one" type="checkbox" name="tabs">
                  <label class="block p-5 leading-normal cursor-pointer" for="tab-multi-one">Pagamento</label>
                  <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        <p class="p-5"></p>
                  </div>
            </div> --}}
            <div class="tab w-full overflow-hidden border-t">
                  <input class="absolute opacity-0" id="tab-multi-two" type="checkbox" name="tabs">
                  <label class="block p-5 leading-normal cursor-pointer" for="tab-multi-two">Entrega</label>
                  <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">
                        @foreach ($order->shippings as $shipping)
                        <p class="p-5">Metodo de Entrega: @if ( $shipping->metodo == 'sedexval')
                              Correios Sedex
                              @elseif( $shipping->metodo == 'pacval' )
                              Correios Pac
                              @elseif($shipping->metodo == 'local')
                              Retirar no Local
                              @endif</p>
                        <p class="p-5">CEP: {{ $shipping->cep }}</p>
                        <p class="p-5">Rua: {{ $shipping->rua }}</p>
                        <p class="p-5">Numero: {{ $shipping->numero }}</p>
                        <p class="p-5">Bairro: {{ $shipping->bairro }}</p>
                        <p class="p-5">Cidade: {{ $shipping->cidade }}</p>
                        <p class="p-5">UF: {{ $shipping->uf }}</p>
                        <p class="p-5">complemento: {{ $shipping->complemento }}</p>
                        <button class="bg-green hover:bg-green text-green-dark font-semibold hover:text-white py-2 px-4 border border-green hover:border-transparent rounded mr-2">Enviar Produto</button>
                        @endforeach

                  </div>
            </div>
            <div class="tab w-full overflow-hidden border-t">
                  <input class="absolute opacity-0" id="tab-multi-three" type="checkbox" name="tabs">
                  <label class="block p-5 leading-normal cursor-pointer" for="tab-multi-three">Produtos</label>
                  <div class="tab-content overflow-hidden border-l-2 bg-gray-100 border-indigo-500 leading-normal">


                        @foreach (unserialize($order->items) as $item)
                        <p class="p-5">Nome do Produto: {{ $item['name'] }}</p>
                        <p class="p-5">Preço: {{ $item['price'] }}</p>
                        <p class="p-5">Quantidade: {{ $item['quantity'] }}</p>
                        <p class="p-5">Imagem:
                              @foreach ( $item['attributes']['images'] as $image)
                             @if ($loop->first)
                                 <img width="250px" src="{{ url('storage/products/'.$image->path) }}" alt="">
                             @endif
                         


                              @endforeach

                        </p>
                        @endforeach


                  </div>
            </div>
      </div>
</div>
<script>

</script>
@endsection