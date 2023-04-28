var _id_customer="";
var urlapi=urlapi;
function edit_customer(id)
{
    $.ajax({
         url: urlapi+"/api/customer/list",
         method: "POST",
         data: {
            id_customer:id
         }, // chuyen vao bien name vs du lieu cua input do
         dataType: "json",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            if(response.success=="true")
            {
                let v=response.data[0];

                $("#modal_update").modal('show');
                _id_customer=v.id;
                $("#ecustomer_fullname").val(v.customer_fullname)
                $("#ecustomer_phone").val(v.customer_phone)
            }
        }
    })
}
function delete_customer(id)
{
    let r=confirm('Bạn có chắc muốn xóa tài khoản này không?')
    if(r==true)
    {
         $.ajax({
         url: urlapi+"/api/customer/delete",
         method: "POST",
         data: {
            id_customer:id
         }, // chuyen vao bien name vs du lieu cua input do
         dataType: "json",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            show_customer(1)
            alert(response.message);
        }
    })
    }
}
function show_customer(page)
{
    let data={
        filter:$("#key_seach").val()
    };
    console.log(11)
    $.ajax({
         url: urlapi+"/api/customer/list",
         method: "POST",
         data: data, // chuyen vao bien name vs du lieu cua input do
         dataType: "json",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response)
             var output = "";
            
             let i = 0;
             let btn_dieuhanh="";
             let text_disable="";
             if (response.success == "true") {
                 $.each(response.data, function(k, v) {
                    text_disable=(v.customer_disable=='N')?"Khóa tài khoản":"Mở tài khoản";
                 
                    btn_dieuhanh=`
                                     <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Cài đặt
                                      <span class="caret"></span></button>
                                      <ul style="color:blue;" class="dropdown-menu">
                                        <li><a onclick="edit_customer('${v.id}')" data-toggle="modal" data-target="#modal_update">Sửa</a></li>
                                        <li><a onclick="delete_customer('${v.id}')">Xóa tài khoản</a></li>
                                      </ul>
                                    </div>
                                `
           
                    output += `
                        <tr>
                            <td style="width:4%;">${page*10-9+k}</td>
                            <td>${v.customer_fullname}</td>
                            <td>${v.customer_phone}</td>
                            <td>${v.customer_registered}</td>
                            <td>
                                ${btn_dieuhanh}
                            </td>
                        </tr>
                   `;

                 });
                 $("#content-customer   ").html(output);
             } else {
                 $('#report-total').html(`<small>Tổng : 0</small><br />`)
                 $("#content-customer").html("");
             
             }

         }
     });
}


$(document).ready(function() {
    show_customer(1);

    $("#create_customer").click(function(e){
        e.preventDefault();
        var formData = new FormData();

        formData.append("customer_fullname", $('#customer_fullname').val());
        formData.append("customer_phone", $('#customer_phone').val());
        formData.append("customer_password", $('#customer_password').val());

        $.ajax({
             url: urlapi+"/api/customer/create",
             method: "post",
             data: formData,
             dataType: 'JSON',
             contentType: false,
             cache: false,
             processData: false,
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
                 if (data.success == "true") {
                     alert(data.message);
                     show_customer(1);
                     $('#modal_create').modal('hide');
                 } else {
                     alert(data.message);
                 }


             }
         });
    })


    $("#update_customer").click(function(e){
        e.preventDefault();
        var formData = new FormData();

        formData.append("id_customer", _id_customer);
        formData.append("customer_fullname", $('#ecustomer_fullname').val());
        formData.append("customer_phone", $('#ecustomer_phone').val());
        $.ajax({
             url: urlapi+"/api/customer/update",
             method: "post",
             data: formData,
             dataType: 'JSON',
             contentType: false,
             cache: false,
             processData: false,
              headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(data) {
                 if (data.success == "true") {
                     alert(data.message);
                     show_customer(1);
                     $('#modal_update').modal('hide');
                 } else {
                     alert(data.message);
                 }


             }
         });
    })
})