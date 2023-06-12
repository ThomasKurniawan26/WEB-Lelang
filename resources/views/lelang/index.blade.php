@include('template.headerAdmin')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">{{ $pageName }}</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table class="table table-striped" role="grid">
                        <thead>
                            <div class="d-flex justify-content-end">
                                <a href="/data-lelang/cetak" class="btn btn-success">Export</a>
                            </div>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Lelang</th>
                                <th>Harga Awal</th>
                                <th>Status</th>
                                <th style="min-width:150px;">Action</th>
                            </tr>
                            </thea.d>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach($lelang as $l)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $l -> barang -> nama_barang }}</td>
                                <td>{{ $l -> tgl_lelang }} s/d {{ $l -> tgl_akhir }}</td>
                                <td>{{ number_format($l -> barang -> harga_awal,0,'.','.') }}</td>
                                <td>{{ $l -> status }}</td>
                                <td>
                                    @if($l -> status != 'selesai')
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{$l -> id_lelang}}">Detail</button>
                                    <a href="javascript:coreDeleteData('{{ route('hapus-lelang', ['lelang' => $l]) }}');"
                                        class="btn btn-outline-danger">Delete</a>
                                    <button type="button" class="btn btn-outline-warning"
                                        data-bs-target="#modalEdit{{$l -> id_lelang}}"
                                        data-bs-toggle="modal">Update</button>
                                    @elseif($l -> status == 'selesai')
                                    <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalDetail{{$l -> id_lelang}}">Detail</button>
                                    <a href="javascript:coreDeleteData('{{ route('hapus-lelang', ['lelang' => $l]) }}');"
                                        class="btn btn-outline-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@foreach($lelang as $l)
<!-- Modal Update-->
<div class="modal fade" id="modalEdit{{ $l -> id_lelang }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" k>Update Status</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/data-lelang/prosesUpdate/'.$l -> id_lelang) }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="status" name="status" class="form-label">Status </label>
                        <select name="status" id="status" class="form-control">
                            <option value="ditutup" {{ $l -> status == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                            <option value="dibuka" {{ $l -> status == 'dibuka' ? 'selected' : '' }}>Dibuka</option>
                            <option value="selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <label for="tgl_lelang">Tanggal Awal</label>
                            <input type="datetime-local" class="form-control" value="{{ $l -> tgl_lelang }}"name="tgl_lelang" id="tgl_lelang">
                        </div>
                        <div class="col-6">
                            <label for="tgl_lelang">Tanggal Akhir</label>
                            <input type="datetime-local" class="form-control" value="{{ $l -> tgl_akhir }}"name="tgl_akhir" id="tgl_lelang">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END Modal Update -->

@foreach($lelang as $l)
@php 
    $pemenang = $l -> getPemenang();
    $no = $pemenang-> masyarakat -> telp ?? '';
    $telp = preg_replace('/^0/i', '+62',$no);
@endphp

<!-- Modal Detail-->
<div class="modal fade" id="modalDetail{{ $l -> id_lelang }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pemenang</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="form-label">Nama Masyarakat</label>
                            <input type="text"
                                value="{{ is_null($l->harga_akhir) ? '' : $pemenang -> masyarakat -> nama_lengkap }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">No telfon</label>
                            <input type="text"
                                value="{{ is_null($l->harga_akhir) ? '' : $pemenang -> masyarakat-> telp }}"
                                class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Harga Akhir</label>
                            <input type="text"
                                value="{{ is_null($l->harga_akhir) ? '' : number_format($pemenang  -> penawaran_harga,0,'.','.') }}"
                                class="form-control" readonly>
                        </div>
                        @if($l -> status == 'selesai')
                        <div class="form-group d-flex justify-content-end">
                            <a target="_blank"href="https://wa.me/{{ $telp }}?text=Halo%20Kakak%20{{ $l -> masyarakat -> nama_lengkap }}%20%20Selamat%20anda%20menjadi%20pemenang%20lelang%20{{ $l -> barang -> nama_barang }}%20di%20ThomAuction.Com.%0AMohon%20untuk%20melakukan%20transaksi%20untuk%20pembayaran%20lelang%20untuk%20pembayaran%20ada%20dibawah%20ini.%0A1.%20bank%20BCA%0A2.bank%20BNI%0A3.bank%20Mandiri%20%0ATerimakasih%20atas%20keikut%20sertaan%20anda"
                                class="btn btn-primary">kontak Pemenang<i class="ms-1 fas fa-phone-volume"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END Modal Detail -->
@include('template.footerAdmin')
<script>
    function deleteData(idBarang) {
        coreDeleteData(`master-barang/delete/${idBarang}`);
    }

</script>
