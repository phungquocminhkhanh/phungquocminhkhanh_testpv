@extends('customer.index')
@section('customer_content')
<?php $id_blog=$_GET['id']??"" ?>
<input type="hidden" value="{{$id_blog}}" id="id_blog">
<main id="maincontent" class="page-main">
    <div class="columns">
        <div class="column main column-1">
            <!-- banner page -->
            <section class="page-banner elementor-section-wrap page-banner-1">
                <div class="page-banner-inner elementor-section-inner">
                    <ul class="link-page d-flex">
                        <li class="item-list-element">
                            <a href="" class="link-item item">
                                <span class="name-link">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="item-list-element">
                            <span class="name-link item">
                                Bài viết
                            </span>
                        </li>
                    </ul>
                    <div class="page-title-wrapper">
                        <div class="page-title-inner" id="content_title">
                            
                        </div>
                    </div>
                </div>
            </section>
            <!-- shop page area -->
            <section class="elementor-section-wrap contact-page">
                <div class="contact-page-inner">
                    <div class="shop-contact-wrapper">
                        <div class="shop-contact-inner">
                           
                            <div class="contact-wrap">
                                <div class="contact-inner row">
                                    
                                    <div class="contact-info-wrap col-xl-12 col-lg-12 col-12" id="content">
                                        

                                        


                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="product-info-main col-sm-12 col-12 float-left">
                 <div class="section-wrap">


                    <div class="product-description">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-product-description">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#productDescription">
                                    <h3 class="section-title">
                                        Đánh giá sản phẩm
                                    </h3>
                                </a>
                            </li>
                           
                        </ul>
                    </div>
                    <br />
                    <div class="div-rading" >
                        <div style="color: #D0011B;" id="product_rate_star">
                            <span style="font-size:35px;color: #D0011B;"></span>
                            <span style="font-size:25px;color: #D0011B;"> trên 5</span>
                            <br />
                            <span class="star-product">&starf;&starf;&starf;&starf;&starf;</span>
                        </div>
                    </div>
                    <div class="tab-content tab-content-product-description">

                        
                        <div id="product_comment">
                            <div class="commented-section mt-2">
                                <div class="d-flex flex-row align-items-center commented-user">
                                    <h5 class="mr-2">Samoya Johns</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">2023-26-05 17:05</span>
                                </div>
                                 <div class="d-flex flex-row align-items-center commented-user">
                                    <span class="star-comment">&starf;&starf;&star;&star;&star;</span>
                                 </div>
                                <div class="comment-text-sm"><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua..</span></div>
                               
                                
                            </div>
                            <hr>
                           
                            
                        </div>
                        <div class="stars">
                         
                            <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
                            <label class="star star-5" for="star-5" ></label>
                            <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
                            <label class="star star-1" for="star-1"></label>
                         
                        </div>
                        <div class="d-flex add-comment-section mt-12 mb-12">
                            <input id="rate_comment" type="text" class="form-control mr-3" placeholder="Nội dung">
                            <button id="btn_commnet" class="btn btn-primary" type="button">Đánh giá</button>
                            <br />
                            <br />
                        </div>
                        
                     </div>
                    

                 </div>
                             
            </div>
            <hr />
            <br />
            <br />
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
                            
                            
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</main>
@endsection

@section('customer_js')
<script src="{{ asset('frontend/js/blog.js') }}"></script>
@endsection

