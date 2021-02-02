@extends('layouts.site')

@section('content')

     <div class="container my-5">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample"
                  aria-expanded="false" aria-controls="collapseExample">
                  Produtos
            </button>
            <button class="btn btn-primary" type="button" 
                 onclick="history.go(-1);" aria-controls="collapseExample">
                  Voltar
            </button>
            <div class="collapse" id="collapseExample">
                  <div class="card card-body">
                      
                        @foreach (unserialize($ordem->items) as $item)
                              <p>Codigo: {{ $item->id }}</p>
                              <p>Produto: {{ $item->name }}</p>
                              <p>Quantidade: {{ $item->quantity }}</p>
                              <p>Preço: {{ $item->price }}</p>
                        @endforeach
                  </div>
            </div>
     </div>

@endsection