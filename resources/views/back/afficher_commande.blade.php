<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Decorama">
    <meta name="keywords" content="Decorama, Artisana, Décoration">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Decorama</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('front/img/logo.png') }}"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet"> 

</head>
<body>
	<div class="client-info" style="font-size: 18px">
<h5><b>Nom</b> : {{$client->nom}}</h5>
<h5><b>Tel</b> : {{$client->tel}}</h5>
<h5><b>Email</b> : {{$client->email}}</h5>
<h5><b>Adresse</b> : {{$client->adresse}}</h5>
<h5><b>Ville</b> : {{$client->ville}}</h5>
</div>

@if($coupon)
<h5><b>Coupon</b> : {{$coupon->titre}}</h5>
@endif

<center><h1>Articles</h1>

<table style="width:50%; border: solid; border-collapse: collapse; text-align: center;">
	<thead style="background-color: #ddd; font-size: 20px">
	<tr style="padding: 10px">
		<td>Titre </td>
		<td>Prix Unitaire </td>
		<td>Quantité</td>
		<td>Sous-Total</td>
	</tr>
	</thead>
	<p style="display:none">{{$total = 49}}</p>
	@foreach($articles as $article)
	<tr style="border: 1px solid">
		<td>{{$article['article']->titre}} </td> 
		<td> {{$article['article']->prix_promo}} DH</td>
		<td> {{$article['qty']}} </td>
		<td> {{$article['article']->prix_promo * $article['qty'] }} DH</td>
		<p style="display:none">{{$total += $article['article']->prix_promo * $article['qty']}}</p>
	</tr>
	@endforeach
	<tfoot>
	    <tr style="border: 1px solid">
    		<th>Frais de livraison</th>
    		<th></th>
    		<th></th>
    		<th>49 DH</th>
	    </tr>
		
	     @if($coupon)
	     <tr style="border: 1px solid">
    		<th>Total</th>
    		<th></th>
    		<th></th>
    		<th>{{$total}} DH</th>
	    </tr>
	     <tr style="border: 1px solid">
    		<th>Remise</th>
    		<th></th>
    		<th></th>
    		<th>{{$coupon->remise}} %</th>
	    </tr>
	    <tr style="border: 1px solid">
    		<th>Total aprés la remise</th>
    		<th></th>
    		<th></th>
    		<th>{{$commande->total}} DH</th>
	    </tr>
	    @else
	    <tr style="border: 1px solid">
    		<th>Total</th>
    		<th></th>
    		<th></th>
    		<th>{{$commande->total}} DH</th>
	    </tr>
	    @endif
	</tfoot>
</table>

<form action="{{route('commande')}}">
<button type="submit">Retourner vers la liste des commandes</button>
</form>
</center>

</body>

</html>