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
                Penggunaan Fasilitas
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
                    action="{{route("pasienfasilitas.store",["rawatInap"=>$rawat_inap->id_rawatinap])}}" method="post">
                    @csrf

                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="col-sm-4">Waktu Pemakaian:</label>
                                <div class="col-sm-12">
                                    <div class="input-group" id="tanggal-pemakaian" data-input-tanggal
                                        data-target-input="nearest">
                                        <input type="text" class="form-control" value="" name="tgl_pemakaian" readonly>
                                        <div class="input-group-append" data-target="#tanggal-pemakaian"
                                            data-toggle="datetimepicker">
                                            <div class="input-group-text">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-4">Nama Fasilitas:</label>
                                <div class="col-sm-12">
                                    <select name="id_fasilitas" id="select-fasilitas" style="width:100%"></select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4">Alasan Pemakaian:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="alasan_pemakaian">
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

    $("#select-fasilitas").select2({
      language:"id",
      placeholder:"Pilih fasilitas",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.poli.fasilitas')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            poli:{{$rawat_inap->id_poli}},
          }
        },
        processResults:function(result){

          var item = result.map((item)=>({
            id:item.id_fasilitas,
            text:item.nama_fasilitas
          }))
          return {
            "results": item
          }
        }
      }
    })
</script>
@endsection