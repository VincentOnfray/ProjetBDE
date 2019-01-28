@extends("boutique.shop")
@section('page')

	@foreach($shop as $shop)
		<h3>{{$shop->nom}}</h3> <br>
		<p>{{$shop->Prix}}</p><br>
		<p>{{$shop->Description}}</p><br>
	@endforeach

@endsection