<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>TRAMA</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('painel/css/trix.css') }}">
    @livewireStyles
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://unpkg.com/ionicons@5.2.1/dist/ionicons.js"></script>
    <link rel="stylesheet" href="{{url('painel/dist/image-uploader.min.css')}}">
    <link rel="stylesheet" href="{{ url('painel/css/style.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="{{ url('painel/css/components.css') }}">


</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img width="200" src="{{ url('site/img/logo.png') }}" alt="">
            </div>

            <ul class="list-unstyled components">
                <li class="active1">
                    <a href="{{ url('/dashboard') }}">
                        <ion-icon name="speedometer-outline"></ion-icon></i> DASHBOARD
                    </a>

                </li>
                {{-- <li>
                    <a href="#pageSubmenu">
                        <ion-icon name="grid-outline"></ion-icon> PDV
                    </a>

                </li> --}}
                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="cube-outline"></ion-icon> Produtos
                    </a>
                    <ul class="collapse list-unstyled sub-menu" id="homeSubmenu">
                        <li>
                            <a href="{{ url('category') }}">Categorias</a>
                        </li>
                        <li>
                            <a href="{{ url('products') }}">Produtos</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#vendassubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="cart-outline"></ion-icon> vendas
                    </a>
                    <ul class="collapse list-unstyled sub-menu" id="vendassubmenu">
                            <li>
                                <a href="{{ url('orders') }}">Vendas Realizadas</a>
                            </li>
                          
                        </ul>
                </li>
                {{-- <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="bag-handle-outline"></ion-icon> Compras
                    </a>
                </li> --}}
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="card-outline"></ion-icon> Cartões
                    </a>
                </li>
                <li>
                    <a href="#Clientes" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="people-outline"></ion-icon> Pessoas
                    </a>
                    <ul class="collapse list-unstyled sub-menu" id="Clientes">
                        <li>
                            <a href="{{ url('users') }}">Clientes Cadastrados</a>
                        </li>
                    
                    </ul>
                </li>
                <li>
                    <a href="#Configs" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="settings-outline"></ion-icon> configurações
                    </a>
                    <ul class="collapse list-unstyled sub-menu" id="Configs">
                                <li>
                                    <a href="{{ url('account') }}">Conta</a>
                                </li>
                            
                            </ul>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <ion-icon name="analytics-outline"></ion-icon> Relatórios
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Page Content Holder -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-dark bg-darkness">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                @if (Auth::check())
                                <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i>
                                    {{ Auth::user()->name }}</a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                                                                                                                                  this.closest('form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </form>
                                </div>
                                @else
                                <a class="nav-link" href="#"><i class="fa fa-user" aria-hidden="true"></i> admin</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">

                @yield('content')

            </div>
        </div>
    </div>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script type="text/javascript" src="{{url('painel/dist/image-uploader.js')}}"></script>
    <script src="{{ url('painel/js/trix.js') }}"></script>
    <script src="{{ url('painel/js/dist/jquery.maskMoney.min.js') }}"></script>
    <script src="{{ url('painel/js/custom.js') }}"></script>
    @livewireScripts

    @yield('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
      
         
      
    </script>
@section('content')
@if(Session::has('message'))
<script type="text/javascript">
    Swal.fire({
    icon: 'success',
    title: 'Muito bom!',
    text: "{{Session::get('message')}}",
    confirmButtonText: 'Ok'
    });
</script>
@endif
</body>

</html>