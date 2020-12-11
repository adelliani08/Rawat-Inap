@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Data Perawat
      </h1>
    </div>
  </section>

  <div class="row">
    <div class="col-12">
      <div class="card card-outline card-green">
        <div class="card-header">
          <a class="btn btn-primary btn-sm tambahBtn" href="{{route("perawat.create")}}"><i class="fa fa-plus-circle">
              Tambah </i></a>
          <a href="{{route("admin.index")}}" class="btn btn-primary btn-sm tambahBtn"><i
              class="fa fa-arrow-circle-left"> Kembali</i></a>
        </div>
        <div class="card-body">
          <table id="table-perawat" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Perawat</th>
                <th>Jenis Kelamin</th>
                <th>Shift</th>
                <th>No. HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($perawats as $item)

              <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$item->nama_perawat}}</td>
                <td>{{$item->jenis_kelamin}}</td>
                <td>{{$item->shift->nama_shift}}</td>
                <td>{{$item->notelp}}</td>
                <td>{{$item->alamat}}</td>
                <td>
                  <a href="{{route("perawat.edit",["perawat"=>$item->id_perawat])}}"
                    class="btn btn-primary btn-xs">Edit</a>

                  <button class="btn btn-warning btn-xs btn-hapus"
                    data-action="{{route("perawat.destroy",["perawat"=>$item->id_perawat])}}">Hapus</button>
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
<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>

<script>
  $(function () {
  $('#table-perawat').DataTable({});
  
  $("#select_shift").select2({
    language: "id",
    placeholder: "Pilih Shift",
    theme: "bootstrap4",
    allowClear: true,
    minimumResultsForSearch: Infinity,
    ajax: {
      url: "{{route('api.poli.shift')}}",
      type: "GET",
      delay: 250,
      data: function (params) {
        return {
          poli: 1,
        };
      },
      processResults: function (result) {
        var item = result.map((item) => ({
          id: item.id_shift,
          text: item.nama_shift,
          jam_masuk: item.jam_masuk,
          jam_keluar: item.jam_keluar,
        }));
        return {
          results: item,
        };
      },
    },
    templateResult: function (shift) {
      if (shift.loading) {
        return shift.text;
      }

      var $view = $(`
          <div class="d-flex justify-content-between">
          <p>${shift.text}</p>
          <span class="d-flex">
              <p>${shift.jam_masuk}</p>
              <p>-</p>
              <p>${shift.jam_keluar}</p>
          </span>
          </div>
          `);
      return $view;
    },
    templateSelection: function (shift) {
      if (shift.jam_masuk == null) {
        return shift.text;
      } else {
        return `${shift.text} ( ${shift.jam_masuk}-${shift.jam_keluar} )`;
      }
    },
  });

  })
    

       
    
</script>
@endsection