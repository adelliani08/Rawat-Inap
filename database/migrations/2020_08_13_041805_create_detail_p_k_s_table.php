<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPKSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_p_k_s', function (Blueprint $table) {
            $table->bigIncrements('id_pk');
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->integer('no_tempattidur');
            $table->bigInteger('id_kamar')->unsigned();
            $table->foreign('id_kamar')->references('id_kamar')->on('kamars');
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
        Schema::dropIfExists('detail_p_k_s');
    }
}
