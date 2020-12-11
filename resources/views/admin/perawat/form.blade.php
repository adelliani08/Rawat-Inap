@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-5 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Data Perawat
      </h1>
    </div>
  </section>

  @if ($errors->any())
    <div class="alert alert-danger">
      <h5><i class="icon fas fa-ban"></i> Warning!</h5>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="row">
    <div class="col-12">
      <div class="card">
        <form class="form-horizontal" id="form-tambah" action="{{route("perawat.store")}}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-5">ID Perawat</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="id_perawat" value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5">Nama Perawat:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_perawat">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5">Jenis Kelamin:</label>
                  <div class="col-sm-12">
                    <div class="radio">
                      <label class="col-sm-5">
                        <input type="radio" name="jenis_kelamin" value="Laki-laki">
                        Laki - Laki
                      </label>
                      <label class="col-sm-5">
                        <input type="radio" name="jenis_kelamin" value="Perempuan">
                        Perempuan
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5">Shift:</label>
                  <div class="col-sm-12">
                    <select id="select_shift" name="id_shift" style="width: 100%"></select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5">No. Telp:</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="notelp">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5">Alamat:</label>
                  <div class="col-sm-12">
                    <textarea name="alamat" class="form-control" rows="3"></textarea>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="card-footer d-flex align-items-stretch justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <a href="{{route("perawat.index")}}" class="btn btn-default"><i class="fa fa-power-off"></i>
              Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@section("extra-script")

<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>

<script>
  $(function () {
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
            poli: {{$id_poli}},
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
  });
</script>
@endsection