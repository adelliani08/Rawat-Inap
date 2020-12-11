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
        Halaman Utama
      </h1>
      <a href="{{route('riwayatpasien.index')}}" class="btn btn-danger text-white mr-3">Riwayat Pasien</a>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Daftar Pasien
        </div>
        <div class="card-body">
          <table id="table-pasien" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>No.Rawat Inap</th>
                <th>No.Identitas</th>
                <th>Nama Pasien</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kamar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($rawat_inaps as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->no_rawatinap}}</td>
                <td>{{$item->pasien->no_identitas}}</td>
                <td>{{$item->pasien->nama_pasien}}</td>
                <td>{{$item->pasien->tgl_lahir}}</td>
                <td>{{$item->pasien->jenis_kelamin}}</td>
                <td>{{count($item->kamars)>0?$item->kamars[0]->nama_kamar:""}}</td>
                <td>
                  <a href="{{route('pasien.show',['rawat_inap'=>$item->id_rawatinap])}}"
                    class="btn btn-primary btn-xm">Detail</a>
                </td>
              </tr>
              @endforeach
            </tbody>

          </table>
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
      $('#table-pasien').DataTable({
      });
    });    
  </script>
  @endsection