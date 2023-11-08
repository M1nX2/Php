@extends('menu.menu')
<!-- END main menu -->
        
<!-- ######################## Header (featured posts) ######################## -->
@section('content')
<header>
   

        <div class="row">
        
        <h1>Новости науки</h1>
        
</header>
      
<!-- ######################## Section ######################## -->

<section>

  <div class="section_main">
   
      <div class="row">
      
          <section class="eight columns">          
         
          
          
          @foreach ($content as $stat)
          <article class="blog_post" style="padding:10px;">
    <div class="three columns">
        <a href="{{route('statya',['id'=>$stat->id])}}" class="th">
            <img src="{{asset('images/'.$stat->image)}}" alt="desc">
        </a>
    </div>
    <div class="nine columns">
        <a href="{{route('statya',['id'=>$stat->id])}}" class="th">
            <h4>{{$stat->title}}</h4>
            <p> {{$stat->lid}}</p>
        </a>
        @if (session('role')=='admin')
            <br>
            <div style="width:80%;">
                <form action="">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">  
                    <a href="{{route('deletestat',['id'=>$stat->id,'rname'=>$stat->rubric])}}">Удалить</a>
                </form>
                <form action="">
                    {{ csrf_field() }}
                    <a href="{{route('formchange',['id'=>$stat->id,'name'=>$stat->rubric])}}">Изменить</a>
                </form>
            </div>
        @endif 
    </div>
</article>
          @endforeach        
                   
          </section>
          
      
         
          
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


<!-- ######################## Footer ######################## -->  
      

</body>
</html>
@endsection