@extends('menu.menu')

@section('content')
	<div class="main">
		<div class="row">
			<div class="hover"></div>
			<div class="title"></div>
			<div class="row--small grid between">
				<div class="content driver-page">
					<div class="driver-page-photo">
					@if (isset($leader))<img src="{{ asset('image')}}/{{ $leader->foto_leader }}">@endif
					</div>	
					<div class="driver-page-name">
					@if (isset($leader))
					<h3>{{$leader->first_name_leader}} {{$leader->second_name_leader}} {{$leader->patronymic_leader}}</h3>
					@elseif (isset($id_user)) <h7>{{$user->FIO_user}}</h7>
					@endif
				</div>
					<div class="driver-page-text">
						<div class='my'>
						<div class="driver-page-my">Мои мастер-классы</div>
						<table class="driver-page-table">
							<tbody>
							@foreach($masterclass as $mc)
    							@if(strtotime($mc->date_MC) > time())
       							 <tr>
									<td>{{date('d.m.Y H:i', strtotime($mc->date_MC))}}</td>
									<td>
										<p>{{$mc->name_MC}}</p>
										
										@if (isset($leader))
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
									</td>
									@if (isset($leader))
										<td><a href="/change/{{$mc->id_MC}}">Редактировать мастер-класс</a></td>
									@endif
								</tr>
								@endif
							@endforeach

							</tbody>
						</table>
					</div>
</div>
					<div class="driver-page-btn-wrapper">
					@if (isset($leader))
						<div class="driver-page-btn btn">
						<a href="/add">Добавить мастер-класс</a>
						</div>
		@endif
					</div>
				</div>
				<ul class="menu">
	
				@foreach($categories as $category)
					<li><a href="/category/{{$category->id_category}}">{{$category->name_category}}</a></li>
					@endforeach

			</div>

		</div>	
	</div>
	<div class="row row--nogutter">
		<div class="line"></div>
	</div>
@endsection