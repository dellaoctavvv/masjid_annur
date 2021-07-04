<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transaksi', function (Blueprint $table) {
            $table->string('id',36);
            $table->char('id_transaksi',6)->primary();
            $table->char('id_katsum',6);
            $table->char('id_penyumbang',6);
            $table->date('tgl');
            $table->text('keterangan');
            $table->bigInteger('nominal');
            $table->enum('jenis',['pendatan','pengeluaran']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transaksi');
    }
}
