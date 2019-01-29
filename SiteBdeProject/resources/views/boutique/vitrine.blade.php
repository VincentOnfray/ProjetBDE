@extends("boutique.shop")

@section('css+')
<link rel="stylesheet" href="../css/shop_content.css" />
@endsection
@section('page')

	
		<div id="boite">
			<div class="products">
         @foreach($shop as $article)
		         <h4 class="prodName">{{$article->nom}}</h4>
		         <p class="prodDesc">{{$article->Description}}</p>
		         <p class="price">prix: {{($article->prix/100)}}€ TTC</p>
		         
		         <img class="imgArticle" alt={{$article->nom}} src={{"\\img\\boutique\\".$article->Image}}>

		         @if(auth()->user()->role == "BDE")
		         <form class="form-inline my-2 my-lg-0"  method="POST" action="/delete_item" >
		          {{csrf_field()}}
		            <input class="form-control" type="number"  hidden name="articleid" value={{$article->id}}>
		            <button class="btn btn-outline-success" type="submit">Supprimer</button>
		        </form>


		        @endif

		        @if($article->chosen==0)
		        <form class="form-inline my-2 my-lg-0"  method="POST" action="/choose_item" >
		          {{csrf_field()}}
		            <input class="form-control" type="number"  hidden name="articleid" value={{$article->id}}>
		            <button class="btn btn-outline-success" type="submit">Ajouter au panier</button>
		        </form>
		        @elseif($article->chosen>0)
		        {

		        	<button class="btn chosen" type="submit">dans le panier</button>
		        }
		        @endif
         @endforeach
        </div>
		</div>
		


@endsection