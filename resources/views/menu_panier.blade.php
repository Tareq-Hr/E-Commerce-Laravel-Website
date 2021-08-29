<ul class="nav-right">
    <li class="cart-icon">
        <a href="#">
            <i class="icon_bag_alt"></i>
                @if(session()->has('articles'))
                <span>{{count(session('articles'))}}</span>
                @else
                <span>0</span>
            @endif
        </a>
        <div class="cart-hover">
            <div class="select-items">
                <table>
                    <tbody>
                       @if(session()->has('articles'))          
                        @for($i=0; $i<sizeof(session('articles')); $i++)
                            <tr>
                                <td class="si-pic"><img src="{{session('articles')[$i]['article']->getImageLink()}}" alt=""></td>
                                <td class="si-text">
                                    <div class="product-selected">
                                        <p>{{session('articles')[$i]['article']->prix_promo}} DH x {{session('articles')[$i]['qty']}}</p>
                                        <h6>{{session('articles')[$i]['article']->titre}}</h6>
                                    </div>
                                </td>
                                
                            </tr>
                            @endfor
                        @else
                        <p>Panier Vide</p>
                        @endif
                    </tbody>
                </table>
            </div>

            @if(session()->has('articles')) 
            <div class="select-button">
                <a href="{{route('cart')}}" class="primary-btn view-card">Voir le Panier</a>
                <a href="{{route('apply_coupon')}}" class="primary-btn checkout-btn">Commander</a>
            </div>
            @endif
        </div>
    </li>
</ul>