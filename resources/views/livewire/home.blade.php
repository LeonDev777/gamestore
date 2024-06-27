<div>

    @if (session()->has('message'))
        <x-modal :message="session('message')" />

        <script>
            $('#error').modal('toggle')

            $("#modal-close").click(function() {
                $('#error').modal('hide')
            })
        </script>
    @endif

    <section id="home" class="pb-5" wire:ignore>
        <nav class="navbar navbar-expand-lg navbar-light pt-0 w-100">
            <div class="container-fluid">
                <div class="d-flex justify-content-center align-items-center">
                    <img src="{{ url('storage/img/GamerZone.png') }}">
                    @auth('web')
                        <div class="d-flex flex-column" id="auth_">
                            <a href="{{ route('site.profile') }}"><small class="auth-email"> Olá!
                                    {{ Auth::guard('web')->user()->email }}</small></a>
                            <a href="{{ route('site.logout') }}"
                                onclick="document.getElementById('logout').submit();return false;"><b>Sair</b></a>
                            <form action="{{ route('site.logout') }}" method="post" id="logout"> @csrf </form>
                        </div>
                    @endauth

                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
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
                                    <a class="nav-link" href="{{ route('site.demand') }}">Seus Pedidos</a>
                                </li>
                            @endauth


                            @guest('web')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('site.login') }}">Cadastre-se</a>
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
        <div class="container mt-5 pt-2">

            <h1><span>Melhores Preços</span></h1>
            <p>Jogos para PS4 em mídia digital e PC com envio rápido,<br>preços que cabem no seu bolso.</p>
            <button>Compre agora</button>

        </div>


    </section>

    <div class="banner2">
        <img src="/storage/img/vendas.png" alt="">
    </div>


    <div class="banner1">
        <img src="/storage/img/farcry6.png" alt="">
    </div>




    <section id="Featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Nossos Jogos</h3>
            <hr class="mx-auto">

        </div>
        <div class="row mx-auto container-fluid" wire:ignore>
            @forelse ($books as $book)
                @php
                    $pathUrl = str_replace('public', '', $book->image_path);
                @endphp
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <a href="{{ route('site.books.index', ['id' => $book->id]) }}">
                        <img class="img-fluid mb-3" src="{{ url("storage/$pathUrl") }}" alt="" />
                    </a>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $book->name }} </h5>
                    <h4 class="p-price">R$ {{ number_format($book->price, 2, ',', '.') }}</h4>
                    <button wire:click="cesta({{ $book->id }})" class="btn__add">Adicionar na Cesta</button>
                </div>

            @empty
                <h2>Não tem jogos</h2>
            @endforelse
        </div>

        <div class="banner3">
            <img src="/storage/img/cyberpunk.png" alt="">
        </div>



    </section>



    <section id="clothes" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Mais Recentes</h3>
            <hr class="mx-auto">

        </div>
        <div class="row mx-auto container-fluid" wire:ignore>
            @forelse ($books as $book)
                @php
                    $pathUrl = str_replace('public', '', $book->image_path);
                @endphp
                <div class="product text-center col-lg-3 col-md-4 col-12">
                    <a href="{{ route('site.books.index', ['id' => $book->id]) }}">
                        <img class="img-fluid mb-3" src="{{ url("storage/$pathUrl") }}" alt="" />
                    </a>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name">{{ $book->name }} </h5>
                    <h4 class="p-price">R$ {{ number_format($book->price, 2, ',', '.') }}</h4>
                    <button class="btn__add" wire:click="cesta({{ $book->id }})">Adicionar na Cesta</button>
                </div>
            @empty
                <h2>Não tem jogo</h2>
            @endforelse
        </div>

        <section id="clothes" class="my-5">
            <div class="container text-center mt-5 py-5">
            </div>
            <div class="row mx-auto container-fluid" wire:ignore>
                @forelse ($books as $book)
                    @php
                        $pathUrl = str_replace('public', '', $book->image_path);
                    @endphp
                    <div class="product text-center col-lg-3 col-md-4 col-12">
                        <a href="{{ route('site.books.index', ['id' => $book->id]) }}">
                            <img class="img-fluid mb-3" src="{{ url("storage/$pathUrl") }}" alt="" />
                        </a>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name">{{ $book->name }} </h5>
                        <h4 class="p-price">R$ {{ number_format($book->price, 2, ',', '.') }}</h4>
                        <button class="btn__add" wire:click="cesta({{ $book->id }})">Adicionar na
                            Cesta</button>
                    </div>
                @empty
                    <h2>Não tem jogo</h2>
                @endforelse
            </div>
        </section>


</div>
