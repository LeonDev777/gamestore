<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ url(mix('site/css/navbar.css')) }}">

    @yield('css')
    <title></title>
</head>

<body>
    @if (Route::currentRouteName()!=='site.home')
    <nav class="navbar navbar-expand-lg navbar-light bg-light pt-0">
        <div class="container-fluid">
            <div class="d-flex justify-content-center align-items-center">
                <img src="{{ url('storage/img/GamerZone.png') }}">
                @auth('web')
                    <div class="d-flex flex-column" id="auth_">
                      <a href="{{route('site.profile')}}"><small class="auth-email"> Olá! {{ Auth::guard('web')->user()->email }}</small></a>
                        <a href="{{route('site.logout')}}"  onclick="document.getElementById('logout').submit();return false;"><b>Sair</b></a>
                        <form action="{{route('site.logout')}}" method="post" id="logout"> @csrf </form>
                    </div>
                @endauth

            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span><i id="bar" class="fas fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">

                <div class="d-flex justify-content-end align-content-center w-100">
                    <ul class="navbar-nav ml-auto " width="100">

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.home') }}">Início</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.books') }}">Jogos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('site.rents') }}">Venda</a>
                        </li>
                        @auth('web')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('site.demand')}}">Seus Pedidos</a>
                        </li>
                        @endauth
                        <li class="nav-item">

                        </li>

                        @guest('web')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('site.login') }}">Login/Cadastro</a>
                            </li>
                        @endguest

                        <li class="nav-item">
                            <i class="fas fa-search"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('site.cart') }}" class="nav-link">
                                <i class="fas fa-shopping-bag"></i>
                                <span id="shopping-numbers"
                                    data-value="{{ session('cesta') ? count(session('cesta')) : '' }}">{{ session('cesta') ? count(session('cesta')) : '' }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
                

            </div>
        </div>
    </nav>
    @endif

    @yield('content')



    <script src="{{ asset('site/js/jquery.js') }}"></script>
    <script src="{{ asset('site/js/bootstrap.bundle.js') }}"></script>

    @yield('script')

</body>

</html>
