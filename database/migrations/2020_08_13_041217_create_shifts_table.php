<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id_shift');
            $table->string('nama_shift',50);
            $table->time('jam_masuk');
            $table->time('jam_keluar');
            $table->bigInteger('id_poli')->unsigned();
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
        Schema::dropIfExists('shifts');
    }
}
