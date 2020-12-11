@extends("layouts.no_sidebar")

@section("main_content")
<div class="container-fluid col-5 my-1">
    <section class="content-header">
        <div class="row justify-content-between align-items-center">
            <h1>
                Edit Profile
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
                <form class="form-horizontal" id="form-edit" action="" method="post">
                    @csrf
                    @method("PUT")
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-sm-5">Username</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="username"
                                                value="{{$user->username}}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-6">Nama Pelayanan Kesehatan:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="nama_poli"
                                                value="{{$user->poli->nama_poli}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Alamat:</label>
                                        <div class="col-sm-12">
                                            <textarea name="alamat" class="form-control"
                                                rows="3">{{$user->poli->alamat}}</textarea required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Akreditasi:</label>
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" name="akreditasi"
                                                value="{{$user->poli->akreditasi}}" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-stretch justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-konfirmasi"><i class="fa fa-save"></i> Simpan</button>
                            <a href="{{route("admin.index")}}" class="btn btn-default"><i class=" fa fa-power-off"></i>
                                Batal</a>
                        </div>
                    </div>
                </form>
                <form class="form-horizontal" id="form-ubahpassword" action="{{route("user.ubah_password")}}" method="post">
                    @csrf
                    @method("PATCH")
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="col-sm-5">Password Baru:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="password_baru" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5">Konfirmasi Password:</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" name="konfirmasi_password" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer d-flex align-items-stretch justify-content-end">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-konfirmasi"></i> Simpan</button>
                            <a href="{{route("admin.index")}}" class="btn btn-default"><i class=" fa fa-power-off"></i>
                                Batal</a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-konfirmasi" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Konfirmasi Password (Lama)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Password</label>
                        <input autocomplete="off" type="password" name="password" data-konfirmasi class="form-control">
                    </div>

                </div>
                <div class="modal-footer justify-content-end">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary" data-konfirmasi >OK</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

@endsection

@section("extra-script")
<script>
    $("#modal-konfirmasi").on("show.bs.modal",function(e){
        var formId = $(e.relatedTarget).closest("form").attr("id")
        $(this).find("[data-konfirmasi]").attr("form",formId);
    })
</script>
@endsection