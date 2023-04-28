var _type_manager="";
var _id_blog="";

function create_item(type_manager)
{
    $("#form_blog input").val("");
    _type_manager=type_manager;
}
function edit_blog(id)
{
    _type_manager="update";
    _id_blog=id;
    $.ajax({
            url: urlapi+"/api/blog/list",
            method: "post",
            data: {
                id_blog:id
            },
            dataType: "JSON",
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data.success=="true")
                {
                    let v=data.data[0];
                    CKEDITOR.instances['content'].setData(v.content);
                    $("#content_short").val(v.content_short);
                    $("#title").val(v.title);
                    output_img(urlapi+"/"+v.icon,'content_icon_log','30%','250px');

                    $("#status option[value="+v.status+"]").prop("selected",true);    

                }
            },
      });
}
var page_next=1;
function next_page(type)
{
    if(type=="back")
    {
        if(page_next!=1)
        {
            page_next=page_next-1;
            show_blog(page_next);
            if(page_next==1)
            {
                $("#page_back").css('color','#303030')
            }
            else
            {
                $("#page_back").css('color','rgb(60, 141, 188)')
            }
        }
    }
    else
    {
        page_next=page_next+1;
        show_blog(page_next);
        $("#page_back").css('color','rgb(60, 141, 188)')
    }
}

function show_blog(page)
{
    let data={
        //filter:$("#key_seach").val()
    };
        
    $.ajax({
            url: urlapi+"/api/blog/list",
            method: "POST",
            data:data, // chuyen vao bien name vs du lieu cua input do
            dataType: "json",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
              
                let output=``;
                
                let btn_dieuhanh="";
                if (data.success == "true") {
                    
                    $.each(data.data, function(k, v) {
                        btn_dieuhanh=`
                                     <div class="dropdown">
                                      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Cài đặt
                                      <span class="caret"></span></button>
                                      <ul style="color:blue;" class="dropdown-menu">
                                        <li><a onclick="edit_blog('${v.id}')" data-toggle="modal" data-target="#modal_create_blog">Sửa</a></li>
                                        <li><a onclick="delete_blog('${v.id}')">Xóa</a></li>
                                      </ul>
                                    </div>
                                `;
                        output += `
                            <tr class="title-xx">
                                    <td style="width:4%;">${page*10-9+k}</td>
                                    <td></td>
                                    <td>${v.title}</td>
                                    <td>${v.content_short}</td>
                                    <td>${v.created}</td>
                                    <td>${v.customer_fullname??"admin"}</td>
                                    <td>${btn_dieuhanh}</td>
                            </tr>
                        `;

                       

                    });
                    
                }
                
                
                $("#content_blog").html(output)
            },
      });
}
function delete_blog(id_blog)
{
    $.ajax({
                url: urlapi+"/api/blog/delete",
                method: "post",
                data: {
                    id_blog:id_blog
                },
                dataType: "JSON",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if(data.success=="true")
                    {
                        alert(data.message);
                        show_blog(1);
                       
                    }
                    else
                    {
                        alert(data.message);
                    }
                }
          });
}
$(document).ready(function(){
    show_blog(1);
    
    


    $("#create_blog").click(function(e){
        event.preventDefault();
        var formData = new FormData();
       
        let urlapi_action="";
        if(_type_manager=="create")
        {
            urlapi_action=urlapi+"/api/blog/create";
        }
        else
        {
            urlapi_action=urlapi+"/api/blog/update";
            formData.append("id_blog", _id_blog);
            formData.append("status", $("#status").val());
        }

        let icon_blog=$("#icon_blog").prop('files')[0]??"";
        formData.append("icon",icon_blog);
        formData.append("title",$("#title").val());
        formData.append("content_short",$("#content_short").val());

        let content=CKEDITOR.instances.content.getData();
        
        let conten_final=content.replaceAll('<img alt="" src="/','<img alt="" src="'+urlapi+'/');
        formData.append("content",conten_final);
     


        $.ajax({
            url: urlapi_action,
             method: "post",
             data:formData,
             dataType: 'JSON',
             contentType: false,
             cache: false,
             processData: false,
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if(data.success=="true")
                {
                    alert(data.message);
                    show_blog(1);
                    $("#modal_create_blog").modal("hide");
                }
                else
                {
                    alert(data.message);
                }
            },
      });
    })
    
})