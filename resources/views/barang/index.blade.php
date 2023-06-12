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
                            <tr class="ligth">
                                <th>No</th>
                                <th style="min-width: 150px">Foto</th>
                                <th>Nama Barang</th>
                                <th>Tanggal</th>
                                <th>Stok barang</th>
                                <th>Harga Awal</th>
                                <th>Deskripsi Barang</th>
                                <th style="min-width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @php $no = 1@endphp
                               @foreach($barang as $b) 
                               <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><img src="{{ url('Assets/assets/img/barang/'.$b -> foto) }}" width="100%"alt="" srcset=""></td>
                                    <td>{{ $b -> nama_barang }}</td>
                                    <td>{{ $b -> tanggal }}</td>
                                    @if($b -> stok_barang == 0)
                                    <td>{{ $b -> stok_barang }} <p class="text-danger ">Stok barang habis</p></td>
                                    @else
                                    <td>{{ $b -> stok_barang }}</td>
                                    @endif
                                    <td>{{ number_format($b -> harga_awal,0,',','.') }}</td>
                                    <td>{!! nl2br($b -> deskripsi_barang) !!}</td>
                                    <td>
                                        <a href="{{ url('master-barang/update/'.$b -> id_barang)}}"class="btn btn-outline-warning">update</a>
                                        <a href="javascript:coreDeleteData('{{ route('hapus-barang',['barang' => $b]) }}');"class="btn btn-outline-danger">Delete</a>
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
@include('template.footerAdmin')
<script>
    function deleteData(idBarang){
        coreDeleteData(`master-barang/delete/${idBarang}`);
    }
</script>