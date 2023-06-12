<?php

namespace App\Http\Controllers;
// memanggil model tb_petugas
use App\Models\tb_petugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// untuk mengamankan password pengguna pada aplikasi atau website yang kita buat
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // fungsi untuk menampilkan halaman admin
    public function index(){
        $pageName = 'List Data';
        $petugas = tb_petugas::all();
        return view('Petugas.index') -> with(compact('petugas','pageName'));
    }
    public function insert(){
        $pageName = 'Tambah Administrator';
        return view('Petugas.insert') -> with(compact('pageName'));
    }
    // fungsi untuk menambahkan data admin
    public function prosesInsert(Request $request){
        tb_petugas::create([
            'id_level' => $request -> level,
            'nama_petugas' => $request -> nama_petugas,
            'username' => $request -> username,
            'password' => Hash::make($request -> password),
        ]);
        return redirect('/master-admin') -> with('alertSuccess','Data berhasil ditambahkan');
    }
    public function update(tb_petugas $petugas){
        $pageName ='Ubah data';
        return view('Petugas.update') -> with(compact('petugas','pageName'));
    }
    // fungsi untuk mengedit data admin
    public function prosesUpdate(tb_petugas $petugas,Request $request){
        $petugas -> id_level = $request -> level;
        $petugas -> nama_petugas = $request -> nama_petugas;
        $petugas -> username = $request -> username;
        $petugas -> password = !empty($request -> password) ? Hash::make($request -> password) : $petugas -> password;
        $petugas -> save();
        return redirect('master-admin') -> with('alertSuccess','Data berhasil diubah');
    }
    // fungsi untuk menghapus data admin
    public function delete(tb_petugas $petugas){
        $petugas -> delete();
        return redirect('master-admin') -> with('alertSuccess','Data berhasil dihapus');
    }
}
