<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katsum extends Model
{
    protected $table = 'tb_katsum';

    public $incrementing = false;
    protected $fillable = ['id','id_katsum','nama_katsum'];
}
