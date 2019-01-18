@extends("template")




@section('content')
<h1> Register Below</h1>
<form method="POST" action="/register">
	
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
		<label for="mail">Adresse E-Mail:</label>
		<input type="email" class="form_control" id="mail" name="mail">
	</div>

	<div class="form group">
		<label for="password">Mot de Passe:</label>
		<input type="password" class="form_control" id="password" name="password" value=''>
	</div>

	<div class="form group">
		<label for="checkPW">Verification Mot de Passe:</label>
		<input type="password" class="form_control" id="checkPW" name="checkPW">
	</div>
	<div class="form group">
		<label for="role">Role:</label>
		<input type="text" class="form_control" id="role" name="role">
	</div>
	<div class="form group">
		<label for="center">ID centre:</label>
		<input type="text" class="form_control" id="center" name="center">
	</div>

	<div class="form group">
		 <button style="cursor:pointer" type="submit" class="btn btn-primary">S'inscrire</button>
        </div>
        
	</div>

	


@endsection