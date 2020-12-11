@extends("layouts.no_sidebar")


@section("main_content")
<div class="container-fluid col-5 my-1">
  <section class="content-header">
    <div class="row justify-content-between align-items-center">
      <h1>
        Data Fasilitas
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
        <form class="form-horizontal" id="form-tambah" action="{{route("fasilitas.store")}}" method="post">
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="col-sm-8">ID Fasilitas</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="id_fasilitas" value="" readonly>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-8">Nama Fasilitas:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="nama_fasilitas">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-8">Jenis Fasilitas:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="jenis_fasilitas">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-8">Harga Fasilitas:</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="harga_fasilitas">
                   </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer d-flex align-items-stretch justify-content-end">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
            <a href="{{route("fasilitas.index")}}" class="btn btn-default"><i class="fa fa-power-off"></i>
              Batal</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection