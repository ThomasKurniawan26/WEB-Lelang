<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class md_barang extends Model
{
    use HasFactory;
    // nama table dari database
    protected $table = 'tb_barang';
    // primaryKey tb_barang dari database
    protected $primaryKey = 'id_barang';
    // untuk mengatur field mana yang tidak boleh diisi saat insert data
    protected $guarded = [];
}
