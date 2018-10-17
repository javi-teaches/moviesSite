<!DOCTYPE html>
<html lang="es" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<link rel="stylesheet" href="{{ asset('/css/app.css') }}">
	</head>
	<body>
		@include('layout.navbar')

		<div class="container">
			@yield('main_content')
		</div>
	</body>
</html>
