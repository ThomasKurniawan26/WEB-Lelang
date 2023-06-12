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
                    <form action="{{ url('/master-admin/prosesUpdate/'.$petugas -> id_petugas) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="fname">Nama:</label>
                            <input type="text" class="form-control" id="fname" value="{{ $petugas -> nama_petugas }}"name="nama_petugas"
                                placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="username">Username:</label>
                            <input type="text" class="form-control" id="username" value="{{ $petugas -> username }}" name="username"
                                placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Masukan jika ingin diubah" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group col-sm-12">
                            <label class="form-label">Role</label>
                            <select name="level" class="selectpicker form-control" data-style="py-0">
                                <option selected disabled>Pilih Role</option>
                                <option value="1"{{ $petugas -> id_level == '1' ? 'selected' :'' }}>Administrator</option>
                                <option value="2"{{ $petugas -> id_level == '2' ? 'selected' :'' }}>Petugas</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Ubah User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footerAdmin')
