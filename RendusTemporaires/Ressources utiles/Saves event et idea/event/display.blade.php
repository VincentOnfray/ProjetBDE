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

	<?php

	$events = DB::connection('BDDlocal')->Select("SELECT * FROM evenement ORDER BY id ");
	?>
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
	
	<?php 
		$illustration = DB::connection('BDDlocal')->select("call getImage('".$event->IDImage."');");
		$imgloc = 'img\\userpost\\'.$illustration[0]->image;
		?>	

			<img src={{$imgloc}} alt="illustration" class="illustration">



		@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->



					<form enctype="multipart/form-data" method="POST" action="/delete_event">


						{{csrf_field()}}

						<input type='number' hidden="" value={{$event->id}} name='eventid'>


						<button class='delete' type='submit'>Supprimer</button>


					</form>
		@endif  <!-- 3 Suppression BDE -->

		@if(auth()->user()->role == "CESI") <!-- 4 bouton de REPORT à finir -->



		<!-- <form enctype="multipart/form-data" method="POST" action="">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$event->id}} name='eventid'> -->


			<button class='delete' type='submit'>Signaller au BDE</button>


		</form>
		 @endif  <!-- 4  REPORT -->


		 @if(auth()->check())  <!-- 5  inscription-->

			<?php  //on  récupère les lignes correspondantes au couple utilisateur et idée, et on affiche ou non l'option de like si l'utilisateur a dejà ou non supporté l'evenement
			$likeChecker = DB::connection('BDDlocal')->select("call checkInsc('".$event->id."','".auth()->user()->id."');");
			?>
		

			@if (count($likeChecker) == 0) <!-- 6 si le retour est de 0 lignes, l'utilisateur n'est pas inscrit, il en a donc l'option -->

			<form enctype="multipart/form-data" method="POST" action="/signUp_event">


			{{csrf_field()}}

			<input type='number' hidden="" value={{$event->id}} name='eventid'>


			<button class='support' type='submit'>S'inscrire</button>


		</form>
				@endif <!-- 6 -->


				@if(count($likeChecker) > 0) <!-- 7 Si l'utilisateur est deja inscrit, il ne peut plus le faire -->


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
		<?php 
			$images = DB::connection('BDDlocal')->Select("call getImages('".$event->id."');");
		 ?>

		 @foreach ($images as $image)<!-- 8 images -->
		 <div class="imgdiv">
		 <?php 
		 $imgloc = 'img\\userpost\\'.$image->image;
		 $creator = DB::connection('BDDnat')->select("call getUser('".$image->IDCreateur."');");
		  ?>
		  <p>Image postée par {{$creator[0]->name}} {{$creator[0]->surname}}</p>
		  <img src={{$imgloc}} alt="images" class="images">
		  <p>{{$image->likes}} "j'aime"</p>



		  @if(auth()->check())  <!--  Secction "Likes"-->

				<?php  //on  récupère les lignes correspondantes au couple utilisateur et image, et on affiche ou non l'option de like si l'utilisateur a dejà ou non aimé l'image 
					$likeChecker = DB::connection('BDDlocal')->select("call checkLike('".$image->id."','".auth()->user()->id."');");
				?>
		

				@if (count($likeChecker) == 0) <!-- 5 si le retour est de 0 lignes, l'utilisateur n'a pas aimé l'image, il en a donc l'option -->

					<form enctype="multipart/form-data" method="POST" action="/like_image">


							{{csrf_field()}}

							<input type='number' hidden="" value={{$image->id}} name='imageid'>


							<button class='support' type='submit'>J'aime</button>


					</form>
				@endif <!-- 5 -->


				@if(count($likeChecker) > 0) <!-- 6 Si l'utilisateur a déjà aimé, il ne peut plus le faire -->


					<button class='liked' >déjà aimé</button>

				@endif <!--6  -->

		@endif <!-- LIKES-->




		 
		  <!-- //Section commentaires: -->
			<div class="Commentsdiv">

				<form enctype="multipart/form-data" method="POST" action="/post_comment">


					{{csrf_field()}}
					
					<input type='number' hidden='' value={{$image->id}} name='imageid'>
					<label for='comment'>Partage ta réaction: </label>
					<input type='text' name='comment'>


					<button class='post' type='submit'>Poster le commentaire</button>

					
		 		</form>




				<?php 
					$comments = DB::connection('BDDlocal')->Select("call getComments('".$image->id."');");
				?>

				 @foreach ($comments as $comment)<!-- 8 commentaires -->
					 <div class="commdiv">
						 <?php 
						
						 $creator = DB::connection('BDDnat')->select("call getUser('".$comment->IDCreateur."');");
						  ?>
						  <p>Commentaire de {{$creator[0]->name}} {{$creator[0]->surname}}</p>
						  <p>{{$comment->Contenu}}</p>
					</div>

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