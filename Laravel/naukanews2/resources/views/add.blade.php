
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
<a href="{{route('rubric',['name'=>$name])}}">Назад</a>
    @if (count($errors) > 0)
  <div style="color:red;">
   
    @foreach ($errors->all() as $error)
      {{ $error }}
    @endforeach
    
  </div>
@endif
		<form class="f1" method="POST" action="{{route('add',['name'=>$name])}}">
        {{ csrf_field() }}
			<p>
				<input type="text" name="title" class="log" placeholder="Заголовок"><br>
                <input type="text" name="lid" class="log" placeholder="Описание"><br>
                <textarea style="resize: none;" type="text" name="content" class="log" placeholder="Текст"></textarea><br>
				@php
	            $files=scandir(getcwd().'/images');
                @endphp	
                <select name="image">
                        @foreach($files as $file)
                            @if($file!="."&&$file!="..")
                        <option                         
                            value="{{$file}}">
                            {{$file}}
                        </option>
                            @endif
                        @endforeach
                </select>
                <input type="hidden" name="rubric" value="{{$name}}">
			</p>
			<input type="submit" name="sub" value="Создать" class="but1 bluebut">
		</form>
	<br>
</body>
</html>