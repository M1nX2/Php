@extends('menu.menu')

@section('content')
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
			<form method="POST" action="{{route('confirmation_content',['id'=>$mc->id_MC])}}">
					<h2>Форма подтверждения записи на мастер-класса</h2>			
					<div class="form-group">
                    <input type="hidden" name="id_MC" value="{{$mc->id_MC}}">
                    <input type="hidden" name="id_user" value="{{$mc->id_user}}">
                    <p>Проверьте все данные</p>
                    <div class="form-group">
						<h4>Ваше ФИО</h4>
						<p><span>{{$user->FIO_user}}</span></p>
					</div>
                    <div class="form-group">
						<h4>Название мастер-класса</h4>
						<p>{{$mc->name_MC}}</p>
					</div>
                    <div class="form-group">
						<h4>Вид творчества</h4>
                        <p>{{$mc->name_category}}</p>
					</div>
					<div class="form-group">
						<h4>ФИО мастер</h4>
						<p>{{$mc->first_name_leader}} {{$mc->second_name_leader}} {{$mc->patronymic_leader}}</p>
					</div>
					<div class="form-group">
						<h4>Дата</h4>
						<p>{{date('d.m.Y', strtotime($mc->date_MC))}} </p>
					</div>
					<div class="form-group">
						<h4>Время</h4>
						<p>{{date('H:i', strtotime($mc->date_MC))}}</p>
					</div>
					<div class="form-group">
						<button class="btn" type="submit">Подтвердить</button>
					</div>
					
					{{ csrf_field() }}
				</form>

		
				
			</div>
			<div class="row">
			<form method="POST" action="{{route('cancel')}}">
                <div class="form-group">
				<input type="hidden" name="id_MC" value="{{$mc->id_MC}}">
                    <input type="hidden" name="id_user" value="{{$mc->id_user}}">
						<button class="btn" type="submit">Отмена</a></button>
					</div>
					{{ csrf_field() }}
					</form>
					</div>
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
@endsection