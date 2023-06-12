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
                    <form action="{{ url('/data-lelang/prosesInsert') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="fname">Nama Barang</label>
                            <select name="barang" id="barang" class="form-control">
                                <option selected disabled>-Pilih Barang-</option>
                                @foreach($barang as $b)
                                <option value="{{ $b -> id_barang }}">{{ $b -> nama_barang }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">Jadwal Lelang</label>
                            <input type="datetime-local" class="form-control" id="fname" name="tgl_lelang" placeholder="jadwal lelang">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">Tanggal Berakhir</label>
                            <input type="datetime-local" class="form-control" id="fname" name="tgl_akhir" placeholder="tanggal Akhir">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fname">Stok Barang</label>
                            <input type="number" class="form-control" id="fname" readonly name="stok_lelang" placeholder="stok_lelang">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="status">Status</label>
                            <select name="status" class="form-control"id="status">
                                <option selected disabled>-Pilih Status-</option>
                                <option value="dibuka">Buka Lelang</option>
                                <option value="ditutup">Tutup Lelang</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Lelang</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footerAdmin')
