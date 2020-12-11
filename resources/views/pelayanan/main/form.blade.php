@extends("layouts.no_sidebar")

@section("extra_head")
{{-- select2 --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">

<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet"
    href="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">

@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
    <section class="content-header">
        <div class="row justify-content-start align-items-center">
            <h1>
                Tambah Data Rawat Inap
            </h1>
        </div>
    </section>
    <div class="content-wrapper">
        <form class="form-horizontal" id="form-tambah" action="{{route("rawat_inap.store")}}" method="post">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Tgl Masuk</label>
                                                <div>
                                                    <input id="tanggal-display" type="text" class="form-control"
                                                        value="" disabled required>
                                                    <input type="hidden" name="tgl_masuk" id="tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">No.Rawat Inap</label>
                                                <div>
                                                    <input type="text" class="form-control" name="no_ri" value=""
                                                        readonly required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    Identitas Pasien
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">No.Identitas<sup
                                                class="bintang">*</sup>:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_identitas"
                                                id="no_identitas" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nama Pasien<sup
                                                class="bintang">*</sup>:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tempat Lahir<sup
                                                class="bintang">*</sup>:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                id="tempat_lahir" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-4">Tanggal Lahir<sup class="bintang">*</sup>:</label>
                                        <div class="input-group date col-6" id="tgl-lahir-datepicker"
                                            data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input"
                                                data-target="#tgl-lahir-datepicker" id="text-tgl-lahir" readonly
                                                name="tgl_lahir" required/>
                                            <div class="input-group-append" data-target="#tgl-lahir-datepicker"
                                                data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Umur:</label>
                                        <div class="col-sm-4">
                                            <div class="input-group">
                                                <input type="text" disabled class="form-control" id="text_umur" required>
                                                <span class="input-group-append">
                                                    <div class="input-group-text">Tahun</div>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Jenis Kelamin<sup
                                                class="bintang">*</sup>:</label>
                                        <div class="col-sm-8">
                                            <div class="radio">
                                                <label class="col-sm-5">
                                                    <input type="radio" name="jenis_kelamin" value="Laki-laki"
                                                        id="jeniskelamin_L" required>
                                                    Laki - Laki
                                                </label>
                                                <label class="col-sm-5">
                                                    <input type="radio" name="jenis_kelamin" value="Perempuan"
                                                        id="jeniskelamin_P" required>
                                                    Perempuan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Agama:</label>
                                        <div class="col-sm-8">
                                            <select name="agama" class="form-control" required>
                                                <option selected="true" disabled></option>
                                                <option value="islam">Islam</option>
                                                <option value="kristen">Kristen Protestan</option>
                                                <option value="katolik">Katolik</option>
                                                <option value="hindu">Hindu</option>
                                                <option value="buddha">Buddha</option>
                                                <option value="konghucu">Kong Hu Cu</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Status Perkawinan:</label>
                                        <div class="col-sm-8">
                                            <select name="status_perkawinan" class="form-control" required>
                                                <option selected="true" disabled></option>
                                                <option value="belummenikah">Belum Menikah</option>
                                                <option value="menikah">Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Gol Darah:</label>
                                        <div class="col-sm-8">
                                            <select name="gol_darah" class="form-control" required>
                                                <option selected="true" disabled></option>
                                                <option value="A">A</option>
                                                <option value="B">B</option>
                                                <option value="AB">AB</option>
                                                <option value="O">O</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Pendidikan:</label>
                                        <div class="col-sm-8">
                                            <select name="pendidikan" class="form-control" required>
                                                <option selected="true" disabled></option>
                                                <option value="tdktamatsd">Tidak Tamat SD</option>
                                                <option value="sd">SD</option>
                                                <option value="smp">SMP</option>
                                                <option value="sma">SMA</option>
                                                <option value="s1">S1</option>
                                                <option value="s2">S2</option>
                                                <option value="s3">S3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Pekerjaan:</label>
                                        <div class="col-sm-8">
                                            <select name="pekerjaan" class="form-control" required>
                                                <option selected="tidaktahu" disabled></option>
                                                <option value="tidakbekerja">Tidak Bekerja</option>
                                                <option value="pns">PNS</option>
                                                <option value="karyawanswasta">Karyawan Swasta</option>
                                                <option value="pensiunan">Pensiunan</option>
                                                <option value="tni">TNI</option>
                                                <option value="pedagang">Pedagang</option>
                                                <option value="nelayan">Nelayan</option>
                                                <option value="petani">Petani</option>
                                                <option value="buruh">Buruh</option>
                                                <option value="iburumahtangga">Ibu Rumah Tangga</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Alergi:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alergi" value="" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Provinsi:</label>
                                        <div class="col-sm-8">
                                            <select class="form-control" id="select_prov" name="prov"
                                                style="width:100%" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Kabupaten:</label>
                                        <div class="col-sm-8">
                                            <div id="kabupaten">
                                                <select class="form-control" id="select_kab" name="kab"
                                                    style="width:100%" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Kecamatan:</label>
                                        <div class="col-sm-8">
                                            <div id="kecamatan">
                                                <select class="form-control" id="select_kec" name="kec"
                                                    style="width:100%" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Desa:</label>
                                        <div class="col-sm-8">
                                            <div id="kampung">
                                                <select class="form-control" id="select_desa" name="id_desa"
                                                    style="width:100%" required>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">Alamat<sup class="bintang">*</sup>:</label
                                            required>
                                        <div class="col-sm-8">
                                            <textarea name="alamat" class="form-control" rows="3"></textarea required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label">No.HP:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_hp" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card card-default">
                                <div class="card-header">
                                    Keluarga Pasien
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">No. KK:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="no_kk" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Nama Keluarga:</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="nama_keluarga" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 control-label">Hubungan:</label>
                                        <div class="col-sm-9">
                                            <select name="hubungan" class="form-control" required>
                                                <option selected="true" disabled></option>
                                                <option value="ayah">Ayah</option>
                                                <option value="ibu">Ibu</option>
                                                <option value="suami">Suami</option>
                                                <option value="istri">Istri</option>
                                                <option value="anak">Anak</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">

                            <div class="card card-default">
                                <div class="card-header">
                                    Rawat Inap
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Gedung<sup
                                                class="bintang">*</sup>:</label required>
                                        <div class="col-sm-8">
                                            <select name="nama_gedung" id="select_gedung" class="form-control" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Ruang<sup class="bintang">*</sup>:</label
                                            required>
                                        <div class="col-sm-8">
                                            <select name="nama_ruang" id="select_ruang" class="form-control" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">kamar<sup class="bintang">*</sup>:</label
                                            required>
                                        <div class="col-sm-8">
                                            <select name="id_kamar" id="select_kamar" class="form-control" required>
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">No. Tempat Tidur<sup
                                                class="bintang">*</sup>:</label required>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_tempattidur" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Dokter PJ:</label>
                                        <div class="col-sm-8">
                                            <select name=id_dokter class="form-control" id="select_dokter" required>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-default">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Jenis Pasien:</label>
                                        <div class="col-sm-8">
                                            <select name="jenis_pasien" class="form-control" id="jenis_pasien" required>
                                                <option value=""></option>
                                                <option value="BPJS">BPJS</option>
                                                <option value="NonBPJS">Non BPJS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">No BPJS:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="no_bpjs" disabled
                                                data-bpjs-pasien-only required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Nama Peserta BPJS:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nama_pesertabpjs" disabled
                                                data-bpjs-pasien-only required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    Kedatangan
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Prosedur Masuk:</label>
                                        <div class="col-sm-8">
                                            <select name="prosedur_masuk" class="form-control" id="prosedurmasuk" required>
                                                <option value="" disabled selected>Pilih prosedur masuk</option>
                                                <option value="langsung">Langsung</option>
                                                <option value="rujukanIGD">Rujukan IGD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Cara Masuk:</label>
                                        <div class="col-sm-8">
                                            <select name="cara_masuk" class="form-control" id="caramasuk" disabled
                                                data-langsung required>
                                                <option value="" disabled selected>Pilih cara masuk</option>
                                                <option value="datangsendiri">Datang Sendiri</option>
                                                <option value="kontrol">Kontrol</option>
                                                <option value="dokterrs">Dokter RS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Dokter:</label>
                                        <div class="col-sm-8">
                                            <select name=id_dokter class="form-control" id="select_dokterrs" disabled
                                                data-langsung="" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Dokter Perujuk:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="dokter_perujuk" disabled
                                                data-rujuk required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Asal Rujukan:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="asal_rujukan" disabled
                                                data-rujuk required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Alasan Dirujuk:</label>
                                        <div class="col-sm-8">
                                            <select name="alasan_dirujuk" class="form-control" disabled data-rujuk required>
                                                <option value="" disabled selected>Pilih alasan dirujuk</option>
                                                <option value="kepentinganmedis">Kepentingan Medis</option>
                                                <option value="fasilitaskurang">Fasilitas Kurang</option>
                                                <option value="permintaansendiri">Permintaan Sendiri</option>
                                                <option value="tempattidurpenuh">Tempat Tidur Penuh</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card card-default">
                                <div class="card-header">
                                    Catatan Fisik
                                </div>
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Tinggi:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="tinggi" placeholder="cm" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Berat:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="berat" placeholder="kg" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Suhu Badan:</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="suhubadan" placeholder="C" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Diagnosa:</label>
                                        <div class="col-sm-8">
                                            <textarea name="hasil_diagnosa" class="form-control" rows="3"></textarea required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-stretch justify-content-end">
                    <button type="submit" class="btn btn-primary mx-2"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{route("pelayanan.index")}}" class="btn btn-danger">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection

@section("extra-script")

{{-- momentjs --}}
<script src="{{asset("admin_lte/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/moment/locale/id.js")}}"></script>

{{-- select2 --}}
<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>

{{-- date-range-picker --}}
<script src="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<script>
    $(function () {

    moment.updateLocale("id")

    $("#select_prov").select2({
      language:"id",
      placeholder:"Pilih Provinsi",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.wilayah.provinsi')}}",
        type:"GET",
        delay:250,
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_prov,
            text:item.nama_prov
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_kab").select2({
      language:"id",
      placeholder:"Pilih Kabupaten",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.wilayah.kabupaten')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            provinsi:$("#select_prov").val()
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_kab,
            text:item.nama_kab
          }))
          return {
            "results": item
          }
        }
      }
    })


    $("#select_kec").select2({
      language:"id",
      placeholder:"Pilih Kecamatan",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.wilayah.kecamatan')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            kabupaten:$("#select_kab").val()
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_kec,
            text:item.nama_kec
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_desa").select2({
      language:"id",
      placeholder:"Pilih Desa",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.wilayah.desa')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            kecamatan:$("#select_kec").val()
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_desa,
            text:item.nama_desa
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_gedung").select2({
      language:"id",
      placeholder:"Pilih Gedung",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.poli.gedung')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            poli:"{{$id_poli}}"
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_gedung,
            text:item.nama_gedung
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_ruang").select2({
      language:"id",
      placeholder:"Pilih Ruang",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.poli.ruang')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            gedung:$("#select_gedung").val()
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_ruang,
            text:item.nama_ruang
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_kamar").select2({
      language:"id",
      placeholder:"Pilih Kamar",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.poli.kamar')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            ruang:$("#select_ruang").val()
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_kamar,
            text:item.nama_kamar
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_dokter").select2({
      language:"id",
      placeholder:"Pilih Dokter Penanggung Jawab",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.dokter')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            poli:"{{$id_poli}}"
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_dokter,
            text:item.nama_dokter
          }))
          return {
            "results": item
          }
        }
      }
    })

    $("#select_dokterrs").select2({
      language:"id",
      placeholder:"Pilih Dokter",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.dokter')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            poli:"{{$id_poli}}"
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_dokter,
            text:item.nama_dokter
          }))
          return {
            "results": item
          }
        }
      }
    })

    $('#tgl-lahir-datepicker').datetimepicker({
      format: 'L',
      locale:"id",
      viewMode:"years",
      format:"YYYY-MM-DD",
      ignoreReadonly:true,
    })

    $("#jenis_pasien").on("change",function(e){
      if (e.target.value =="BPJS"){
        $('[data-bpjs-pasien-only]').prop("disabled",false)
      }else{
        $('[data-bpjs-pasien-only]').val("")
        $('[data-bpjs-pasien-only]').prop("disabled",true)
      }
    })
 

    $('#prosedurmasuk').on("change",function(e){
      switch (e.target.value) {
        case "rujukanIGD":
          $("[data-rujuk]").attr("disabled",false);
          $("[data-langsung]").attr("disabled",true);
          break;
      
        case "langsung":
          $("[data-rujuk]").attr("disabled",true);
          $("[data-langsung]").attr("disabled",false);
          break;
      }
    })

    $("#tgl-lahir-datepicker").on("change.datetimepicker",function(e){
      $("#text_umur").val(moment.duration({to:moment(),from:e.date}).years())
    })

    $("#tanggal").val(moment().format("YYYY-MM-DD"));
    $("#tanggal-display").val(moment().format("dddd, DD MMMM YYYY"));
  });


</script>
@endsection