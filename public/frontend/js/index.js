function get_list_blog()
{
    $.ajax({
            url: urlapi+"/api/blog/list",
            method: "post",
            data: {
            },
            dataType: "JSON",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (data) {
                let output="";
                if (data.success == "true") {
                    
                    $.each(data.data, function(k, v) {
                        
                        output += `<div class="blog-item col-lg-4 col-sm-6 col-12">
                                    <div class="bolg-item-img-box">
                                        <a href="${urlapi}/customer/blog?id=${v.id}" class="bolg-img">
                                            <img style="height: 320px !important" src="${urlapi+"/"+v.icon}" alt="">
                                        </a>
                                    </div>
                                    <div class="blog-item-info">
                                        <div class="collection-info-content">
                                            <h3 class="blog-title">
                                                <a href="#">${v.title}</a>
                                            </h3>
                                            <p class="blog-meta">
                                                ${v.created}
                                            </p>
                                            <p class="blog-script">
                                               ${v.content_short}
                                            </p>
                                        </div>
                                    </div>
                                </div>`;
                    });
                    
                }
                $("#content_list_blog").html(output)
            },
      });
}


$(document).ready(function () {
	
})