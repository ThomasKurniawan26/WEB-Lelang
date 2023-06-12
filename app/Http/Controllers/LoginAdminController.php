<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// auth sebagai elemen security/perlindungan untuk melindungi halaman-halaman dari sebuah web atau aplikasi
use Illuminate\Support\Facades\Auth;
// untuk mengamankan password pengguna pada aplikasi atau website yang kita buat
use Illuminate\Support\Facades\Hash;
// untuk memanggil model tb_petugas
use App\Models\tb_petugas;
class LoginAdminController extends Controller
{
    // fungsi untuk menampilkan halaman login admin
    public function index(){
           if(Auth::guard('web') -> check()){
            return redirect('/dashboard');
        }
        $pageTitle = 'Administrator';
        return view('login-admin') -> with(compact('pageTitle'));
    }
    // fungsi untuk memproses apakah username dan password valid atau tidak valid
    public function proses(Request $request){
       $user = tb_petugas::where('username',$request -> username) -> 
       where('tb_level.level',$request -> role) ->join('tb_level','tb_petugas.id_level','tb_level.id_level')-> first();
       if($user == null){
           return redirect('login-administrator') -> with('alertFailed','username atau role anda tidak terdaftar ') -> withInput();
       }else if(!Hash::check($request -> password, $user -> password)){
             return redirect('login-administrator') -> with('alertFailed','password anda salah');
       }else if(empty($request -> role)){
            return redirect('login-administrator') -> with('alertFailed','Wajib pilih role');
       }
       
       Auth::guard('web')->login($user);
       return redirect('/dashboard') -> with('alertSuccess','Selamat Datang '.$user -> nama_petugas);
    }
    // fungsi untuk logout dan dialhikan kehalaman login admin
    public function logout(){
        Auth::guard('web') -> logout();
        return redirect('/login-administrator') -> with('alertSuccess','Selamat datang kembali');
    }
}
