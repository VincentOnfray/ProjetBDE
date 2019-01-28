@extends("template")

@section('css')
<link rel="stylesheet" href="css/event_display.css" />
@endsection




@section('content')
@if(auth()->check())  <!-- 1 -->
<div class="main">	

	 @if(auth()->user()->role == "BDE") <!-- 1 BDE  -->
	<a href="create_event">organiser</a>
	@endif <!-- 1 BDE  -->

	<!-- Cette boucle créé simplement -->



	@foreach ($events as $event)  <!-- 2 Pour chaque évenement, on créé une section-->
		
		<div class="eventdiv">
		<h3>{{$event->titre}}</h3> <br>
		<p>{{$event->Description}}</p><br>
		<p>Prévu pour le: {{$event->Date}}</p><br>

			<?php //on traduit un prix de 0 en "gratuit"
				if($event->prix <= 0){
					$prix = "Gratuit";
				}
				else{
					$prix = $event->prix." €";
				}
			?>

		<p>Prix: {{$prix}} </p>
	
	

			<img src={{$event->IDImage}} alt="illustration" class="illustration">



		@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->

				<div>

					<form enctype="multipart/form-data" method="POST" action="/delete_event">


						{{csrf_field()}}

						<input type='number' hidden="" value={{$event->id}} name='eventid'>


						<button class='delete' type='submit'>Supprimer</button>


					</form>
				</div>
				<div>
					<a href={{ asset("D:\wamp642\www\ProjetBDE\SiteBdeProject\storage\app\public\inscriptions\".$event->id.".png") }}>telecharger la liste des liste des isncrits</a>
				</div>
		@endif  <!-- 3 Suppression BDE -->

		@if(auth()->user()->role == "CESI") <!-- 4 bouton de REPORT à finir -->



		<!-- <form enctype="multipart/form-data" method="POST" action="">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$event->id}} name='eventid'> -->


			<button class='delete' type='submit'>Signaller au BDE</button>


		</form>
		 @endif  <!-- 4  REPORT -->


		 @if(auth()->check())  <!-- 5  inscription-->

			
		

			@if ($event->insc == 0) <!-- 6 si le retour est de 0 lignes, l'utilisateur n'est pas inscrit, il en a donc l'option -->

			<form enctype="multipart/form-data" method="POST" action="/signUp_event">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$event->id}} name='eventid'>


			<button class='support' type='submit'>S'inscrire</button>


		</form>
				@endif <!-- 6 -->


				@if($event->insc > 0) <!-- 7 Si l'utilisateur est deja inscrit, il ne peut plus le faire -->


			<button class='liked' >déjà inscrit</button>


			<form enctype="multipart/form-data" method="POST" action="/post_image"> <!-- mais il peut poster des images en lien -->


				{{csrf_field()}}
				
				<input type='number' hidden='' value={{$event->id}} name='eventid'>
				<label for='image'>Postez une image de l'évenement: </label>
				<input type='file' name='image'>


				<button class='post' type='submit'>Poster l'image</button>
		 	</form>

			@endif <!--7-->
		@endif <!-- 5-->






	</div>
	<br>
	<div class="imagesdiv">
		

		 @foreach ($event->images as $image)<!-- 8 images -->
		 <div class="imgdiv">
		 <?php 
		 $imgloc = 'img\\userpost\\'.$image->image;
		  ?>
		  <p>Image postée par {{$image->creator}}</p>
		  <img src={{$imgloc}} alt="images" class="images">
		  <p>{{$image->likes}} "j'aime"</p>



		  @if(auth()->check())  <!--  Section "Likes"-->

				
		

				@if (	$image->hasLiked == 0) <!-- 5 si le retour est de 0 lignes, l'utilisateur n'a pas aimé l'image, il en a donc l'option -->

					<form enctype="multipart/form-data" method="POST" action="/like_image">


							{{csrf_field()}}

							<input type='number' hidden="" value={{$image->id}} name='imageid'>


							<button class='support' type='submit'>J'aime</button>


					</form>
				@endif <!-- 5 -->


				@if(	$image->hasLiked > 0) <!-- 6 Si l'utilisateur a déjà aimé, il ne peut plus le faire -->


					<button class='liked' >déjà aimé</button>

				@endif <!--6  -->



		@endif <!-- LIKES-->

		@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->



					<form enctype="multipart/form-data" method="POST" action="/delete_image">


						{{csrf_field()}}

						<input type='number' hidden="" value={{$image->id}} name='imageid'>


						<button class='delete' type='submit'>Supprimer l'image</button>


					</form>
		@endif  <!-- 3 Suppression BDE -->




		 
		  <!-- //Section commentaires: -->
			<div class="Commentsdiv">
				<div>
				<form enctype="multipart/form-data" method="POST" action="/post_comment">


					{{csrf_field()}}
					
					<input type='number' hidden='' value={{$image->id}} name='imageid'>
					<label for='comment'>Partage ta réaction: </label>
					<input type='text' name='comment'>


					<button class='post' type='submit'>Poster le commentaire</button>

					
		 		</form>

		 		</div>



				

				 @foreach ($image->comments as $comment)<!-- 8 commentaires -->
					 <div class="commdiv">
						 
						  <p>Commentaire de {{$comment->creator}}</p>
						  <p>{{$comment->Contenu}}</p>
					</div>
					<div>
					@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->



					<form enctype="multipart/form-data" method="POST" action="/delete_comment">


						{{csrf_field()}}

						<input type='number' hidden="" value={{$comment->id}} name='commentid'>


						<button class='delete' type='submit'>Supprimer le commentaire</button>


					</form>
				</div>
		@endif  <!-- 3 Suppression BDE -->

				 @endforeach <!-- 8  -->

			</div>
		  <!-- Section commentaires^ -->








		</div> <!-- div d'image indiv  -->

		 @endforeach <!-- 8  -->

	</div><!-- Div des images -->
	@endforeach <!-- 2 -->
</div>
	
	
@endif <!-- 1 -->
@endsection