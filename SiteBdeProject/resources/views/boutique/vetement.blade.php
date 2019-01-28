@extends("boutique.shop")
@section('css+')
<link rel="stylesheet" href="../css/shop_content.css" />
@endsection
@section('page')

	@foreach($shop as $shop)
		<div id="boite">
			<h3>{{$shop->nom}}</h3> <br>
			<p>{{$shop->Prix}}</p><br>
			<p>{{$shop->Description}}</p><br>
		</div>
		
	@endforeach
@endsection