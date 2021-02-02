@if(Session::has('message'))
<script type="text/javascript">
      Swal.fire({
icon: 'success',
title: 'Muito bom!',
text: "{{Session::get('message')}}",

}).then((value) => {
window.location.href = '/cart';
}).catch(swal.noop);
</script>
@endif
{{-- <div class="icones py-5">
      <div class="container">
            <div class="row justify-content-center">

                  <div class="col-md-3">
                        <div class="thumbnail1 ">
                              <img src="{{ url('polianta/img/caminhão-icone.png') }}" alt="...">
                              <div class="caption">
                                    <h6>FRÉTE GRÁTIS</h6>
                                    <p>a cima de R$ 300,00</p>
                              </div>
                        </div>
                  </div>
                  <div class=" col-md-3">
                        <div class="thumbnail1">
                              <img src="{{ url('polianta/img/cartao-icon.png') }}" alt="...">
                              <div class="caption">
                                    <h6>PARCELAMENTO FÁCIL</h6>
                                    <p>parcele em até 12x sem juros</p>
                              </div>
                        </div>
                  </div>
                  <div class=" col-md-3">
                        <div class="thumbnail1">
                              <img src="{{ url('polianta/img/boleto-icone.png') }}" alt="...">
                              <div class="caption">
                                    <h6>PAGAMENTO VIA BOLETO</h6>
                                    <p>com 10% de desconto</p>
                              </div>
                        </div>
                  </div>
                  <div class="col-md-3">
                        <div class="thumbnail1">
                              <img src="{{ url('polianta/img/whatsapp-icon.png') }}" alt="...">
                              <div class="caption">
                                    <h6>COMPRE COM UM VENDEDOR</h6>
                                    <p>nos chame pelo whatsapp</p>
                              </div>
                        </div>
                  </div>
            </div>

      </div>
</div> --}}
<div class="my-5">
      <div class="container">
            <div class="row">
                  <div class="col-md-6 image-description">
                        <div class="img-gallery">

                              <div class="row">
                                    <div class="col-md-12">
                                          @foreach ($product->images as $image)
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
                        <div>
                              <h3>{{ $product->name }}</h3>
                        </div>
                        <div class="text-secondary">
                              <h4>Codigo do produto: {{ $product->code }}</h4>
                        </div>

                        <div class="price-product my-5">
                              <div>
                                    <h4>{{  'R$ '.number_format($product->price, 2, ',', '.') }}</h4>
                              </div>
                              <div>@foreach ($product->categories as $cat)
                                    @if ($loop->last)
                                    <p>Categoria: {{ $cat->name }}</p>
                                    @endif


                                    @endforeach
                                    <p class="parcelamento">Em até 6x sem juros</p>
                              </div>
                              <div>
                                    <button wire:click="cart" type="button" class="btn-comprar">Comprar</button>
                              </div>
                        </div>
                        @if ($product->type_sale == 1)
                        <form id="calc">

                              <div class="row">
                                    <div class="col-4">
                                          <input placeholder="Tamanho" wire:model="width" type="number" id="width"
                                                class="form-control">
                                          @error('width') <span class="error">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="col-4">
                                          <input type="number" wire:model="depth" placeholder="Profundidade" id="depth"
                                                class="form-control ">
                                          @error('depth') <span class="error">{{ $message }}</span>@enderror
                                    </div>

                              </div>
                              <button type="button" wire:click.prevent="calc" class="btn">Calcular</button>
                              @if($calculo > 0)

                              <div class="dinheiro my-3">
                                    Valor do produto: {{  'R$ '.number_format($calculo, 2, ',', '.') }}
                              </div>
                              <div>
                                    <button wire:click="cart" type="button" class="btn">Comprar</button>
                              </div>
                              @endif
                        </form>

                        @else



                        @endif




                  </div>

                  <div class="col-md-6">
                        <div class="text-center text-secondary">
                              <span>Compartilhe:</span>
                              <a href="#"><i class="fa fa-facebook facebook" aria-hidden="true"></i></a>
                              <a href="#"><i class="fa fa-twitter twitter" aria-hidden="true"></i></a>

                        </div>
                  </div>
                  <div class="col-md-12 description">
                        <div class="text-center">
                              <h3><span>Descrição</span> | Saiba mais informações</h3>
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
                                                                  <a class="add-to-cart" href="{{ url('product-detail/'.$product->slug) }}">Ver Produto</a>
                                                            </div>
                                                            <div class="product-content">
                                                                  <h3 class="title"><a>{{ $product->name }}</a></h3>
                                                                  <span class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                                                            </div>
                                                      </div>
                                                </div>
                                    
                                    
                                                @endforeach
                                          </div>
                                    </div>
                        </div>
                  </div>
            </div>
      </div>