<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'tb_dkm';

    public $incrementing = false;
    protected $fillable = ['id','id_dkm','nama','jenis_kelamin','tgl_lahir','alamat','no_telpon','foto','id_gaji'];

    public function gaji()
    {
        return $this->belongsTo(Gaji::class, 'id_gaji', 'id');
    }
}
