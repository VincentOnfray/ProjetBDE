@extends("template")


<!-- page d'enregistrement d'evenement -->
@if( auth()->user()->role == 'BDE' )
@section('content')

<h1> Organise un max!</h1>
<form enctype="multipart/form-data" method="POST" action="/create_event"  > 

	
	{{csrf_field()}}

	


	<div class="form group">
		<label for="titre">Titre de l'évenement</label>
		<input type="text" class="form_control"  id="titre" name="titre">
	</div>

	<div class="form group">
		<label for="description">Description de l'évenement</label>
		<input type="text" class="form_control"  name="description">
	</div>

	<div class="form group">
		<label for="date">Date de l'évenement</label>
		<input type="date" class="form_control"  name="date">
	</div>

	<div class="form group">

		<label for="recurrence">Fréquence</label>

		<select name="recurrence">

    		<option value="no" selected="selected">Unique</option>

    		<option value="weekly">Hebdomadaire</option>

    		<option value="monthly">Mensuelle</option>

		</select>


		<label for="nbrecurrence">Nombre de récurrences</label>

		
		<input type="number" class="form_control"  name="nbrecurrence" value='1'>
	</div>


	</div>




	<div class="form group">
		<label for="prix">Prix d'entrée (€):</label>
		<input type="number" class="form_control"  name="prix" value="0">
	</div>


	<div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}"  >
                <div class="custom-file">
                	 <label class="custom-file-label" for="image"></label>
                    <input type="file" id="image" name="image" >
                   
                   
                </div>





	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary"  >Publier</button>
        </div>
        
	</div>
</form>

	
	<div>

		
		{!! $errors->first('description','<p class="help">description non-valide</p>') !!}
		{!! $errors->first('titre','<p class="help">Il faut un titre valide</p>') !!}
		{!! $errors->first('date','<p class="help">date invalide</p>') !!}
		{!! $errors->first('image','<p class="help">image invalide</p>') !!}
		
		

	</div>

	
 



@endsection
@endif