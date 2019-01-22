@extends("template")

@section('css')
<link rel="stylesheet" href="css/home.css" />
@endsection

@section('content')
	<section id="head">
			@if( auth()->check() )
				<ul>
	                <?php /*la suite est un peu compliquée à premiere vue, mais en fait c'est simple: auth()->user()->centre est l'ID du centre de l'utilisateur
	                On utilise DB:: pour call "getCentre" (voir script SQL si ca marche pas) cette procédure prend un ID centre et renvoie le centre associé.
	                Ensuite on echo un string qui formera la balise d'image bien propre.
	                */
	                    $centre = DB::connection('BDDnat')->select('call getCentre('.auth()->user()->centre.')');                                   
	                    echo  ("<li><img src=/img/logos/".$centre[0]->ImageBDE." alt='logo ".$centre[0]->Ville."' class='logoBDE'></li>");
	                    echo  ("<li id='title'><h1>BDE Cesi ".$centre[0]->Ville. " <br> Bienvenue sur le site de Votre BDE</h1></li>");
	                    echo  ("<li><img src=/img/logos/".$centre[0]->ImageBDE." alt='logo ".$centre[0]->Ville."' class='logoBDE'></li>");
	                ?>
               	</ul>
            @else
            	<h1>Bienvenue sur le site des BDE du Cesi </h1>
            @endif	
	</section>
	<section id="contenu">
		@if( auth()->check() )		
			<div>
				<h2>Qui sommes nous?</h2>
				<p> Le Bureau Des Elèves(ou BDE) de lyon est l'association étudiantes qui s'occupe d'organiser pour vous toutes activités extra-scolaire comme ce que vous avez sans doutes déjà vu, les soirées. Mais nous veillons également à la création, la gestion et le maintient de solution lors de problèmes que vous pouvez rencontrer. Nous pouvons porposer pour divers organisme. 
					
				</p>
			</div>
			<div>
				<h2>A quoi sert ce site?</h2>
					<p>Ce site a été conçu dans afin de répondre à plusieurs demande: <br>
						<ul>
							<li>Faciliter la diffusion des informations liées aux évènements.</li>
							<li>La mise en place d'une boutique afin d'acceder facilement à ce que nous vendons.</li>
							<li>Créer une "Boite à Idées" permettant aux étudiants tel que vous de proposer des idées d'évènements, d'interventions,...</li>
							<li>Et tout un tas d'autres bonnes choses</li>
						</ul><br>
					</p>
			</div>
		@else
            <div>
            	<p>Bonjour et bienvenue sur le site des BDE des Cesi de France.<br>Afin d'accéder aux fonctionnalitées de notre site veuillez vous identifier ou bien créer un compte avec votre adresse e-mail du cesi.<br>Ainsi grâce à votre connexion vous aurez accès aux nombreuses informations que nous vous partageons mais également à notre boutique que vous vous empresserez de piller.</p>	
            </div>
		@endif	
	</section>
@endsection