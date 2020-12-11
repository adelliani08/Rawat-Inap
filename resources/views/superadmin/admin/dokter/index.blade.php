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
        Data Dokter
      </h1>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          <a class="btn btn-primary btn-sm tambahBtn" href="{{route("dokter.create")}}"><i class=" fa fa-plus-circle">
              Tambah </i></a>
          <a href="{{route("admin.index")}}" class="btn btn-primary btn-sm tambahBtn"><i class="fa fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
          <table id="table-dokter" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Dokter</th>
                <th>Jenis Kelamin</th>
                <th>Jenis Dokter</th>
                <th>Spesialisasi</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($dokters as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->nama_dokter}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->jenis_dokter}}</td>
                <td>{{$item->spesialisasi}}</td>
                <td>{{$item->notelp}}</td>
                <td>{{$item->alamat}}</td>
                <td>
                  <a href="{{route("dokter.edit",["dokter"=>$item->id_dokter])}}" class="btn btn-primary btn-xs">Edit</a>
                  <button type="submit" class="btn btn-warning btn-xs" form="delete_form">Hapus</button>
                </td>
                <form class="d-none" action="{{route("dokter.destroy",["dokter"=>$item->id_dokter])}}" method="post" id="delete_form">
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
      $('#table-dokter').DataTable({});
      
      
    });        
</script>
@endsection