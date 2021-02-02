<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('site/img/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('site/img/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('site/img/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('site/img/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('site/img/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('site/img/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('site/img/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('site/img/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('site/img/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ url('site/img/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('site/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('site/img/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('site/img/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('site/img/favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('site/img/favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('site/vendor/fontawesome-free/css/all.min.css') }}">
    <script src="https://kit.fontawesome.com/0ab2bcde1c.js"></script>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link href="{{ asset('site/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link href="{{ asset('site/css/floating-wpp.min.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/custom.site.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('site/css/custom.menu.site.css') }}" rel="stylesheet">
    @livewireStyles
    <title>{{ Config::get('app.name') }}</title>
</head>

<body>
    <div id="app">
        <header>
            <section id="top-bar">
                <div>
                    {{-- <p class="mx-auto my-auto">FRETE GRATIS PARA COMPRAS ACIMA DE R$ 100,00</p> --}}
                </div>
            </section>

            <div id="desktop">
                <section class="container">
                    <div class="row top">
                        {{-- Logo --}}
                        <div class="col-12 col-lg-3  text-center "><a href="{{url('/')}}"><img class="img-fluid"
                                    src="{{asset('site/img/logo.png')}}" alt="Logo da Trama"></a></div>
                        {{-- Links e Pesquisa --}}
                        <div class="col-12 col-lg-9 my-auto">
                            <div class="row">
                                {{-- Primario --}}
                                <div class="col-12  top-nav-links">
                                    <nav class="nav justify-content-center justify-content-lg-between">
                                        <p class="nav-item nav-link">Bem Vindo(a),
                                            @if (auth()->guard('web')->check())
                                            <a href="{{url('minha-conta')}}">{{auth()->user()->name}}</a>
                                            @else
                                            <a href="{{url('account-user')}}"><i class="fa fa-sign-in-alt"></i>
                                                Identifique-se
                                                para fazer pedidos</a>
                                            @endif
                                        </p>
                                    </nav>
                                </div>
                                {{-- Secundario --}}
                                <div class="col-12 col-md-8 top-nav-search">
                                    <form action="{{ url('search') }}" method="post">
                                        @csrf
                                        <div class="input-group ">
                                            <input type="text" value="@if (isset($pesquisa)){{$pesquisa}}@endif"
                                                class="form-control form-control-lg" placeholder="O que você deseja?">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex col-md-4 justify-content-between align-items-center  icons">
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" href="{{ url('minha-conta') }}"><img
                                                    src="{{ url('site/img/ICON-01.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Conta</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" href="{{route('register')}}"><img
                                                    src="{{ url('site/img/ICON-02.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Pedidos</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" id="open_cart"><img
                                                    src="{{ url('site/img/ICON-03.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Carrinho</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="container-fluid text-center menu">
                    <div class="container">
                        <button type="button" class="btn btn-default text-white d-md-none" id="open_menu"><i
                                class="fa fa-bars"></i></button>

                        <div id="main-nav" class="d-none d-md-block">
                            <ul id="main-menu" class="sm sm-read-simple">
                                <li>
                                    <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}"
                                        href="{{url('/')}}">HOME</a>
                                </li>
                                <li>
                                    <a class="nav-link {{ request()->is('products-all') ? 'active-menu' : '' }}"
                                        href="{{url('/products-all')}}">PRODUTOS</a>
                                </li>
                                @foreach (HelperClass::categories() as $categorie)
                                <li>
                                    <a class="nav-link {{ request()->is('categoria/'.$categorie->slug) ? 'active-menu' : '' }}"
                                        href="{{url('categoria/'.$categorie->slug)}}">{{$categorie->name}}</a>

                                    @if ($categorie->childrenCategories->count() >= 1)
                                    <ul>
                                        @foreach ($categorie->childrenCategories as $childCategorie)
                                        @include('helpers.helper_child_categorie', ['child_categorie' =>
                                        $childCategorie])
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div id="menu_slider" class="close-menu">
                        <div class="menu-box">
                            <button type="button" class="m-2 close close-menu">X</button>

                            <div class="menu-content">
                                <div class="container my-5">
                                    <ul id="sub-main-menu" class="sm sm-sub-read-simple">
                                        <li>
                                            <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}"
                                                href="{{url('/')}}">HOME</a>
                                        </li>
                                        <li>
                                            <a class="nav-link {{ request()->is('/products-all') ? 'active-menu' : '' }}"
                                                href="{{url('/products-all')}}">PRODUTOS</a>
                                        </li>

                                        @foreach (HelperClass::categories() as $categorie)
                                        <li>
                                            <a class="nav-link {{ request()->is('categoria/'.$categorie->slug) ? 'active-menu' : '' }}"
                                                href="{{url('categoria/'.$categorie->slug)}}">{{$categorie->name}}</a>

                                            @if ($categorie->childrenCategories->count() >= 1)
                                            <ul>
                                                @foreach ($categorie->childrenCategories as $childCategorie)
                                                @include('helpers.helper_child_categorie', ['child_categorie' =>
                                                $childCategorie])
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div id="mobile">
                <section class="container">
                    <div class="row top">
                        <div class="col-4">
                            <section class="text-center menu">
                                <div class="container">
                                    <button type="button" class="btn btn-default text-white d-md-none" id="open_menu2"><i
                                            class="fa fa-bars"></i></button>

                                    <div id="main-nav" class="d-none d-md-block">
                                        <ul id="main-menu" class="sm sm-read-simple">
                                            <li>
                                                <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}"
                                                    href="{{url('/')}}">HOME</a>
                                            </li>
                                            <li>
                                                <a class="nav-link {{ request()->is('products-all') ? 'active-menu' : '' }}"
                                                    href="{{url('/products-all')}}">PRODUTOS</a>
                                            </li>
                                            @foreach (HelperClass::categories() as $categorie)
                                            <li>
                                                <a class="nav-link {{ request()->is('categoria/'.$categorie->slug) ? 'active-menu' : '' }}"
                                                    href="{{url('categoria/'.$categorie->slug)}}">{{$categorie->name}}</a>

                                                @if ($categorie->childrenCategories->count() >= 1)
                                                <ul>
                                                    @foreach ($categorie->childrenCategories as $childCategorie)
                                                    @include('helpers.helper_child_categorie', ['child_categorie' =>
                                                    $childCategorie])
                                                    @endforeach
                                                </ul>
                                                @endif
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <div id="menu_slider2" class="close-menu2">
                                    <div class="menu-box">
                                        <button type="button" class="m-2 close close-menu2">X</button>

                                        <div class="menu-content">
                                            <div class="container my-5">
                                                <ul id="sub-main-menu" class="sm sm-sub-read-simple">
                                                    <li>
                                                        <a class="nav-link {{ request()->is('/') ? 'active-menu' : '' }}"
                                                            href="{{url('/')}}">HOME</a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link {{ request()->is('/products-all') ? 'active-menu' : '' }}"
                                                            href="{{url('/products-all')}}">PRODUTOS</a>
                                                    </li>

                                                    @foreach (HelperClass::categories() as $categorie)
                                                    <li>
                                                        <a class="nav-link {{ request()->is('categoria/'.$categorie->slug) ? 'active-menu' : '' }}"
                                                            href="{{url('categoria/'.$categorie->slug)}}">{{$categorie->name}}</a>

                                                        @if ($categorie->childrenCategories->count() >= 1)
                                                        <ul>
                                                            @foreach ($categorie->childrenCategories as $childCategorie)
                                                            @include('helpers.helper_child_categorie',
                                                            ['child_categorie' =>
                                                            $childCategorie])
                                                            @endforeach
                                                        </ul>
                                                        @endif
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                        <div class="col-8 text-center "><a href="{{url('/')}}"><img class="img-fluid"
                                    src="{{asset('site/img/logo.png')}}" alt="Logo da Trama"></a></div>
                        {{-- Links e Pesquisa --}}
                        <div class="col-12 col-lg-9 my-auto">
                            <div class="row">
                                {{-- Primario --}}
                                <div class="col-12  top-nav-links">
                                    <nav class="nav justify-content-center justify-content-lg-between">
                                        <p class="nav-item nav-link">Bem Vindo(a),
                                            @if (auth()->guard('web')->check())
                                            <a href="{{url('minha-conta')}}">{{auth()->user()->name}}</a>
                                            @else
                                            <a href="{{url('account-user')}}"><i class="fa fa-sign-in-alt"></i>
                                                Identifique-se
                                                para fazer pedidos</a>
                                            @endif
                                        </p>
                                    </nav>
                                </div>
                                {{-- Secundario --}}
                                <div class="col-12 col-md-8 top-nav-search">
                                    <form action="{{ url('search') }}" method="post">
                                        @csrf
                                        <div class="input-group ">
                                            <input type="text" value="@if (isset($pesquisa)){{$pesquisa}}@endif"
                                                class="form-control form-control-lg" placeholder="O que você deseja?">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="submit"><i
                                                        class="fa fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="d-flex col-md-4 justify-content-between align-items-center  icons">
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" href="{{ url('minha-conta') }}"><img
                                                    src="{{ url('site/img/ICON-01.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Conta</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" href="{{route('register')}}"><img
                                                    src="{{ url('site/img/ICON-02.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Pedidos</span>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <div>
                                            <a type="" class="" id="open_cart2"><img
                                                    src="{{ url('site/img/ICON-03.png') }}" alt="">
                                            </a>
                                        </div>
                                        <div>
                                            <span>Carrinho</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </header>

        {{-- Carrinho DESK--}}
        <section id="cart_shop" class="close-cart">
            <div class="cart-box">
                <div class="cart-content">
                    <a href="{{ route('cart.remove') }}" class="m-2 cart-produto-apagar"><i class="fa fa-trash"></i>
                        Limpar Carrinho</a>

                    <button type="button" class="m-3 close close-cart">X</button>

                    <div class="container my-5">
                        @forelse (Cart::getContent() as $item)
                        <div class="cart-produto">

                            @php
                            $img = $item->attributes->images;
                            $images = json_decode($img);
                            @endphp

                            @foreach ($images as $image)
                            @if($loop->first)
                            <div class="cart-image"><img src="{{url('storage/products/'.$image->path)}}" alt=""></div>
                            @endif
                            @endforeach


                            <div class="d-flex flex-column justify-content-center">
                                <p class="cart-produto-nome">{{ $item->name }}</p>
                                <p class="cart-produto-nome">{{ $item->quantity }}</p>
                                <p class="cart-produto-valor">{{  'R$ '.number_format($item->price, 2, ',', '.') }}</p>
                            </div>
                            <div class="d-flex flex-column justify-content-center"><a
                                    href="{{ url('/cart/remove/'.$item->id) }}" class="btn btn-danger cart-remove"><i
                                        class="fa fa-trash"></i></a></div>
                        </div>
                        @empty
                        <h3>Carrinho vazio</h3>
                        @endforelse

                        <div class="cart-button">
                            <div><a href="{{ url('checkout') }}" class="btn btn-default">Finalizar</a></div>
                            <div><a href="{{ url('cart') }}" class="btn btn-default">Carrinho</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- Carrinho mobile--}}
        <section id="cart_shop2" class="close-cart2">
            <div class="cart-box">
                <div class="cart-content">
                    <a href="{{ route('cart.remove') }}" class="m-2 cart-produto-apagar"><i class="fa fa-trash"></i>
                        Limpar Carrinho</a>

                    <button type="button" class="m-3 close close-cart">X</button>

                    <div class="container my-5">
                        @forelse (Cart::getContent() as $item)
                        <div class="cart-produto">

                            @php
                            $img = $item->attributes->images;
                            $images = json_decode($img);
                            @endphp

                            @foreach ($images as $image)
                            @if($loop->first)
                            <div class="cart-image"><img src="{{url('storage/products/'.$image->path)}}" alt=""></div>
                            @endif
                            @endforeach


                            <div class="d-flex flex-column justify-content-center">
                                <p class="cart-produto-nome">{{ $item->name }}</p>
                                <p class="cart-produto-nome">{{ $item->quantity }}</p>
                                <p class="cart-produto-valor">{{  'R$ '.number_format($item->price, 2, ',', '.') }}</p>
                            </div>
                            <div class="d-flex flex-column justify-content-center"><a
                                    href="{{ url('/cart/remove/'.$item->id) }}" class="btn btn-danger cart-remove"><i
                                        class="fa fa-trash"></i></a></div>
                        </div>
                        @empty
                        <h3>Carrinho vazio</h3>
                        @endforelse

                        <div class="cart-button">
                            <div><a href="{{ url('checkout') }}" class="btn btn-default">Finalizar</a></div>
                            <div><a href="{{ url('cart') }}" class="btn btn-default">Carrinho</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <main>
            @yield('content')
        </main>

        <footer class="footer">
            {{-- footer pre-bottom --}}
            <div class="container-fluid footer-pre-bottom">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-4 col-lg-2 mb-3">
                            <h4><strong>Sobre Nós</strong></h4>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a href="{{url('sobre/sobre_etna')}}">Sobre a Trama</a></li>
                                <li class="nav-item"><a href="{{url('sobre/nossas_lojas')}}">Nossas lojas</a></li>
                                <li class="nav-item"><a href="{{url('sobre/trabalhe_conosco')}}">Trabalhe conosco</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <h4><strong>Sobre Central de Atendimento</strong></h4>
                            <ul class="nav flex-column">
                                <li class="nav-item"><a href="{{url('contato/central_atendimento')}}">Central de
                                        atendimento</a></li>
                                <li class="nav-item"><a href="{{url('contato/fale_conosco')}}">Fale Conosco</a></li>
                                <li class="nav-item"><a href="{{url('contato/principais_duvidas')}}">Pincipais
                                        Dúvidas</a></li>
                                <li class="nav-item"><a href="#">Acompanhe seu pedido</a></li>
                                <li class="nav-item"><a href="{{url('contato/troca_devolucao')}}">Troca e Devolução</a>
                                </li>
                                <li class="nav-item"><a href="{{url('contato/politica_privacidade')}}">Politica e
                                        Privacidade</a></li>
                                <li class="nav-item"><a href="{{url('contato/regulamento_campanhas')}}">Regulamento de
                                        Campanhas</a></li>
                            </ul>
                        </div>
                        <div class="col-12 col-md-4 col-lg-2 mb-3">
                            <h4><strong>Contato</strong></h4>
                            <ul class="nav flex-column">
                                <li class="nav-item">Telefone <p>(41) 99902-1354</p>
                                    <p>(41) 99902-1354</p>
                                </li>
                                <li class="nav-item">Email: <p>contato@trama.com.br</p>
                                </li>

                            </ul>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4 mb-3">
                            <h4><strong>Siga a Trama no Facebook</strong></h4>
                            <div id="fb-root"></div>
                            <div class="fb-page" data-href="https://www.facebook.com/distribuidorastark"
                                data-tabs="timeline" data-width="" data-height="300" data-small-header="false"
                                data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                                <blockquote cite="https://www.facebook.com/distribuidorastark"
                                    class="fb-xfbml-parse-ignore"><a
                                        href="https://www.facebook.com/distribuidorastark">Facebook</a></blockquote>
                            </div>
                        </div>
                        <div class="col-12 col-md-10 col-lg-12 "><img class="img-fluid payments-img"
                                src="{{asset('site/img/payments.png')}}" alt="Opções de pagamentos"></div>
                    </div>
                </div>
            </div>
            {{-- <div id="preloader">
                <div class="inner">
                    <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
                    <div class="bolas">
                        <img src="https://media.giphy.com/media/l3V0onIVjRDCnw7Je/giphy.gif" alt="">


                    </div>
                </div>
            </div> --}}
            {{-- footer bottom --}}
            <div class="container-fluid footer-bottom">
                <div class="container">
                    {{ Config::get('app.name') }} &COPY; {{date("Y")}} - Desenvolvido por Agência Web7
                </div>
            </div>
            <div id="myDiv"></div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ url('site/dist/jquery.inputmask.js') }}"></script>
    <script src="{{ url('site/dist/inputmask.js') }}"></script>
    <script src="{{ asset('site/js/app.js') }}"></script>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v7.0&appId=673969480102752&autoLogAppEvents=1"
        nonce="ltnmgcLl"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="{{ asset('site/js/jquery.smartmenus.js') }}"></script>
    <script src="{{ url('site/js/script.js') }}"></script>
    <script src="{{ url('site/js/floating-wpp.min.js') }}"></script>
    <script src="{{ url('site/js/pagseguro-sandbox.js') }}"></script>
    <script src="{{ asset('site/js/custom.site.js') }}"></script>


    @livewireScripts
    @yield('scripts')
    <script>
        $('.products').slick({
        dots: true,
       arrows: false,
        focusOnSelect: true
        });
// $(window).on('load', function () {
// $('#preloader .inner').fadeOut();
// $('#preloader').delay(350).fadeOut('slow');
// $('body').delay(350).css({'overflow': 'visible'});
// })
    </script>
    <style>
        #myDiv {
            z-index: 1000;
        }
    </style>
    <script type="text/javascript">
        $(function () {
        $('#myDiv').floatingWhatsApp({
          phone: '554191128178',
          position: 'right',
          popupMessage: 'Entre em contato',
        size: '68px' 
        });
      });
    </script>
    @if(Session::has('message'))
    <script type="text/javascript">
        Swal.fire({
    icon: 'success',
    title: 'Muito bom!',
    text: "{{Session::get('message')}}",

    }).then((value) => {
    location.reload();
    }).catch(swal.noop);
    </script>
    @endif
</body>

</html>