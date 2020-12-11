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
      <div class="row col-3 justify-content-end">
        <a href="{{route('poli.create')}}" class="btn btn-danger text-white mr-3">Tambah Pelayanan Kesehatan</a>
      </div>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          Daftar Pelayanan Kesehatan
        </div>
        <div class="card-body">
          <table id="table-pasien" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Pelayanan Kesehatan</th>
                <th>Alamat</th>
                <th>Akreditasi</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($polis as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->nama_poli}}</td>
                <td>{{$item->alamat}}</td>
                <td>{{$item->akreditasi}}</td>
                <td>
                  <a href="{{route("poli.show",["poli"=>$item->id_poli])}}" class="btn btn-primary btn-xs">Detail</a>
                  <button class="btn btn-warning btn-xs btn-hapus"
                    data-action="{{route("poli.destroy",["poli"=>$item->id_poli])}}">Hapus</button>

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
  @include('layouts.konfirmasi')

  <script src="{{asset("admin_lte/plugins/datatables/jquery.dataTables.min.js")}}"></script>
  <script src="{{asset("admin_lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
  <script src="{{asset("admin_lte/plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
  <script src="{{asset("admin_lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>

  <script>
    $(function () {
                  $('#table-pasien').DataTable({
                  });
                  $('#table-ruangan').DataTable({
                  });
                });
        
        
  </script>
  @endsection