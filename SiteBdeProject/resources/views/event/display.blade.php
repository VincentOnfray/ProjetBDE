@extends("template")

@section('css')
<link rel="stylesheet" href="css/event_display.css" />
@endsection


@section('content')
  
<section>
	<div class="container">

		@if(auth()->user()->role == "BDE") 
		<div class="row">
			<div class="col-4-sm col-2-md">
	 			<a class="btn btn-primary" href="create_event" role="button">Organiser</a>
	 		</div>
	 	</div>
		@endif 

	</div>

	<div>
		@if($events != null)
			<div class="container">
				<div class="col-6-md">
					@foreach ($events as $event)  <!-- 2 Pour chaque évenement, on créé une section-->
						<?php //on traduit un prix de 0 en "gratuit"
							if($event->prix <= 0){$prix = "Gratuit";}
							else{$prix = ($event->prix/100)." €";}?>


						<div class="card" style="width: 20rem;">
							<img src={{$event->IDImage}} alt="illustration" class="illustration">
						  	<div class="card-block">
						    	<h4 class="card-title">{{$event->titre}}</h4>
						    	<p class="card-text">{{$event->Description}}</p>
						     	<p class="card-text">Date: {{$event->Date}}</p>
						    	<p class="card-text">{{$prix}}</p>
						   
								@if ($event->insc == 0)
								<form enctype="multipart/form-data" method="POST" action="/signUp_event">
									{{csrf_field()}}
									<input type='number' hidden="" value={{$event->id}} name='eventid'>
									<button class='insc btn btn-primary' type='submit'>S'inscrire</button>
								</form>
								@endif 
						  	</div>
						</div>

						@if($event->insc > 0)
							<button class='liked btn' >déjà inscrit</button>
							<form enctype="multipart/form-data" method="POST" action="/post_image"> <!-- mais il peut poster des images en lien -->
								{{csrf_field()}}
								<input type='number' hidden='' value={{$event->id}} name='eventid'>

								<div class="input-group mb-4 file">
							  		<div class="input-group-prepend"></div> 
							  
							  		<div class="custom-file">
							    		<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name='image'>
							    		<label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
							     		<button class='btn' type='submit'>Poster l'image</button>
							  		</div>
								</div>
							</form>
						@endif <!--7-->

						<div class="col-4-md">
						@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->
							<form enctype="multipart/form-data" method="POST" action="/delete_event">
								{{csrf_field()}}
								<input type='number' hidden="" value={{$event->id}} name='eventid'>
								<button class='delete btn' type='submit'>Supprimer</button>
							</form>
									
							<a href={{ asset("inscriptions\\inscription".$event->id.".txt"  ) }} download  class="btn btn-primary">telecharger la liste des inscrits</a>
										<!-- <a class="btn btn-primary" href="/ppdp" role="button"> -->
						@endif  
						@if(auth()->user()->role == "CESI") 
						<!-- <form enctype="multipart/form-data" method="POST" action="">
							{{csrf_field()}}
							<input type='number' hidden="" value={{$event->id}} name='eventid'> -->
							<button class='delete btn' type='submit'>Signaller au BDE</button>
						<!-- </form> -->
						@endif  

						@foreach ($event->images as $image)<!-- 8 images -->
						
						 	<?php $imgloc = 'img\\userpost\\'.$image->image;?>
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

								@if($image->hasLiked > 0) <!-- 6 Si l'utilisateur a déjà aimé, il ne peut plus le faire -->
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
							<!-- 3 -->
							<form enctype="multipart/form-data" method="POST" action="/post_comment">
								{{csrf_field()}}
								<input type='number' hidden='' value={{$image->id}} name='imageid'>
								<label for='comment'>Partage ta réaction: </label>
								<input type='text' name='comment'>
								<button class='post' type='submit'>Poster le commentaire</button>
						 	</form>

							@foreach ($image->comments as $comment)<!-- 8 commentaires -->
								<p>Commentaire de {{$comment->creator}}</p>
								<p>{{$comment->Contenu}}</p>
								<!-- 3 -->

								@if(auth()->user()->role == "BDE") <!-- 3 bouton de suppression BDE-->
									<form enctype="multipart/form-data" method="POST" action="/delete_comment">
										{{csrf_field()}}
										<input type='number' hidden="" value={{$comment->id}} name='commentid'>
										<button class='delete' type='submit'>Supprimer le commentaire</button>
									</form>
							
								@endif  <!-- 3 Suppression BDE -->

							@endforeach <!-- 8  -->

						@endforeach <!-- 8  -->
					@endforeach <!-- 2 -->
				</div>
			</div>
		@else
			<div class="empty">
				<p>Désolé pour l'instant aucun évènments n'ont été crée</p>		
			</div>
		@endif
	</div>
	
</section>

@endsection