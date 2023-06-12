@include('template.header')
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li>Detail Barang</li>
            </ol>
            <h2>Detail Lelang</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">
                            
                            <div class="swiper-slide">
                                <img style="width:60%;" src="{{ url('Assets/assets/img/barang/'.$lelang -> barang -> foto) }}" alt="">
                            </div>
                           
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="portfolio-info">
                        <h3>Detail Lelang</h3>
                        <ul>
                            <li><strong>Nama Barang</strong>: {{ $lelang -> barang -> nama_barang }}</li>
                            <li><strong>Harga Awal</strong>: {{ number_format($lelang -> barang -> harga_awal,0,'.','.') }}</li>
                            <li><strong>Deskripsi Barang</strong>: {!! nl2br($lelang -> barang -> deskripsi_barang) !!}</li>
                        </ul>
                        @if($lelang -> status != 'selesai')
                        <div class="col-12 d-flex justify-content-end">
                            <button class="btn btn-success" data-bs-target="#modalPenawaran{{ $lelang -> id_lelang }}"
                                data-bs-toggle="modal">Ajukan
                                Penawaran</button>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="portfolio-info">
                        <h3>Detail Lelang</h3>
                        <table class="table text-center">
                            <thead class="table-info">
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Barang</th>
                                <th>Penawaran Harga</th>
                            </thead>
                            <tbody>
                              @php $No = 1@endphp
                              @foreach($penawaran as $p)
                                  <tr>
                                      <td>{{ $No++ }}</td>
                                      <td>{{ $p -> masyarakat -> nama_lengkap }}</td>
                                      <td>{{ $p -> barang -> nama_barang }} </td>
                                      <td>{{ number_format($p -> penawaran_harga,0,'.','.') }}</td>

                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
    <div class="modal" id="modalPenawaran{{ $lelang -> id_lelang }}" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ajukan Penawaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('penawaran/'.$lelang -> id_lelang) }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="" class="form-label">Harga Awal</label>
                            <li class="list-group-item list-group-item-danger p-2">
                                <strong>{{ number_format($lelang -> barang -> harga_awal,0,'.','.') }}</strong></li>
                        </div>
                        <div class="form-group">
                            <label for="nominal" class="form-label">Nominal Penawaran</label>
                            <input type="number" placeholder="Masukan Nominal Penawaran..." class="form-control"
                                name="penawaran_harga" id="nominal">
                        </div>
                        <div class="col-12 d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </form>
                    <hr>
                    <div class="footer mt-2 text-center">
                        <h6>Masukan Nominal Lebih dari Harga Awal</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
@include('template.footer')
