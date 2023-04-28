// var xlat;
// var xlng;
// var mapbds;
// var geocode;//toa do luu
// function initMap() {
//         geocode={lat:10.739714,lng: 106.6781644};
//         mapbds = new google.maps.Map(document.getElementById("map"), {
//             center: geocode,
//             zoom: 13,
//             mapTypeId: "roadmap"
//         }); 
//         marker= new google.maps.Marker({
//             position:geocode,
//             map:mapbds
//         });
//       var auto= new google.maps.places.Autocomplete(document.getElementById("autoseach"));
//       // auto.addListener('place_changed', function(){
//       //       place=auto.getPlace();
//       //       mapbds.fitBounds(place.geometry.viewport);
//       //       marker.setPosition(place.geometry.location);
//       //       xlat=place.geometry.location.lat();
//       //       xlng=place.geometry.location.lng();
//       // });
//     //console.log(chieudai);

// }




function open_page_dk()
{
    $(".page-index").hide();
    $("#title_page").html("Đăng ký")
    $("#page_register").show();
}
function open_page_login()
{
    $(".page-index").hide();
    $("#title_page").html("Đăng nhập")
    $("#page_login").show();
}



$(document).ready(function () {

    $("#btn_page_dk").click(function (event) {
        event.preventDefault();
       open_page_dk();
    });
    $("#btn_page_login").click(function (event) {
        event.preventDefault();
        open_page_login();
    });
    

    $("#btn_submit_register").click(function (event) {
        let formData = new FormData();

        formData.append("customer_fullname", $("#fullname").val());

        formData.append("customer_phone", $("#phone").val());

        formData.append("customer_password", $("#password").val());

      
        $.ajax({
            url: urlapi+"/api/customer/create",
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
                    
                    open_page_login();
                    demo.showNotification("Đăng ký thành công");
                } else {
                    demo.showNotification(data.message);
                }
            },
        });
    });

    
 
});
