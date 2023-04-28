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
            <div class="col-sm-12 col-12">
                <div class="inqbox">
                    <div class="inqbox-content">

                        <h2><strong>Bài viết</strong></h2>
                        <div class="clients-list">
                            <ul class="nav nav-tabs tab-border-top-danger">
                               
                                <li class="active"> <button type="button" onclick="create_item('create')" name="x" id="x" data-toggle="modal" data-target="#modal_create_blog" class="btn btn-warning">+</button></li>
                               
                            </ul>

                           
                            <div class="tab-content">

                                <div class="input-group" id="report-total">

                                </div>
                                
                                <div id="tab-account" class="tab-pane active">
                                    <div class="full-height-scroll">
                                        <div class="table-responsive" style="height: 100%;">
                                           
                                            <table class="table table-striped table-hover">
                                                <tr class="title-xx">
                                                    <th style="width:4%;"></th>
                                                    <th></th>
                                                    <th>Tiêu đề</th>
                                                    <th>Tóm tắt nội dụng</th>
                                                    <th>Ngày tạo</th>
                                                    <th>Người tạo</th>
                                                    <th></th>
                                                </tr>
                                                <tbody id="content_blog">
                                                    
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

            
            

        </div>
    </div>
    {{-- Model_detail_customer  --}}

    {{-- -------------------------------------------------------------  --}}
    {{-- Model_creat_customer  --}}

    <div id="modal_create_blog" class="modal fade">
        <div class="modal-dialog" style="width: 70% !important;">
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
                        <input type="file" onchange="select_img('icon_blog','content_icon_log','30%','250px')" id="icon_blog"  multiple class="form-control" />  
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

   
  

</body>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
<script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
<script src="{{ asset('backend/js/main/admin_blog.js') }}"></script>
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