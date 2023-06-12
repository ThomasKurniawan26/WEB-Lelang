@include('template.headerAdmin')
<div class="row justify-content-center">
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ $pageName }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="{{ url('/master-barang/prosesUpdate/'.$barang -> id_barang) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="fname">Nama:</label>
                            <input type="text" class="form-control" value="{{ $barang -> nama_barang }}"id="fname" name="nama_barang"placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">Foto Barang</label>
                            <input type="file" class="form-control mb-1" id="fname" name="foto" placeholder="gambar">
                            <img src="{{ url('Assets/assets/img/barang/'.$barang -> foto) }}" width="50%" alt="">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal">tanggal</label>
                            <input type="date" class="form-control" value="{{ $barang -> tanggal }}"id="tanggal" name="tanggal"placeholder="tanggal input">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="harga_awal">Harga Awal</label>
                            <input type="harga_awal" value="{{ $barang -> harga_awal }}"class="form-control" id="harga_awal" name="harga_awal"placeholder="Harga Awal">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="harga_awal">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" class="form-control" id="" cols="30" rows="0">{{ $barang -> deskripsi_barang }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah Barang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footerAdmin')
