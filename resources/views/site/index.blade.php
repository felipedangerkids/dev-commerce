@extends('layouts.site')

@section('content')
{{-- Banner --}}
<div id="banner_slider" class="carousel slide carousel-fade" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#banner_slider" data-slide-to="0" class="active"></li>
        <li data-target="#banner_slider" data-slide-to="1"></li>
        <li data-target="#banner_slider" data-slide-to="2"></li>
        <li data-target="#banner_slider" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('site/img/banner-01.jpg')}}" alt="Primeiro Slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('site/img/banner-01.jpg')}}" alt="Segundo Slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('site/img/banner-01.jpg')}}" alt="Terceiro Slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('site/img/banner-01.jpg')}}" alt="Quarto Slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#banner_slider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#banner_slider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Próximo</span>
    </a>
</div>
<div class="container-fluid">
    <div class="faixa py-4 row">
        <div class="col-md-3 py-3 text-center">
            <i class="fas fa-truck"></i>
            <h5>FRETE GRATIS</h5>
            <span>acima de R$ 300,00</span>
        </div>
        <div class="col-md-3 py-3 text-center">
            <i class="fas fa-credit-card"></i>
            <h5>PARCELAMENTO FÁCIL</h5>
            <span>parcele em até 12x sem juros</span>
        </div>
        <div class="col-md-3 py-3 text-center">
            <i class="fas fa-barcode"></i>
            <h5>PAGAMENTO VIA BOLETO</h5>
            <span>com 10% de desconto</span>
        </div>
        <div class="col-md-3 py-3 text-center">
            <i class="fab fa-whatsapp"></i>
            <h5>COMPRE COM UM VENDEDOR</h5>
            <span>nos chame pelo whatsapp</span>
        </div>
    </div>
</div>
<div class="container">
    <div class="lancamento text-center">
        <h3 class="">LANÇAMENTOS</h3>
    </div>
</div>
<div class="container">
    <div class="row my-5">

        @foreach ($products->take(4) as $product)

        <div class="col-md-3">
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

                </div>
                <div class="product-content">
                    <h3 class="title text-secondary"><a>{{ $product->name }}</a></h3>
                    <span class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                </div>
                <a class="add-to-cart" href="{{ url('product-detail/'.$product->slug) }}">Comprar</a>
            </div>
        </div>

        @endforeach
    </div>

</div>
{{-- Corpo --}}
<div class="container-fluid my-3">
    <div class="col-md-12">
        <img src="{{ url('site/img/BANNER-SECUNDARIO-02.jpg') }}" alt="" class="w-100">
    </div>
</div>
<div class="container">
    <div class="lancamento text-center">
        <h3 class="">MAIS VENDIDOS</h3>
    </div>
</div>
<div class="container">
    <div class="row my-5">

        @foreach ($products->take(4) as $product)

        <div class="col-md-3">
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

                </div>
                <div class="product-content">
                    <h3 class="title text-secondary"><a>{{ $product->name }}</a></h3>
                    <span class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                </div>
                <a class="add-to-cart" href="{{ url('product-detail/'.$product->slug) }}">Comprar</a>
            </div>
        </div>

        @endforeach
    </div>

</div>
<div class="container-fluid my-3">
    <div class="col-md-12">
        <img src="{{ url('site/img/BANNER-SECUNDARIO-01.jpg') }}" alt="" class="w-100">
    </div>
</div>
<div class="container">
    <div class="lancamento text-center">
        <h3 class="">DESTAQUES</h3>
    </div>
</div>
<div class="container">
    <div class="row my-5">

        @foreach ($products->take(4) as $product)

        <div class="col-md-3">
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

                </div>
                <div class="product-content">
                    <h3 class="title text-secondary"><a>{{ $product->name }}</a></h3>
                    <span class="price">{{ 'R$ ' . number_format($product->price, 2, ',', '.') }}</span>
                </div>
                <a class="add-to-cart" href="{{ url('product-detail/'.$product->slug) }}">Comprar</a>
            </div>
        </div>

        @endforeach
    </div>

</div>

@endsection

@section('scripts')

@endsection