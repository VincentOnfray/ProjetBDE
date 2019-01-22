@extends("template")


<!-- page d'enregistrement d'utilisateur, le choix de rôle est provisoire, la gestion n'etant pas explicitement demandée dans le sujet, sa priorité est plus faible que d'autres fonctionnalité-->

@section('content')

<h1> Organise un max!</h1>
<form method="POST" action="/register">
	
	{{csrf_field()}}

	<div class="form group">
		<label for="titre">Titre de l'évenement</label>
		<input type="text" class="form_control" id="titre" name="titre">
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

	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
        
	</div>

	<div>

		{!! $errors->first('password','') !!}
		{!! $errors->first('Surname','<p class="help">Nom de famille non-valide</p>') !!}
		{!! $errors->first('name','<p class="help">Prénom non-valide</p>') !!}
		{!! $errors->first('email','<p class="help">email non-valide</p>') !!}

	</div>

	
 
	


@endsection