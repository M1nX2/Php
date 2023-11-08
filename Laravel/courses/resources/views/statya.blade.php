@extends('menu.menu')

@section('rubric_name', "")

@section('content')
@if (isset($errs))
  <div style="color:red;">
   
    {{$errs}}
    
  </div>
@endif
    <article>
            
             <div class="twelve columns">
                 <h1>{{$course->course}}</h1>
                      <p class="excerpt">
                     Начало курса: <b>{{$course->begin}}</b>.
                      </p>    
   <p class="excerpt">
                     Количество мест: <b>{{$course->number}}</b>.
                      </p>    
             </div>
             
    </article>
    
    
    
      
<!-- ######################## Section ######################## -->

<section class="section_light">

      
      <div class="row">
      

      <p> <img src="{{ asset('images/' . $course->image) }}" alt="desc" width=400 align=left hspace=30>
      {{$course->description}}
 
      </p>
                            
      </div>
      @if (isset($d)&&$d)
        <form action="{{route('coursereg',['id'=>$course->id])}}" method="POST">
        @csrf
            <input type="submit" value="Записаться">
        </form>
        @endif
</section>  
      
@endsection
<!-- ######################## Footer ######################## -->  
      
	  
