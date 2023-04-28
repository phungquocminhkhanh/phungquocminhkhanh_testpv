var _rate_star_comment="";
function get_blog_detail()
{
    $.ajax({
            url: urlapi+"/api/blog/list",
            method: "post",
            data: {
                id_blog:$("#id_blog").val(),
            },
            dataType: "JSON",
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let output_title="";
                let output_content="";
                if (data.success == "true") {
                    
                    let v=data.data[0];
                    output_title+=`<h1 class="page-title t-cap" id="title">
                                        ${v.title}
                                    </h1>
                                    <h6 class="page-title t-cap" id="">Được viết bởi: ${v.customer_fullname??"admin"}</h6>
                                    <h6 class="page-title t-cap" id="created_blog">${v.created}</h6>
                                    <h5 class="page-title t-cap" id="content_short">
                                        ${v.content_short}.
                                    </h5>`;
                    output_content=`
                    ${v.content}
                   
                    `;
                    
                }
                $("#content_title").html(output_title)
                $("#content").html(output_content)
            },
      });
}
function get_rate()
{
    $.ajax({
            url: urlapi+"/api/blog_rate/list",
            method: "post",
            data: {
                id_blog:$("#id_blog").val(),
            },
            dataType: "JSON",
             headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let output_comment="";
                let out_star="";
                $.each(data.data, function(k, v) {
                    console.log(data.data)
                    out_star="";
                    let rate_star=parseInt(v.rate_star);
                    for (var i = 1; i <=5 ; i++) {
                        if(i<=rate_star)
                        {
                            out_star+=`&starf;`;
                        }
                        else
                        {
                            out_star+=`&star;`;
                        }
                    }
                   
                    output_comment+=`   <div class="commented-section mt-2">
                                            <div class="d-flex flex-row align-items-center commented-user">
                                                <h5 class="mr-2">${v.customer_fullname}</h5><span class="dot mb-1"></span><span class="mb-1 ml-2">${v.created}</span>
                                            </div>
                                             <div class="d-flex flex-row align-items-center commented-user">
                                                <span class="star-comment">${out_star}</span>
                                             </div>
                                            <div class="comment-text-sm"><span>${v.comment}</span></div>
                                             
                                        </div>
                                        <hr>`;
                })
                $("#product_comment").html(output_comment);
            },
      });
}
$(document).ready(function () {
    get_list_blog();
    get_rate();
    if($("#id_blog").val()!="")
    {
        get_blog_detail()
    }

    $("input[name=star]").click(function(){
        _rate_star_comment=$(this).val();
        console.log(_rate_star_comment)
    });
    $("#btn_commnet").click(function(e){
        e.preventDefault();
        if($("#id_customer").val()=="")
        {
            demo.showNotification("Ban phai dang nhap de duoc binh luan");
            return;
        }
        if(_rate_star_comment=="")
        {
            demo.showNotification("Chon so sao danh gia");
            return;
        }
        let formData = new FormData();

        formData.append("id_blog", $("#id_blog").val());


        formData.append("id_customer", $("#id_customer").val());

        formData.append("rate_star", _rate_star_comment);

        formData.append("comment", $("#rate_comment").val());
        $.ajax({
             url: urlapi+"/api/blog_rate/create",
            method: "post",
            data: formData,
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                if (data.success == "true") {
                    get_rate();
                    demo.showNotification(data.message);
                } else {
                    demo.showNotification(data.message);
                }
            },
        });
    })
})