@extends("layouts.no_sidebar")

@section("extra_head")
@endsection

@section("main_content")
<div class="container-fluid col-5 my-1">
    <section class="content-header">
        <div class="row justify-content-between align-items-center">
            <h1>
                Data Gedung
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
            <form class="form-horizontal" action="{{route("gedung.update",["gedung"=>$gedung->id_gedung])}}" method="post">
                @csrf
                @method("PUT")
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-8">ID Gedung:</label>
                                <div class="col-sm-15">
                                    <input type="number" class="form-control" name="id_gedung" value="{{$gedung->id_gedung}}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-8">Nama Gedung:</label>
                                <div class="col-sm-15">
                                    <input type="text" class="form-control" name="nama_gedung" value="{{$gedung->nama_gedung}}">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-footer d-flex align-items-stretch justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="{{route("gedung.index")}}" class="btn btn-default"><i class=" fa fa-power-off"></i>
                        Batal</a>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection