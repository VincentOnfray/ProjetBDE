@extends("template")


<!-- page de login d'utilisateur-->

@section('content')

<h1> Bon retour parmis nous </h1>
<form method="POST" action="/login">
	
	{{csrf_field()}}
	<div class="form group">
		<label for="email">Adresse E-Mail:</label>
		<input type="email" class="form_control" id="email" name="email">
	</div>

	<div class="form group">
		<label for="password">Mot de Passe:</label>
		<input type="password" class="form_control" id="password" name="password">
	</div>


	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
        
	</div>

	


@endsection