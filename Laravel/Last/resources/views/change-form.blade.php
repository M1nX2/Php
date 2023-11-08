@extends('menu.menu')

@section('content')
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	<div class="main">
		<div class="row">
		<a href="{{route('cabinet')}}">Назад</a>
			<div class="row--small">
			<form method="POST" action="{{route('change_content')}}">
									<h2>Форма редактирования мастер-класса</h2>
						<label>{{$mc->name_MC}}</label>
					<div class="form-group">
                    <input type="hidden" name="id_MC" value="{{$mc->id_MC}}">
						<label>Описание мастер-класса</label>
						<textarea name='description_MC' required><?php echo $mc->description_MC ?></textarea>@error('description_MC')   <span style="color:red"> {{ $message }} @enderror
					</div>
					<div class="form-group">
						<label>Стоимость</label>
						<input type="number" min=0 name="cost_MC" value='{{$mc->cost_MC}}'>
						@error('cost_MC')   <span style="color:red"> {{ $message }} @enderror
					</div>
					<div class="form-group">
						<button class="btn" type='submit'>Отправить</button>
					</div>
					{{ csrf_field() }}
				</form>
			</div>
		</div>
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
@endsection