@extends('layout')

@section('content')
<div class="auth">
	<form class="auth__form" method="post" action="{{route('login')}}">
		@csrf
		<div class="auth__form__title">Вход</div>
		<div class="auth__form__fields">
			<div class="auth__form__field">
				<input class="auth__form__input" name="email" type="email" placeholder="Email">
			</div>
			<div class="auth__form__field">
				<input class="auth__form__input" name="password" type="password" placeholder="Password">
			</div>
		</div>
		<button class="button" type="submit">
			<span>Войти</span>
		</button>
	</form>
	@if ($errors->all())
		@foreach ($errors->all() as $error)
		@include('message', ['content' => $error, 'state' => 'error'])
		@endforeach
	@endif
</div>
@stop

@section('scripts')
    <script src="{{ URL::asset('js/app.js') }}"></script>
@stop

