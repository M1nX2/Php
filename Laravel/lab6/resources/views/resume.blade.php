@extends('menu.menu')
@section('title',$title)
@section('header',$header)

@section('leftcol')
@foreach ($persons as $person)
<div class="pinline1">
	<img class="pic" src="{{asset('Images/'.$person->image)}}">
</div>

<p class="pinline second">
{{$person->FIO}}

<br>
Телефон: 
{{$person->phone}}

</p>

<p  class="pinline third">
{{$person->staff}}
<br>

Стаж: 
{{$person->stage}}

</p>
@endforeach
@endsection