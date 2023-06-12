<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class tb_petugas extends Authenticatable
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_petugas';
    // primaryKey tb_petugas dari database
    protected $primaryKey = 'id_petugas';
     // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded = [];
    // menonaktifkan create up dan update up bawaan dari laravel
    public $timestamps = false;
    public function level(){
        return $this -> hasOne(tb_level::class,'id_level','id_level');
    }
}
