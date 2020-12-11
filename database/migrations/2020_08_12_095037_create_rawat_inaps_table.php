<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRawatInapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rawat_inaps', function (Blueprint $table) {
            $table->bigIncrements('id_rawatinap');
            $table->date('tgl_masuk')->nullable();
            $table->date('tgl_keluar')->nullable();
            $table->enum('jenis_pasien',['BPJS','NonBPJS']);
            $table->string('no_bpjs',100)->nullable();
            $table->string('nama_pesertabpjs',100)->nullable();
            $table->enum('prosedur_masuk',['langsung','rujukanIGD']);
            $table->enum('cara_masuk',['datangsendiri','kontrol','dokterPerujuk'])->nullable();
            $table->uuid('no_rawatinap');
            $table->string('dokter_perujuk',100)->nullable();
            $table->string('asal_rujukan',100)->nullable();
            $table->enum('alasan_dirujuk',['kepentinganmedis','fasilitaskurang','permintaansendiri','tempattidurpenuh'])->nullable();
            $table->boolean('siap_pulang')->default(false);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rawat_inaps');
    }
}
