@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">

<link rel="stylesheet" href="{{asset("admin_lte/plugins/daterangepicker/daterangepicker.css")}}">

@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Laporan
      </h1>
      <a href="{{route('admin.index')}}" class="btn btn-primary btn-sm tambahBtn"><i class="fa fa-arrow-circle-left">
          Kembali</i></a>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card card-default">
          <div class="card-body">
            <div class="row justify-content-start">
              <div class="col-md-3">
                <form action="" method="GET">
                  <div class="form-group">
                    <label>Tanggal:</label>

                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input name="tanggal" type="text" class="form-control float-right" id="tanggal" required>

                      <div class="input-group-append">
                        {{-- <div class="input-group-text"></div> --}}
                        <button class="btn btn-primary">
                          <i class="fa fa-search"></i>
                        </button>

                      </div>
                    </div>
                    <!-- /.input group -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card card-default">
        <div class="card-body">
          <table id="table-laporan" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>No. Rawat Inap</th>
                <th>Nama Pasien</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Kamar</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
              </tr>
            </thead>
            <tbody>
              @foreach($rawat_inaps as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->no_rawatinap}}</td>
                <td>{{$item->pasien->nama_pasien}}</td>
                <td>{{$item->pasien->jenis_kelamin}}</td>
                <td>{{$item->pasien->alamat}}</td>
                <td>{{count($item->kamars)>0?$item->kamars[0]->nama_kamar:""}}</td>
                <td>{{$item->tgl_masuk}}</td>
                <td>{{$item->tgl_keluar}}</td>
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

<script src="{{asset("admin_lte/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/moment/locale/id.js")}}"></script>

<!-- date-range-picker -->
<script src="{{asset("admin_lte/plugins/daterangepicker/daterangepicker.js")}}"></script>

<script>
  moment.locale();
    $(function () {
      $("#tanggal").daterangepicker({locale: {
      format: 'DD-MM-YYYY'
      }});
      $('#table-laporan').DataTable({
      });
    });          
</script>
@endsection