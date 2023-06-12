<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// memanggil model tb_masyarakat
use App\Models\tb_masyarakat;
// untuk mengamankan password pengguna pada aplikasi atau website yang kita buat
use Illuminate\Support\Facades\Hash;
class MasyrakatController extends Controller
{
    public function RegistrasiMasyrakat(){
        return view('Masyrakat.Registrasi-Masyarakat');
    }
    // fungsi untuk registrasi masyarakat
    public function prosesRegistrasi(Request $request){
        tb_masyarakat::create([
            'nama_lengkap' => $request -> nama_lengkap,
            'username' => $request -> username,
            'password' => Hash::make($request -> password),
            'telp' => $request -> telp,
        ]);
        return redirect('/login') -> with('alertSuccess','Berhasil Melakukan Registrasi');
    }
}
