@extends('main')

@section('content')
    <!-- Shopping Cart Section Begin -->
    @if(session()->has('articles'))
    <section class="checkout-section spad">
        <div class="container">
            <form action="{{route('valider')}}" method="post" class="checkout-form">
                {{csrf_field()}}
                <div class="row">
                        <div class="col-lg-6">
                            <h4>Merci de saisir vos Informations</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="nom">Nom Complet<span>*</span></label>
                                    <input type="text" required="required" id="nom" name="nom">
                                </div>

                                <div class="col-lg-6">
                                    <label for="tel">Téléphone<span>*</span></label>
                                    <input type="text" required="required" id="tel" name="tel">
                                </div>
                                
                                <div class="col-lg-6">
                                    <label for="ville">Ville<span>*</span></label>
                                    <input type="text" required="required" id="ville" name="ville">
                                </div>  
                                <div class="col-lg-6">
                                    <label for="adresse">Adresse<span>*</span></label>
                                    <input type="text" required="required" id="adresse" name="adresse" class="street-first">
                                </div>

                                <div class="col-lg-6">
                                    <label for="email">Email</label>
                                    <input type="email" placeholder='exemple@email.com' id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                </div>

                           </div>
                        </div>
                    </form>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Votre Commande</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    <li>Article <span>Sous-Total</span></li>

                                    <p style="display: none;">{{$total_price=0}} </p> 
                                
                                        @if(session()->has('articles'))            
                                        @for($i=0; $i<sizeof(session('articles')); $i++)
                                        <p style="display: none;">
                                    {{$total_price+=session('articles')[$i]['article']->prix_promo * session('articles')[$i]['qty']}}</p>
                                            <li class="fw-normal">{{session('articles')[$i]['article']->titre}} x {{session('articles')[$i]['qty']}} <span>{{session('articles')[$i]['article']->prix_promo * session('articles')[$i]['qty']}} DH</span></li>
                                            @endfor
                                            <li class="fw-normal">Frais de Livraison<b><span>49 DH</span></b></li>
                                            <li class="total-price">Total <span>{{$total_price + 49}} DH</span></li>
                                            
                                            @if($coupon_id)
                                            <li class="total-price">Total Aprés la remise<span>{{$total_price - ($total_price * $coupon_remise / 100) + 49}} DH</span></li>
                                            @endif

                                            <input type="text" hidden="hidden" name="total" value="{{$total_price}}">
                                            <input type="text" hidden="hidden" name="coupon" value="{{$coupon_code}}">
                                            @endif
                                </ul>
                                <div class="order-btn">
                                    
                                        <button type="submit" class="site-btn place-btn">Confirmer la Commande</button>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
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