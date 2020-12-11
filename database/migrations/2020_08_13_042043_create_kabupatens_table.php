<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKabupatensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupatens', function (Blueprint $table) {
            $table->bigIncrements('id_kab');
            $table->string('nama_kab',100);
            $table->bigInteger('id_prov')->unsigned();
            $table->foreign('id_prov')->references('id_prov')->on('provinsis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kabupatens');
    }
}
