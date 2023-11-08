
@extends('menu.menuadmin')

@section('rubric_name', 'Языковая школа LINGVO')

@section('content')
@if(isset($mes))
<div class="success-message">{{$mes}}</div>
@endif
<section class="four columns" style="float:right;">
            <H3>  &nbsp; </H3>
             <div class="panel">
              <h3>Админ-панель</h3>

            <ul class="accordion">
              <li class="active">
                <div class="title">
                   <a href="{{route('formadd')}}"><h5>Добавить курс</h5></a>
                </div>
               
              </li>
            </ul>
               
             </div>
          </section>
</section>
 <!-- ######################## Section ######################## --> <section> <div class="section_main">
  <div class="row">
  
      <section class="eight columns" style="min-height:30px;">          
     @php $a1=true;
        @endphp
        Активные:
        @foreach ($courses as $course)
        @if($course->number>0&&strtotime($course->begin)>time())
 @php $a1=false;
        @endphp
        <article class="blog_post">
         <div class="three columns">
         
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          <p> Мест: {{$course->number}}</p>
          <a href="{{route('formchange',['id'=>$course->id])}}">Изменить</a><br>
          <a href="{{route('formrecord',['id'=>$course->id])}}">Записи</a>
          <form action="{{ route('formdelete', ['id' => $course->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
          </div>
          </article> 
          @endif
           
      @endforeach  
      @if ($a1)
       Нет таких курсов
       @endif
      </section>    <br>  <br>  
      <section class="eight columns" style="min-height:30px;">  
        @php $a3=true;
        @endphp
        Нет мест: 
        @foreach ($courses as $course)
        @if($course->number<=0)
        @php $a3=false;
        @endphp
        <article class="blog_post">
         <div class="three columns">
        
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          <p> Мест: {{$course->number}}</p>
          <a href="{{route('formchange',['id'=>$course->id])}}">Изменить</a><br>
          <a href="{{route('formrecord',['id'=>$course->id])}}">Записи</a>
          <form action="{{ route('formdelete', ['id' => $course->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
          </div>
          </article> 
          @endif
      @endforeach
       @if ($a3)
       Нет таких курсов
       @endif
      </section>  
      <br><br>    
      <section class="eight columns" style="min-height:30px;">  
        @php $a2=true;
        @endphp
     Прошедшие: 
        @foreach ($courses as $course)
        @if(strtotime($course->begin)<time())
        @php 
        $a2=false;
        @endphp
        <article class="blog_post">
         <div class="three columns">
         
         <img src="{{ asset('images/' . $course->image) }}" alt="desc" />
         </div>
         <div class="nine columns">
          <h4>{{$course->course}}</h4>
          <p> {{$course->description}}</p>
          <p> Мест: {{$course->number}}</p>
          <a href="{{route('formchange',['id'=>$course->id])}}">Изменить</a><br>
          <a href="{{route('formrecord',['id'=>$course->id])}}">Записи</a>
          <form action="{{ route('formdelete', ['id' => $course->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Удалить</button>
</form>
          </div>
          </article> 
          @endif
      @endforeach  
      @if ($a2)
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