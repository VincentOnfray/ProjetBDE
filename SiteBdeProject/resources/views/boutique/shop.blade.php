@extends("template")

@section('css')
<link rel="stylesheet" href="../css/shop.css" />
@yield('css+')
@endsection

@section('content')

<section id="navShop">
    <div class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="/shop">Accueil</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
    			@if( auth()->user()->role == "BDE")
    			<li class="nav-item ">
        			<a class="nav-link" href="/create_item"><i class="fas fa-plus"></i> Ajouter un Article</i></a>
      			</li>
		     	@endif
	  			<li class="nav-item dropdown">
	        			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	          			Catégories</a>
	        				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	          					<a class="dropdown-item" href="#">Les plus vendues</a>
	          					<div class="dropdown-divider"></div>
	          					<a class="dropdown-item" href="/shop/goodies">Goodies</a>
	          					<a class="dropdown-item" href="/shop/vetement">Vetements</a>
                      <a class="dropdown-item" href="/shop/autres">Autres</a>
                       <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="/shop_all">Toutes catégories</a>
	        				</div>
	      		</li>
	      		<li class="nav-item   dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Panier</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    
                      @foreach($cart as $item)
                      <a class="dropdown-item" href="#">{{$item->nom}}</a>
                       <form class="form-inline my-2 my-lg-0"  method="POST" action="/removefromcart" >
                            {{csrf_field()}}
                             <input class="form-control" type="number"  hidden name="articleid" value={{$item->id}}>
                            <button class="btn btn-outline-success" type="submit">retirer l'article</button>
                          </form>
                      @endforeach
                      <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Passer la commande</a>
                      
                      <div class="dropdown-divider"></div>
                        

                         <form class="form-inline my-2 my-lg-0"  method="POST" action="/empty_cart" >
                            {{csrf_field()}}
                            
                            <button class="btn btn-outline-success" type="submit">Vider Le Panier</button>
                          </form>
                        
                  </div>
      			</li>
    		</ul>
    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    		</form>
  		</div>
	</div>



</section>
	@yield ('page')
@endsection