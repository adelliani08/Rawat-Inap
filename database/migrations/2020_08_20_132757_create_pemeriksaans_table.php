<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemeriksaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaans', function (Blueprint $table) {
            $table->bigIncrements('id_pemeriksaan');
            $table->dateTime('waktu_pemeriksaan');
            $table->string('jenis_pemeriksaan',100);
            $table->string('hasil_pemeriksaan',100);
            $table->bigInteger('id_rawatinap')->unsigned();
            $table->foreign('id_rawatinap')->references('id_rawatinap')->on('rawat_inaps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaans');
    }
}
