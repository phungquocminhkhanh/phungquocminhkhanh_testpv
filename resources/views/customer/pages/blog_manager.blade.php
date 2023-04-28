@extends('customer.index')
@section('customer_content')
 <style type="text/css">
    .btn_delete_cart{
        background-color: transparent;
        border: 0px;
        margin-left:10px;

    }
    .btn_delete_cart:hover{
        color: #AB6E35;

    }

</style>

<?php

    $data_customer= Session::get('data_customer')??"" ;
?>
<main id="maincontent" class="page-main">
    <div class="columns">
        <div class="column main column-1">
            <!-- banner page -->
            <section class="page-banner elementor-section-wrap page-banner-1">
                <div class="page-banner-inner elementor-section-inner">
                    <ul class="link-page d-flex">
                        <li class="item-list-element">
                           <a href="{{route('customer_home')}}" class="link-item item">
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
                        <div class="page-title-inner" id="page-title-heading">
                            <h1 class="page-title">
                               Bài viết
                            </h1>
                        </div>
                    </div>
                </div>
            </section>

            <section class="shop-page-area elementor-section-wrap">
                <div class="shop-page-area-inner container">
                    <div class="shop-cart-wrapper">
                        <div id="cart">
                           
                            <div class="cart-container container">
                                <div id="tableCartData" class="table-data-green">
                                    <form action="" method="" name="" id="">
                                        <li class="active"> <button type="button" onclick="create_item('create')" name="x" id="x" data-toggle="modal" data-target="#modal_create_blog" class="btn btn-warning">+</button></li>
                                        <table class="table table-inverse" id="tableCart">
                                            <thead>
                                                <tr>
                                                    <th class=""></th>                                          
                                                    <th class="">Tiêu đề</th>
                                                    <th class="">Ngày tạo</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody id="content_manager_blog">
                                                    
                                               
                                                
                                                
                                               
                                            </tbody>
                                        </table>
                                        <div class="form-inline" style="text-align: right;">
                                            <div class="form-group">
                                                << <a id="page_back" onclick="next_page('back')" style="color: #303030;"><span id="txt_page_before">Trang sau</span></a>&nbsp;&nbsp;&nbsp; <a id="page_next" onclick="next_page('next')"><span id="txt_page_after">Trang trước</span></a>>>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                           
                            <br />
                          
                             
                           
                           <!--  <div class="empty-cart-wrapper">
                                <div class="empty-cart-inner">
                                    <img src="public/images/empty-cart-black.png" alt="">
                                    <div class="empty-cart-announce">
                                        <h2>Giỏ hàng trống!</h2>
                                        <p>Nhấp <a href="./product/danh-sach-san-pham">vào đây</a> để tiếp tục mua hàng</p>
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

<div id="modal_create_blog" class="modal fade">
        <div class="modal-dialog" style="width: 90% !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h2 class="modal-title" style="color:black"><strong>Tạo mới</strong></h2>
                    </center>
                </div>
                <div class="modal-body">

                    <form id="form_blog">
                        <label>Chọn icon</label>
                        <input type="file" onchange="select_img('icon_blog','content_icon_log','60%','250px')" id="icon_blog"  multiple class="form-control" />  
                        <div id="content_icon_log" style="width: 100%;"></div>
                        <br />

                        <label>Tiêu đề (<font style="color: red">*</font>)</label>
                        <input type="text" id="title" class="form-control" />                       
                        <br />

                        <label>Tóm tắt nội dung (<font style="color: red">*</font>)</label>
                        <input type="text" id="content_short" class="form-control" />                       
                        <br />

                        <label>Trạng thái</label>
                        <select id="status" class="form-control">
                            <option value="1">Hoạt động</option>
                            <option value="2">Không hoạt động</option>
                        </select>

                        <br />
                        <label>Nội dung (<font style="color: red">*</font>)</label>
                        <textarea id="content" rows="20"></textarea>                 
                        <br />                            
                        <br />

                        <button type="button" name="insert" id="create_blog" class="btn btn-success">Xác nhận</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('customer_js')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script src="{{ asset('frontend/js/blog_manager.js') }}"></script>
<script>

        CKEDITOR.replace( 'content', {
            filebrowserBrowseUrl: "{{ asset('ckfinder/ckfinder.html') }}",
            filebrowserImageBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Images') }}",
            filebrowserFlashBrowseUrl: "{{ asset('ckfinder/ckfinder.html?type=Flash') }}",
            filebrowserUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
            filebrowserImageUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
            filebrowserFlashUploadUrl: "{{ asset('ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
        });

        
    </script>
@endsection