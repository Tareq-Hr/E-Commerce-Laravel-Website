@extends('main')

@section('content')
<div class="col-lg-12" style="padding-top:110px;">
    <div class="section-title">
        <h2>Merci d'avoir acheté nos produits<br>Nous vous contacterons dans quelques instants</h2>
    </div>
</div>

<center>
	<img src="{{asset('front/img/thank-you.png')}}" style="width: 400px;">
	<div class="col-lg-4">
		<div class="cart-buttons" style="padding-top: 10px;">
		    <a href="{{route('front_home')}}" class="primary-btn">Passer une autre Commande</a>
		</div>
	</div>
</center>
@endsection