@include('template.header')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="bg-white card-header ">
                    <h5>Form registrasi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ url('/registrasi/proses') }}" method="post">
                        @csrf
                        <div class="form-group mb-2">
                            <label for="Nama" class="form-label">Nama:</label>
                            <input type="text" name="nama_lengkap" id="" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="username" class="form-label">username:</label>
                            <input type="text" name="username" id="" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password" class="form-label">password:</label>
                            <input type="password" name="password" id="" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="No-Telp" class="form-label">No-Telp:</label>
                            <input type="number" name="telp" id="" class="form-control">
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary ml-3">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-primary text-center bg-white">
                    <h5 class="mt-1">http://ThomAuction.com</h5>
                </div>
            </div>
        </div>
    </div>
</div>
@include('template.footer')
