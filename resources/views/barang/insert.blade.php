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
                    <form action="{{ url('/master-barang/prosesInsert') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="fname">Nama:</label>
                            <input type="text" class="form-control" id="fname" name="nama_barang"placeholder="Nama Barang">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">Foto Barang</label>
                            <input type="file" class="form-control" id="fname" name="foto" placeholder="gambar">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal">tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal"placeholder="tanggal input">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="tanggal">Stok Barang</label>
                            <input type="number" class="form-control" id="stok_barang" name="stok_barang"placeholder="Masukan Stok Barang">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="harga_awal">Harga Awal</label>
                            <input type="harga_awal" class="form-control" id="harga_awal" name="harga_awal"placeholder="Harga Awal">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="harga_awal">Deskripsi Barang</label>
                            <textarea name="deskripsi_barang" class="form-control" id="" cols="30" rows="0"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Barang Baru</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footerAdmin')
