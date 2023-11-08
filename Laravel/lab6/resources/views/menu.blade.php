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
@yield('rightcol')
</div>
<div class="footer">&copy; Copyright 2017</div></body></html>