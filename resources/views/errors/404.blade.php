@extends('layout')

@section('content')
<section class="section">
    <div class="page404">
        <div class="page404__title">Такс-такс-такс...</div>
        <div class="page404__text">Такой страницы тут нет!</div>
    </div>
</section>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/app.js') }}"></script>
@stop
