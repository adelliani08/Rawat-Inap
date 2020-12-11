<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPerawatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_perawats', function (Blueprint $table) {
            $table->bigIncrements('id_dp');
            $table->bigInteger('id_perawat')->unsigned();
            $table->foreign('id_perawat')->references('id_perawat')->on('perawats');
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
        Schema::dropIfExists('detail_perawats');
    }
}
