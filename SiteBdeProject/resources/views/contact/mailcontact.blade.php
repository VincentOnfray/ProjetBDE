@extends ('template')


@section('css')
<link rel="stylesheet" type="text/css" href="css/mailcontact.css">
@endsection


@section ('content')
<h1>Contactez nous !</h1>
<form id=contact method="POST" action="/contact">
	<input type="hidden" name="token" value="{{csrf_token()}}">
	{{csrf_field()}}
		<div>
          <label for="mail">E-mail:</label> <input type="email" id="mail" name="email">
        </div>

        <div>
          <label for="objet">Objet :</label> <input type="text" id="objet" name="objet">
        </div>
        
        <div>
          <label for="msg">Message:</label> <textarea id="msg" name="message"></textarea>
        </div>
        <div class="button">
          <button type="submit">Envoyer le mail</button>
        </div>

</form>


@endsection