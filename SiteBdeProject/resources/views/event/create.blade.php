@extends("template")

@section('css')
<link rel="stylesheet" type="text/css" href="css/form.css">
@endsection
<!-- page d'enregistrement d'evenement -->
@if( auth()->user()->role == 'BDE' )

@section('content')
<section>
<h1> Organise un max!</h1>
	<form class='form' enctype="multipart/form-data" method="POST" action="/create_event"  > 
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
			<label for="date">Date de l'évenement</label>
			<input type="date" class="form_control"  name="date">
		</div>

		<div class="group">
			<label for="recurrence">Fréquence</label>

			<select name="recurrence">
	    		<option value="no" selected="selected">Unique</option>
	    		<option value="weekly">Hebdomadaire</option>
	    		<option value="monthly">Mensuelle</option>
			</select>

			<label for="nbrecurrence">Nombre de récurrences</label>

			<input type="number" class="form_control"  name="nbrecurrence" value='1' >
		</div>


		<div class="group">
			<label for="prix">Prix d'entrée (€):</label>
			<input type="number" class="form_control"  minimum='0' name="prix" value="0" step="0.01">
		</div>


		<div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}"  >

	        <div class="group">
	            <label for="description">Image de l'évènement: (Obligatoire)</label>
	            <input type="file" id="image" name="image" >        
	        </div>

			<div class="group">
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


</section>
	
@endsection
@endif