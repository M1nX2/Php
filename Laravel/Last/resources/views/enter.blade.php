@extends('menu.menu')

@section('content')
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row--small">
            <form method="POST" action="{{route('login')}}">
                <p>Логин <input name="login"> @error('login')   <span style="color:red"> {{ $message }} @enderror </span>
                <p>Пароль <input type="password" name="password"> @error('password')   <span style="color:red"> {{ $message }} @enderror </span>
                    <p><button type="submit">Войти</button>
                {{ csrf_field() }}
            </form>
            <form method="POST" action="{{route('registration')}}">
            <p><button type="submit">Зарегистрироваться</button>
                {{ csrf_field() }}
            <p style="color:red;">{{$err}}</p>
            <p style="color:green;">{{$access}}</p>
            </form>
			</div>
		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
@endsection