@extends('site.master.layout')

@section('css')
    @livewireStyles
@endsection

@section('content')
    @livewire('books')
@endsection

@section('script')

<script src="{{url(mix('site/js/script.js'))}}"> </script>

@livewireScripts

@endsection
