@extends("layouts.no_sidebar")

@section("extra_head")
{{-- select2 --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-5 my-1">
    <section class="content-header">
        <div class="row justify-content-between align-items-center">
            <h1>
                Tambah Ruang
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
        <div class="card">
            <form class="form-horizontal" action="{{route("ruang.store")}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-5">Id Ruang:</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" name="id_kamar" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Nama Ruang:</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="nama_ruang">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-5">Nama Gedung:</label>
                                <div class="col-sm-12">
                                    <div id="gedung">
                                        <select class="form-control" id="select_gedung" name="id_gedung">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer d-flex align-items-stretch justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{route("ruang.index")}}" class="btn btn-default"><i class=" fa fa-power-off"></i>
                        Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>



@endsection

@section('extra-script')
<script src="{{asset("admin_lte/plugins/select2/js/select2.full.min.js")}}"></script>
<script src="{{asset("admin_lte/plugins/select2/js/i18n/id.js")}}"></script>

<script>
$(function () {

    $("#select_gedung").select2({
    language:"id",
    placeholder:"Pilih Gedung",
    theme:"bootstrap4",
    allowClear:true,
    ajax:{
      url:"{{route('api.poli.gedung')}}",
      type:"GET",
      delay:250,
      data:function(params){
        return{
          term:params.term,
          poli:{{$id_poli}}
        }
      },
      processResults:function(result){
        var item = result.map((item)=>({
          id:item.id_gedung,
          text:item.nama_gedung
        }))
        return {
          "results": item
        }}
      }
    })
    
    
})
</script>
@endsection