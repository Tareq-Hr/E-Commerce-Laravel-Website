<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Decorama® une boutique marocaine, spécialisée dans la vente des décors en Crystal et des lustres en cuivre de hautes gammes. Spécialisée dans la décoration intérieur , Chez Decorama vous trouverez les accessoires pour vos salons vos chambres et votre table à manger. Decorama est là pour prendre ses amateurs à une autre dimensions de décoration où l'artisanat la créativité sont présents .">
    <meta property="og:url" content="decorama.ma"/>
    <meta property="og:image" content="../../public/front/img/logo.png"/>
    <meta name="keywords" content="Decorama, Artisanat, Décoration">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Decorama</title>
    <link rel="shortcut icon" type="image/jpg" href="{{ asset('front/img/logo.png') }}"/>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet"> 

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/themify-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}" type="text/css">
</head>

<body>

    @include('load')

    @include('header')
    
    @yield('content')

    @include('footer')

    <!-- Js Plugins -->
    <script src="{{ asset('front/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.dd.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('front/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
    <script src="{{ asset('front/js/custom.js') }}"></script>

    <script type="text/javascript">

        function voirPlus(){
            var qsn = document.getElementById('qui_sommes_nous');
            var btn_vp = document.getElementById('btn_vp');
            var btn_vm = document.getElementById('btn_vm');
            qsn.style.overflow = "auto";
            qsn.style.height = "auto";
            btn_vm.style.display = "inline-block";
            btn_vp.style.display = "none";
        }

        function voirMoins(){
            var qsn = document.getElementById('qui_sommes_nous');
            var btn_vp = document.getElementById('btn_vp');
            var btn_vm = document.getElementById('btn_vm');
            qsn.style.overflow = "hidden";
            qsn.style.height = "100px";
            btn_vm.style.display = "none";
            btn_vp.style.display = "inline-block";
        }

    </script>

    <script type="text/javascript">

         
        $('.categorie_lustre').click(function(){

                var categorie = $(this).attr('id'); 
                $(".lustre-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-lustre', categorie);         

        });

        $('.categorie_art_table').click(function(){

                var categorie = $(this).attr('id'); 
                $(".art_table-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-art_table', categorie);         

        });
        
        $('.categorie_decoration').click(function(){

                var categorie = $(this).attr('id'); 
                $(".decoration-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-decoration', categorie);         

        });
        
        $('.categorie_miroire').click(function(){

                var categorie = $(this).attr('id'); 
                $(".miroire-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-miroire', categorie);         

        });
        
        $('.categorie_mbikherat').click(function(){

                var categorie = $(this).attr('id'); 
                $(".mbikherat-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-mbikherat', categorie);         

        });
        
        $('.categorie_pack').click(function(){

                var categorie = $(this).attr('id'); 
                $(".pack-control ul li").removeClass('active'); 
                $(this).addClass('active');
                make_slide('slider-pack', categorie);         

        });


        $('.categorie_art_table:nth-child(1)').trigger('click');
        $('.categorie_lustre:nth-child(1)').trigger('click');
        $('.categorie_decoration:nth-child(1)').trigger('click');
        $('.categorie_miroire:nth-child(1)').trigger('click');
        $('.categorie_mbikherat:nth-child(1)').trigger('click');
        $('.categorie_pack:nth-child(1)').trigger('click');


        function make_slide($vehicule, $cat_id){


            $.get('{{route("get_images_by_category")}}',{categorie_id:$cat_id}, function(data, response){

               $('#'+$vehicule+'').html('<div class="obt_ owl-carousel" ></div>');

               console.log(data);

                $.each(data, function(index, element){

                  $('#'+$vehicule+' .obt_').append('<div class="product-item"> <div class="pi-pic"> <img src = "'+element.image_link+'" alt=""> <ul> <li class="quick-view"><a href="'+window.location.href+'/product/'+element.id+'/'+element.titre.replaceAll(' ','-')+'">+ Voir Plus</a></li> <li class="w-icon"></li> </ul> </div> <div class="pi-text"> <a href="#"> <h5>'+element.titre+'</h5> </a> <div class="product-price"> '+element.prix_promo+' DH <span>'+element.prix_vente+' DH</span> </div></div>  </div>');


                   //END HTML   
                });

                $('#'+$vehicule+' .obt_').owlCarousel({
                    loop: false,
                    margin: 25,
                    nav: true,
                    items: 4,
                    dots: true,
                    navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                    smartSpeed: 1200,
                    autoHeight: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        992: {
                            items: 2,
                        },
                        1200: {
                            items: 3,
                        }
                     }
                    });
            });
        }


/*
        $('.categorie_auto').click(function(){

                var categorie = (this).getAttribute('id');            

            $.get('{{route("get_images_by_category")}}',{categorie_id:categorie}, function(data, response){

               $('#product_images1').html('');

               console.log(data);

                $.each(data, function(index, element){

                  $('#product_images1').append('<div class="product-item"> <div class="pi-pic"> <img src = "'+element.image_link+'" alt=""> <ul> <li class="quick-view"><a href="http://localhost:9999/smamv/public/detail/'+element.id+'">+ Voir Plus</a></li> <li class="w-icon"></li> </ul> </div> <div class="pi-text"> <div class="catagory-name">'+element.modele+'</div> <a href="#"> <h5>'+element.titre+'</h5> </a></div> </div>');


                   //END HTML   
                });

                    $("#product_images1").owlCarousel({
                    loop: false,
                    margin: 25,
                    nav: true,
                    items: 4,
                    dots: true,
                    navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
                    smartSpeed: 1200,
                    autoHeight: false,
                    autoplay: true,
                    responsive: {
                        0: {
                            items: 1,
                        },
                        576: {
                            items: 2,
                        },
                        992: {
                            items: 2,
                        },
                        1200: {
                            items: 3,
                        }
                     }
                    });
            });
        });
*/
    </script>

</body>

</html>