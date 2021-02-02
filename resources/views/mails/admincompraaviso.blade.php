@component('mail::message')
Mensagem de aviso de compra

Assunto:<h3>{{$assunto}}</h3>

<br />

Nome do Comprador: <p><strong>{{$name}}</strong></p>
Email do Comprador: <p><strong>{{$email}}</strong></p>
Telefone do Comprador: <p><strong>{{$dd}}</strong><strong>{{$telefone}}</strong></p>

<br />
<strong>Produto Comprado:</strong> <br />
@php
$items = unserialize($mensagem1);
$total_price = 0;
$total_qty = 0;
@endphp

@foreach ($items as $getItems)
Nome: {{$getItems['name']}} - Quantidade: {{$getItems['quantity']}}
Preço do Produto: {{'R$'.number_format($getItems['price'],2,',','.')}} <br />
@endforeach


<br />
<strong>Entrega:</strong> <br />


Metodo de Entrega: @if($metodo == 'pacval')
Correios Pac
@elseif($metodo == 'sedexval')
Correios Sedex
@else
Retirar no Local
@endif
<br />
CEP: {{$cep}}<br />
Rua: {{$rua}}<br />
Numero: {{$numero}}<br />
Cidade: {{$cidade}}<br />
UF: {{$uf}}<br />
Bairro: {{$bairro}}<br />
Complemento: {{$complemento}}<br />