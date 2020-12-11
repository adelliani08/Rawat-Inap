<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPFSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_p_f_s', function (Blueprint $table) {
            $table->bigIncrements('id_pf');
            $table->dateTime('tgl_pemakaian')->nullable();
            $table->string('alasan_pemakaian',100);
            $table->bigInteger('id_rawatinap')->unsigned();
            $table->foreign('id_rawatinap')->references('id_rawatinap')->on('rawat_inaps');
            $table->bigInteger('id_fasilitas')->unsigned();
            $table->foreign('id_fasilitas')->references('id_fasilitas')->on('fasilitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_p_f_s');
    }
}
