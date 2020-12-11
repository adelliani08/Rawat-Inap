<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::group(['prefix' => 'pelayanan', "middleware" => "pelayanan"], function () {
    Route::get("", "PelayananHomeController")->name("pelayanan.index");
    Route::resource('', 'RawatInapController')->only(["create", "store", "destroy"])->names("rawat_inap")->parameter("","rawatInap");
    Route::resource('riwayat', 'RiwayatController')->only(["index", "show"])->parameters([
        "riwayat" => "rawatInap"
    ]);
    Route::get("riwayat/{rawatInap}/laporan", "RiwayatController@laporan")->name("rawat_inap_laporan");
    Route::resource('.pindahkamar', 'PindahKamarController')->only(["create", "store"])->names("pindahkamar")->parameters(["" => "rawat_inap"]);
});

Route::group(['prefix' => 'admin', 'middleware' => "poli"], function () {
    Route::get("", "AdminHomeController")->name("admin.index");
    Route::group(['prefix' => 'ruangan'], function () {
        Route::get("", "RuanganHomeController")->name("ruangan.index");
        Route::resource('gedung', 'GedungController')->only(["index", "destroy", "create", "store", "edit", "update"]);
        Route::resource('ruang', 'RuangController')->only(["index", "destroy", "create", "store", "edit", "update"]);
        Route::resource('kamar', 'KamarController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    });
    Route::resource('dokter', 'DokterController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    Route::resource('perawat', 'PerawatController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    Route::resource('pegawai', 'PegawaiController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    Route::resource('fasilitas', 'FasilitasController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    Route::resource('shift', 'ShiftController')->only(["index", "destroy", "create", "store", "edit", "update"]);
    Route::get("laporan", "AdminLaporanController")->name("admin.laporan");
});

Route::group(['middleware' => ['dokter']], function () {
    
    
    Route::resource('dokter/riwayatpasien', 'RiwayatPasienController')->only(["index", "show"])->parameters([
        "riwayatpasien" => "rawatInap"
    ]);
    Route::resource('dokter', 'DokterPasienController')->names("pasien")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.fasilitas', 'DokterFasilitasController')->only(["create", "store"])->names("pasienfasilitas")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.obat', 'DokterResepObatController')->only(["create", "store"])->names("resepobat")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.pemeriksaan', 'DokterPemeriksaanController')->only(["create", "store"])->names("pemeriksaan")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.diagnosa', 'DokterDiagnosaController')->only(["create", "store"])->names("diagnosa")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.obat.returobat', 'DokterReturObatController')->only(["create", "store"])->names("returobat")->parameters(["dokter" => "rawatInap"]);
    Route::resource('dokter.obat.efekobat', 'DokterEfekObatController')->only(["create", "store"])->names("efekobat")->parameters(["dokter" => "rawatInap"]);
    

});


Route::group(['prefix' => 'superadmin', "middleware" => "superadmin"], function () {
    Route::get("", "SuperadminHomeController")->name("superadmin.index");
    Route::resource("", 'PoliController')->only(["create", "show", "store", "edit", "destroy", "update"])->names("poli")->parameter("", "poli");
    Route::get('{poli}/dokter', "PoliController@dokter")->name("superadmin.dokter");
    Route::get('{poli}/fasilitas', "PoliController@fasilitas")->name("superadmin.fasilitas");
    Route::get('{poli}/pegawai', "PoliController@pegawai")->name("superadmin.pegawai");
    Route::get('{poli}/perawat', "PoliController@perawat")->name("superadmin.perawat");
    Route::get('{poli}/ruangan', "PoliController@ruangan")->name("superadmin.ruangan");
    Route::get('{poli}/gedung', "PoliController@gedung")->name("superadmin.ruangan.gedung");
    Route::get('{poli}/ruang', "PoliController@ruang")->name("superadmin.ruangan.ruang");
    Route::get('{poli}/kamar', "PoliController@kamar")->name("superadmin.ruangan.kamar");
    Route::get('{poli}/shift', "PoliController@shift")->name("superadmin.shift");
});

Route::group(['middleware' => ['auth']], function () {
    Route::get("user", "UserController@show")->name("user.show");
    Route::patch("user", "UserController@ubah_password")->name("user.ubah_password");
    Route::put("user", "UserController@update")->name("user.update");
    Route::get('logout', "AuthController@logout_proses")->name("logout");
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('login', "AuthController@login_page")->name("login");
    Route::post('login', "AuthController@login_proses");
});

Route::get("", "HomeController");

Route::group(['prefix' => 'api', "as" => "api."], function () {

    Route::group(["as" => "wilayah."], function () {
        Route::get('provinsi', "WilayahApiController@getProvinsi")->name("provinsi");
        Route::get('kabupaten', "WilayahApiController@getKabupaten")->name("kabupaten");
        Route::get('kecamatan', "WilayahApiController@getKecamatan")->name("kecamatan");
        Route::get('desa', "WilayahApiController@getDesa")->name("desa");
    });

    Route::group(['as' => "poli."], function () {
        Route::get('poli', "PoliApiController@getPoli")->name("poli");
        Route::get('gedung', "PoliApiController@getGedung")->name("gedung");
        Route::get('ruangan', "PoliApiController@getRuangan")->name(("ruang"));
        Route::get('kamar', "PoliApiController@getKamar")->name("kamar");
        Route::get('kamar_poli', "PoliApiController@getKamarPoli")->name("kamar_poli");
        Route::get('shift', "PoliApiController@getShift")->name("shift");

        Route::get('obat', "PoliApiController@getObat")->name("obat");
        Route::get('fasilitas', "PoliApiController@getFasilitas")->name("fasilitas");
    });

    Route::get('dokter', "PersonApiController@getDokter")->name("dokter");
});
