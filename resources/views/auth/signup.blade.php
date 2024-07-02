@extends('layout')

@section('content')
<div class="auth">
	<form class="auth__form" method="post" action="{{ URL::route('register') }}">
		@csrf
		<div class="auth__form__title">Зарегистироваться</div>
		<div class="auth__form__fields">
			<div class="auth__form__field">
				<input 
					class="auth__form__input" 
					type="text"
					name="name"
					placeholder="Name">
			</div>
			<div class="auth__form__field">
				<input 
					class="auth__form__input js-input-email" 
					type="email" 
					name="email"
					placeholder="Email">
			</div>
			<div class="auth__form__field">
				<input 
					class="auth__form__input js-input-password" 
					type="password"
					name="password"
					placeholder="Password">
			</div>
		</div>
		<button class="button" type="submit">
			<span>Создать!</span>
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

