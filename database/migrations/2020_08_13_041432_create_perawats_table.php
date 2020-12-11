<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerawatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perawats', function (Blueprint $table) {
            $table->bigIncrements('id_perawat');
            $table->string('nama_perawat',100);
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('alamat',200);
            $table->string('notelp',200);
            $table->bigInteger('id_poli')->unsigned();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
            $table->bigInteger('id_shift')->unsigned()->nullable();
            $table->foreign('id_shift')->references('id_shift')->on('shifts');
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
        Schema::dropIfExists('perawats');
    }
}
