<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ url(mix('site/css/upload.css')) }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Document</title>
</head>

<body>


    <div class="box-file">
        <div class="container_up">
            <div class="container">
                <div class="wrapper">
                    <div class="image">
                        <img src="" alt="">
                    </div>
                    <div class="content">
                        <div class="icon" id="custon-icon"> <i class="fas fa-cloud-upload-alt"></i></div>
                        <div class="text" align="center"> <small>Clique no icone para adicionar image</small>
                        </div>
                    </div>
                    <div id="cancel-btn"><i class="fas fa-times"></i></div>
                    <div class="file-name"> File name here</div>
                </div>
            </div>
        </div>
        <div>
            <form action="{{ route('site.upload.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" id="default-btn" name="arquivo" hidden>
                <input type="text" placeholder="Digite o Nome do Livro" name="name">
                <input type="text" name="price" placeholder="Digite o Preço do livro" id="value">
                <textarea name="description" cols="30" rows="4" placeholder="Descrição do Livro"
                    maxlength="200"></textarea>

                </textarea>

                @if (session('status'))
                    <div class="status">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif
                <button type="submit"> Cadastra</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('site/js/upload.js') }}"></script>
</body>

</html>
