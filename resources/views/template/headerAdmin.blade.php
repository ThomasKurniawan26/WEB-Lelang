<!doctype html>
<html lang="en" dir="ltr">
@php
$routeName = request()->route()->getName();
$user = Auth() -> guard('web') -> user();
@endphp

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Hope UI | Responsive Bootstrap 5 Admin Dashboard Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('Assets/hope/html/assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/core/libs.min.css') }}" />

    <!-- Aos Animation Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/vendor/aos/dist/aos.css') }}" />

    <!-- Hope Ui Design System Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/hope-ui.min.css?v=1.2.0') }}" />

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/custom.min.css?v=1.2.0') }}" />

    <!-- Dark Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/dark.min.css') }}" />

    <!-- Customizer Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/customizer.min.css') }}" />

    <!-- RTL Css -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/rtl.min.css') }}" />

</head>

<body class="  ">
    <!-- loader Start -->
    <div id="loading" class="">
        <div class="loader simple-loader">
            <div class="loader-body"
                style="background-image:url('/Assets/assets/img/lelang-logo.png'); background-repeat:no-repeat; background-position:center;">
            </div>
        </div>
    </div>
    <!-- loader END -->

    <aside class="sidebar sidebar-default navs-rounded-all ">
        <div class="sidebar-header d-flex align-items-center justify-content-start">
            <a href="#" class="navbar-brand">
                <!--Logo start-->
                <img src="{{url('Assets/assets/img/lelang-logo.png')}}" alt="logo" style="width:150px;" class=""
                    srcset="">
                <!--logo End-->
            </a>
            <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                <i class="icon">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor"
                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>
                </i>
            </div>
        </div>
        <div class="sidebar-body pt-0 data-scrollbar">
            <div class="sidebar-list">
                <!-- Sidebar Menu Start -->
                <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Home</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $routeName == 'Dashboard' ? 'active' : '' }}" aria-current="page"
                            href="{{ url('/dashboard') }}">
                            <i class="icon">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M16.0756 2H19.4616C20.8639 2 22.0001 3.14585 22.0001 4.55996V7.97452C22.0001 9.38864 20.8639 10.5345 19.4616 10.5345H16.0756C14.6734 10.5345 13.5371 9.38864 13.5371 7.97452V4.55996C13.5371 3.14585 14.6734 2 16.0756 2Z"
                                        fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M4.53852 2H7.92449C9.32676 2 10.463 3.14585 10.463 4.55996V7.97452C10.463 9.38864 9.32676 10.5345 7.92449 10.5345H4.53852C3.13626 10.5345 2 9.38864 2 7.97452V4.55996C2 3.14585 3.13626 2 4.53852 2ZM4.53852 13.4655H7.92449C9.32676 13.4655 10.463 14.6114 10.463 16.0255V19.44C10.463 20.8532 9.32676 22 7.92449 22H4.53852C3.13626 22 2 20.8532 2 19.44V16.0255C2 14.6114 3.13626 13.4655 4.53852 13.4655ZM19.4615 13.4655H16.0755C14.6732 13.4655 13.537 14.6114 13.537 16.0255V19.44C13.537 20.8532 14.6732 22 16.0755 22H19.4615C20.8637 22 22 20.8532 22 19.44V16.0255C22 14.6114 20.8637 13.4655 19.4615 13.4655Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Dashboard</span>
                        </a>
                    </li>
                    @if($user -> id_level == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ $routeName == 'master-admin' ? 'active' : '' }}"
                            data-bs-toggle="collapse" href="#horizontal-menu" role="button" aria-expanded="false"
                            aria-controls="horizontal-menu">
                            <i class="icon">

                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4"
                                        d="M10.0833 15.958H3.50777C2.67555 15.958 2 16.6217 2 17.4393C2 18.2559 2.67555 18.9207 3.50777 18.9207H10.0833C10.9155 18.9207 11.5911 18.2559 11.5911 17.4393C11.5911 16.6217 10.9155 15.958 10.0833 15.958Z"
                                        fill="currentColor"></path>
                                    <path opacity="0.4"
                                        d="M22.0001 6.37867C22.0001 5.56214 21.3246 4.89844 20.4934 4.89844H13.9179C13.0857 4.89844 12.4102 5.56214 12.4102 6.37867C12.4102 7.1963 13.0857 7.86 13.9179 7.86H20.4934C21.3246 7.86 22.0001 7.1963 22.0001 6.37867Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M8.87774 6.37856C8.87774 8.24523 7.33886 9.75821 5.43887 9.75821C3.53999 9.75821 2 8.24523 2 6.37856C2 4.51298 3.53999 3 5.43887 3C7.33886 3 8.87774 4.51298 8.87774 6.37856Z"
                                        fill="currentColor"></path>
                                    <path
                                        d="M21.9998 17.3992C21.9998 19.2648 20.4609 20.7777 18.5609 20.7777C16.6621 20.7777 15.1221 19.2648 15.1221 17.3992C15.1221 15.5325 16.6621 14.0195 18.5609 14.0195C20.4609 14.0195 21.9998 15.5325 21.9998 17.3992Z"
                                        fill="currentColor"></path>
                                </svg>
                            </i>
                            <span class="item-name">Master Admin</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="horizontal-menu" data-bs-parent="#sidebar-menu">
                            <li class="nav-item {{ $routeName == 'master-admin' ? 'active' : '' }}">
                                <a class="nav-link" href="{{ url('/master-admin') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name">List Data</span>
                                </a>
                            </li>
                            <li class="nav-item  {{ $routeName == 'tambah-admin' ? 'active' : '' }}">
                                <a class="nav-link " href="{{ url('/master-admin/insert') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> D </i>
                                    <span class="item-name">Tambah Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ $routeName == 'master-barang' ? 'active' : '' }}"
                            data-bs-toggle="collapse" href="#horizontal-barang" role="button" aria-expanded="false"
                            aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fas fa-dolly-flatbed"></i>
                            </i>
                            <span class="item-name">Master Barang</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="horizontal-barang" data-bs-parent="#sidebar-menu">
                            <li class="nav-item {{ $routeName == 'master-barang' ? 'active' : '' }}">
                                <a class="nav-link " href="{{ url('/master-barang') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name">List Data</span>
                                </a>
                            </li>
                            <li class="nav-item {{ $routeName == 'tambah-barang' ? 'active' : '' }}">
                                <a class="nav-link " href="{{ url('/master-barang/insert') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> D </i>
                                    <span class="item-name">Tambah Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @if($user -> id_level == 2)
                    <li>
                        <hr class="hr-horizontal">
                    </li>
                    <li class="nav-item static-item">
                        <a class="nav-link static-item disabled" href="#" tabindex="-1">
                            <span class="default-icon">Data Lelang</span>
                            <span class="mini-icon">-</span>
                        </a>
                    </li>
                    <li class="nav-item {{ $routeName == 'data-lelang' ? 'active' : '' }}">
                        <a class="nav-link" data-bs-toggle="collapse" href="#horizontal-lelang" role="button"
                            aria-expanded="false" aria-controls="horizontal-menu">
                            <i class="icon">
                                <i class="fas fa-gavel"></i>
                            </i>
                            <span class="item-name">Data Lelang</span>
                            <i class="right-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </i>
                        </a>
                        <ul class="sub-nav collapse" id="horizontal-lelang" data-bs-parent="#sidebar-menu">
                            <li class="nav-item {{ $routeName == 'data-lelang' ? 'active' : '' }}">
                                <a class="nav-link " href="{{ url('/data-lelang') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> H </i>
                                    <span class="item-name">List Data</span>
                                </a>
                            </li>
                            <li class="nav-item {{ $routeName == 'tambah-lelang' ? 'active' : '' }}">
                                <a class="nav-link " href="{{ url('/data-lelang/insert') }}">
                                    <i class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="10" viewBox="0 0 24 24"
                                            fill="currentColor">
                                            <g>
                                                <circle cx="12" cy="12" r="8" fill="currentColor"></circle>
                                            </g>
                                        </svg>
                                    </i>
                                    <i class="sidenav-mini-icon"> D </i>
                                    <span class="item-name">Tambah Data</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endif 

                </ul>
                <!-- Sidebar Menu End -->
            </div>
        </div>
        <div class="sidebar-footer"></div>
    </aside>
    <main class="main-content">
        <div class="position-relative iq-banner">
            <!--Nav Start-->
            <nav class="nav navbar navbar-expand-lg navbar-light iq-navbar">
                <div class="container-fluid navbar-inner">
                    <a href="../dashboard/index.html" class="navbar-brand">
                        <!--Logo start-->
                        <img src="{{url('Assets/assets/img/lelang-logo.png')}}" alt="logo" class="" srcset="">
                        <!--logo End-->
                        <h4 class="logo-title">ThomAuction</h4>
                    </a>
                    <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
                        <i class="icon">
                            <svg width="20px" height="20px" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z" />
                            </svg>
                        </i>
                    </div>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="mb-2 navbar-nav ms-auto align-items-center navbar-list mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="py-0 nav-link d-flex align-items-center" href="#" id="navbarDropdown"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/01.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-default-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/avtar_1.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-purple-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/avtar_2.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-blue-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/avtar_4.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-green-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/avtar_5.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-yellow-img img-fluid avatar avatar-50 avatar-rounded">
                                    <img src="{{ url('Assets/hope/html/assets/images/avatars/avtar_3.png') }}"
                                        alt="User-Profile"
                                        class="theme-color-pink-img img-fluid avatar avatar-50 avatar-rounded">
                                    <div class="caption ms-3 d-none d-md-block ">
                                        <h6 class="mb-0 caption-title">
                                            {{ Auth() ->guard('web')-> user()->nama_petugas }}</h6>
                                        <p class="mb-0 caption-sub-title">
                                            {{ Auth() ->guard('web')->user()->level->level }}</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="../dashboard/app/user-profile.html">Profile</a>
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="../dashboard/app/user-privacy-setting.html">Privacy Setting</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="javascript:confirmLogout();">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav> <!-- Nav Header Component Start -->
            <div class="iq-navbar-header" style="height: 215px;">
                <div class="container-fluid iq-container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="flex-wrap d-flex justify-content-between align-items-center">
                                <div>
                                    <h1>Hello Devs! {{ Auth()->user()->nama_petugas }}</h1>
                                    <p>We are on a mission to help developers like you build successful projects for
                                        FREE.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="iq-header-img">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header.png') }}" alt="header"
                        class="theme-color-default-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header1.png') }}" alt="header"
                        class="theme-color-purple-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header2.png') }}" alt="header"
                        class="theme-color-blue-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header3.png') }}" alt="header"
                        class="theme-color-green-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header4.png') }}" alt="header"
                        class="theme-color-yellow-img img-fluid w-100 h-100 animated-scaleX">
                    <img src="{{ url('Assets/hope/html/assets/images/dashboard/top-header5.png') }}" alt="header"
                        class="theme-color-pink-img img-fluid w-100 h-100 animated-scaleX">
                </div>
            </div> <!-- Nav Header Component End -->
            <!--Nav End-->
        </div>
        <div class="conatiner-fluid content-inner mt-n5 py-0">
