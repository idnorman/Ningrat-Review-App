<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriModel extends Model
{
    protected $table = 'mst_categories';

    protected $fillable = [
        'id_kategori',
        'nama_kategori',
        'deskripsi_kategori'
    ];
}
