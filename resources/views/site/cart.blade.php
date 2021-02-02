@extends('layouts.site')

@section('content')
<div class="container my-5">
      <table id="cart" class="table table-hover table-condensed">
            <thead>
                  <tr>
                        <th style="width:50%">Produto</th>
                        <th style="width:10%">Preço</th>
                        <th style="width:8%">Quantidade</th>
                        <th style="width:22%" class="text-center">Subtotal</th>
                        <th style="width:10%"></th>
                  </tr>
            </thead>
            <tbody>
                  @foreach (Cart::getContent() as $item)
                  <tr>
                        <td data-th="Product">
                              <div class="row">
                                    @php
                                          $img = $item->attributes->images;
                                          $images = json_decode($img);
                                          $categorie = $item->attributes->categories;
                                          $cats = json_decode($categorie);
                                    @endphp
                                    @foreach ($images as $image)
                                    @if ($loop->first)
                                    <div class="col-sm-2 hidden-xs"><img
                                                src="{{ url('storage/products/'.$image->path) }}"
                                                style="width: 72px; height: 72px;" alt="..." class="img-responsive" />
                                    </div>
                                    @endif
                                    @endforeach
                                    <div class="col-sm-10">
                                          <h4 class="nomargin">{{ $item->name }}</h4>
                                          @foreach ($cats as $cat)
                                          @if ($loop->last)
                                          <p>Categoria: {{ $cat->name }}</p>
                                          @endif
                                          @endforeach
                                    </div>
                              </div>
                        </td>
                        <td data-th="Price">{{  'R$ '.number_format($item->price, 2, ',', '.') }}</td>
                        <form action="{{ url('cart-update/'.$item->id) }}" method="post">
                        <td data-th="Quantity">
                              <input type="number" class="form-control text-center" name="amount" value="{{ $item->quantity }}">
                        </td>
                        <td data-th="Subtotal" class="text-center">{{  'R$ '.number_format(Cart::getSubTotal(), 2, ',', '.') }}</td>
                        <td class="actions" data-th="">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </form>
                              <a href="{{ url('/cart/remove/'.$item->id) }}"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button></a>
                        </td>
                  </tr>
                  @endforeach
            </tbody>
            <tfoot>
                  <tr class="visible-xs">
                        <td class="text-center"><strong>Total:
                                    {{  'R$ '.number_format(\Cart::getTotal(), 2, ',', '.') }}</strong></td>
                  </tr>
                  <tr>
                        <td><a href="{{ url('/') }}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Comprando</a>
                        </td>
                        <td colspan="1" class="hidden-xs"></td>
                        <td class="hidden-xs text-center"><strong>Total
                                    {{  'R$ '.number_format(\Cart::getTotal(), 2, ',', '.') }}</strong></td>
                        <td><a href="{{ url('checkout') }}" class="btn btn-success btn-block">Finalizar Compra <i class="fa fa-angle-right"></i></a>
                        </td>
                  </tr>
            </tfoot>
      </table>
</div>

@endsection