@extends('site.master.layout')


@section('content')
    <div class="container my-5 py-5" id="Featured">
        <div class="card py-5">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6 d-flex justify-content-center align-items-center">
                        @php
                            $pathUrl = str_replace('public', '', $book->image_path);
                        @endphp

                        <div class="preview-pic tab-content">
                            <div class="tab-pane active" id="pic-1"><img src="{{ url("storage/$pathUrl") }}" /></div>
                        </div>


                    </div>
                    <div class="details col-md-5">
                        <h3 class="product-title">{{ $book->name }}</h3>
                        <div class="rating">
                            <div class="stars">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                            <span class="review-no">41 reviews</span>
                        </div>
                        <p class="product-description">{{ $book->description }}</p>
                        <h4 class="price">Preço: <span>R$ {{ number_format($book->price, 2, ',', '.') }}</span>
                        </h4>


                        <div class="action">
                            <button>adicionar na cesta</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
