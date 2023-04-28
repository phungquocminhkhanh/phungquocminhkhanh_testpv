@extends('admin.dashboard')
@section('admin_content')

<body>
    <?php $data_admin = Session::get('data_admin');
    $id_account_sale = "";
    if ($data_admin->id_type == '3')
        $id_account_sale = $data_admin->id;

    ?>
    <input type="hidden" value="{{$data_admin->id}}" id="id_account">

    <div style="clear: both; height: 61px;"></div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-sm-12">
                <div class="inqbox">
                    <div class="inqbox-content">

                        <h2><strong>Danh sách khách hàng</strong></h2>
                        <div class="input-group">
                            <input type="text" placeholder="Nhập tên, số điện thoại, email, mã khách hàng" id="key_seach" value="" class="input form-control">
                            <span class="input-group-btn">
                                <button type="button" class="btn btn btn-primary" id="btn_seach" onclick="show_customer(1)"> <i class="fa fa-search"></i>Tìm kiếm</button>
                            </span>
                        </div>

                        <div class="clients-list">
                              
                              <ul class="nav nav-tabs tab-border-top-danger">
                                   @if($data_admin->id_type=="1" || $data_admin->id_type=="2")
                                   <li class="active"> <button type="button" onclick="clear_data()" name="x" id="x" data-toggle="modal" data-target="#modal_create" class="btn btn-warning">+</button></li>
                                   @endif
                              </ul>
                           
                            <div class="tab-content">

                                <div class="input-group" id="report-total">

                                </div>
                                
                                <div id="tab-account" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive" style="height: 100%;">
                                            <style>
                                                .title-xx th {
                                                    text-align: center;
                                                }
                                            </style>
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <th style="width:4%;"></th>
                                                    <th>Tên Khách hàng</th>
                                                    <th>Số điện thoại</th>
                                                    <th>Ngày đăng ký</th>
                                                    <th></th>
                                                </tr>
                                                <tbody id="content-customer">

                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                   
                                </div>
                                 <div class="form-inline pull-right">
                                        <div class="form-group">
                                            << <a id="page_back" onclick="next_page('back')" style="color: #303030;"><span id="txt_page_before">Trang sau</span></a>&nbsp;&nbsp;&nbsp; <a id="page_next" onclick="next_page('next')"><span id="txt_page_after">Trang trước</span></a>>>

                                        </div>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-12" id="div-detail" style="display:none">
                <div class="inqbox">
                    <div class="inqbox-content">
                        <div id="content_detail" class="tab-pane active">


                        </div>
                        <div class="tab-content" id="history_trading">

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    {{-- Model_detail_customer  --}}

    {{-- -------------------------------------------------------------  --}}
    {{-- Model_creat_customer  --}}

    <div id="modal_create" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h2 class="modal-title" style="color:black"><strong>Tạo mới</strong></h2>
                    </center>
                </div>
                <div class="modal-body">

                    <form id="insert_customer_form">
                        
                        <label>Tên khách hàng (<font style="color: red">*</font>)</label>
                        <input type="text" name="customer_fullname" id="customer_fullname" class="form-control" />
                        <small id="ercustomer_fullname" class="text-danger"></small>
                        <br />

                        <label>Số điện thoại: </label>
                        <input type="text" id="customer_phone" name="customer_phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="KT_sodienthoai(this.value)" maxlength="10" class="form-control" />
                        <small id="ercustomer_phone" class="text-danger"></small>
                        <br />

                        <label>Mật khẩu: </label>
                        <input type="password" id="customer_password" name="customer_password" m class="form-control" />
                        <small id="ercustomer_password" class="text-danger"></small>
                        <br />
                       
                       
                        

                        <button type="button" name="insert" id="create_customer" class="btn btn-success">Tạo mới</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_modol_insert" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    {{-- -------------------------------------------------------------  --}}

    {{--EDIT -------------------------------------------------------------  --}}
    <div id="modal_update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center>
                        <h2 class="modal-title" style="color:black"><strong>Chi tiết khách hàng</strong></h2>
                    </center>
                </div>
                <div class="modal-body">

                    <form id="update_customer_form">
                        {{ csrf_field() }}

                        <label>Tên khách hàng (<font style="color: red">*</font>)</label>
                        <input type="text" id="ecustomer_fullname" class="form-control" />
                        <small id="eercustomer_name" class="text-danger"></small>
                        <br />

                        <label>Số điện thoại </label>
                        <input type="tel" id="ecustomer_phone" onkeypress='return event.charCode >= 48 && event.charCode <= 57' onkeyup="KT_esodienthoai(this.value)" maxlength="10" class="form-control">
                        <small id="eercustomer_phone" class="text-danger"></small>
                        <br />

                       


                       
                        <button type="buuton" name="insert" id="update_customer" class="btn btn-success">Cập nhật</button>
                       
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close_modol_update" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


   





    <div class="modal" id="alert_change_pass_dashboard2" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document" style="background-color: #87CEEB">
            <div class="modal-content">
            </div>
            <div class="modal-body" id="content_alert_das2">

            </div>
            <div class="modal-footer">
                <button type="button" id="ok_alert_das" class="btn btn-secondary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
    </div>


    <div class="modal" id="change_password_customer_Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
            <div class="modal-body" id="content_alert">
                <form id="update_password_form22">
                    <meta name="csrf-token-change-password" content="{{ csrf_token() }}" />
                    <div class="inqbox-content">

                        <label>Mật khẩu mới</label>
                        <div class="input-group" id="show_hide_password4">
                            <input class="form-control" type="password" name="account_password_quenmk" id="dashpassword_change_customer">
                            <br />
                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <small id="dasherpassword_customer" class="text-danger"></small>
                        <br />
                        <br />
                        <label>Nhập lại mật khẩu</label>
                        <div class="input-group" id="show_hide_password5">
                            <input class="form-control" type="password" name="account_password" id="dashpassword_change_customer2">

                            <div class="input-group-addon">
                                <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <small id="dasherpassword2_customer" class="text-danger"></small>
                        <br />
                        <br />
                        <input type="submit" name="edit" id="btn_change_password_cus" value="Cập nhật" class="btn btn-success" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="close_modol_changge_password2" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>



    

   


</body>

<script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('backend/js/main/admin_customer.js') }}"></script>
@endsection