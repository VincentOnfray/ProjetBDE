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
    			@if( auth()->user()->role =="BDE")
    			<li class="nav-item ">
        			<a class="nav-link" href="create_item"><i class="fas fa-plus"></i> Ajouter un Article</i></a>
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
	        				</div>
	      		</li>
	      		<li class="nav-item ">
        			<a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i></a>
      			</li>
    		</ul>













    		<form class="form-inline my-2 my-lg-0">
      			<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      			<button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    		</form>
  		</div>
	</div>


  <div class="products">
         @foreach($shop as $article)
         <h4 class="prodName">{{$article->nom}}</h4>
         <p class="prodDesc">{{$article->Description}}</p>
         <p class="price">prix:{{($article->prix/100)}} € TTC</p>
         <p class="price">{{$article->id}}</p>
         <img class="imgArticle" alt={{$article->nom}} src={{"\\img\\boutique\\".$article->Image}}>
         <form class="form-inline my-2 my-lg-0"  method="POST" action="/delete_item" >
          {{csrf_field()}}
            <input class="form-control" type="number"  hidden name="articleid" value={{$article->id}}>
            <button class="btn btn-outline-success" type="submit">Supprimer</button>
        </form>
         @endforeach
        </div>
</section>
	@yield ('page')
@endsection