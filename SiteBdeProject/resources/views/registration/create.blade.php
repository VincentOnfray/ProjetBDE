@extends("template")


<!-- page d'enregistrement d'evenement-->
@section('css')
<link rel="stylesheet" type="text/css" href="css/register.css">
@endsection

@section('content')

<h1> Rejoins Nous!</h1>



<form id=register method="POST" action="/register">
	
	{{csrf_field()}}

	<div class="form group">
		<label for="name">Prenom:</label>
		<input type="text" class="form_control" id="name" name="name">
	</div>

	<div class="form group">
		<label for="surname">Nom:</label>
		<input type="text" class="form_control" id="surname" name="surname">
	</div>

	<div class="form group">
		<label for="email">Adresse E-Mail:</label>
		<input type="email" class="form_control" id="email" name="email">
	</div>

	<div class="form group">
		<label for="password">Mot de Passe:</label>
		<input type="password" class="form_control" id="password" name="password">
	</div>


	<div class="form group">

		<label for="role">Role:</label>

		<select name="role">

    		<option value="Etudiant" selected="selected">Etudiant</option>

    		<option value="CESI">Observateur CESI</option>

    		<option value="BDE">Membre BDE</option>

		</select>

	</div>




	<div class="form group">

		<label for="centre">Centre:</label>

		<select name="centre">

    		<?php
		$centres= DB::connection('BDDnat')->select('select * from centre');

			 foreach ($centres as $centre) 	
     {
    ?>
      <option value= <?php echo $centre->id; ?> ><?php echo $centre->Ville; ?></option>
    <?php
     }
    ?>
			
		}
	?>
		</select>

	</div>
	<div class="form group check" href="/ppdp">
			<label for="check" href="/ppdp">J'accepte les conditions d'utilisation du site</label>

			<input type="checkbox" name="check" class="check">
			<a class="btn btn-primary" href="/ppdp" role="button">Politique de protection des données</a>
		
			
	</div>

	<div class="form button">

	


		 <button style="cursor:pointer" type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
        
	</div>

	<div>
		
		{!! $errors->first('password','<h3>Erreurs:</h3><p class="help">Mot de passe non valide (doit contenir 1 majuscule, 1 minuscule, 1 chiffre et faire au moins 6 caractères) </p>') !!}
		{!! $errors->first('Surname','<p class="help">Nom de famille non-valide</p>') !!}
		{!! $errors->first('name','<p class="help">Prénom non-valide</p>') !!}
		{!! $errors->first('email','<p class="help">email non-valide</p>') !!}
		
	</div>
</form>
	
 
	


@endsection