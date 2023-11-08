@extends('menu.menu')
<html>
<link rel=stylesheet href="{{asset('css/style.css')}}" type='text/css'>
<head>
<title>{{$title}}</title>
</head>
<body>
@section('leftcol')
<table class="tables">
<h1>{{$header}}</h1>
@if($title!="Запрос 3")
@foreach($data as $row)
<tr>
 @if($title=="Запрос 1"||$title=="Запрос 2")
<td>{{$row['FIO']}}</td>
<td>{{$row['Stage']}}</td>
@else
<td>{{$row['staff']}}</td>
@endif
</tr>
@endforeach
@else 
<td>{{$data}}</td>
@endif
</table>
@endsection
</body>
</table>
</html>