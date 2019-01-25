@extends ('template')

@section('css')
<link rel="stylesheet" type="text/css" href="css/contact.css">
@endsection


@section ('content')
<h1>Contacter le BDE</h1>

<div class="flex-container">

<div><h2 id="tel"><i class="fas fa-headset"></i>Téléphone</h2>
<p id="teltext">Vous pouvez appelez un membre du BDE
<br>Service & appel gratuit de 9h à 12h et de 14h à 17h du lundi au vendredi.
<br>La réactivité de réponse des services dépend de la disponibilité de chaque membre du BDE.
<br>Numéro du Cesi : <em>0 800 054 568</em>
</p>
</div>

<div><h2 id="mail"><a href="/mailcontact"><i class="far fa-envelope"></i>Mail</a></h2>
<p id="mailtext">Contacter le BDE facilement grâce à une formulaire de contact.
	<br><em>Notes</em> : Les membres du BDE regardent souvent leur courrier électronique.</p>
</div>
</div>

@endsection