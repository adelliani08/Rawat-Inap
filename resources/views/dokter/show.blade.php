@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">

<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">

<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet"
  href="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Detail Pelayanan
      </h1>
      <a href="{{route("pasien.index")}}" class="btn btn-primary btn-sm tambahBtn"><i class="fa fa-arrow-circle-left">
        Kembali</i></a>
    </div>
  </section>

  <div class="card card-default">
    <div class="card-body">
      <div class="row">
        <div class="col-3">
          <a class="btn btn-app btn-block m-0" style="height: 100px;font-size:14px"
            href="{{route("pemeriksaan.create",["rawatInap"=>$rawat_inap->id_rawatinap])}}">
            <i class="fa fa-stethoscope" style="font-size: 40px"></i>
            Pemeriksaan
          </a>
        </div>
        <div class="col-3">
          <a class="btn btn-app btn-block m-0" style="height: 100px;font-size:14px"
            href="{{route("resepobat.create",["rawatInap"=>$rawat_inap->id_rawatinap])}}">
            <i class="fa fa-plus-square" style="font-size: 40px"></i>
            Resep Obat
          </a>
        </div>
        <div class="col-2">
          <a class="btn btn-app btn-block m-0" style="height: 100px;font-size:14px"
            href="{{route("diagnosa.create",["rawatInap"=>$rawat_inap->id_rawatinap])}}">
            <i class=" fa fa fa-medkit" style="font-size: 40px"></i>
            Diagnosa
          </a>
        </div>
        <div class="col-2">
          <a class="btn btn-app btn-block m-0" style="height: 100px;font-size:14px"
            href="{{route("pasienfasilitas.create",["rawatInap"=>$rawat_inap->id_rawatinap])}}">
            <i class=" fa  fa-heartbeat" style="font-size: 40px"></i>
            Permintaan Pelayanan
          </a>
        </div>
        <div class="col-2">
          <a href="" class="btn btn-app btn-block m-0" style="height: 100px;font-size:14px" data-toggle="modal"
            data-target="#modalSiappulang">
            <i class=" fa fa-info-circle " style="font-size: 40px"></i>
            Status Pasien
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Detail Pasien
        </div>
        <div class="card-body">
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
                        <p class="form-control">{{$rawat_inap->umur}}</p>
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
            </div>

            <div class="col-md-6">
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

              <div class="card card-default">
                <div class="card-header">
                  Rawat Inap
                </div>
                <div class="card-body">
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Gedung<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->kamars[0]->ruang->gedung->nama_gedung}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Ruang<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->kamars[0]->ruang->nama_ruang}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">kamar<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->kamars[0]->nama_kamar}}</p>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 col-form-label">No. Tempat Tidur<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <p class="form-control">{{$rawat_inap->kamars[0]->pivot->no_tempattidur}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Data Order Obat
        </div>
        <div class="card-body">
          <table id="table-obat" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Tanggal Order</th>
                <th>Jam Order</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Jumlah Obat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rawat_inap->obat as $item)
              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{\Carbon\Carbon::parse($item->pivot->waktu_order)->format('d-F-Y')}}</td>
                <td>{{\Carbon\Carbon::parse($item->pivot->waktu_order)->format('H:i a')}}</td>
                <td>{{$item->nama_obat}}</td>
                <td>{{$item->kategori}}</td>
                @if ($item->pivot->returobat)
                <td>{{$item->pivot->returobat->jumlah_terpakai}} ( {{$item->pivot->jumlah_order}} )</td>
                @else
                <td>{{$item->pivot->jumlah_order}}</td>
                @endif
                <td>
                  @if ($item->pivot->returobat)
                  <button class="btn btn-primary btn-xs" disabled>Retur Obat</button>
                  @else
                  <a href="{{route('returobat.create',['rawatInap'=>$rawat_inap->id_rawatinap,'obat'=>$item->pivot->id_order])}}"
                    class="btn btn-warning btn-xs">Retur Obat</a>
                  @endif
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Daftar Pelayanan Pasien
        </div>
        <div class="card-body">
          <table id="table-pasien" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width:5em">No</th>
                <th style="width:15em">Tanggal Pelayanan</th>
                <th style="width:10em">Jam Pelayanan</th>
                <th style="width:10em">Jenis Pelayanan</th>
                <th>Deskripsi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rawat_inap->pemeriksaan as $item)
              <tr>
                <td></td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('d-F-Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('h:i a ')}}</td>
                <td>Pemeriksaan</td>
                <td>
                  Jenis :{{$item->jenis_pemeriksaan}}<br>
                  Hasil :<br>{{$item->hasil_pemeriksaan}}</td>
              </tr>
              @endforeach
              @foreach ($rawat_inap->diagnosa as $item)
              <tr>
                <td></td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('d-F-Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('h:i a ')}}</td>
                <td>Diagnosa</td>
                <td>
                  Suhu :{{$item->suhubadan}}<br>
                  Berat :{{$item->berat}}<br>
                  Tinggi :{{$item->tinggi}}<br>
                  Hasil :<br>
                  {{$item->hasil_diagnosa}}
                </td>
              </tr>
              @endforeach
              @foreach ($rawat_inap->fasilitas as $item)
              <tr>
                <td></td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('d-F-Y')}}</td>
                <td>{{ \Carbon\Carbon::parse($item->waktu_pemeriksaan)->format('h:i a ')}}</td>
                <td>Pemakaian Fasilitas</td>
                <td>
                  Nama : {{$item->nama_fasilitas}}<br>
                  Alasan : <br> {{$item->pivot->alasan_pemakaian}}
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
        </div>

      </div>
    </div>
  </div>

  <div class="modal fade" id="modalSiappulang" role="dialog">
    <div class="modal-dialog modal-ld" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Pasien Siap Pulang</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal fromPasien"
          action="{{route("pasien.destroy",["pasien"=>$rawat_inap->id_rawatinap])}}" method="post">
          @csrf
          @method("DELETE")
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">No Rawat Inap:</label>
              <div class="col-sm-8">
                <span class="form-control">{{$rawat_inap->no_rawatinap}}</span>
              </div>
            </div>


            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nama Pasien:</label>
              <div class="col-sm-8">
                <span class="form-control">{{$rawat_inap->pasien->nama_pasien}}</span>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Kamar:</label>
              <div class="col-sm-8">
                <span class="form-control">{{$rawat_inap->kamar_sekarang->nama_kamar}}</span>
              </div>
            </div>
            Atas nama pasien diatas telah diizinkan pulang?

          </div>
          <div class="modal-footer row">
            <button class="btn bg-green col-2" type="submit">Ya</button>
            <button class="btn bg-red col-2" data-dismiss="modal" type="button">Tidak</button>
          </div>
        </form>
      </div>

    </div>
  </div>




</div>
@endsection

@section("extra-script")
<!-- DataTables -->
<script src="{{asset("admin_lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

<script src="{{asset("admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

{{-- select2 --}}
<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>

<script src="{{asset("admin_lte/plugins/moment/moment.min.js")}}"></script>
{{-- date-range-picker --}}
<script src="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<script>
  $(function () {
  
    var t =$('#table-pasien').DataTable({
      "columnDefs": [ {
            "searchable": false,
            "orderable": false,
            "targets": 0
        },{ 
          "targets": 4,
            "searchable": false,
            "orderable": false,
        } ],
      order:[[1,"desc"],[2,"desc"]]
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#table-obat').DataTable({
    });
  });
</script>
@endsection