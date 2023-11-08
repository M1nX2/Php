@extends('menu.menu')   
@section('content')
<header>
   

        <div class="row">
        
        <a href="{{route('index')}}"><h1>Новости науки</h1></a>
        
</header>
      
<!-- ######################## Section ######################## -->
@if (session('role')=='admin')
<section class="four columns">
            <H3>  &nbsp; </H3>
             <div class="panel">
              <h3>Админ-панель</h3>

            <ul class="accordion">
              <li class="active">
                <div class="title">
                   <a href="{{route('formadd',['name'=>$title])}}"><h5>Добавить статью</h5></a>
                </div>
               
              </li>
            </ul>
               
             </div>
          </section>
<section>
@endif
  <div class="section_main">
   
      <div class="row">
      
          <section class="eight columns">
          
          <h3>{{$title}}</h3>
          @foreach ($content as $stat)
          <article class="blog_post">
             <div class="three columns">
             <a href="{{route('statya',['id'=>$stat->id])}}" class="th"><img src="{{asset('images/'.$stat->image)}}" alt="desc">
             </div>
             <div class="nine columns">
              <h4>{{$stat->title}}</h4>
              <p>{{$stat->lid}}</p>
              </a>
              @if (session('role')=='admin')
              </a>
            </div><div class="three columns"><form  action="">
              {{ csrf_field() }}

              <a href="{{route('formchange',['id'=>$stat->id,'name'=>$title])}}">Изменить</a>
            </form>
            <form  action="">
              {{ csrf_field() }}
              <input type=hidden name="_method" value="DELETE">  
              <a href="{{route('deletestat',['id'=>$stat->id,'rname'=>$title])}}">Удалить</a>
            </form>
          </div>
             @endif 
          </article>
          @endforeach

          
      </div>
      
    </div>
      
</section>


<!-- ######################## Section ######################## -->

<section>
   
   <div class="section_dark">
   <div class="row">       
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

 </body>
</html>

<!-- ######################## Footer ######################## -->  
@endsection