<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>

  <meta charset="utf-8" />
  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Языковая школа LINGVO</title>
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="{{asset('stylesheets/foundation.min.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/main.css')}}">
  <link rel="stylesheet" href="{{asset('stylesheets/app.css')}}">

  <script src="{{asset('javascripts/modernizr.foundation.js')}}"></script>
  
  <link rel="stylesheet" href="{{asset('fonts/ligature.css')}}">
  
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
        
          <li><a href="{{route('indexadmin')}}">Главная</a></li>     
          <li><a href="{{route('rubricadmin',[$rubric_name='Английский'])}}">Английский</a></li>
          <li><a href="{{route('rubricadmin',[$rubric_name='Французский'])}}">Французский</a></li>
          <li><a href="{{route('rubricadmin',[$rubric_name='Немецкий'])}}">Немецкий</a></li>
          <li><a href="{{route('rubricadmin',[$rubric_name='Китайский'])}}">Китайский</a></li>  
          <li><form id="logout-form" action="{{ route('logout') }}" method="POST" >
    @csrf
    <input type="submit" value="Выйти"> 
</form></li>    
        <li style="padding:0px 30px;"><a href="{{route('adminprof')}}">{{$name}}</a></li>
        </ul>
        

        
      </div>  
      </div>
      
</nav><!-- END main menu -->
        
<!-- ######################## Header (featured posts) ######################## -->
     
<header>
   

        <div class="row">
        
        <h1>@yield('rubric_name')</h1>
        
</header>
@yield ('content')

   <section>
   
      <div class="section_dark">
      <div class="row"> 
      
      <h2></h2>
      
          <div class="two columns">
          <img src="{{asset('images/thumb1.jpg')}}" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="{{asset('images/thumb2.jpg')}}" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="{{asset('images/thumb3.jpg')}}" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="{{asset('images/thumb4.jpg')}}" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="{{asset('images/thumb5.jpg')}}" alt="desc" />
          </div>
          
          <div class="two columns">
          <img src="{{asset('images/thumb6.jpg')}}" alt="desc" />
          </div>

      
      </div>
      </div>
      
    </section>


<!-- ######################## Footer ######################## -->  
      
<footer>

      <div class="row">
      
          <div class="twelve columns footer">
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="twitter">Twitter</a> 
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="facebook">Facebook</a>
              <a href="" class="lsf-icon" style="font-size:16px; margin-right:15px" title="pinterest">Pinterest</a>
              <a href="" class="lsf-icon" style="font-size:16px" title="instagram">Instagram</a>
          </div>
          
      </div>

</footer>		  

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->
    <script src="javascripts/foundation.min.js" type="text/javascript"></script> 
    <!-- Initialize JS Plugins -->
     <script src="javascripts/app.js" type="text/javascript"></script>
</body>
</html>