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
        Data Gedung
      </h1>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          <a class="btn btn-primary btn-sm" href="{{route("gedung.create")}}"><i class="fa fa-plus-circle"> Tambah
            </i></a>
          <a href="{{route("ruangan.index")}}" class="btn btn-primary btn-sm tambahBtn"><i
              class="fa fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
          <table id="table-gedung" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Gedung</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($gedungs as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->nama_gedung}}</td>
                <td>
                  <a href="{{route("gedung.edit",["gedung"=>$item->id_gedung])}}" class="btn btn-primary">Edit</a>

                  <button data-action="{{route("gedung.destroy",["gedung"=>$item->id_gedung])}}"
                    class="btn btn-warning btn-hapus">Hapus</button>
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
@include('layouts.konfirmasi')

<!-- DataTables -->
<script src="{{asset("admin_lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

<script>
  $(function () {
    $('#table-gedung').DataTable({
    });
  });
              
              
</script>
@endsection