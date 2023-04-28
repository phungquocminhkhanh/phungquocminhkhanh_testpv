$(document).ready(function() {
	/* ================================= */
    /*           BUTTON TO TOP           */
    /* ================================= */
   
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            $("#upTop").fadeIn(300);
            $(".logo").css({
                "display": "none"
            });
        } else {
            $("#upTop").fadeOut(300);
            $(".logo").css({
                "display": "inherit"
            });
        }
    });
    $("#upTop").click(function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });

    /* ================================= */
    /*           HOME NAVIGATION         */
    /* ================================= */
    // close nav
    $("header .close-nav").on("click", function () {
        $("html").removeClass("nav-open");
        $("header .dropdown-item-lv2").hide();
        $("header .dropdown-toggle-down").hide();
    });
    // open nav
    $("header .nav-toggle").on("click", function () {
        $("html").addClass("nav-open");
        $("#fntMenu-5").css("display", "block");
        $("header .dropdown-item-lv2").hide();
        $("header .dropdown-toggle-down").hide();
        $("header .nav-item>.nav-link").css("border-bottom", "0");
        // $("#fntMenu-5").animate({width:'toggle'}, 500);
        // $(this).children(".dropdown-toggle-down").show("slide", { direction: "left" }, 350);
        // $("#box").animate({width:'toggle'}, 500);
    });
    $("header .nav-item>.nav-link-dropdown").on("click", function (e) {
        e.preventDefault();
        $("header .nav-item>.nav-link-dropdown").not(this).removeClass("active");
        $(this).toggleClass("active");
        if($(window).width() >= 768){
            $("header .dropdown-toggle-down").not($(this).next(".dropdown-toggle-down")).hide(500);
            $("header .dropdown-item-lv2").show(500);
            $(this).next(".dropdown-toggle-down").animate({width:'toggle'}, 500);
        } else {
            $("header .dropdown-toggle-down").not($(this).next(".dropdown-toggle-down")).hide(500);
            $("header .dropdown-item-lv2").hide(500);
            $(this).next("header .dropdown-toggle-down").animate({height:'toggle'}, 500);
        }
    });
    $("header .dropdown-object-lv2").on("click", function (e) {
        e.preventDefault();
        if($(window).width() < 768){
            $("header .dropdown-item-lv2").not($(this).next("header .dropdown-item-lv2")).hide(500);
            // $(this).next(".dropdown-item-lv2").show(500);
            $(this).next("header .dropdown-item-lv2").animate({height:'toggle'}, 500);
        }
    });

    /* ======================================= */
    /*           SLIDER PRODUCT IMAGES         */
    /* ======================================= */

    $(".slide-selector-item").on("click", function () {
        $(".slide-selector-item").removeClass("active");
        $(this).toggleClass("active");
    });

    /* ========================================================== */
    /*           COLLAPSE BLOCK DELIVERY IN SHIPPING PAGE         */
    /* ========================================================== */
    $(".title-block-shipping").on("click", function () {
        $(this).toggleClass("opened");
    });

   

    /* =============================================== */
    /*           AJAX FILTER AND PAGINATION            */
    /* =============================================== */
    // function getFilterInfor() {
    //     var classifyStatusVals = "";
    //     var productCategoryVals = "";
    //     var kindOfProductVals = "";
    //     var filterByPriceVal = "";
    //     var rs = "";

    //     $("input[name=classifyStatus]:checked").each(function() {
    //         classifyStatusVals += $(this).val() + ",";
    //     });

    //     $("input[name=productCategory]:checked").each(function() {
    //         productCategoryVals += $(this).val() + ",";
    //     });

    //     $("input[name=kindOfProduct]:checked").each(function() {
    //         kindOfProductVals += $(this).val() + ",";
    //     });

    //     filterByPriceVal += $("input[name=filterPrice]:checked").val();

    //     rs += "classifyStatusVals : " + classifyStatusVals + " + " +
    //         "productCategoryVals : " + productCategoryVals + " + " +
    //         "kindOfProductVals : " + kindOfProductVals + " + " +
    //         "filterByPriceVal : " + filterByPriceVal;
    //     return rs;
    // };
    // function searchPro(page, numItem) {
    //     // page    = parseInt(page);
    //     // numItem = parseInt(numItem);
    //     var sortOption      = $("#sortTopbar :selected").val(); //
    //     var searchNameValue = $("#inputSearchProByName").val(); //
    //     var proCate         = $(".life-space-items.list-1 li>a.active").attr('cate'); //
    //     var dropdownCate    = $(".product-categories.list-1 li>a.active").attr('dropdown-cate');  //

    //     if (proCate == undefined) { proCate = 0; }
    //     if (dropdownCate == undefined) { dropdownCate = 0; }

    //     $.post("./Ajax/GetProductInAPage", {
    //         // page: page,
    //         // numItemInAPage: numItem,
    //         sortOption: sortOption,
    //         searchValue: searchNameValue,
    //         proCateCheck: proCate,
    //         dropdownCateCheck: dropdownCate
    //     }, function(data) {
    //         alert(data);
    //         $("#show").load(" #show");
    //         $("#listPro").load(" #listPro");
    //     });
    // };
    // /* Ajax Phân trang */
    // // $(document).on('click', '#paginationProList .page-number', function(e) {
    // //     e.preventDefault();

    // //     var page = $(this).attr('page-value');
    // //     var numItem = $("#listPro").attr("show"); // số product hiện trên 1 trang

    // //     $(".page-number").removeClass('current');
    // //     $('[page-value=' + page + ']').not('.go-to-fist, .go-to-last').addClass('current');
    // //     searchPro(page, numItem);
    // // });
    // $(document).on('change submit', '.form-topbar, .form-search-product', function(e) {
    //     e.preventDefault();
    //     var page = 0;
    //     var numItem = $("#listPro").attr("show");

    //     searchPro(page, numItem);
    // });
    $(document).on('change submit', '.form-topbar, .form-search-product', function(e) {
        e.preventDefault();
        var sortOption      = $("#sortTopbar :selected").val(); //
        var searchNameValue = $("#inputSearchProByName").val(); //
        var proCate         = $(".life-space-items.list-1 li>a.active").attr('cate'); //
        var dropdownCate    = $(".product-categories.list-1 li>a.active").attr('dropdown-cate');  //

        if (proCate == undefined) { proCate = 0; }
        if (dropdownCate == undefined) { dropdownCate = 0; }

        $.post("./Ajax/GetProduct", {
            sortOption: sortOption,
            searchValue: searchNameValue,
            proCateCheck: proCate,
            dropdownCateCheck: dropdownCate
        }, function(data) {
            $("#listPro").load(" #listPro");
        });
    });

    /* ================================= */
    /*         AJAX FOR TO CART          */
    /* ================================= */
   

    // js input quantity cart



    /* ========================================= */
    /*           REGEXP AJAX REGISTER            */
    /* ========================================= */
    /* REGEXP AJAX FOR FORM REGISTER */
    function removeAscent (str) {
        if (str === null || str === undefined) return str;
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        return str;
    }
    function check_address() {
        var address = $("#address").val().trim();
        var err = "";

        if (address == "" || address == null) {
            err = "Trường này không được để trống!";
        }
        return err;
    };
    function check_firstName() {
        var firstName = $("#firstName").val().trim();
        var regexName = /^[a-zA-Z\s]{2,}$/g;
        var err = "";

        if (firstName == "" || firstName == null) {
            err = "Tên họ không được để trống!";
        }else if (!removeAscent(firstName).match(regexName)) {
            err = "Tên họ không hợp lệ!";
        }
        return err;
    };
    function check_lastName() {
        var lastName = $("#lastName").val() == undefined ? '' : $("#lastName").val().trim();
        var regexName = /^[a-zA-Z\s]{2,}$/g;
        var err = "";

        if (lastName == "" || lastName == null) {
            err = "Tên không được để trống!";
        }else if (!removeAscent(lastName).match(regexName)) {
            err = "Tên không hợp lệ!";
        }
        return err;
    };
    function check_name() {
        var name = $("#name").val() == undefined ? '' : $("#name").val().trim();
        var regexName = /^[a-zA-Z\s]{2,}$/g;
        var err = "";

        if (name == "" || name == null) {
            err = "Họ tên không được để trống!";
        }else if (!removeAscent(name).match(regexName)) {
            err = "Họ tên không hợp lệ!";
        }
        return err;
    };
    function check_userName() {
        var userName = $("#userName").val().trim();
        var regexUserName = /^[A-Za-z0-9_-]{3,}$/;
        var err = "";

        if (userName == "" || userName == null) {
            err = "Username không được để trống!";
        } else if (!userName.match(regexUserName)) {
            err = "Username tối thiểu 3 ký tự và không được chứa các ký tự đặc biệt!";
        }
        return err;
    };
    function check_phone() {
        var phone = $("#phone").val().trim();
        var regexPhone = /^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/;
        var err = "";

        if (phone == "" || phone == null) {
            err = "Số điện thoại không được để trống!";
        } else if (!phone.match(regexPhone)) {
            err = "Số điện thoại nhập không hợp lệ!";
        } else if (phone.length != 10 ) {
            err = "Số điện thoại gồm 10 số!";
        }
        return err;
    };
    function check_email() {
        var email = $("#email").val().trim();
        var regexEmail = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
        var err = "";

        if (email == "" || email == null) {
            err = "";
        } else if (!email.match(regexEmail)) {
            err = "Email nhập không hợp lệ!";
        }
        return err;
    };
    function check_passw() {
        var password = $("#password").val().trim();
        var regexPassw = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        var err = "";

        if (password == "" || password == null) {
            err = "Password không được để trống!";
        } else if (!password.match(regexPassw)) {
            err = "Password tối thiểu tám ký tự, ít nhất một chữ cái và một số!";
        }
        return err;
    };
    function check_cPassw() {
        var password = $("#password").val().trim();
        var cPassw = $("#confirmPassword").val().trim();
        var err = "";

        if (cPassw == "" || cPassw == null) {
            err = "Password không được để trống!";
        } else if (cPassw != password) {
            err = "Password nhập không trùng khớp!";
        }
        return err;
    };
    /* SHOW MESS FOR VALID INPUT */
    function messValidInput(selectorIn, selectorMess) {
        $(selectorIn).removeClass("is-invalid");
        $(selectorMess).removeClass("invalid-feedback");
        $(selectorIn).addClass("is-valid");
        $(selectorMess).addClass("valid-feedback");
    }
    /* SHOW MESS FOR INVALID INPUT */
    function messInValidInput(selectorIn, selectorMess) {
        $(selectorIn).removeClass("is-valid");
        $(selectorMess).removeClass("valid-feedback");
        $(selectorIn).addClass("is-invalid");
        $(selectorMess).addClass("invalid-feedback");
    }

    /* =========================================== */
    /*           AJAX VALIDATE REGISTER            */
    /* =========================================== */
    /* AJAX ACTION SHOW ERROR */
    $("#firstName").keyup(function() {
        var err = check_firstName();
        if (err == "") {
            messValidInput("#firstName", "#errFirstName");
        } else {
            messInValidInput("#firstName", "#errFirstName");
        }
        $("#errFirstName").html(err);
    });
    $("#lastName").keyup(function() {
        var err = check_lastName();
        if (err == "") {
            messValidInput("#lastName", "#errLastName");
        } else {
            messInValidInput("#lastName", "#errLastName");
        }
        $("#errLastName").html(err);
    });
    $("#formRegister #userName").keyup(function() {
        var userName = $("#userName").val().trim();
        var err = check_userName();
        if (err == "") {
            $.post("./Ajax/CheckUserName", {
                userName: userName
            }, function(data) {
                // alert(data);
                if (data == 'false') {
                    messValidInput("#formRegister #userName", "#errUserName");
                    $("#errUserName").html("");
                } else {
                    messInValidInput("#formRegister #userName", "#errUserName");
                    $("#errUserName").html("Username đã tồn tại!");
                }
            });
        } else {
            messInValidInput("#formRegister #userName", "#errUserName");
            $('#errUserName').html(err);
        }
    });
    $("#formRegister #phone").keyup(function() {
        var phone = $(this).val();
        var err = check_phone();
        if (err == "") {
            $.post("./Ajax/CheckPhone", {
                phone: phone
            }, function(data) {
                if (data == 'false') {
                    messValidInput("#formRegister #phone", "#errPhone");
                    $("#errPhone").html("");
                } else {
                    messInValidInput("#formRegister #phone", "#errPhone");
                    $("#errPhone").html("Số điện thoại đã tồn tại!");
                }
            });
        } else {
            messInValidInput("#formRegister #phone", "#errPhone");
            $("#errPhone").html(err);
        }
    });
    $("#formRegister #email").keyup(function() {
        var email = $(this).val();
        var err = check_email();
        if (err == "") {
            $.post("./Ajax/CheckEmail", {
                email: email
            }, function(data) {
                if (data == 'false') {
                    messValidInput("#formRegister #email", "#errEmail");
                    $("#errEmail").html("");
                } else {
                    messInValidInput("#formRegister #email", "#errEmail");
                    $("#errEmail").html("Địa chỉ email đã tồn tại!");
                }
            });
        } else {
            messInValidInput("#formRegister #email", "#errEmail");
            $("#errEmail").html(err);
        }
    });
    $("#password").keyup(function() {
        var err = check_passw();
        if (err == "") {
            messValidInput("#formRegister #password", "#errPassw");
        } else {
            messInValidInput("#formRegister #password", "#errPassw");
        }
        $("#errPassw").html(err);
    });
    $("#confirmPassword").keyup(function() {
        var err = check_cPassw();
        if (err == "") {
            messValidInput("#formRegister #confirmPassword", "#errConPassw");
        } else {
            messInValidInput("#formRegister #confirmPassword", "#errConPassw");
        }
        $("#errConPassw").html(err);
    });
    /* AJAX VALIDATE REGISTER FORM */
    
    $("#formSubmitPayment #address").keyup(function() {
        var err = check_address();
        if (err == "") {
            messValidInput("#purchaseInfor #address", "#errAddress");
        } else {
            messInValidInput("#purchaseInfor #address", "#errAddress");
        }
        $("#errAddress").html(err);
    });
    $("#formSubmitPayment #name").keyup(function() {
        var err = check_name();
        if (err == "") {
            messValidInput("#formSubmitPayment #name", "#errName");
        } else {
            messInValidInput("#formSubmitPayment #name", "#errName");
        }
        $("#errName").html(err);
    });
    $("#formSubmitPayment #phone").keyup(function() {
        var err = check_phone();
        if (err == "") {
            messValidInput("#formSubmitPayment #phone", "#errPhone");
        } else {
            messInValidInput("#formSubmitPayment #phone", "#errPhone");
        }
        $("#errPhone").html(err);
    });
    // $("#formSubmitPayment #email").keyup(function() {
    //     var err = check_email();
    //     if (err == "") {
    //         $messValidInput("#formSubmitPayment #email", "#errEmail");
    //     } else {
    //         messInValidInput("#formSubmitPayment #email", "#errEmail");
    //     }
    //     $("#errEmail").html(err);
    // });
    /* VALIDATE FORM */
   
    $(".btn-option").click(function () {
        let id_parent = $(this).parent().attr("id");
        $("#" + id_parent + " button").not(this).removeClass("btn-xanh");
        $("#" + id_parent + " button").not(this).addClass("btn-trang");

        $(this).addClass("btn-xanh");
    });
    
});