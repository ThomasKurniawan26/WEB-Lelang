<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// untuk memanggil model tb_lelang
use App\Models\tb_lelang;
// untuk memanggil model md_barang
use App\Models\md_barang;
// untuk memanggil model tb_masyarakat
use PDF;
use App\Models\tb_masyarakat;
class DataLelangController extends Controller
{
    // fungsi untuk menampilkan data lelang
    public function index(){
        $lelang = tb_lelang::all();
        $barang = md_barang::all();
        $pageName = 'Data Lelang';
        return view('lelang.index')-> with(compact('pageName','lelang','barang'));
    }
    public function insert(){
        $barang = md_barang::where('stok_barang','>',0)->get();
        $pageName = 'Tambah Lelang';
        return view('lelang.insert') -> with(compact('pageName','barang'));
    }
    // fungsi untuk menambahkan data lelang
    public function prosesInsert(Request $request){        
        if(!empty($request -> status)){
            $status = $request -> status;
        }else{
            $status = 'ditutup';
        }
        tb_lelang::create([
            'stok_lelang' => $request -> stok_lelang = 1,
            'id_barang' => $request -> barang,
            'tgl_lelang' => $request -> tgl_lelang,
            'status' => $status, 
            'tgl_akhir' => $request -> tgl_akhir,
        ]);
        return redirect('/data-lelang') -> with('alertSuccess','List Barang Lelang Ditambah');
    }
    // fungsi untuk menghapus data lelang
    public function delete(tb_lelang $lelang){
        $lelang -> delete();
        return redirect('data-lelang') -> with('alertSuccess','Data berhasil dihapus');
    }
    // fungsi untuk mengedit data lelang
    public function prosesUpdate(tb_lelang $lelang,Request $request){
        if($request -> status == 'selesai'){
            $pemenang = $lelang ->getPemenang();
            $lelang -> harga_akhir = $pemenang -> penawaran_harga;
            $lelang -> id_user = $pemenang -> id_user;
        }
        $lelang -> status = $request -> status;
        $lelang -> tgl_lelang = $request -> tgl_lelang;
        $lelang -> tgl_akhir = $request -> tgl_akhir;
        $lelang -> save();
        return redirect('/data-lelang') -> with('alertSuccess','Data berhasil diubah');
    }
    public function cetak(){
        $listPemenang = tb_lelang::where('status','selesai') -> get();
        $pdf = PDF::loadview('list-pemenang',['listPemenang' => $listPemenang]);
        return $pdf -> download('list-pemenang.pdf');
    }
}
