<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    protected $table = 'tb_gaji';

    public $incrementing = false;
    protected $fillable = ['id','id_gaji','jabatan','nominal'];
}
