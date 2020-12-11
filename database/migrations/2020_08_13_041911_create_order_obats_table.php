<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_obats', function (Blueprint $table) {
            $table->bigIncrements('id_order');
            $table->dateTime('waktu_order')->nullable();
            $table->integer('jumlah_order');
            $table->string('efek',100);
            $table->string('tujuan',100);
            $table->bigInteger('id_rawatinap')->unsigned();
            $table->foreign('id_rawatinap')->references('id_rawatinap')->on('rawat_inaps');
            $table->bigInteger('id_obat')->unsigned();
            $table->foreign('id_obat')->references('id_obat')->on('obats');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_obats');
    }
}
