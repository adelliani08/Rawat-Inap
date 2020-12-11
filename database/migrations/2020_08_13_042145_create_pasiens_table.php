<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->bigIncrements('id_pasien');
            $table->string('no_identitas',50)->unique();
            $table->string('nama_pasien',100);
            $table->enum('jenis_kelamin',['Laki-laki','Perempuan']);
            $table->string('tempat_lahir',50);
            $table->date('tgl_lahir');
            $table->enum('status_perkawinan',['belummenikah','menikah']);
            $table->enum('gol_darah',['A','B','O','AB']);
            $table->enum('agama',['islam','kristen','katolik','hindu','buddha','konghucu']);
            $table->enum('pendidikan',['tdktamatsd','sd','smp','sma','s1','s2','s3']);
            $table->enum('pekerjaan',['tidakbekerja','pns','karyawanswasta','pensiunan','tni','pedagang','nelayan','petani','buruh','iburumahtangga']);
            $table->string('alergi',200);
            $table->string('alamat',200);
            $table->string('no_hp',200);
            $table->string('no_kk',50);
            $table->string('nama_keluarga',100);
            $table->enum('hubungan',['ayah','ibu','suami','istri','anak']);
            $table->bigInteger('id_desa')->unsigned();
            $table->foreign('id_desa')->references('id_desa')->on('desas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
