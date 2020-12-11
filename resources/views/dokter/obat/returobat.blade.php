@extends("layouts.no_sidebar")

@section("extra_head")
{{-- Data Table --}}

<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">

<!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet"
    href="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-5 my-1">
    <section class="content-header">
        <div class="row justify-content-between align-items-center">
            <h1>
                Retur Obat
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

    <div class="content-wrapper">

        <div class="row">
            <div class="col-12">
                <form class="form-horizontal" id="form-tambah"
                    action="{{route("returobat.store",["rawatInap"=>$rawat_inap->id_rawatinap,"obat"=>$order_obat->id_order])}}"
                    method="post">
                    @csrf
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label class="col-sm-4">Waktu Pemberian:</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" disabled value="{{\Carbon\Carbon::parse($order_obat->waktu_order)->format("d-M-Y H:i")}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Nama Obat:</label>
                                <div class="col-sm-12">
                                <input type="text" class="form-control" name="nama_obat" value="{{$order_obat->obat->nama_obat}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Waktu Pengembalian:</label>

                                <div class="col-sm-12">
                                    <div class="input-group" id="tanggal-pengembalian" data-input-tanggal
                                        data-target-input="nearest">
                                        <input type="text" class="form-control" value="" name="waktu_pengembalian"
                                            readonly>
                                        <div class="input-group-append" data-target="#tanggal-pengembalian"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4">Jumlah Terpakai:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="jumlah_terpakai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Alasan Pengembalian:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="alasan_pengembalian">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-stretch justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                            <a class="btn btn-default" href="{{route("pasien.index")}}"><i class="fa fa-power-off"></i>
                                Batal</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('extra-script')
<script src="{{asset("admin_lte/plugins/moment/moment.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>
<script src="{{asset("admin_lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js")}}"></script>
<script>
    $('[data-input-tanggal]').datetimepicker({
      locale:"id",
      format:"YYYY-MM-DD HH:mm",
      ignoreReadonly:true,
    })
</script>
@endsection