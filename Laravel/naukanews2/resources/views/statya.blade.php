@extends('menu.menu')
<!-- END main menu -->
        
<!-- ######################## Header ######################## -->
@section('content')     
    <header>
       
            <div class="row">
               <a href="{{route('rubric',['name'=>$content->rubric])}}"><h4>{{$content->rubric}}</h4></a>
    <article>
            
             <div class="twelve columns">
                 <h1>{{$content->title}}</h1>
                      <p class="excerpt">
                      {{$content->lid}}
                      </p>    
             </div>
             
    </article>
    
    
            </div>
            
    </header>
      
<!-- ######################## Section ######################## -->

<section class="section_light">

      
      <div class="row">
      

      <p> <img src="{{asset('images/'.$content->image)}}" alt="desc" width=400 align=left hspace=30>
      {{$content->content}}
      </p>
                            
      </div>


      
      

<!-- ######################## Footer ######################## -->  
		  

<!-- ######################## Scripts ######################## --> 

    <!-- Included JS Files (Compressed) -->

</body>
</html>
@endsection