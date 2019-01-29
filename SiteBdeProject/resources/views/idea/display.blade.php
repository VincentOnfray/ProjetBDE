@extends("template")

@section('css')
<link rel="stylesheet" href="css/idea_display.css" />
@endsection


@section('content')
	@if(auth()->check())  <!-- 1 -->
		<a href="create_idea">proposer</a>
		<div id="content">
			@foreach ($ideas as $idea)  <!-- 2 Pour chaque idée, on créé une DIV et tous les elements correspondants -->
				<div class="ideadiv">
					<div class="card">
						<h3>{{$idea->titre}}</h3> <br>
						<p>{{$idea->description}}</p><br>
						<p>Supports: {{$idea->likes}}</p><br>
						<img src={{$idea->IDImage}} alt="illustration" class="illustration">
					</div>

					@if(auth()->user()->role == "BDE") <!-- 3 -->
						<form enctype="multipart/form-data" method="POST" action="/delete_idea">
							{{csrf_field()}}
							<input type='number' hidden="" value={{$idea->id}} name='ideaid'>
							<button class='delete' type='submit'>Supprimer</button>
						</form>
					@endif  <!-- 3 -->

					@if(auth()->user()->role == "CESI") <!-- bouton de REPORT à finir -->
						<!-- <form enctype="multipart/form-data" method="POST" action="/delete_idea">
						{{csrf_field()}}
						<input type='number' hidden="" value={{$idea->id}} name='ideaid'> -->
						<button class='delete' type='submit'>Signaller au BDE</button>
						<!-- </form> -->
					@endif

					@if(auth()->check())  <!--  4 Supports-->
						@if ($idea->hasLiked == 0) <!-- 5 si le retour est de 0 lignes, l'utilisateur n'a pas supporté l'idée, il en a donc l'option -->
							<form enctype="multipart/form-data" method="POST" action="/support_idea">
								{{csrf_field()}}
								<input type='number' hidden="" value={{$idea->id}} name='ideaid'>
								<button class='support' type='submit'>Supporte cette proposition</button>
							</form>
						@endif <!-- 5 -->

						@if($idea->hasLiked > 0) <!-- 6 Si l'utilisateur a déjà supporté, il ne peut plus le faire -->
							<button class='liked' >déjà supporté</button>
						@endif <!-- 6 -->
					@endif <!-- 4-->
				</div>
			@endforeach <!-- 2 -->
		</div>
	@endif <!-- 1 -->
@endsection