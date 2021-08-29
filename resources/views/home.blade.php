@extends('main')

@section('content')

<!-- Hero Section Begin -->
    <section class="hero-section"  style="padding-top: 80px">
        <div class="hero-items owl-carousel">

            @for($i=1; $i<=4; $i++)

            <div class="single-hero-items set-bg" data-setbg="{{ asset('front/img/sliders/slider'.$i.'.jpg') }}">
            </div>

            @endfor

        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Nos Catégories</h2>
                    </div>
                </div>
        </div>

        <div class="container-fluid">
        <center>
            <a href="#1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="{{ asset('front/img/nos_articles/brared.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Art de Table</h4>
                        </div>
                    </div>
                </div>
                </a>
                <a href="#2">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="{{ asset('front/img/nos_articles/lustres.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Lustres et Appliques</h4>
                        </div>
                    </div>
                </div>
                </a>
                <a href="#3">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="{{ asset('front/img/nos_articles/horloges.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Décoration</h4>
                        </div>
                    </div>
                </div>
                </a>
                <a href="#4">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="{{ asset('front/img/nos_articles/miroire.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Miroires et Consoles</h4>
                        </div>
                    </div>
                </div>
                </a>
                <a href="#5">
                <div class="col-lg-6">
                    <div class="single-banner">
                        <img src="{{ asset('front/img/nos_articles/mbikherat.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Lances Parfum</h4>
                        </div>
                    </div>
                </div>
                </a>
                <a href="#13"> 
                <div class="col-lg-6">
                    <div class="single-banner">
                       <img src="{{ asset('front/img/nos_articles/pack1.jpg') }}" alt="">
                        <div class="inner-text">
                            <h4>Les Packs</h4>
                        </div>
                    </div>
                </div>
                </a>
            </div>
        </center>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Art de Table -->
    
    <div class="col-lg-12" id="1">
        <div class="section-title">
            <h2>Art de Table</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/brared/adt.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control art_table-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 1)
                            <li id='{{$categorie->id}}' class="categorie_art_table">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-art_table" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Art de Table -->
    
    <!-- Lustres -->
    
    <div class="col-lg-12" id="2">
        <div class="section-title">
            <h2>Lustres et Appliques</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/lustre.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control lustre-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 2)
                            <li id='{{$categorie->id}}' class="categorie_lustre">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-lustre" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Lustres -->
    
        <!-- Décoration -->
    
    <div class="col-lg-12" id="3">
        <div class="section-title">
            <h2>Décoration</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/decoration.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control decoration-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 3)
                            <li id='{{$categorie->id}}' class="categorie_decoration">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-decoration" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Décoration -->
    
     <!-- Miroires et Consoles -->
    
    <div class="col-lg-12" id="4">
        <div class="section-title">
            <h2>Miroires et Consoles</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/miroires.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control miroire-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 4)
                            <li id='{{$categorie->id}}' class="categorie_miroire">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-miroire" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Miroires et Consoles -->
    
     <!-- Lances Parfum -->
    
    <div class="col-lg-12" id="5">
        <div class="section-title">
            <h2>Lances Parfum</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/lances.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control mbikherat-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 5)
                            <li id='{{$categorie->id}}' class="categorie_mbikherat">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-mbikherat" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Lances Parfum -->
    
    <!-- Packs -->
    
    <div class="col-lg-12" id="13">
        <div class="section-title">
            <h2>Nos Packs</h2>
        </div>
    </div>
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="{{asset('front/img/nos_articles/pack1.jpg')}}">
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control pack-control">
                        <ul>
                            @foreach($categories as $categorie)

                            @if($categorie->parent == 13)
                            <li id='{{$categorie->id}}' class="categorie_pack">{{$categorie->categorie}}</li>
                            @endif

                            @endforeach
                        </ul>
                </div>
                
                <div id="slider-pack" class="product-slider owl-carousel"></div>

                </div>
            </div>
        </div>
    </section>
    <!-- Packs -->

    <!-- Deal Of The Week Section Begin-->
    <center>
    <section class="deal-of-week set-bg spad" data-setbg="#" >
        <div class="container">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>Qui Sommes Nous ?</h2>
                    <img src="{{ asset('front/img/qui_sommes_nous.svg') }}"/><br>
                    <p style="margin-top: 20px; height: 80px; overflow: hidden;" id="qui_sommes_nous">

<strong>Decorama® </strong>

une boutique marocaine, spécialisée dans la vente des décors en Crystal et des lustres en cuivre de hautes gammes. Spécialisée dans la décoration intérieur , Chez Decorama vous trouverez les accessoires pour vos salons vos chambres et votre table à manger. Decorama est là pour prendre ses amateurs à une autre dimensions de décoration où l'artisanat la créativité sont présents . 
 </p>
                </div>
                <a href="javascript:voirPlus()" class="primary-btn" id="btn_vp">Lire Plus</a>
                <a href="javascript:voirMoins()" class="primary-btn" style="display: none;" id="btn_vm">Lire Moins</a>
            </div>
        </div>
    </section>
    <section class="deal-of-week set-bg spad" data-setbg="#" >
        <div class="container">
            <div class="col-lg-8 text-center">
                <div class="section-title">
                    <h2>Avis de Nos Clients</h2>
                    <center style="position: relative; overflow: hidden; "> <iframe width="100%" height="300" src="https://www.youtube.com/embed/videosseries?list=PL_7Om3EufSAFwz9QZySf30TraSjNGapp6&loop=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></center>

                </div>
                
            </div>
        </div>
    </section>
</center>
    @endsection