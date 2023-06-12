@include('template.header')
<!-- End Header -->
<section id="hero" class="d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                data-aos="fade-up" data-aos-delay="200">
                <h1>Aplikasi Lelang <span class="fs-2">https://AuctionThom.com</span></h1>
                <h2>Aplikasi lelang yang dibuat untuk kemudahan para pelajar dalam lelang</h2>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="{{ url('Assets/assets/img/hero-image.jpg') }}" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>
</section><!-- End Hero -->
<!-- ======= Hero Section ======= -->
<main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="home" class="list-lelang">
        <div class="container">
            <div class="row">
                <h5>Lelang Yang sedang berlangsung</h5>
                @if($barangDibuka -> count() == 0 )
                <h6>-Belum ada barang yang dilelang-</h6>
                @endif
                <hr>
                @foreach($barangDibuka as $bd)
                <div class="col-6 col-lg-3 mb-2">
                    <div class="card text-center">
                        <div class="card-img">
                            <img style="width:50%;" src="{{ url('Assets/assets/img/barang/'.$bd -> barang -> foto) }}"
                                class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5>{{ $bd -> barang -> nama_barang }}</h5>
                            </div>
                            <div class="isi">
                                <p>{{ $bd -> barang -> deskripsi_barang }}</p>
                                <h5 class="text-success">{{ number_format($bd -> barang -> harga_awal,0,'.','.') }}</h5>
                                @if(!is_null($user))
                                <a href="{{ url('detail-lelang/'.$bd -> id_lelang) }}" class="btn btn-primary">Detail
                                    Lelang</a>
                                @else
                                <a href="javascript:alertAkses();"></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <hr>
            <h4>Lelang Yang akan datang</h4>
            <div class="row">
                @if($barangDitutup -> count() == 0 )
                <h6>-Belum ada barang yang dilelang-</h6>
                @endif
                @foreach($barangDitutup as $bt)
                <div class="col-6 col-lg-3 mb-2">
                    <div class="card text-center">
                        <div class="card-img">
                            <img style="width:50%;" src="{{ url('Assets/assets/img/barang/'.$bt -> barang -> foto) }}"
                                class="card-img-top" alt="">
                        </div>
                        <div class="card-body">
                            <div class="judul">
                                <h5>{{ $bt -> barang -> nama_barang }}</h5>
                            </div>
                            <div class="isi">
                                <p>{{ $bt -> barang -> deskripsi_barang }}</p>
                                <h5 class="text-success">{{ number_format($bt -> barang -> harga_awal,0,'.','.') }}</h5>
                                <h5>lelang akan dibuka pada <br>{{ $bt -> tgl_lelang }}</h5>
                                @if(is_null($user))
                                <a href="javascript:alertAkses();" class="btn btn-primary">Detail Lelang</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Cliens Section -->

    <!-- ======= About Us Section ======= -->
    <!-- End About Us Section -->

    <!-- ======= Why Us Section ======= -->
    <!-- End Why Us Section -->

    <!-- ======= Skills Section ======= -->
    <!-- End Skills Section -->

    <!-- ======= Services Section ======= -->
    <!-- End Services Section -->

    <!-- ======= Cta Section ======= -->
    <!-- End Cta Section -->

    <!-- ======= Portfolio Section ======= -->
    <!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->
    <!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->
    <!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <!-- End Contact Section -->

</main><!-- End #main -->

@include('template.footer')
