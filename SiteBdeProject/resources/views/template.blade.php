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
                                <li><p id="user"> Bonjour, <?php echo auth()->user()->name ?> </p></li>
                                <li><a href="/Logout"> Déconnexion </a></li>
                        @else
            			<li><a href="/Login"> Connexion </a></li>
            			<li><a href="/register"> Inscription </a></li>
                         @endif
                        <li><a href="/contact"><i class="fa fa-phone"></i> Contact</a></li>
        			</ul>
    			</div>    
			</nav>
            <div  class="navigation">
                <ul>
                    <li id="img"><img src="img/cesi-logo.png"></li>
                    <li><a href="/">CESI Centre de Lyon</a></li>
                    <li><a href="/Shop"><i class="fas fa-shopping-cart"></i> BOUTIQUE</a></li>
                    <li><a href="/Event"><i class="far fa-calendar-alt"></i> EVENEMENTS </a></li>
                    <li><a href="/Ideas"><i class="far fa-lightbulb"></i> BOITE A IDEES </a></li>
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