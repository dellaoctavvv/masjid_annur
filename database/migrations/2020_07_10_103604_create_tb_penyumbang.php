<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPenyumbang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penyumbang', function (Blueprint $table) {
            $table->string('id',36);
            $table->char('id_penyumbang',6);
            $table->string('nama_penyumbang',225);
            $table->string('jenis_kelamin',20);
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
        Schema::dropIfExists('tb_penyumbang');
    }
}
