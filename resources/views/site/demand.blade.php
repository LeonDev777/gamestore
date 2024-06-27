@extends('site.master.layout')

@section('css')

@endsection

@section('content')


<div class="container mt-5 pt-5 d-flex align-items-center justify-content-sm-between container_media">
    <div>
        <h3>Pedidos</h3>
        <hr>
        <p>
            Seus Pedidos
        </p>
    </div>
</div>


    <div class="row mx-auto container p-0">

        @forelse ( $books as $book)
                @php
                    $booksdemand = $book->booksDemands()->first();
                    $pathUrl = str_replace('public', '', $booksdemand->image_path);
                @endphp


                <div class="d-flex align-items-center my-5 media_screen ">
                    <div class="">
                        <img class="img_cart" src="{{ url("storage/$pathUrl") }}" alt="">
                    </div>

                    <div class="m-5 margin_description">
                        <div>
                            <div class="star">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <h5 class="p-name">{{ $booksdemand ->name }} </h5>
                            <span>Endereço: {{$book->Address}}</span>
                            <h4 class="p-price">R$ {{ number_format($booksdemand ->price, 2, ',', '.') }}</h4>
                        </div>
                    </div>
                </div>

        @empty
        <h2>Você não possui nenhum Pedido</h2>
        @endforelse
    </div>

@endsection

@section('script')


    @livewireScripts

@endsection
