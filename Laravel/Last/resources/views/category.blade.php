@extends('menu.menu')

@section('content')
	<div class="main">
		<div class="row">
			<div class="hover"></div>
			<div class="title">@if (isset($content)){{$content->name_category}}
				@else Выберите категорию
				@if (isset($message))
				<p>{{$message}}</p>
				@endif
				@endif</div>
				
			<div class="row--small grid between">
				@if (isset($content))
				<div class="content">
				@else 
				<div class="content" style="position:relative;visibility:hidden; ">
				@endif
				@if (isset($content))
					<img src="{{ asset('image')}}/{{ $content->foto_category }}">
					<p>{{$content->description1}}</p>
					<p>{{$content->description2}}</p>
					<p>{{$content->description3}}</p>
					<p>{{$content->description4}}</p>
					@endif
				</div>
				<ul class="menu">

				@foreach($categories as $category)
					<li><a href="/category/{{$category->id_category}}">{{$category->name_category}}</a></li>
					@endforeach
			

				</ul>
			</div>
			<div class="row shedule">
			@if (isset($content))
				<div class="row--small">
					<h2>Расписание</h2>
					<div class="drivers">
						@foreach ($masterclass as $mc)
						@if(strtotime($mc->date_MC) > time())
						<div class="driver grid">
							<div class="driver-left grid">
								<div class="driver-photo">
									
					<img src="{{ asset('image')}}/{{ $mc->foto_leader }}" width=100px>
								</div>
								<div class="driver-text">
									<div class="driver-name">{{$mc->first_name_leader}} {{$mc->second_name_leader}} {{$mc->patronymic_leader}}</div>
									<div class="driver-name">{{$mc->name_MC}} </div>
									<div class="driver-desc">{{$mc->description_MC}}
									</div>
									@if (isset($admin)&&$admin==1&&isset($zapis))
											<p>Участники:</p>
											@foreach($zapis as $row)
											
												@if ($row->id_MC==$mc->id_MC)
													<p>
														{{$row->FIO_user}}<br>
														email: {{$row->email_user}} <br>
														tel: {{$row->telephone_user}}
													</p>
												@endif
											@endforeach
										@endif
								</div>
							</div>
							<div class="driver-right">
							@if((isset($id_user)))	
							@if ($admin==0)	
							@php 
							$check=false;					
							@endphp	
							@foreach ($records as $record)
    							@if ($record['id_MC'] == $mc->id_MC)
									@php 
									$check=true;
									break;
									@endphp
								@endif
							@endforeach
								@if(!$check)
								<button class=""><a href='/confirmation/{{$mc->id_MC}}'>Записаться</a></button>
								@else
								<form style="display:inline-block;" action="{{ route('unsubscribe', ['id' => $mc->id_MC]) }}" method="POST">
									@csrf
									@method('DELETE')
									<button type="submit"><a>Отписаться</a></button>
								</form>
								@endif
							@endif
							@endif
						
								<div class="driver-time">{{date('d.m.Y', strtotime($mc->date_MC))}} {{date('H:i', strtotime($mc->date_MC))}}</div>
							</div>	
						</div>
						@endif
						@endforeach

					</div>
				</div>
			</div>

			@endif
		</div>	
	</div>
@endsection			