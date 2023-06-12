<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_lelang extends Model
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_lelang';
    // primaryKey tb_lelang dari database
    protected $primaryKey = 'id_lelang';
    // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded = [];
    // menonaktifkan creat up dan update up dari bawaan laravel
    public function barang(){
        return $this -> hasOne(md_barang::class,'id_barang','id_barang');
    }
    public function masyarakat(){
        return $this -> hasOne(tb_masyarakat::class,'id_user','id_user');
    }
    public function penawaran()
    {
        return $this->hasMany(tb_penawaran::class, 'id_lelang', 'id_lelang');
    }
    public function getPemenang()
    {
        $penawaran = $this->penawaran;
        $filterPenawaran = $penawaran->sortByDesc('penawaran_harga');
        return $filterPenawaran->first();
    }
    public function petugas(){
        return $this -> hasOne(tb_petugas::class,'id_petugas','id_petugas');
    }
    public function level(){
        return $this -> hasOne(tb_level::class,'id_level','id_level');
    }
}
