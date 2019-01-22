<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/template.css" />
	@yield ('css')
	
    <title>BDE Cesi Lyon </title>
</head>
<body>
	<header>
 			<!--Menu de Navigation-->
        	<nav>        
    			<div class="element_menu">
        			<ul>

                         @if( auth()->check() )
                            <?php /*la suite est un peu compliquée à premiere vue, mais en fait c'est simple: auth()->user()->centre est l'ID du centre de l'utilisateur
                            On utilise DB:: pour call "getCentre" (voir script SQL si ca marche pas) cette procédure prend un ID centre et renvoie le centre associé.

                            Ensuite on echo un string qui formera la balise d'image bien propre.


                            */
                             $centre = DB::connection('BDDnat')->select('call getCentre('.auth()->user()->centre.')');
                                                         
                             echo  ("<li><img src=/img/logos/".$centre[0]->ImageBDE." alt='logo ".$centre[0]->Ville."' class='logoBDE'></li>"); 

                             ?>
                            <li><a href="/logout"> Déconnexion </a></li>
                            <li id="user"><p> Bonjour, <?php echo auth()->user()->name.'   role:'.auth()->user()->role ?> </p></li>


                        @else
            			    <li><a href="/login"> Connexion </a></li>
            			    <li><a href="/register"> Inscription </a></li>
                         @endif
        			</ul>
    			</div>    
			</nav>
            <div  class="navigation">
                <ul>
                    <li id="img"><img src="img/cesi-logo.png"></li>
                    <li><a href="/"><i class="fas fa-home"></i> ACCUEIL</a></li>
                    @if(auth()->check())
                    <li><a href="/shop"><i class="fas fa-shopping-cart"></i> BOUTIQUE</a></li>
                    <li><a href="/display_event"><i class="far fa-calendar-alt"></i> EVENEMENTS </a></li>
                    <li><a href="/ideas"><i class="far fa-lightbulb"></i> BOITE A IDEES </a></li>
                    @endif
                     <li><a href="/contact"><i class="fa fa-phone"></i> NOUS CONTACTER</a></li>
                    <li></li>
                </ul>
            </div>
	</header>


    <main>
            @yield ('content')
    </main>


    <footer>
        <div class="social">
            <p>Suivez nous sur les réseaux sociaux:</p>
            <ul>
                <li><a href="/"><i class="fab fa-twitter"></i></a></li>
                <li><a href="/"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="/"><i class="fab fa-youtube"></i></a></li>
                <li><a href="/"><i class="fab fa-instagram"></i></a></li> 
            </ul>
        </div>
        <div class="infos">
            <ul>
                <li><a href="/">Conditions générales de ventes</a></li>
                <li><a href="/">Politique de Protection de Données Personnelles</a></li>
                <li><a href="/">Mentions Légales</a></li>
            </ul>       
        </div>
    </footer>
</body>
</html>