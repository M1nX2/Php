
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Вход</title>
<!--<link href="style1.css" rel="stylesheet">-->
<style>
form{	
	display:block;
	width:500px;
	margin:200px auto;
	text-align:center;
}
.log{
	padding-left:5px;
	margin: 5px 0;
	width:100%;
	border:1px solid #75c9f3;
	height:25px;
}

form p{
	display:inline-block;
	vertical-align:middle;
	width:100%;
}
.but1{
	background-color:#3AAACF;
	width:50%;
	display:block;
	height:50px;
	margin:10px auto;
	color:white;
}
</style>
</head>
<body>
    @isset($err)
	<p style="color:red;">
    {{$err}}
</p>
        @endisset
		<form class="f1" method="POST" action="{{route('login')}}">
        {{ csrf_field() }}
			<p>
				<input type="text" name="login" class="log" placeholder="Логин"><br>
				<input type="password" name="password" class="log" placeholder="Пароль"><br>
			</p>
			<input type="submit" name="sub" value="ВОЙТИ" class="but1 bluebut">
			<p><a href="{{route('formreg')}}">Зарегистрироваться</a></p>
		</form>
	<br>
</body>
</html>