@extends("template")


<!-- page de login d'utilisateur-->
@section('css')
<link rel="stylesheet" type="text/css" href="css/form.css">
@endsection
@section('content')

<h1> Bon retour parmis nous !</h1>
<form class='form' method="POST" action="/login">
	
	{{csrf_field()}}
	<div class="group">
		<label for="email">Adresse E-Mail:</label>
		<input type="email" class="form_control" id="email" name="email">
		{!! $errors->first('email','<p class="help">email invalide</p>') !!}
	</div>

	<div class="group">
		<label for="password">Mot de Passe:</label>
		<input type="password" class="form_control" id="password" name="password">
		{!! $errors->first('password','<p class="help">mot de passe invalide</p>') !!}
	</div>


	<div class="button">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary">Login</button>
        </div>
        
	
</form>


@endsection