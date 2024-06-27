@extends('site.master.layout')

@section('css')
    <link rel="stylesheet" href="{{url(mix('site/css/nav.css'))}}">
    @livewireStyles

@endsection

@section('content')
    @livewire('home')
@endsection

@section('script')

<script src="{{url(mix('site/js/script.js'))}}"> </script>

@livewireScripts

@endsection

