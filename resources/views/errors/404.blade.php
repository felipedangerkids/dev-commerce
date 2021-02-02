@extends('layouts.site')

@section('content')
<section class="page-404">
      <div class="container">
           <h1 class="text-secondary">404</h1>
            <h1>Pagina não encontrada!</h1>
            <p>Quem sabe encontra o produto que está procurando <a href="{{ url('/') }}">aqui!</a></p>
      </div>
</section>
@endsection