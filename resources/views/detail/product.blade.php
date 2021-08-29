@extends('main')

@section('content')

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details" style="padding-top: 100px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="{{$article->getImageLink()}}" alt="">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">

                                    <div class="pt active" data-imgbigurl="{{ $article->getImageLink() }}">
                                        <img src="{{ $article->getImageLink()}}" alt="">
                                    </div>

                                    @if($article->image1)
                                    <div class="pt" data-imgbigurl="{{ $article->getImage1Link() }}">
                                        <img src="{{ $article->getImage1Link()}}" alt="">
                                    </div>
                                    @endif

                                    @if($article->image2)
                                    <div class="pt" data-imgbigurl="{{ $article->getImage2Link() }}">
                                        <img src="{{ $article->getImage2Link()}}" alt="">
                                    </div>
                                    @endif

                                    @if($article->image3)
                                    <div class="pt" data-imgbigurl="{{ $article->getImage3Link() }}">
                                        <img src="{{ $article->getImage3Link()}}" alt="">
                                    </div>
                                    @endif

                                    @if($article->image4)
                                    <div class="pt" data-imgbigurl="{{ $article->getImage4Link() }}">
                                        <img src="{{ $article->getImage4Link()}}" alt="">
                                    </div>
                                    @endif

                                    @if($article->image5)
                                    <div class="pt" data-imgbigurl="{{ $article->getImage5Link() }}">
                                        <img src="{{ $article->getImage5Link()}}" alt="">
                                    </div>
                                    @endif                                    
                                
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <h3 name="titre">{{$article->titre}}</h3>
                                </div>
                                <div class="pd-desc">
                                    <p style="height: 80px; overflow: hidden;">{{$article->contenu}}</p>...
                                    <h4>{{$article->prix_promo}} DH <span>{{$article->prix_vente}} DH</span></h4>
                                </div>

                                @if($article->inventaire != 'Non')
                                <form method="POST" enctype="multipart/form-data" action="{{route('setcookie')}}">
                                    {{csrf_field()}}
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" pattern="[0-9]+" name="qty" value="1" required="required">
                                    </div>
                                    <input type="text" hidden="hidden" name="id" value="{{$article->id}}">
                                    <button type="submit" class="primary-btn pd-cart">Ajouter au Panier</button>
                                </div>
                            </form>
                                @endif
                                
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: {{$categorie->categorie}} </li>
                                    <li><span>TAGS</span>: {{$article->tags}} </li>
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : {{$article->reference}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Avis des Clients</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Description</h5>
                                                <p>{{$article->contenu}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Prix</td>
                                                <td>
                                                    <div class="p-price">{{$article->prix_promo}} DH</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Disponibilité</td>
                                                <td>
                                                    <div class="p-stock">{{$article->inventaire}}</div>
                                                </td>
                                            </tr>
                                            
                                            @if($article->poids)
                                            <tr>
                                                <td class="p-catagory">Poids (Kg)</td>
                                                <td>
                                                    <div class="p-weight">{{$article->poids}} Kg</div>
                                                </td>
                                            </tr>
                                            @endif
                                            
                                            @if($article->materiau)
                                            <tr>
                                                <td class="p-catagory">Matériau principal</td>
                                                <td>
                                                    <div class="p-weight">{{$article->materiau}}</div>
                                                </td>
                                            </tr>
                                            @endif
                                            
                                            @if($article->taille)
                                            <tr>
                                                <td class="p-catagory">Taille (Longueur x Largeur x Hauteur cm)</td>
                                                <td>
                                                    <div class="p-size">{{$article->taille}} Centimètre</div>
                                                </td>
                                            </tr>
                                            @endif

                                            @if($article->litrage)
                                            <tr>
                                                <td class="p-catagory">Litrage</td>
                                                <td>
                                                    <div class="p-size">{{$article->litrage}} Litre</div>
                                                </td>
                                            </tr>
                                            @endif
                                            
                                            <tr>
                                                <td class="p-catagory">Couleur</td>
                                                <td>
                                                    <div class="p-stock">{{$article->couleur}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">{{$article->reference}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Commentaires</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{asset('front/img/user-icon.png')}}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Tareq EL HARIRI <span>11 Mai 2021</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="{{asset('front/img/user-icon.png')}}" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Youness <span>11 Mai 2021</span></h5>
                                                    <div class="at-reply">Géneal</div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="leave-comment">
                                            <h4>Laisser un Commentaire</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="personal-rating">
                                                            <h6>Votre Note</h6>
                                                            <br>
                                                            <div class="rating">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Nom Complet">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Commentaire"></textarea>
                                                        <button type="submit" class="site-btn">Commenter</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Produits connexes </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($produits_connexes as $produit)
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="{{ $produit->getImageLink() }}" alt="">
                            <ul>
                                <li class="quick-view"><a  href="{{route('detail_produit',[$produit->id,str_replace(' ','-',$produit->titre)])}}">Voir Plus</a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <a  href="{{route('detail_produit',[$produit->id,str_replace(' ','-',$produit->titre)])}}">
                                <h5>{{$produit->titre}}</h5>
                            </a>
                            <div class="product-price">
                                {{$produit->prix_promo}} DH
                                <span>
                                    {{$produit->prix_vente}} DH
                                </span> 
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->
    
@endsection