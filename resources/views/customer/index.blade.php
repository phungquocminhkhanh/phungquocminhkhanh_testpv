<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost/php/NEU/3.%20De-an-KHMT/FurnitureSunflower/">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>
    <meta name="description" content="Nội thất gia đình">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('WED_NAME')}}</title>
    <meta charset="UTF-8">
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css')}}" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer"/>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <!-- bootstrap 4 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


    <!-- css -->
    <link rel="stylesheet" href="{{ asset('frontend/css/defaultCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/homeCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/productListCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/productDetailsCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cartCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/contactCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/aboutUsCss.css')}}">
    <link rel="stylesheet" href="{{ asset('frontend/css/accountCss.css')}}">
    <link href="{{asset('frontend/demo/demo.css')}}" rel="stylesheet" />
</head>
<body>
    <input type="hidden" id="urlapi" value="{{URL::to('')}}">
    <div class="page-wrapper">
        <?php $page="home";   
            $data_customer= Session::get('data_customer') ??"" ;
            $id_customer="";
            if($data_customer)
            {
                $id_customer=$data_customer->id;
            }
        ?>
        <input type="hidden" id="id_customer" value="{{$id_customer}}">
        @include('customer.block.header')
        @include('customer.block.container')


        @yield('customer_content')


        @include('customer.block.footer')
        <section class="buttonUpToTop">up-arrow
            <a href="#" title="Lên đầu trang" id="upTop">
                <img style="width: 11% !important" height="30px" src="{{asset('frontend/images/up-arrow.png')}}">
            </a>
        </section>

    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <!-- jquery 3.6.0 (lastest in 13/7/2021) -->
    <script src="{{ asset('backend/js/jquery-3.5.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- js -->
    <script src="{{asset('frontend/demo/bootstrap-notify.js')}}"></script>
    <script src="{{asset('frontend/demo/demo.js')}}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckfinder/ckfinder.js') }}"></script>
    <script type="text/javascript" src="{{asset('frontend/js/myJS.js')}}"></script>
    <script src="{{ asset('backend/js/socket.js') }}"></script>
    <script src="{{ asset('backend/js/main/admin_local.js') }}"></script>
    <script src="{{ asset('frontend/js/index.js') }}"></script>
    @yield('customer_js')
</body>
</html>