<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tb_level extends Model
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_level';
    // primaryKey tb_level dari database
    protected $primaryKey = 'id_level';
    // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded= [];
    // menonaktifkan creat up dan update up dari bawaan laravel
    public $timestamps = false;
}
