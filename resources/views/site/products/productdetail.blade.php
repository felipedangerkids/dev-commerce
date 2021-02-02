@extends('layouts.site')

@section('content')


{{-- @livewire('products-calc', ['product' => $product, 'productLike' => $productLike]) --}}

<div class="my-5">
      <div class="container">


            <div class="row">
                  <div class="col-md-6 image-description">
                        <div class="img-gallery">

                              <div class="row">
                                    <div class="col-md-12">
                                          @foreach ($product->images->take(3) as $image)
                                          <div class="column thumbnail-1">
                                                <img src="{{ url('storage/products/'.$image->path) }}"
                                                      onclick="myFunction(this);">
                                          </div>

                                          @endforeach
                                    </div>
                              </div>
                              <div class="container">
                                    @foreach ($product->images as $image)
                                    @if ($loop->first)


                                    <img src="{{ url('storage/products/'.$image->path) }}" id="expandedImg">
                                    @endif
                                    @endforeach
                              </div>
                        </div>
                  </div>
                  <div class="col-md-6 product-detail">

                        <form action="{{ url('cart-add') }}" method="post">
                              @csrf

                              <input type="hidden" name="id" value="{{ $product->id }}">
                              <input type="hidden" name="name" value="{{ $product->name }}">
                              <input type="hidden" name="price" value="{{ $product->price }}">
                              <input type="hidden" name="slug" value=" {{  $product->slug }}">
                              <input type="hidden" name="images" value=" {{  $product->images }}">
                              <input type="hidden" name="colors" value=" {{  $product->colors }}">
                              <input type="hidden" name="family" value=" {{  $product->family }}">
                              <input type="hidden" name="brand" value=" {{  $product->brand }}">
                              <input type="hidden" name="categories" value=" {{  $product->categories }}">
                              <input type="hidden" name="width" value=" {{  $product->width }}">
                              <input type="hidden" name="height" value=" {{  $product->height }}">
                              <input type="hidden" name="diameter" value=" {{  $product->diameter }}">
                              <input type="hidden" name="weight" value=" {{  $product->weight }}">


                              <div class="name-product">
                                    <h3>{{ $product->name }}</h3>
                              </div>
                              <div class="text-secondary">
                                    <h5>Codigo do produto: {{ $product->code }}</h5>
                              </div>

                              <div class="price-product">
                                    <div>
                                          <h4>{{  'R$ '.number_format($product->price, 2, ',', '.') }}</h4>
                                    </div>
                                    <div class="mt-4">
                                          <div class="d-flex align-items-center">
                                                <div class="col-md-2">
                                                      <input type="number" class="form-control" name="amount" value="1">
                                                </div>
                                                <div class="col-md-10">
                                                      <button type="submit" class="btn-comprar">Comprar</button>
                                                </div>

                                          </div>
                                    </div>
                                    <div class="est">
                                          <p><strong>Estoque:</strong> Disponivel</p>
                                    </div>
                                    <div>
                                        <p><strong>Descrição:</strong> {{ $product->short_description }}</p>  
                                        <p></p>
                                    </div>
                              </div>
                        </form>





                  </div>
            </div>
      </div>
      <div class="col-md-6 my-4 ">
            <div class="text-center share ml-5 text-secondary">
                  <span>Compartilhe esse produto:</span>
                  <a href="#"><i class="fa fa-facebook facebook" aria-hidden="true"></i></a>
                  <a href="#"><i class="fa fa-twitter twitter" aria-hidden="true"></i></a>
                  <a href=""><i class="fa fa-whatsapp whatsapp" aria-hidden="true"></i></a>
            </div>
      </div>
      <div class="col-md-12 description ">
            <div class="text-uppercase container">
                  <h3><span>Descrição</span></h3>
            </div>
            <div class="container">
                  <p>{!! $product->description !!}</p>
            </div>
            <div class="text-center mt-5">
                  <h3><span>Produtos</span> | Relacionados</h3>

            </div>
            <div class="container my-5">
                  <div class="col-12 ">
                        <div class="row">
                              @foreach ($productLike as $product)

                              <div class="col-md-3 col-sm-6">
                                    <div class="product-grid2">
                                          <div class="product-image2">
                                                <a href="#">
                                                      @foreach ($product->images as $image)
                                                      @if ($loop->first)
                                                      <img class="pic-1"
                                                            src="{{ url('storage/products/' . $image->path) }}">
                                                      @endif
                                                      @if($loop->last)
                                                      <img class="pic-2"
                                                            src="{{ url('storage/products/' . $image->path) }}">
                                                      @endif
                                                      @endforeach
                                                </a>
                                                {{-- <ul class="social">
                                                                  <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                                                                  <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                                                                  <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                                                              </ul> --}}

                                          </div>
                                          <div class="product-content">
                                                <h3 class="title"><a>{{ $product->name }}</a></h3>
                                                <span
                                                      class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                                          </div>
                                          <a class="add-to-cart"
                                                href="{{ url('product-detail/'.$product->slug) }}">Comprar</a>
                                    </div>
                              </div>


                              @endforeach
                        </div>
                  </div>
            </div>
      </div>

      @endsection
      @section('scripts')
      <script>
            var btnComprar = document.querySelector('button.btnComprar');



      </script>
      @endsection