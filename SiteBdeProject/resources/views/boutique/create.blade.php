@extends("boutique.shop")


<!-- page d'enregistrement d'idée-->

@section('page')

<h1> Ajouter un produit</h1>
<form enctype="multipart/form-data" method="POST" action="/create_item"  > 

	
	{{csrf_field()}}

	


	<div class="form group">
		<label for="name">Nom de L'article</label>
		<input type="text" class="form_control"  id="name" name="name">
	</div>

	<div class="form group">
		<label for="description">Description de l'article</label>
		<input type="text" class="form_control"  name="description">
	</div>

	<div class="form group">
			<label for="category">Catégorie</label>
		<select name="category">

    		<option value="vetement" >Vetements</option>

    		<option value="goodies">Goodies</option>

    		<option value="autres" selected="selected">Autre</option>

		</select>

	
	</div>

	<div class="form group">
			<label for="price">Prix (€)</label>
			<input type="number" class="form_control"  id="price" name="price" step="0.01">
	</div>

    <div class="custom-file">
         <label class="custom-file-label" for="image">Image d'Illustration (obligatoire) :</label>
         <input type="file" id="image" name="image" >
    </div>





	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary"  >Ajouter a la boutique</button>
    </div>
        
	
</form>

	
	<div>

		
		
		{!! $errors->first('image','<p class="help">Image invalide</p>') !!}
		
		

	</div>

	
 



@endsection
