@extends ('template')

@section('css')
<link rel="stylesheet" type="text/css" href="css/contact.css">
@endsection


@section ('content')
<h1>Contacter le BDE</h1>

<h2 id="tel"><a href="/telephonecontact"><i class="fas fa-headset"></i>Téléphone</a></h2>
<p>Appelez un membre du BDE
Service & appel gratuit de 9h à 12h et de 14h à 17h du lundi au vendredi.
La réactivité de réponse des services dépend de la disponibilité de chaque membre du BDE.
Numéro du Cesi : <em>0 800 054 568</em>
</p>

<h2 id="mail"><a href="/mailcontact"><i class="far fa-envelope"></i>Mail</a></h2>
<p>Contacter le BDE facilement grâce à une formulaire de contact.
	<em>Notes</em> : Les membres du BDE regardent souvent leur courrier électronique.</p>

@endsection