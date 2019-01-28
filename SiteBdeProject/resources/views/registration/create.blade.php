@extends("template")


<!-- page d'enregistrement d'evenement-->
@section('css')
<link rel="stylesheet" type="text/css" href="css/register.css">
@endsection

@section('content')

<h1> Rejoins Nous!</h1>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>


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
	<div class="form group" href="/ppdp">
			<label for="check" href="/ppdp">J'accepte les conditions d'utilisation du site: </label>

			<input type="checkbox" name="check">
			<a class="btn btn-primary" href="/ppdp" role="button">Politique de protection des données</a>
			<button class="btn btn-primary" type="submit">Button</button>
			
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