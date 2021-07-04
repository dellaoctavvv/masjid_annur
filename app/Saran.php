<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saran extends Model
{
    protected $table = 'tb_saran';

    public $incrementing = false;
    protected $fillable = ['id','nama', 'email', 'subjek', 'pesan'];
}
