<?php

namespace App\Http\Controllers;
// memanggil model tb_lelang
use App\Models\tb_lelang;
use App\Models\tb_penawaran;
use Illuminate\Http\Request;
// auth sebagai elemen security/perlindungan untuk melindungi halaman-halaman dari sebuah web atau aplikasi
use Illuminate\Support\Facades\DB;
// memanggil model tb_penawaran
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DataBarangLelangController extends Controller
{
    // fungsi untuk menampilkan data barang yang ingin dilelang
    public function index(){
        $user = Auth::guard('Masyarakat') -> user();
        $time = strtotime('now');
        $barangDibuka = tb_lelang::where(DB::raw('UNIX_TIMESTAMP(tgl_lelang)'), '<=', $time) 
        -> where(DB::raw('UNIX_TIMESTAMP(tgl_akhir)'), '>=', $time) 
        -> where('status','dibuka')
        -> orderBy('id_lelang','desc') -> with('barang') -> get();
        $barangDitutup = tb_lelang::where(DB::raw('UNIX_TIMESTAMP(tgl_lelang)'), '>=', $time) 
        -> where('status','dibuka')
        -> orderBy('id_lelang','desc') -> with('barang') -> get();
        return view('index') -> with(compact('user','barangDibuka','barangDitutup'));
    }
    // fungsi untuk melihat detail data barang yang dilelang
    public function detailLelang(tb_lelang $lelang){
        $penawaran = tb_penawaran::where('id_lelang',$lelang -> id_lelang) -> orderBy('penawaran_harga','desc') -> get();
        $user = Auth::guard('Masyarakat') -> user();
        return view('lelang.detail') -> with(compact('lelang','penawaran'));
    }
    // fungsi untuk melakukan penawaran
    public function nominalPenawaran(tb_lelang $lelang,Request $request){
        if($request -> penawaran_harga <= $lelang -> barang -> harga_awal ){
            return redirect('detail-lelang/'.$lelang -> id_lelang) -> with('alertFailed','Penawaran tidak boleh dibawah harga awal');
        }
        $user = Auth::guard('Masyarakat') -> user();
        tb_penawaran::create([
            'penawaran_harga' => $request -> penawaran_harga,
            'id_lelang' => $lelang -> id_lelang,
            'id_barang' => $lelang -> id_barang,
            'id_user' => $user -> id_user,
        ]);
        return redirect('detail-lelang/'.$lelang -> id_lelang) -> with('alertSuccess','Penawaran berhasil diinput, silahkan refresh halaman ini');
    }
}
