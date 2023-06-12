<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class tb_masyarakat extends Authenticatable
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_masyarakat';
    // primaryKey tb_masyarakat dari database
    protected $primaryKey = 'id_user';
    // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded = [];
    // menonaktifkan create up dan update up dari bawaan laravel
    public $timestamps = false;
}
