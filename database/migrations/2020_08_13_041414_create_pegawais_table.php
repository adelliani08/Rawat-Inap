<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->bigIncrements('id_pegawai');
            $table->string('nama_pegawai',100);
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('posisi',200);
            $table->string('notelp',200);
            $table->string('alamat',200);
            $table->bigInteger('id_poli')->unsigned()->nullable();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
            $table->bigInteger('id_shift')->unsigned();
            $table->foreign('id_shift')->references('id_shift')->on('shifts');
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete("cascade");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
