@extends("template")

@section('css')
<link rel="stylesheet" type="text/css" href="css/form.css">
@endsection

<!-- page d'enregistrement d'idée-->
@if( auth()->check() )
@section('content')

<h1> La parole au peuple</h1>
<form class='form' enctype="multipart/form-data" method="POST" action="/create_idea"  > 

	
	{{csrf_field()}}

	


	<div class="group">
		<label for="titre">Titre de l'évenement</label>
		<input type="text" class="form_control"  id="titre" name="titre">
	</div>

	<div class="group">
		<label for="description">Description de l'évenement</label>
		<input type="text" class="form_control"  name="description">
	</div>


    <div class="group">
         <label for="description">Image d'illustration: (Obligatoire) </label>
         <input type="file" id="image" name="image" >
    </div>

	<div class="group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary"  >Publier</button>
    </div>
        
	
</form>

	
	<div>

		
		{!! $errors->first('description','<p class="help">description non-valide </p>') !!}
		{!! $errors->first('titre','<p class="help">Il faut un titre valide </p>') !!}
		{!! $errors->first('image','<p class="help">Image invalide</p>') !!}
		
		

	</div>

	
 



@endsection
@endif