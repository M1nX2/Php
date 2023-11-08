@extends('menu.menu')
@section('title',$title)
@section('header',$header)

@section('leftcol')
<h1>Вакансии</h1>
@foreach ($persons as $person)
<p class="pinline second">
<a href="http://127.0.0.1:8000/resume/show/{{$person->id}}">{{$person->FIO}}, <br>Телефон: {{$person->phone}}<br>
<span class="pinline third"> Стаж: {{$person->stage}} лет</span>
</p>
<form action="{{ route('changeShow',['id'=>($person->id)]) }}" method="POST">
<input type=hidden name="_method" value="GET">
<button type="submit">Изменить</button>
{{ csrf_field() }}
</form>
<form action="{{ route('resumeDelete',['id'=>($person->id)]) }}" method="POST">
<input type=hidden name="_method" value="DELETE">
<button type="submit">Удалить</button>
{{ csrf_field() }}
</form>



</a>
@endforeach
@endsection	
  </div>
