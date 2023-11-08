@extends('menu.menu')
@section('title',$title)
@section('header',$header)
@section('leftcol')
<form method="POST" action="{{route('resumeStore')}}">
{{ csrf_field() }}
<p>ФИО <input name="FIO" value="Мистер Х">
<p>Телефон <input name="Phone" value="000000" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57">
@php
	$files=scandir(getcwd().'/images');
@endphp	
<p>Фото <select name="Image">
		@foreach($files as $file)
			@if($file!="."&&$file!="..")
		<option 
			value="{{$file}}">
			{{$file}}
		</option>
			@endif
		@endforeach
</select>
<p>Профессия <select name="Staff">
	@foreach ($staffs as $staff)
	<option 
	value="{{$staff->id}}">{{$staff->staff}}</option>
	@endforeach
</select>
<p>Стаж <input name="Stage" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" type="number" value="0" min="0">
<p><button type="submit">Добавить резюме</button>
</form>
@endsection