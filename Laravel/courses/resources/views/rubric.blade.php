
@extends('menu.menu')

@section('rubric_name', $rubric_name)

@section('content')

 <!-- ######################## Section ######################## --> <section> <div class="section_main">
  <div class="row">
  
      <section class="eight columns">          
     
      
      Активные:
      @php $a3=true;
        @endphp
        @foreach ($courses as $course)
        @if($course->number>0&&strtotime($course->begin)>time())
        @php $a3=false;
        @endphp
        <article class="blog_post" style="min-height:30px;">
         <div class="three columns">
         <a href="{{route('statya',['id'=>$course->id])}}">
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          </a>
          </div>
          </article> 
          @endif
      @endforeach   
      @if ($a3)
       Нет таких курсов
       @endif
      <br>  <br>   
        Нет мест: 
        @php $a2=true;
        @endphp
        @foreach ($courses as $course)
        @if($course->number<=0)
        @php $a2=false;
        @endphp
        <article class="blog_post" style="min-height:30px;">
         <div class="three columns">
         <a href="{{route('statya',['id'=>$course->id])}}">
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          </a>
          </div>
          </article> 
          @endif
      @endforeach
      @if ($a2)
       Нет таких курсов
       @endif
      <br>  <br>  
      @php $a1=true;
        @endphp
     Прошедшие: 
        @foreach ($courses as $course)
        @if(strtotime($course->begin)<time())
        @php $a1=false;
        @endphp
        <article class="blog_post" style="min-height:30px;">
         <div class="three columns">
         <a href="{{route('statya',['id'=>$course->id])}}">
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          </a>
          </div>
          </article> 
          @endif
      @endforeach    
           @if ($a1)
       Нет таких курсов
       @endif      
      </section>        
  </div>
  
</div>

@endsection