
<!DOCTYPE html>
<html>
<head>
<meta charset = "UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Добавить</title>
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
   
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach
    
  </div>
@endif
		<form class="f1" method="POST" action="{{route('change',['id'=>$course->id])}}">
        {{ csrf_field() }}
			<p>
				Заголовок <input type="text" name="course" class="log" placeholder="Заголовок" value="{{$course->course}}"><br>
				Места <input type="number" name="number" class="log" pattern="[0-9]{1,}" value="{{$course->number}}"><br>
				Дата <input type="datetime-local" name="begin" class="log" value="{{$course->begin}}">
                Описание <textarea style="resize: none;" type="text" name="description" class="log" placeholder="Текст" >{{$course->description}}</textarea><br>
				@php
	            $files=scandir(getcwd().'/images');
                @endphp	
                Изображение <select name="image">
                        @foreach($files as $file)
                            @if($file!="."&&$file!="..")
                        <option                         
                            value="{{$file}}"
							@if ($file==$course->image)
							selected
							@endif>
                            {{$file}}
                        </option>
                            @endif
                        @endforeach
                </select>
                Рубрика <select name="rubric">
    @foreach($rubs as $rub)
        <option @if ($rub==$course->rubric) selected @endif>
            {{$rub}}
        </option>
    @endforeach
			</p>
			<input type="submit" name="sub" value="Изменить" class="but1 bluebut">
		</form>
	<br>
</body>
</html>