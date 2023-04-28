<?php
    $data_customer= Session::get('data_customer') ;

?>

<div class="panel-header">
    <div class="panel-header-inner">
        <div class="panel header clearfix page-header d-md-block d-none">
            <ul class="header clearfix links">

                @if($data_customer)
                <li class="float-right">
                    <a href="#" class="dropdown-toggle account-header" data-toggle="dropdown">
                        {{$data_customer->customer_fullname}}
                    </a>
                    <div class="dropdown-menu account-header-dropdown">
                        <a class="dropdown-item" href="{{route('manager_blog')}}">Quản lý bài viết</a>
                        <a class="dropdown-item" href="{{route('customer_logout')}}">Đăng xuất</a>
                    </div>
                </li>
                @else
               
                <li class="float-right">
                    <a href="{{route('customer_login')}}">Đăng nhập
                    </a>
                </li>
               @endif
                
                
               
            </ul>
        </div>
    </div>
</div>
<header class="page-header">
    <div class="header-inner">
        <div class="header content">
            <!-- toggle nav -->
            <span data-action="toggle-nav" class="action nav-toggle d-md-none d-block" data-toggle="collapse" data-target="#collapsibleNavbarHome">
                <!-- <span>Toggle Nav</span> -->
                <span class="fa fa-bars"></span>
            </span>

            <!-- logo -->
            <a href="{{route('customer_home')}}" class="logo" title="The Furniture Shop">
                <img src="{{ asset('frontend/images/logos/logo-befurniture.png')}}" alt="Logo Furniture" class="logo-furniture d-md-block d-none">
            </a>

            <!-- shopping cart -->
           

            <!-- search -->
           

        </div>
        <!-- nav section -->
        <div class="sections nav-section" id="navSections">
            <div class="close-nav clearfix d-md-none d-block">
                <!-- <i class="fa fa-remove"></i> -->
                <img src="{{ asset('frontend/images/icons/icon-remove.png')}}" alt="Close">
            </div>
            <nav id="fntMenu-5" class="navigation fntMenuOuter horizontal navbar navbar-expand-md navbar-light" role="navigation">
                <div class="collapse navbar-collapse d-flex justify-content-between" id="collapsibleNavbarHome">
                    <ul class="fntMenu mega-menu horizontal navbar-nav">
                        <li class="nav-item">
                            <a href="{{route('customer_home')}}" class="nav-link">
                                Trang chủ&nbsp;
        
                            </a>
                           
                        </li>
                       
                       
                        <!-- <li class="nav-item">
                            <a href="./Blog" class="nav-link">
                                Blog
                            </a>
                        </li> -->
                       
                       
                    </ul>
                   
                </div>
            </nav>
        </div>
    </div>
</header>