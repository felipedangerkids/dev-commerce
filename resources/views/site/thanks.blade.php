@extends('layouts.site')

@section('content')
<div class="container my-5">
      <h2 class="alert alert-success">Seu pedido foi processado: {{ request()->get('order') }}</h2>
</div>
@endsection