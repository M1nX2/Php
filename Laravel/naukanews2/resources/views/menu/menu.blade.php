<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Новости науки</title>
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">

  <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>
  
  <link rel="stylesheet" href="fonts/ligature.css">
  
  <!-- Google fonts -->
  <link href="{{asset('http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Playfair+Display:400italic')}}" rel='stylesheet' type='text/css' />

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>

<body>

<!-- ######################## Main Menu ######################## -->
 
<nav>

     <div class="twelve columns header_nav">
     <div class="row">
      
        <ul id="menu-header" class="nav-bar horizontal">
        
          <li><a href="{{route('index')}}">Главная</a></li>     
          <li><a href="{{route('rubric',['name'=>'Искусственный интеллект'])}}">Искусственный интеллект</a></li>
          <li><a href="{{route('rubric',['name'=>'Искусственная нейронная сеть'])}}">Искусственная нейронная сеть</a></li>
          <li><a href="{{route('rubric',['name'=>'Распознавание образов'])}}">Распознавание образов</a></li>
          <li><a href="{{route('rubric',['name'=>'Робототехника'])}}">Робототехника</a></li>
          <li><a href="{{route('rubric',['name'=>'Информационное общество'])}}">Информационное общество</a></li>
          <li><a href="{{route('rubric',['name'=>'Автоматическая обработка текста'])}}">Автоматическая обработка текста</a></li>
      
        </ul>
        <a href="{{route('refresh')}}">Выйти</a>
        <p style="color:
        @if(session('role')=='admin')
        red
        @else
        blue
        @endif

        ;margin:0px 30px;display:inline-block;">{{session('login')}}<p>

        
      </div>  
      </div>
      
</nav>
@yield ('content')
<footer>

      <div class="row">
      
          <div class="twelve columns footer">
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" >Twitter</a> 
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" >Facebook</a>
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" >Pinterest</a>
              <a href="" class="lsf-icon" style="font-size:16px">Instagram</a>
          </div>
          
      </div>

</footer>		  

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->
    <script src="{{asset('javascripts/foundation.min.js')}}" type="text/javascript"></script> 
    <!-- Initialize JS Plugins -->
     <script src="{{asset('javascripts/app.js')}}" type="text/javascript"></script>