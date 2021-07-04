<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSaran extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_saran', function (Blueprint $table) {
            $table->string('id',36);
            $table->char('id_pesan',6)->primary();
            $table->string('nama',225);
            $table->string('email',225);
            $table->string('subjek',225);
            $table->text('pesan');
            $table->enum('status',['sudah','belum']);
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
        Schema::dropIfExists('tb_saran');
    }
}
