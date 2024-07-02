<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ Session::token() }}"> 
	<title>My Practice Website</title>
	<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
</head>
<body>  
	<div class="wrapper">
		@include('header')
		<main>
			<div class="container">
				@yield('content')
			</div>
		</main>
	</div>
	<script src="{{ URL::asset('js/app.js') }}"></script>
	@yield('scripts')
</body>
</html>
