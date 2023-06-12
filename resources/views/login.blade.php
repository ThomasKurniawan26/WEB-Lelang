<!doctype html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $pageTitle }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('Assets/hope/html/assets/images/favicon.ico') }}" />

    <!-- Library / Plugin Css Build -->
    <link rel="stylesheet" href="{{ url('Assets/hope/html/assets/css/core/libs.min.css') }}" />


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

<body class=" " data-bs-spy="scroll" data-bs-target="#elements-section" data-bs-offset="0" tabindex="0">
    <!-- loader Start -->
    <div id="loading">
        <div class="loader simple-loader">
            <div class="loader-body">
                <div class="row d-flex justify-content-center mt-5">
                    <div class="col-6">
                        <img src="{{ url('Assets/assets/img/lelang-logo.png') }}" alt="" width="90%" srcset="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader END -->

    <div class="wrapper">
        <section class="login-content">
            <div class="row m-0 align-items-center bg-white vh-100">
                <div class="col-md-6">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <div class="card card-transparent card-shadow d-flex justify-content-center mb-0 auth-card">
                                <div class="card-body">
                                    <h2 class="mb-2 text-center">Sign In</h2>
                                    <p class="text-center">ThomAuction.com</p>
                                    <form method="post" action="{{ url('login/proses') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="Username" class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="Username"
                                                        aria-describedby="Username" name="username" placeholder=" ">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="password" name="password" class="form-control"
                                                        id="password" aria-describedby="password" placeholder=" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                        </div>
                                        <p class="mt-3 text-center">
                                            Tidak Memiliki Akun? <a href="{{ url('/registrasi') }}"
                                                class="text-underline">Klik disini untuk Registrasi</a>
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 d-md-block d-none bg-white p-0 mt-n1 vh-100 overflow-hidden">
                    <img src="{{ url('Assets/assets/img/lelang-logo.png') }}"
                        class="img-fluid gradient-main animated-scaleX" alt="images">
                </div>
            </div>
        </section>
    </div>

    <!-- script sweetalert -->
  <script src="{{ url('Assets/assets/js/sweetalert2@11.js') }}"></script>
  @if(session('alertSuccess'))
  <script>
        interval = setInterval(function(){
            const isHide = $('#loading') !== undefined;
            
            if(isHide){
                Swal.fire(`Berhasil!`, `{{ session('alertSuccess') }}`, `success`);
                clearInterval(interval);
            }
        },4000);
  </script>
  @php session()->forget('alertSuccess'); @endphp

  @elseif(session('alertFailed'))
  <script>
           interval = setInterval( function() {
                const isHide = $('#loading') !== undefined;
                
                if(isHide) {
                    Swal.fire(`Gagal`, `{{ session('alertFailed') }}`, `error`);
                    clearInterval(interval);
                }
            }, 100);
  </script>
    @php session()->forget('alertFailed'); @endphp
  @endif
    <!-- Library Bundle Script -->
    <script src="{{ url('Assets/hope/html/assets/js/core/libs.min.js') }}"></script>

    <!-- External Library Bundle Script -->
    <script src="{{ url('Assets/hope/html/assets/js/core/external.min.js') }}"></script>

    <!-- Widgetchart Script -->
    <script src="{{ url('Assets/hope/html/assets/js/charts/widgetcharts.js') }}"></script>

    <!-- mapchart Script -->
    <script src="{{ url('Assets/hope/html/assets/js/charts/vectore-chart.js') }}"></script>
    <script src="{{ url('Assets/hope/html/assets/js/charts/dashboard.js') }}"></script>

    <!-- fslightbox Script -->
    <script src="{{ url('Assets/hope/html/assets/js/plugins/fslightbox.js') }}"></script>

    <!-- Settings Script -->
    <script src="{{ url('Assets/hope/html/assets/js/plugins/setting.js') }}"></script>

    <!-- Slider-tab Script -->
    <script src="{{ url('Assets/hope') }}"></script>

    <!-- Form Wizard Script -->
    <script src="{{ url('Assets/hope/html/assets/js/plugins/form-wizard.js') }}"></script>

    <!-- AOS Animation Plugin-->

    <!-- App Script -->
    <script src="{{ url('Assets/hope/html/assets/js/hope-ui.js') }}" defer></script>
</body>

</html>
