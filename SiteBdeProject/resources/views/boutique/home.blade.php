@extends("boutique.shop")
@section('css+')
<link rel="stylesheet" href="../css/shop_content.css" />
@endsection
@section('page')
<section>
	<div>
		<h1>La boutique </h1>
		<p>Bienvenue sur la boutique de votre BDE</p>	
	</div>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	    <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
	  	<div class="carousel-inner">
	    	<div class="carousel-item active">
	      		<img src="./img/goodies.png" class="d-block w-100" alt="...">
	      		<div class="carousel-caption d-none d-md-block">
	      			<h5>Divers Goodies</h5>
	    			<p>Venez découvrir les différents goodies que nous vous proposons</p>
	  	  		</div>
	    	</div>
		    <div class="carousel-item">
		      	<img src="./img/vetements.png" class="d-block w-100" alt="...">
		      		<div class="carousel-caption d-none d-md-block">
		      			<h5>Des vêtements</h5>
		    			<p>De toutes tailles de toutes formes et de toutes les couleurs venez vous parer selon vos goûts</p>
		  	  		</div>
		    </div>
		    <div class="carousel-item">
		      	<img src="./img/temporaire.jpg" class="d-block w-100" alt="...">
			      	<div class="carousel-caption d-none d-md-block">
			      		<h5>Les Occasionnels</h5>
			    		<p>Pages temporaire apparaissant seulement lors de ventes exceptionnels à durée limitée</p>
			  	  	</div>
		    </div>
	  	</div>
	  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    	<span class="carousel-control-next-icon" aria-hidden="true"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div>

	<div>
		<p>Cette Boutique a pour ambition de vous vendre des goodies ou des vêtements afin que l'argent récolté servent à la mise en place de nouveaux évenements ou de rendre réels vos idées que vous nous proposez dans la partie prévue à cette effet.<br> En espérant que ce que nous vous proposons à la vente vous plaisent et que vous passiez commande rapidement ;)</p>
	</div>

</section>
@endsection
