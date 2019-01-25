@extends("template")

@section('css')
<link rel="stylesheet" href="css/idea_display.css" />
@endsection




@section('content')
@if(auth()->check())  <!-- 1 -->

	<a href="create_idea">proposer</a>


	<?php

	$ideas = DB::connection('BDDlocal')->Select("SELECT * FROM proposition ORDER BY likes DESC");
	?>
	<!-- Cette boucle créé simplement -->
	@foreach ($ideas as $idea)  <!-- 2 Pour chaque idée, on créé une DIV et tous les elements correspondants -->
		
		<div class="ideadiv">
		<h3>{{$idea->titre}}</h3> <br>
		<p>{{$idea->description}}</p><br>
		<p>Supports: {{$idea->likes}}</p><br>


		<?php 
		$image = DB::connection('BDDlocal')->select("call getImage('".$idea->IDImage."');");
		$imgloc = 'img\\userpost\\'.$image[0]->image;
		?>




		<img src={{$imgloc}} alt="illustration" class="illustration">



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


		</form>
		@endif

		 @if(auth()->check())  <!--  Supports-->

			<?php  //on  récupère les lignes correspondantes au couple utilisateur et idée, et on affiche ou non l'option de like si l'utilisateur a dejà ou non supporté l'evenement
			$likeChecker = DB::connection('BDDlocal')->select("call checkSupport('".$idea->id."','".auth()->user()->id."');");
			?>
		

			@if (count($likeChecker) == 0) <!-- 5 si le retour est de 0 lignes, l'utilisateur n'a pas supporté l'idée, il en a donc l'option -->

			<form enctype="multipart/form-data" method="POST" action="/support_idea">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$idea->id}} name='ideaid'>


			<button class='support' type='submit'>Supporte cette proposition</button>


		</form>
				@endif <!-- 5 -->


				@if(count($likeChecker) > 0) <!-- 6 Si l'utilisateur a déjà supporté, il ne peut plus le faire -->


			<button class='liked' >déjà supporté</button>

			@endif <!-- 6 -->
		@endif <!-- 4-->


		</div>

	@endforeach <!-- 2 -->

	
	
@endif <!-- 1 -->
@endsection