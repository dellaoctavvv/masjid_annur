<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUstadz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ustadz', function (Blueprint $table) {
            $table->string('id',36);
            $table->char('id_ustadz',6)->primary();
            $table->string('nama',225);
            $table->string('jenis_k',30);
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->char('no_telpon',13);
            $table->string('foto',225);
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
        Schema::dropIfExists('tb_ustadz');
    }
}
