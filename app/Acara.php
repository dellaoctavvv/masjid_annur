<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acara extends Model
{
    protected $table = 'tb_acara';

    public $incrementing = false;
    protected $fillable = ['id','tanggal','nama_acara','id_kategori'];

    public function kategori()
    {
        return $this->belongsTo(KategoriAcara::class, 'id_kategori', 'id');
    }
}
