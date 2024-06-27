@extends('site.master.layout')


@section('content')


    <section id="Featured" class="mt-5 pt-5 w-100">

        <div class="container mt-0 pt-0 d-flex align-items-center justify-content-sm-between container_media">
            <div style="max-width: 50%">
                <h3>Carrinho</h3>
                <hr>
                <p>
                    Jogos prontos para comprar
                </p>
            </div>
            <div>
                <div class="card bg-light mt-2 " style="max-width: 18rem;">
                    <div class="card-header">Histórico </div>
                    <div class="card-body">
                        <h5 class="card-title">Total <strong>R$: {{ number_format($price, 2, ',', '.') }} </strong>
                        </h5>

                        <button class="w-100 mt-4" data-toggle="modal" data-target="#exampleModalCenter"
                            id="open-modal">Fazer o pagamento</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="row mx-auto container p-0">

            @forelse ($books as $key => $book)
                @foreach ($book as $valueId => $query)
                    @php
                        $pathUrl = str_replace('public', '', $query->image_path);
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
                                <h5 class="p-name">{{ $query->name }} </h5>
                                <h4 class="p-price">R$ {{ number_format($query->price, 2, ',', '.') }}</h4>
                                <form action="{{ route('site.cart.delete') }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" value="{{ $valueId }}" name="valueId">
                                    <button class="btn__add" type="submit">Remover da Cesta</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

            @empty

                @if (session('msg'))
                    <div class="alert alert-success" role="alert">
                        {{ session('msg') }}
                    </div>
                @else
                    <h2>Voçê não possui nenhum produto na cesta</h2>
                @endif
            @endforelse
        </div>


        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">PAGAMENTO</h5>
                        <button type="button" id="modal-close" class="close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('site.checkout.do') }}"
                            data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form"
                            class="require-validation" data-cc-on-file="false" method="POST">
                            @csrf

                            <input type="hidden" name='stripeToken' id="stripeToken">
                            <div class="form-group">
                                <span>Taxa: R$ 2,00</span>
                                <p>Valor Total: {{ number_format($price, 2, ',', '.') }}</p>
                            </div>
                            <div class="form-group mt-2">
                                <label for="cc-number">Número do Cartão</label>
                                <input type="text" class="form-control card-number" id="cc-number" placeholder="Número">
                            </div>
                            <div class="form-group mt-2">
                                <label for="cc-number">Mês de Expiração</label>
                                <input type="text" class="form-control card-expiry-month" id="cc-number"
                                    placeholder="Número">
                            </div>
                            <div class="form-group mt-2">
                                <label for="cc-expiration">Ano de Expiração</label>
                                <input type="text" class="form-control card-expiry-year" id="cc-expiration"
                                    placeholder="ANO">
                            </div>
                            <div class="form-group mt-2">
                                <label for="cc-cvv">CVV</label>
                                <input type="text" class="form-control card-cvc" id="cc-cvv" placeholder="Número">
                            </div>
                            <input type="hidden" name="price" value="{{ number_format($finalPrice, 2, ',', '.') }}">
                            <div class="form-group mt-2 d-flex justify-content-center align-items-center">
                                <button type="submit">Pagamento R${{ number_format($finalPrice, 2, ',', '.') }}</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>


    </section>
@endsection

@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script>
        $("#open-modal").click(function() {
            $('#modal').modal('toggle')
        })

        $("#modal-close").click(function() {
            $('#modal').modal('hide')
        })
    </script>

    <script src="{{ url(mix('site/js/payment.js')) }}"> </script>
@endsection
