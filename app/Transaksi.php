<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'tb_transaksi';

    public $incrementing = false;
    protected $fillable = ['id','id_katsum', 'penyumbang','tanggal','keterangan','debit', 'jenis', 'kredit'];

    public function katsum()
    {
        return $this->belongsTo(Katsum::class, 'id_katsum', 'id');
    }
}
