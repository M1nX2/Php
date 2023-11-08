
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Записи</title>
<!--<link href="style1.css" rel="stylesheet">-->
<style>
form{	
	display:block;
	width:500px;
	margin:200px auto;
	text-align:center;
}
.log{
	padding-left:5px;
	margin: 5px 0;
	width:100%;
	border:1px solid #75c9f3;
	height:25px;
}

form p{
	display:inline-block;
	vertical-align:middle;
	width:100%;
}
.but1{
	background-color:#3AAACF;
	width:50%;
	display:block;
	height:50px;
	margin:10px auto;
	color:white;
}
</style>
</head>
<body>
<a href="{{route('indexadmin')}}">Назад</a>
    @if (count($errors) > 0)
  <div style="color:red;">
  @endif
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach

    @foreach ($records->all() as $record)
	<div>
	<form action="{{ route('recordelete', ['id' => $record->course_id,'user_id'=>$record->user_id]) }}" method="POST">
	{{$record->name}} <br>
	{{$record->course}}
    @csrf
    @method('DELETE')<br>
    <button type="submit">Удалить</button>
</form>


	</div>
	@endforeach
  </div>

		
	<br>
</body>
</html>