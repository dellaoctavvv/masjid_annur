<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ustadz extends Model
{
    protected $table = 'tb_ustadz';

    public $incrementing = false;
    protected $fillable = ['id','id_ustadz','nama','jenis_k','tgl_lahir','alamat','no_telpon','foto'];
}
