@extends('menu.menu')

@section('content')
	<div class="row row--nogutter top-line">
		<div class="line"></div>
	</div>
	
	<div class="main">
	
		<div class="row">
		<a href="{{route('cabinet')}}">Назад</a>
			<div class="row--small">
			<form method="POST" action="{{route('add_content')}}">
									<h2>Форма добавления мастер-класса</h2>
									@if (isset($message))
									<p><span style="color:red">{{$message}}</p>
									@endif
					<div class="form-group">
						<label>Вид творчества</label>
						<select name='id_category'>
							@foreach ($categories as $category)
							<option value='{{$category->id_category}}'> {{$category->name_category}}</option>
							@endforeach
						</select>
					</div>
					<div class="form-group">
						<label>Название</label>
						<input type="text" name="name_MC"  required>@error('name_MC')   <span style="color:red"> {{ $message }} @enderror
					</div>
					<div class="form-group">
						<label>Описание мастер-класса</label>
						<textarea name='description_MC' required>{{ old('description_MC') }}</textarea> @error('description_MC')   <span style="color:red"> {{ $message }} @enderror
					</div>
					<div class="form-group">
					<label>Дата</label>
					<input type="date" value="" min="{{ date('Y-m-d', strtotime('+1 day')) }}" name="date_MC" id="date_MC">
					@error('date_MC')
						<span style="color:red">{{ $message }}</span>
					@enderror
				</div>

				<div class="form-group">
					<label>Время</label>
					<select name='time_MC' value="{{ old('time_MC') }}" required id="time_MC">
						<option value=''>Выберите время</option>
					</select>
					@error('time_MC')
						<span style="color:red">{{ $message }}</span>
					@enderror
				</div>
					<div class="form-group">
						<label>Количество человек в группе</label>
						<input type="number" min=0 value="{{ old('count_people_MC') }}" name="count_people_MC">
					</div>@error('count_people_MC')   <span style="color:red"> {{ $message }} @enderror
					<div class="form-group">
						<label>Стоимость</label>
						<input type="number" min=0 name="cost_MC" value="{{ old('cost_MC') }}">
					</div>@error('cost_MC')   <span style="color:red"> {{ $message }} @enderror
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
	<script>
 // Функция для отправки AJAX-запроса на сервер
		function getAvailableTimes(date) {
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function() {
			if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				// Обновляем список временных интервалов
				document.getElementById('time_MC').innerHTML = xhr.responseText;
			} else {
				console.log('Ошибка: ' + xhr.status);
			}
			}
		};
		xhr.open('GET', '/available-times/' + date, true);
		xhr.send();
		}

		// Обновляем список временных интервалов при изменении даты
		document.getElementById('date_MC').addEventListener('change', function() {
		var date = this.value;
		getAvailableTimes(date);
		});

</script>

@endsection