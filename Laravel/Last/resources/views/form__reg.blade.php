@extends('menu.menu')

@section('content')
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<div class="row--small">
				<form method="POST" action="{{route('reg')}}">
					<h2>Форма регистрации</h2>
					<div class="form-group">
						<label>ФИО</label>
						<input name="FIO" value="{{ old('FIO') }}" >@error('FIO')   <span style="color:red"> {{ $message }} @enderror </span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input name="email_user" value="{{ old('email_user') }}"  > @error('email_user')   <span style="color:red"> {{ $message }} @enderror </span>
					</div>
					<div class="form-group">
						<label>Пароль</label>
						<input type="password" name="password_user" value="{{ old('password') }}" > @error('password_user')   <span style="color:red"> {{ $message }} @enderror </span>
					</div>
					<div class="form-group">
						<label>Номер телефона</label>
						<input type="tel" name="telephone_user" value="{{ old('tel') }}" > @error('telephone_user')   <span style="color:red"> {{ $message }} @enderror </span>
					</div>
					<div class="form-group">
						<button class="btn">Зарегистрироваться</button>
						{{ csrf_field() }}
					</div>
				</form>
			</div>
		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
@endsection