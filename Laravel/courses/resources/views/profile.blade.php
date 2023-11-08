
@extends('menu.menu')

@section('rubric_name', 'Профиль')

@section('content')

 <!-- ######################## Section ######################## --> <section> 
 <p style="display:inline-block; float:right;border:1px solid blue;"><img style="height:100px;" src="{{ asset('storage\avatars/' .$user->avatar) }}"><br>{{$user->name}}</p> 
 <div class="section_main">
  <div class="row">
  
      <section class="eight columns">          
     
      @if(isset($mes))
<div class="success-message">{{$mes}}</div>
@endif
      Записи:
        @foreach ($records as $course)
        <article class="blog_post" style="min-height:30px;">
         <div class="three columns">
         <a href="{{route('statya',['id'=>$course->course_id])}}">
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          </a>
          </div>
          <form action="{{route('coursecancel',['id'=>$course->course_id,'user_id'=>$user->id])}}" method="POST">
        @csrf
            <input type="submit" value="Отменить">
        </form>
          </article>        
      @endforeach   
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