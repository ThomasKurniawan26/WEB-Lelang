@include('template.headerAdmin')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">User List</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="table-responsive">
                    <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                        <thead>
                            <tr class="ligth">
                                <th>No</th>
                                <th>Nama Petugas</th>
                                <th>Level</th>
                                <th>Username</th>
                                <th style="min-width: 100px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1@endphp
                               @foreach($petugas as $p) 
                               <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $p -> nama_petugas }}</td>
                                    <td>{{ $p -> level -> level }}</td>
                                    <td>{{ $p -> username }}</td>
                                    <td>
                                        <a href="{{ url('master-admin/update/'.$p -> id_petugas) }}"class="btn btn-outline-warning">update</a>
                                        <a href="javascript:coreDeleteData('{{ route('hapus-admin',['petugas' => $p]) }}');"class="btn btn-outline-danger">Delete</a>
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
