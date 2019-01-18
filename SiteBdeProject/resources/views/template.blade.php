<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="css/style.css" />
	@yield ('css')
	<title>BDE Cesi Lyon </title>
</head>
<body>
	<header>
 			<!--Menu de Navigation-->
        	<nav>        
    			<div class="element_menu">
        			<ul>
            			<li><a href="/Login"> Connexion </a></li>
            			<li><a href="/register"> Inscription </a></li>
        			</ul>
    			</div>    
			</nav>
            <div  class="navigation">
                <ul>
                    <li id="img"><img src="img/cesi-logo.png"></li>
                    <li><a href="/">CESI Centre de Lyon</a></li>
                    <li><a href="/Shop"> Boutique</a></li>
                    <li><a href="/Event"> Evènement </a></li>
                    <li><a href="/Ideas"> Boite à Idées </a></li>
                </ul>
            </div>
	</header>
    <main>
            @yield ('content')
    </main>
    <footer>
        
    </footer>
</body>
</html>