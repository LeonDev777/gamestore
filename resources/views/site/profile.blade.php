@extends('site.master.layout')


@section('css')
    <link rel="stylesheet" href="{{ url(mix('site/css/profile.css')) }}">
@endsection


@section('content')
    <div class="container ">
        <div class="main-body">

            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card1">
                        <div class="card-body1">
                            <div class="d-flex flex-column align-items-center text-center">

                                <div class="mt-3">
                                    <h4 class="text-dark">{{ Auth::guard('web')->user()->name }}</h4>
                                    <p class="text-muted font-size-sm text-dark">Endereço</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card2 mb-3">
                        <div class="card-body2">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0  text-dark">Nome completo</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::guard('web')->user()->name }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0  text-dark">E-mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Auth::guard('web')->user()->email }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0  text-dark">Celular</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Crypt::decrypt(Auth::guard('web')->user()->phone) }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0  text-dark">CPF</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ Crypt::decrypt(Auth::guard('web')->user()->cpf) }}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                @if (!Auth::guard('web')->user()->state)

                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-dark">Endereço</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <a href="{{ route('site.address') }}">Cadastre seu endereço</a>
                                    </div>
                                @else
                                    <div class="col-sm-3">
                                        <h6 class="mb-0 text-dark">Endereço</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        {{ Auth::guard('web')->user()->state }},
                                        {{ Auth::guard('web')->user()->city }},
                                        {{ Auth::guard('web')->user()->street}}-
                                        {{ Auth::guard('web')->user()->district}}

                                    </div>
                                @endif
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="aluguel-container ">
                                        <a href="{{ route('site.hire') }}"><button class="botao-hire">Venda seu
                                                Jogo</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
