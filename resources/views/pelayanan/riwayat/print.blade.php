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
        Detail Pelayanan
      </h1>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Identitas Pasien
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
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
                    <label class="col-sm-4 col-form-label">Jenis Kelamin<sup class="bintang">*</sup>:</label>
                    <div class="col-sm-8" required>
                      <div class="radio">
                        <p class="form-control">{{$rawat_inap->jenis_kelamin=="laki-laki"?"Laki-laki":"Perempuan"}}</p>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-4 control-label">Alamat:</label>
                    <div class="col-sm-8">
                      <p class="form-control">{{$rawat_inap->pasien->alamat}}</p>
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
</div>

<div class="row">
  <div class="col-12">
    <div class="card card-outline card-green">
      <div class="card-header">
        Data Pemakaian Kamar
      </div>
      <div class="card-body">
        <table id="table-kamar" class="table table-bordered table-hover">
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
              <td>{{$item->gedung->nama_gedung}}</td>
              <td>{{$item->ruang->nama_ruang}}</td>
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
        Data Pemakaian Obat
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
            </tr>
          </thead>
          <tbody>
            @foreach ($rawat_inap->obat as $item)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{\Carbon\Carbon::parse($item->pivot->tgl_order)->format('d-F-Y')}}</td>
              <td>{{\Carbon\Carbon::parse($item->pivot->jam_order)->format('H:i a')}}</td>
              <td>{{$item->nama_obat}}</td>
              <td>{{$item->kategori}}</td>
              <td>{{$item->pivot->jumlah_order}}</td>
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




</div>
@endsection

@section("extra-script")
<!-- DataTables -->
<script src="{{asset("admin_lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>

<script src="{{asset("admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

<script>
  $(function () {
  
    var t = $('#table-pasien').DataTable({
      paging:false,
      ordering:false,
      searching:false,
      order:[[1,"desc"],[2,"desc"]]
    });
    t.on( 'order.dt search.dt', function () {
        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();

    $('#table-obat').DataTable({
      paging:false,
      ordering:false,
      searching:false,
      order:[[1,"desc"],[2,"desc"]]
    });

    $('#table-kamar').DataTable({
      paging:false,
      ordering:false,
      searching:false,
      order:[[1,"desc"],[2,"desc"]]
    });
  });
</script>
@endsection