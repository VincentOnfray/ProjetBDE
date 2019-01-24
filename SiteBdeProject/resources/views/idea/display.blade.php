@extends("template")

@section('css')
<link rel="stylesheet" href="css/idea_display.css" />
@endsection




@section('content')
@if(auth()->check())
	<a href="create_idea">proposer</a>


	<?php

	$ideas = DB::connection('BDDlocal')->Select("SELECT * FROM proposition");
	?>
	<!-- Cette boucle créé simplement -->
	@foreach ($ideas as $idea) 
		
		<div class="ideadiv">
		<h3>{{$idea->titre}}</h3> <br>
		<p>{{$idea->description}}</p><br>

		<?php 
		$image = DB::connection('BDDlocal')->select("call getImage('".$idea->IDImage."');");
		$imgloc = 'img\\userpost\\'.$image[0]->image;
		?>




		<img src={{$imgloc}} alt="illustration" class="illustration">



		@if(auth()->user()->role == "BDE")



		<form enctype="multipart/form-data" method="POST" action="/delete_idea">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$idea->id}} name='ideaid'>


			<button class='delete' type='submit'>Supprimer</button>


		</form>
		@endif


		</div>

	@endforeach

	
	
@endif
@endsection