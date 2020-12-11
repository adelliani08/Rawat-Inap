@extends("layouts.no_sidebar")

@section("extra_head")
{{-- select2 --}}
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2/css/select2.min.css")}}">
<link rel="stylesheet" href="{{asset("admin_lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css")}}">
@endsection

@section("main_content")
<div class="container-fluid col-11 my-1">
    <section class="content-header">
        <div class="row justify-content-between align-items-center">
            <h1>
                Tambah Kamar
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
            <form class="form-horizontal" action="{{route("kamar.store")}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-5">Id Kamar:</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="id_kamar" value="" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Nama Kamar:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama_kamar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Kelas:</label>
                                <div class="col-sm-10">
                                    <select name="kelas" class="form-control">
                                        <option value=""></option>
                                        <option value="VIP">VIP</option>
                                        <option value="I">I</option>
                                        <option value="II">II</option>
                                        <option value="III">III</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Nama Gedung:</label>
                                <div class="col-sm-10">
                                    <div id="gedung">
                                        <select class="form-control" id="select_gedung" name="id_gedung">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-5">Nama Ruang:</label>
                                <div class="col-sm-10">
                                    <div id="ruang">
                                        <select class="form-control" id="select_ruang" name="id_ruang">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Jumlah Kasur:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="jumlah_kasur">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Harga:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="harga_kamar">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-5">Fasilitas:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="fasilitas">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-stretch justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{route("kamar.index")}}" class="btn btn-default"><i class=" fa fa-power-off"></i>
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
    
    $("#select_ruang").select2({
      language:"id",
      placeholder:"Pilih Ruang",
      theme:"bootstrap4",
      allowClear:true,
      ajax:{
        url:"{{route('api.poli.ruang')}}",
        type:"GET",
        delay:250,
        data:function(params){
          return{
            term:params.term,
            gedung:$("#select_gedung").val()
          };
        },
        processResults:function(result){
          var item = result.map((item)=>({
            id:item.id_ruang,
            text:item.nama_ruang
          }))
          return {
            "results": item
          };
        }
      }
    })
})
</script>
@endsection