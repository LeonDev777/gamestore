@extends('site.master.layout')

@section('css')
    <link rel="stylesheet" href="{{ url(mix('site/css/hire.css')) }}">
@endsection

@section('content')
    <div class="grid-container">
        <div class="welcome">
            <h2>Qual jogo você quer vender?</h2>
        </div>

        <div id="sellPopup">
            <div id="sellPopupContainer">
                <div class="closeSellPopupDiv">
                    <span id="backCategoryPopup"><i class="fas fa-arrow-left"></i></span>
                    <span id="closeSellPopup">&times;</span>
                </div>
                <div class="headingDiv">
                    <span class="heading">Cadastrar seu endereço</span>
                </div>
                <form id="sellForm" action="{{ route('site.adress.do') }}" method="POST">
                    @csrf
                    <p id="categoryName"></p>
                    <input type="text" name="cep" placeholder="Cep" id="cep" maxlength="8">
                    <input type="text" readonly placeholder="Estado" id="uf" name="state" required>
                    <input type="text" readonly placeholder="Cidade" id="localidade" name="city" required>
                    <input type="text" readonly placeholder="Rua" id="logradouro" name="street" required>
                    <input type="text" readonly placeholder="Bairro" id="bairro" name="district" required>
                    <button class="botao " type="submit">Cadastrar</button>
                </form>
                @if ($errors->any())
                    <div class="alert__danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    @endsection

    @section('script')

        <script src="{{ url(mix('site/js/cep.js')) }}"> </script>

    @endsection
