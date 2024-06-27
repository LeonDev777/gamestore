<section id="Featured" class="my-5 py-5">

    @if (session()->has('message'))

        <x-modal :message="session('message')" />

        <script>
            $('#error').modal('toggle')

            $("#modal-close").click(function() {
                $('#error').modal('hide')
            })
        </script>

    @endif

    <div class="container my-5 py-5">
        <h3>Jogos</h3>
        <hr>

    </div>
    <div class="row mx-auto container">
        @forelse ( $books as $book)
            @php
                $pathUrl = str_replace('public', '', $book->image_path);
            @endphp
            <div class="product text-center col-lg-3 col-md-4 col-12">
                <a href="{{route('site.books.index',['id'=> $book->id])}}">
                    <img class="img-fluid mb-3"  src="{{ url("storage/$pathUrl")}}" alt="" />
                </a>
                <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <h5 class="p-name">{{ $book->name }} </h5>
                <h4 class="p-price">R$ {{ number_format($book->price , 2,",",".") }}</h4>
                <button wire:click="cesta({{ $book->id }})" class="btn__add">Adicionar na Cesta</button>
            </div>

        @empty
            <h2>Não tem jogo</h2>
        @endforelse
    </div>
    
    <div class="d-flex justify-content-center">
        {{ $books->links() }}
    </div>
</section>
