<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{public_path('Assets/assets/css/bootstrap.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8">
                <table border="5px"class="table table-bordered">
                    <tr>
                        <td>Nama Pemenang</td>
                        <td>Nama Barang</td>
                        <td>Penawaran Harga</td>
                    </tr>
                    @foreach ( $listPemenang as $l)
                    <tr>
                        <td>{{ $l -> masyarakat -> nama_lengkap }}</td>
                        <td>{{ $l -> barang -> nama_barang }}</td>
                        <td>{{ number_format($l -> harga_akhir,0,'.','.') }}</td>
                    </tr>    
                    @endforeach
                   
                </table>
            </div>
        </div>
    </div>
</body>

</html>
