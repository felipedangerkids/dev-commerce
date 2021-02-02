@extends('layouts.site')

@section('content')
<div class="my-5 container">
      <h3 class="text-center display-4 text-uppercase my-3">Resultado da pesquisa! </h3>
                 
      <div class="col-12 ">
            <div class="row">
                  @forelse ($products as $product)

                  <div class="col-md-3 col-sm-6">
                        <div class="product-grid2">
                              <div class="product-image2">
                                    <a href="#">
                                          @foreach ($product->images as $image)
                                          @if ($loop->first)
                                          <img class="pic-1" src="{{ url('storage/products/' . $image->path) }}">
                                          @endif
                                          @if($loop->last)
                                          <img class="pic-2" src="{{ url('storage/products/' . $image->path) }}">
                                          @endif
                                          @endforeach
                                    </a>
                                    {{-- <ul class="social">
                              <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                              <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                              <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                          </ul> --}}
                                    <a class="add-to-cart" href="{{ url('product-detail/'.$product->slug) }}">Ver
                                          Produto</a>
                              </div>
                              <div class="product-content">
                                    <h3 class="title"><a>{{ $product->name }}</a></h3>
                                    <span class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                              </div>
                        </div>
                  </div>

                  @empty

                 <h1 class="text-center display-4">Nenhum produto encontrado!</h1>
                  @endforelse
            </div>
      </div>
</div>
@endsection