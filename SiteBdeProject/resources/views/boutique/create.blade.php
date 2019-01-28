@extends("template")


<!-- page d'enregistrement d'idée-->

@section('content')

<h1> Ajouter un produit</h1>
<form enctype="multipart/form-data" method="POST" action="/create_item"  > 

	
	{{csrf_field()}}

	


	<div class="form group">
		<label for="titre">Titre de l'évenement</label>
		<input type="text" class="form_control"  id="titre" name="titre">
	</div>

	<div class="form group">
		<label for="description">Description de l'évenement</label>
		<input type="text" class="form_control"  name="description">
	</div>

	

	
    <div class="custom-file">
         <label class="custom-file-label" for="image">Image d'Illustration (obligatoire) :</label>
         <input type="file" id="image" name="image" >
    </div>





	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary"  >Publier</button>
    </div>
        
	
</form>

	
	<div>

		
		{!! $errors->first('description','<p class="help">description non-valide </p>') !!}
		{!! $errors->first('titre','<p class="help">Il faut un titre valide </p>') !!}
		{!! $errors->first('image','<p class="help">Image invalide</p>') !!}
		
		

	</div>

	
 



@endsection
