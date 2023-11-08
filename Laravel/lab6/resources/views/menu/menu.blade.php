<html><head>
<link href="{{asset('css/style.css')}}" rel="stylesheet" type='text/css'>
<title>{{$title}}</title></head><body>

<div class="header"><!--*****************Логотип и шапка********************-->
{{$header}}
	</div>
 <div class="leftcol"><!--**************Основное содержание страницы************-->
@yield('leftcol')
</div>
<div class="rightcol"><!--*******************Навигационное меню*******************-->
<ul class="menu">
        <li><a href="http://127.0.0.1:8000/resume">Вакансии</a></li>
		<li><a href="http://127.0.0.1:8000/add">Добавить резюме</a></li>
        <li><a href="http://127.0.0.1:8000/resume/query1">Запрос 1</a></li>
        <li><a href="http://127.0.0.1:8000/resume/query2">Запрос 2</a></li>
        <li><a href="http://127.0.0.1:8000/resume/query3">Запрос 3</a></li>
        <li><a href="http://127.0.0.1:8000/resume/query4">Запрос 4</a></li>   </ul>
</div>
<div class="footer">&copy; Copyright 2017</div></body></html>