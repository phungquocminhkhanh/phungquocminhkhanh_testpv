@extends('customer.index')
@section('customer_content')
<main id="maincontent" class="page-main">
    <div class="columns">
        <div class="column main column-1">
            <!-- title -->
            <section class="register-banner page-banner elementor-section-wrap page-banner-1">
                <div class="register-banner-inner page-banner-inner elementor-section-inner">
                    <ul class="link-page d-flex">
                        <li class="item-list-element">
                            <a href="{{route('customer_home')}}" class="link-item item">
                                <span class="name-link">
                                    Home
                                </span>
                            </a>
                        </li>
                        <li class="item-list-element">
                            <span class="name-link">
                                    Tài khoản
                            </span>
                        </li>
                        
                    </ul>
                    <div class="page-title-wrapper">
                        <div class="page-title-inner" id="page-title-heading">
                            <h1 class="page-title" id="title_page">
                                Đăng nhập
                            </h1>
                        </div>
                    </div>
                </div>
            </section>
            <!-- login -->
            <section class="elementor-section-wrap login-page page-index" id="page_login" >
                <div class="login-page-inner">
                    <div class="login-wrapper">
                        <div class="login-inner">
                            <div id="login"  class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-11">
                                <form action="{{ URL::to('/customer/cus-login') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="account">Tài khoản <span class="require_input">*</span></label>
                                        <input type="number" class="form-control" name="account_username" placeholder="Nhập số điện thoại...">
                                    </div>
                                        <div class="form-group">
                                            <label for="passw">Mật khẩu <span class="require_input">*</span>
                                        </label>
                                        <input type="password" class="form-control" name="account_password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <small class="text-danger">
                                    <?php $me = Session::get('mess');
                                                                echo $me;
                                                                 ?>
                                    </small>
                                    <button type="submit" class="btn-1" name="sm_login">Đăng nhập</button>
                                    <div id="err_login" class="mt-3"></div>
                                    <p class="forgot-passw">Quên mật khẩu</p>
                                    <p class="toregister">
                                        Bạn chưa có tài khoản? 
                                        <a href=""  id="btn_page_dk">Đăng ký</a>
                                    </p>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="elementor-section-wrap register-page page-index" id="page_register"  style="display: none;">
                <div class="register-page-inner">
                    <div class="register-wrapper">
                        <div class="register-inner">
                            <div id="register"  class="col-xl-7 col-lg-7 col-md-8 col-sm-10 col-11">
                                    <!-- <style>
                                      #map {
                                          height: 500px;
                                          width: 100%;
                                      }
                                    </style>
                                    <div id="map"></div>
                                    <input id="autoseach" type="text" style="width:300px" placeholder="Địa chỉ cần quét" >
                                     -->
                                    <div class="form-row">
                                        
                                        <div class="form-group col-md-12">
                                            <label for="lastName">Họ và Tên <span class="require_input">*</span></label>
                                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="A" required>
                                            <div id="errLastName" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                       
                                        <div class="form-group col-md-12">
                                            <label for="phone">Số điện thoại <span class="require_input">*</span></label>
                                            <input type="number" class="form-control" name="phone" id="phone" placeholder="0989898989" required>
                                            <div id="errPhone" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="address">Mật Khẩu <span class="require_input">*</span></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="*********" required>
                                            <div id="errPassw" class="invalid-feedback"></div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="confirmPassword">Nhập lại mật khẩu <span class="require_input">*</span></label>
                                            <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="*********" required>
                                            <div id="errConPassw" class="invalid-feedback"></div>
                                        </div>
                                    </div>
                                   
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="agreeTerm" id="agreeTerms" value="1" required>
                                            <label class="form-check-label" for="agreeTerms">
                                           Tôi đồng ý với các <a href="./Term" class="terms">điều khoản</a> của shop
                                            </label>
                                        </div>
                                    </div>
                                    <p class="toregister">
                                      
                                        <a href=""  id="btn_page_login">Quay lại</a>
                                    </p>
                                    <button type="button" class="btn-1" name="sm_register" id="btn_submit_register">Đăng ký</button>
                                   
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

@section('customer_js')
<!-- <script
  src="https://maps.googleapis.com/maps/api/js?v=3&libraries=geometry,places&language=vi-VN&key=AIzaSyDc7PnOq3Hxzq6dxeUVaY8WGLHIePl0swY&callback=initMap"
defer></script> -->
<script src="{{ asset('frontend/js/customer_login.js') }}"></script>
@endsection
@endsection