@extends('menu.menu')
@section('title',$title)
@section('header',$header)
@section('leftcol')
@foreach ($persons as $person)
<form method="POST" action="{{ route('resumeChange',['id'=>($person->id)]) }}">
{{ csrf_field() }}
<p>ФИО <input name="FIO" value="{{$person->FIO}}">
<p>Телефон <input name="Phone" value="{{$person->phone}}" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
<p>Фото
@php
	$files=scandir(getcwd().'/images');
@endphp	
<select name="Image">
		@foreach($files as $file)
			@if($file!="."&&$file!="..")
		<option 
			@if($file==$person->image)
			selected
			@endif
			value="{{$file}}">
			{{$file}}
		</option>
			@endif
		@endforeach
</select>
<p>Профессия <select name="Staff">
	@foreach ($staffs as $staff)
	<option 
	@if($staff->id==$person->sid)
	selected
	@endif
	value="{{$staff->id}}">{{$staff->staff}}</option>
	@endforeach
</select>
<p>Стаж <input name="Stage" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" type="number" value="{{$person->stage}}" min="0">
<p><button type="submit">Изменить резюме</button>
</form>
@endforeach
@endsection