@extends('main')

@section('content')

    <!-- Shopping Cart Section Begin -->
    @if(session()->has('articles'))
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">

                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Article</th>
                                    <th> Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Sous-Total</th>
                                    <th><a href="{{route('remove_all')}}"> <i class="ti-close"></i></a></th>
                                </tr>
                            </thead>
                            <tbody>

                                <p style="display: none;">{{$total_price=0}} </p> 
                                @if(session()->has('articles'))        
                                @for($i=0; $i<sizeof(session('articles')); $i++)
                                <p style="display: none;">
                                    {{$total_price+=session('articles')[$i]['article']->prix_promo * session('articles')[$i]['qty']}}</p>
                                <tr>
                                    <td class="cart-pic first-row"><img src="{{session('articles')[$i]['article']->getImageLink()}}" alt=""></td>
                                    <td class="cart-title first-row">
                                        <h5>{{session('articles')[$i]['article']->titre}}</h5>
                                    </td>
                                    <td class="p-price first-row">{{session('articles')[$i]['article']->prix_promo}} DH</td>
                                    <td class="p-qty">
                                        {{session('articles')[$i]['qty']}}
                                    </td>
                                    <td class="total-price first-row">{{session('articles')[$i]['article']->prix_promo * session('articles')[$i]['qty']}} DH</td>
                                </tr>
                                @endfor
                                @endif

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{route('front_home')}}" class="primary-btn">Continuer vos achats</a>
                            </div>
                        </div>
                        @if(session()->has('articles'))
                        <div class="col-lg-4 offset-lg-4">
                            <form action="{{route('apply_coupon')}}" method="get">
                                <div class="discount-coupon">
                                    <h6>Code Promo</h6>
                                    <div class="coupon-form">
                                        <input type="text" name="coupon" id="coupon" placeholder="Taper votre code promo">
                                    </div>
                                </div>
                                <div class="proceed-checkout">
                                    <ul>
                                        <li class="cart-total">Total <span>{{$total_price}} DH</span></li>
                                    </ul>
                                    <button type="submit" class="proceed-btn">Confirmer l'achat et continuer</button>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    @else
    <center>
        <p style="padding-top:200px">
            Votre Panier est Vide !
        </p>
        <div class="col-lg-4">
		<div class="cart-buttons" style="padding-top: 10px;">
		    <a href="{{route('front_home')}}" class="primary-btn">Passer une Commande</a>
		</div>
	</div>
    </center>
    @endif
    <!-- Shopping Cart Section End -->

@endsection