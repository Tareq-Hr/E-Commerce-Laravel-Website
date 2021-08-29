    <!-- Header Section Begin -->
<div class="logo-mobile" style="position: absolute;"><a href="{{route('front_home')}}" ><img src="{{ asset('front/img/logo.png') }}" style = "width: 90px; height: 70px; padding-left: 20px" alt=""></a></div>
<center>
    <div class="container panier-mobile">
        <div class="inner-header">
            <div class="row">
                <div class="col-lg-3 text-left col-md-3">
                    @include('menu_panier')
                </div>
            </div>
        </div>
    </div>
</center>
    <center>
    <header class="header-section" style="width: 100%; position: fixed; z-index: 100; padding-bottom: 10px">
        <div class="nav-item" >
            <div class="container">
                <nav class="nav-menu mobile-menu">
                    <ul style="padding-top: 10px;">
                        <li class="active"><a href="{{route('front_home')}}">Accueil</a></li>
                        <li><a href="#">Catégories</a>
                            <ul class="dropdown">
                                @foreach(getCategories() as $categorie)
                                <li>@if(Route::currentRouteName()=='front_home')<a href="#{{$categorie->id}}">@else<a href="{{getUrl()}}/#{{$categorie->id}}">@endif{{$categorie->categorie}}</a></li>
                                @endforeach
                            </ul>
                        </li>                  
                        <img src="{{ asset('front/img/logo.png') }}" style = "width: 90px; height: 70px;" alt="" id="logo-web" class="logo-web">
                        <li><a href="{{route('page_front',1)}}">Qui Sommes-nous</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                @foreach(loadPages() as $page)
                                <li><a href="{{route('page_front',$page->id)}}">{{$page->titre}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <div class="container panier-web">
                                <div class="inner-header">
                                    <div class="row">
                                        <div class="col-lg-3 text-right col-md-3">
                                            @include('menu_panier')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
                        
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
        <div id="under-header"></div>
    </header>

    <div class="slider-top"></div>
    </center>
    <!-- Header End -->