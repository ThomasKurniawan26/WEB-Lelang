<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_penawaran extends Model
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_penawaran';
    // primaryKey tb_penawaran dari database
    protected $primaryKey = 'id_penawaran';
     // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded = [];
    // menonaktifkan create up dan update up dari bawaan laravel
    public $timestamps = false;
    public function barang(){
        return $this -> hasOne(md_barang::class,'id_barang','id_barang');
    }
    public function masyarakat(){
        return $this -> hasOne(tb_masyarakat::class,'id_user','id_user');
    }
    public function lelang(){
        return $this -> hasOne(tb_lelang::class,'id_lelang','id_lelang');
    }
}
