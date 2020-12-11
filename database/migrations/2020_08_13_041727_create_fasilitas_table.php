<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFasilitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fasilitas', function (Blueprint $table) {
            $table->bigIncrements('id_fasilitas');
            $table->string('jenis_fasilitas',100);
            $table->string('nama_fasilitas',100);
            $table->integer('harga_fasilitas');
            $table->bigInteger('id_poli')->unsigned()->nullable();
            $table->foreign('id_poli')->references('id_poli')->on('polis');
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
        Schema::dropIfExists('fasilitas');
    }
}
