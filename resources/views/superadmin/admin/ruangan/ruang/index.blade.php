@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
{{-- select2 --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">

@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Data Ruang
      </h1>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          <a class="btn btn-primary btn-sm text-white" href="{{route("ruang.create")}}"><i class="fa fa-plus-circle">
              Tambah </i></a>
          <a href="{{route('ruangan.index')}}" class="btn btn-primary btn-sm tambahBtn"><i
              class="fa fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
          <table id="table-ruang" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Ruang</th>
                <th>Nama Gedung</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($ruangs as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->nama_ruang}}</td>
                <td>{{$item->gedung->nama_gedung}}</td>
                <td>
                  <a href="{{route("ruang.edit",["ruang"=>$item->id_ruang])}}" class="btn btn-primary">Edit</a>
                  <button type="submit" class="btn btn-warning btn-xs" form="delete_form">Hapus</button>
                </td>
                <form class="d-none" action="{{route("ruang.destroy",["ruang"=>$item->id_ruang])}}"
                  method="post" id="delete_form">
                  @csrf
                  @method("DELETE")
                </form>
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
  
      $('#table-ruang').DataTable({
      });
    });
  </script>
  @endsection