@extends('customer.index')



@section('customer_content')
<main id="maincontent" class="page-main">
    <div class="columns">
        <div class="column main">
            <!-- slider banner-->
            <section class="slides-banner elementor-section-wrap">
                <div class="slides-banner-inner elementor-section-inner">
                    <div id="carouselExampleIndicators" class="carousel slide d-md-block d-none" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3" class=""></li>
                        </ol>
                        <div class="carousel-inner" id="content_banner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('frontend/images/banners/slide-banner/slide-banner-07.jpg')}}" alt="slide-banner-07.jpg')}}" class="border">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('frontend/images/banners/slide-banner/slide-banner-09.jpg')}}" alt="slide-banner-09.jpg')}}" class="border">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('frontend/images/banners/slide-banner/slide-banner-08.jpg')}}" alt="slide-banner-08.jpg')}}" class="border">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <div id="sliceBanner" class="d-md-none d-block">
                        <img src="{{ asset('frontend/images/banners/banner-collapse-03.jpg')}}" alt="">
                    </div>
                </div>
            </section>

            <!-- new product -->
            
        </div>

     

        <!-- hot product -->
        

        <!-- liked product -->
        <div class="column main">
           
        </div>

        <!-- Bộ sưu tập nổi bật featured collections -->
        <div class="column main">
            
        </div>


        <!-- blogs -->
        <div class="column main">
            <section class="blogs">
                <div class="blogs-inner">
                    <div class="blogs-title-wrapper">
                        <div class="blogs-title">
                            <h2 class="title t-upper text-center title-3">
                                Bài viết mới
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="blog-items-wrapper">
                    <div class="blog-items-inner">
                        <div class="blog-item-box row d-flex justify-content-center" id="content_list_blog">
                           <!--  <div class="blog-item col-lg-4 col-sm-6 col-12">
                                <div class="bolg-item-img-box">
                                    <a href="#" class="bolg-img">
                                        <img style="height: 350px !important" src="{{ asset('frontend/images/blogs/blog-page1.png')}}" alt="">
                                    </a>
                                </div>
                                <div class="blog-item-info">
                                    <div class="collection-info-content">
                                        <h3 class="blog-title">
                                            <a href="#">Cách trang trí phòng khách</a>
                                        </h3>
                                        <p class="blog-meta">
                                            Thứ 2, 8/11/2021
                                        </p>
                                        <p class="blog-script">
                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur vel praesentium sint perferendis aliquam repellat harum minima autem facere eveniet nobis, soluta minus suscipit sed sit laudantium alias corrupti porro?
                                        </p>
                                    </div>
                                </div>
                            </div> -->
                            
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

@endsection

@section('customer_js')
<script src="{{ asset('frontend/js/home.js') }}"></script>
@endsection
