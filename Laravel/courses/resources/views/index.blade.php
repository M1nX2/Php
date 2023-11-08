
@extends('menu.menuadmin')

@section('rubric_name', 'Языковая школа LINGVO')

@section('content')
@if(isset($mes))
<div class="success-message">{{$mes}}</div>
@endif
 <!-- ######################## Section ######################## --> <section> <div class="section_main">
  <div class="row">
  
      <section class="eight columns" style="min-height:30px;">          
     @php $a3=true;
        @endphp
        Активные:
        @foreach ($courses as $course)
        @if($course->number>0&&strtotime($course->begin)>time())
        @php $a3=false;
        @endphp
        <article class="blog_post">
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
      </section>    <br>  <br>  
      <section class="eight columns" style="min-height:30px;">  
        @php $a1=true;
        @endphp
        Нет мест: 
        @foreach ($courses as $course)
        @if($course->number<=0)
        @php $a1=false;
        @endphp
        <article class="blog_post">
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
      <br><br>    
      <section class="eight columns" style="min-height:30px;">  
     Прошедшие: 
     @php $a4=true;
        @endphp
        @foreach ($courses as $course)
        @if(strtotime($course->begin)<time())
        @php $a4=false;
        @endphp
        <article class="blog_post">
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
      @if ($a4)
       Нет таких курсов
       @endif
      </section>        
  </div>
  
</div>
<script>
  // выберем сообщение по его классу
  var message = document.querySelector('.success-message');

  // установим таймер на 2 секунды
  setTimeout(function() {
    // скроем сообщение, установив для его CSS-свойства display значение none
    message.style.display = 'none';
  }, 2000);
</script>
@endsection