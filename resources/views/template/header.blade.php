<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Aplikasi Lelang </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('Assets/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ url('Assets/assets/img/appKle-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('Assets/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ url('Assets/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('Assets/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ url('Assets/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ url('Assets/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ url('Assets/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ url('/Assets/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('Assets/assets/css/style.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Arsha - v4.11.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    @php
    $user = Auth() -> guard('Masyarakat') -> user();
    @endphp
    <!-- loader -->

    <!-- ======= Header ======= -->
    <header id="header" class="bg-primary">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="{{ url('/') }}" class="logo me-auto"><img src="{{ url('Assets/assets/img/lelang-logo.png') }}"
                    alt="" class="img-fluid"></a>
            <nav id="navbar" class="navbar">
                <ul class="mr-2 text-white ms-2">

                    @if(!is_null($user))
                    <div class="dropdown">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <li><img src="{{ url('Assets/hope/html/assets/images/avatars/laki-laki.png') }}"
                                    style="width:50px;" alt="" srcset=""> </li>
                            <li class="ms-2 mt-3">
                                <p>{{ ucFirst($user -> nama_lengkap) }}</p>
                            </li>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <li><a class="dropdown-item" href="#"><h5 class="mt-1 fas fa-user "><span class="ms-2">Profile</span></h5></a></li>
                            <hr>
                            <li><a class="dropdown-item" href="javascript:confirmLogoutMasyarakat();"><p class="fas fa-power-off text-danger"><span class="ms-2">Keluar</span></p></a></li>
                        </ul>
                    </div>
                    @else
                    <li><a class="nav-link scrollto active text-white" id="datang" href="{{ url('/') }}">Selamat
                            Datang</a></li>
                    <li><a class="nav-link scrollto active text-white ms-2" id="registrasi"
                            href="{{ url('/registrasi') }}">Registrasi</a></li>
                    <li><a class="nav-link scrollto active text-white" id="masuk" href="{{ url('/login') }}">Masuk</a>
                    </li>
                    @endif
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
