<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDetailJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_detail_jadwal', function (Blueprint $table) {
            $table->string('id',36);
            $table->char('id_detail_jadwal',6)->primary();
            $table->char('id_acara',6);
            $table->char('id_ustadz',6);
            $table->string('waktu_mulai',20);
            $table->string('waktu-selesai',20);
            $table->date('tanggal');
            $table->bigInteger('total');
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
        Schema::dropIfExists('tb_detail_jadwal');
    }
}
