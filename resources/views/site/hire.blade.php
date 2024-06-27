@extends('site.master.layout')

@section('css')
    <link rel="stylesheet" href="{{ url(mix('site/css/hire.css')) }}">
@endsection

@section('content')
    <div class="grid-container">
        <div class="welcome">

        </div>

        <div id="sellPopup">
            <div id="sellPopupContainer">

                <div class="headingDiv">
                    <span class="heading">Vender seu jogo</span>
                </div>
                <form id="sellForm" action="{{ route('site.hire.do') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <p id="categoryName"></p>
                    <input type="text" placeholder="Titulo.." id="adTitle" name="name" required>
                    <input type="text" placeholder="Descrição.." id="adDescription" name="description" required>
                    <input type="text" placeholder="Preço do jogo.." id="adPrice" name="price" required>
                    <input type="file" id="adImage" name="arquivo">
                    <button class="botao">Vender seu jogo</button>
                </form>
                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @endif
            </div>
        </div>
    @endsection

    @section('script')
        <script>
            const element = document.getElementById('adPrice');

            element.addEventListener('input', formatCurrency)


            function formatCurrency() {
                let value = element.value;

                value = value + '';
                value = parseInt(value.replace(/[\D]+/g, ''));
                value = value + '';
                value = value.replace(/([0-9]{2})$/g, ",$1");
                if (value.length > 6) {
                    value = value.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                }


                element.value = value;
                if (value == 'NaN') element.value = '';
            }
        </script>
    @endsection
