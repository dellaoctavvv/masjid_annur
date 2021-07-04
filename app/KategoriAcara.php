<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAcara extends Model
{
    protected $table = 'kategori_acara';

    public $incrementing = false;
    protected $fillable = ['id','id_kategori','nama_kategori'];
}
