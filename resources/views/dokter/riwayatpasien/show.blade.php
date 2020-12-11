@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Riwayat Rawat Inap
      </h1>
      <a href="./" class="btn btn-primary btn-sm tambahBtn"><i class="fa fa-arrow-circle-left">
          Kembali</i></a>
    </div>
  </section>

  <div class="card card-primary card-outline card-tabs">
    <div class="card-header p-0 pt-1 border-bottom-0">
      <ul class="nav nav-tabs" id="detail-riwayat-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pasien-tab" data-toggle="pill" href="#detail-riwayat-pasien" role="tab"
            aria-controls="custom-tabs-three-home" aria-selected="true">Pasien</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pemeriksaan-tab" data-toggle="pill" href="#detail-riwayat-pemeriksaan" role="tab"
            aria-controls="detail-riwayat-pemeriksaan" aria-selected="false">Pemeriksaan</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="diagnosa-tab" data-toggle="pill" href="#detail-riwayat-diagnosa" role="tab"
            aria-controls="detail-riwayat-diagnosa" aria-selected="false">Diagnosa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="obat-tab" data-toggle="pill" href="#detail-riwayat-obat" role="tab"
            aria-controls="detail-riwayat-obat" aria-selected="false">Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="fasilitas-tab" data-toggle="pill" href="#detail-riwayat-fasilitas" role="tab"
            aria-controls="detail-riwayat-fasilitas" aria-selected="false">Fasilitas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pemakaiankamar-tab" data-toggle="pill" href="#detail-riwayat-pemakaiankamar" role="tab"
            aria-controls="detail-riwayat-pemakaiankamar" aria-selected="false">Pemakaian Kamar</a>
        </li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="detail-riwayat-tabContent">
        <div class="tab-pane fade show active" id="detail-riwayat-pasien" role="tabpanel"
          aria-labelledby="detail-riwayat-pasien-tab">
          <div class="row">
            <div class="col-md-6">
              <div class="card card-default">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label class="form-label">Tgl Masuk</label>
                        <div>
                          <p class="form-control">{{$rawat_inap->tgl_masuk}}</p>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label class="form-label">No.Rawat Inap</label>
                        <div>
                          <p class="form-control">{{$rawat_inap->no_rawatinap}}</p>
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
                    <label class="col-sm-4 col-form-label">No.Identitas<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->pasien->no_identitas}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Pasien<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->pasien->nama_pasien}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tempat Lahir<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->pasien->tempat_lahir}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Tanggal Lahir<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->pasien->tgl_lahir}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Umur:</label>
                    <div class="col-sm-4">
                      <div class="input-group">
                        <p class="form-control" data-umur></p>
                        <span class="input-group-append">
                          <span class="input-group-text">
                            Tahun
                          </span>
                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Kelamin<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <div class="radio">
                        <p class="form-control">{{$rawat_inap->jenis_kelamin=="laki-laki"?"Laki-laki":"Perempuan"}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Agama:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->agama}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Status Perkawinan:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->status_perkawinan}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Gol Darah:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->gol_darah}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Pendidikan:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->pendidikan}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Pekerjaan:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->pekerjaan}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Alergi:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->alergi}}</p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card card-default">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Provinsi:</label>
                    <div class="col-sm-8">
                      <div id="provinsi">
                        <p class="form-control">{{$rawat_inap->pasien->desa->kecamatan->kabupaten->provinsi->nama_prov}}
                        </p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Kabupaten:</label>
                    <div class="col-sm-8">
                      <div id="kabupaten">
                        <p class="form-control">{{$rawat_inap->pasien->desa->kecamatan->kabupaten->nama_kab}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Kecamatan:</label>
                    <div class="col-sm-8">
                      <div id="kecamatan">
                        <p class="form-control">{{$rawat_inap->pasien->desa->kecamatan->nama_kec}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Desa:</label>
                    <div class="col-sm-8">
                      <div id="kampung">
                        <p class="form-control">{{$rawat_inap->pasien->desa->nama_desa}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Alamat:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->alamat}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">No.HP:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->no_hp}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card card-default">
                <div class="card-header">
                  Keluarga Pasien
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">No. KK:</label>
                    <div class="col-sm-9">
                      <p class="form-control">{{$rawat_inap->pasien->no_kk}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Nama Keluarga:</label>
                    <div class="col-sm-9">
                      <p class="form-control">{{$rawat_inap->pasien->nama_keluarga}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 control-label">Hubungan:</label>
                    <div class="col-sm-9">
                      <p class="form-control">{{$rawat_inap->pasien->hubungan}}</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card card-default">
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Jenis Pasien:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->jenis_pasien}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">No BPJS:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->no_bpjs}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Nama Peserta BPJS:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->nama_pesertabpjs}}</p>
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
                      <p class="form-control">{{$rawat_inap->prosedur_masuk}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Cara Masuk:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->cara_masuk}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Perujuk:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->perujuk}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Dokter RS:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->dokter_rs}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Asal Rujukan:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->asal_rujukan}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Alasan Dirujuk:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->alasan_dirujuk}}</p>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="detail-riwayat-pemeriksaan" role="tabpanel"
          aria-labelledby="detail-riwayat-pemeriksaan-tab">
          <table data-datatable class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Waktu Pemeriksaan</th>
                <th>Jenis Pemeriksaan</th>
                <th>Hasil Pemeriksaan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inap->pemeriksaan as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->waktu_pemeriksaan}}</td>
                <td>{{$item->jenis_pemeriksaan}}</td>
                <td>{{$item->hasil_pemeriksaan}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="tab-pane fade" id="detail-riwayat-diagnosa" role="tabpanel"
          aria-labelledby="detail-riwayat-diagnosa-tab">
          <table data-datatable class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Waktu Diagnosa </th>
                <th>Tinggi</th>
                <th>Berat</th>
                <th>Suhu Badan</th>
                <th>Hasil Diagnosa</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inap->diagnosa as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->waktu_diagnosa}}</td>
                <td>{{$item->tinggi}}</td>
                <td>{{$item->berat}}</td>
                <td>{{$item->suhubadan}}</td>
                <td>{{$item->hasil_diagnosa}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        <div class="tab-pane fade" id="detail-riwayat-obat" role="tabpanel" aria-labelledby="detail-riwayat-obat-tab">
          <table data-datatable class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Waktu Resep Obat</th>
                <th>Waktu Pengembalian Obat</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Tujuan Obat</th>
                <th>Jumlah</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inap->obat as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->pivot->waktu_order}}</td>
                <td>{{$item->pivot->returobat->waktu_pengembalian}}</td>
                <td>{{$item->nama_obat}}</td>
                <td>{{$item->kategori}}</td>
                <td>{{$item->pivot->tujuan}}</td>
                <td>{{$item->pivot->returobat->jumlah_terpakai}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        <div class="tab-pane fade" id="detail-riwayat-fasilitas" role="tabpanel"
          aria-labelledby="detail-riwayat-fasilitas-tab">
          <table class="table table-bordered table-hover" data-datatable>
            <thead>
              <tr>
                <th>No</th>
                <th>Waktu Pemakaian </th>
                <th>Nama Fasilitas</th>
                <th>Jenis Fasilitas</th>
                <th>Alasan</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inap->fasilitas as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->waktu_pemakaian}}</td>
                <td>{{$item->nama_fasilitas}}</td>
                <td>{{$item->jenis_fasilitas}}</td>
                <td>{{$item->alasan}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
        <div class="tab-pane fade" id="detail-riwayat-pemakaiankamar" role="tabpanel"
          aria-labelledby="detail-riwayat-pemakaiankamar-tab">
          <table class="table table-bordered table-hover" data-datatable>
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>No. Tempat Tidur</th>
                <th>Kamar</th>
                <th>Gedung</th>
                <th>Ruang</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inap->kamars as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->pivot->tgl_masuk}}</td>
                <td>{{$item->pivot->tgl_keluar}}</td>
                <td>{{$item->pivot->no_tempattidur}}</td>
                <td>{{$item->nama_kamar}}</td>
                <td>{{$item->ruang->gedung->nama_gedung}}</td>
                <td>{{$item->ruang->nama_ruang}}</td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      </div>
    </div>
    <!-- /.card -->
  </div>
</div>

@endsection

@section("extra-script")
<script src="{{asset("admin_lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/moment/locale/id.js")}}"></script>

<script>
  $(function () {
    moment.locale()
    $("[data-umur]").text(`${
      moment("{{$rawat_inap->tgl_masuk}}").diff(moment("{{$rawat_inap->pasien->tgl_lahir}}"),"years")
    }`)

    $("[data-datatable]").dataTable();
  });        
</script>
@endsection