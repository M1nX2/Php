<!DOCTYPE html>
<html>
<head>
	<title>Cabinet</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
</head>
<body class="dp">
	<div class="header">
		<div class="row grid middle between">
			<div class="logo">
				<a href="{{route('category')}}"><img src="{{ asset('image/logo.png')}}"></a>
			</div>
			<div class="title">
				Клуб любителей творчества «ОчУмелые ручки»
			</div>
			<div class="auth">
			
			@if (isset($id_user)||isset($id_leader))
			
				<a href="/cabinet">Личный кабинет</a>
				<a href="/exit">Выход</a>
				@else
				<a href="/enter">Вход</a>
				@endif
			</div>
		</div>
	</div>
	<div class="row row--nogutter">
		<div class="menu-burger">
			<div class="burger">
				<div></div>
				<div></div>
				<div></div>
			</div>
		</div>	
	</div>	

    @yield ('content')

    
	<div class="footer">
		<div class="row">
			<div class="row--small grid between">
				<div class="address">Наш адрес: ВДНХ, 120в</div>
				<div class="tel">Тел: 89123456765</div>
				<div class="copy">(с) Copyright, 2017</div>
			</div>
		</div>
	</div>
</body>
</html>