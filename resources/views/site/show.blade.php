<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$book->title}}</h2>

    @foreach ($book->images as $image )
        @php
            $pathUrl =  str_replace('public', '', $image->path);
        @endphp
           <img src="{{ env('APP_URL') }}/storage{{$pathUrl}}" alt="">
    @endforeach
</body>
</html>
