@extends('main')

@section('content')

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title" style="padding-top:80px">
                            <h2>{{$page->titre}}</h2>
                        </div>
                        
                        <div class="">
                            <p style="white-space: pre-wrap;">
                                {{$page->contenu}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection