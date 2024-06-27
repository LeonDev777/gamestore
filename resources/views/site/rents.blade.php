@extends('site.master.layout')

@section('css')
    <link rel="stylesheet" href="{{ url(mix('site/css/rents.css')) }}">
@endsection

@section('content')
    <div class="container my-5 py-5" id="Featured">
        @forelse ( $hires as $hire )
            @php
                $pathUrl = str_replace('public', '', $hire->image_path);
            @endphp
            <div class="card py-5">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-3 d-flex align-items-center">
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1">
                                    <img src="{{ url("storage/$pathUrl") }}" />
                                </div>
                            </div>

                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{$hire->name}}</h3>
                            <p class="product-description">{{$hire->description}}</p>
                            <h4 class="price">Preço: <span>R$ {{$hire->price}} </span></h4>

                            @php
                                $user = $hire->bookhires()->first();
                            @endphp

                            <div class="action">
                               <a href="https://web.whatsapp.com/send?phone =55{{Crypt::decrypt($user->phone)}}" target="_blank"><button >Entra em contato</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div>
                <h4>Sem jogos para vender</h4>
            </div>
        @endforelse
    </div>
@endsection
