<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// untuk mengamankan password pengguna pada aplikasi atau website yang kita buat
use Illuminate\Support\Facades\Hash;
// memanggil model md_barang
use App\Models\md_barang;
class BarangController extends Controller
{
    // fungsi untuk menampilkan data barang
    public function index(){
        $pageName = 'List Data';
        $barang = md_barang::all();
        return view('barang.index') -> with(compact('barang','pageName'));
    }
    public function insert(){
        $pageName = 'Tambah Barang';
        return view('barang.insert') -> with(compact('pageName'));
    }
    // fungsi untuk menambahkan data barang
    public function prosesInsert(Request $request){
        $fotoSiswa = $request -> file('foto') -> store('barang');
        md_barang::create([
            'stok_barang' => $request -> stok_barang, 
            'foto' => str_replace('barang/','',$fotoSiswa),
            'nama_barang' => $request -> nama_barang,
            'tanggal' => $request -> tanggal,
            'harga_awal' => $request -> harga_awal,
            'deskripsi_barang' => $request -> deskripsi_barang,
        ]);
        return redirect('/master-barang') -> with('alertSuccess','Data berhasil ditambahkan');
    }
    public function update(md_barang $barang){
        $pageName ='Ubah data';
        return view('barang.update') -> with(compact('barang','pageName'));
    }
    // fungsi untuk mengedit data barang
    public function prosesUpdate(md_barang $barang,Request $request){
        if(!empty($request -> foto)){
            $fotoBarang = $request -> foto -> store('barang');
            $fotoBarang = str_replace('barang/','',$fotoBarang);
        }else{
            $fotoBarang = $barang -> foto;
        }
        $barang -> stok_barang = $request -> stok_barang;
        $barang -> nama_barang = $request -> nama_barang;
        $barang -> tanggal = $request -> tanggal;
        $barang -> harga_awal = $request -> harga_awal;
        $barang -> foto  = $fotoBarang;
        $barang -> deskripsi_barang = $request -> deskripsi_barang;
        $barang -> save();
        return redirect('/master-barang') -> with('alertSuccess','Data berhasil diubah');
    }
    // fungsi untuk menghapus data barang
    public function delete(md_barang $barang){
        $barang -> delete();
        return redirect('master-barang') -> with('alertSuccess','Data berhasil dihapus');
    }
}
