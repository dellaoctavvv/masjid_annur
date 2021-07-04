<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailAcara extends Model
{
    protected $table = 'tb_detail_jadwal';

    public $incrementing = false;
    protected $fillable = ['id','id_acara','id_ustadz','waktu_mulai', 'waktu_selesai', 'materi'];

    public function acara()
    {
        return $this->belongsTo(Acara::class, 'id_acara', 'id');
    }

    public function ustadz()
    {
        return $this->belongsTo(Ustadz::class, 'id_ustadz', 'id');
    }

}
