<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// auth sebagai elemen security/perlindungan untuk melindungi halaman-halaman dari sebuah web atau aplikasi
use Illuminate\Support\Facades\Auth;
// untuk memanggil model tb_masyarakat
use App\Models\tb_masyarakat;
// untuk mengamankan password pengguna pada aplikasi atau website yang kita buat
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    // fungsi untuk menampilkan halaman login masyarakat
    public function index(){
        if(Auth::guard('Masyarakat') -> check()){
            return redirect('/');
        }
        $pageTitle = 'Login Masyarakat';
        return view('login') -> with(compact('pageTitle'));
    }
     // fungsi untuk memproses apakah username dan password valid atau tidak valid
    public function proses(Request $request){
        $user = tb_masyarakat::where('username',$request -> username) -> first();
        if(is_null($user)){
            return redirect('/login') -> with('alertFailed','username anda tidak terdaftar')->withInput();
        }else if(!Hash::check($request ->password, $user -> password)){
            return redirect('/login') -> with('alertFailed','password yang anda masukan salah')->withInput();
        }
        Auth::guard('Masyarakat')->login($user);
        return redirect('/') -> with('alertSuccess','Login Berhasil');
    }
     // fungsi untuk logout dan dialhikan kehalaman login admin
    public function logout(){
        Auth::guard('Masyarakat') -> logout();
        return redirect('/') -> with('alertSuccess','Berhasil Keluar Selamat tinggal');
    }
}

