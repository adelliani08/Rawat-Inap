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

    <div class="content-wrapper">

        <div class="row">
            <div class="col-12">
                <form class="form-horizontal need-konfirmasi" id="form-edit" action="{{route("user.update")}}" method="post">
                    @csrf
                    @method("PUT")
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="col-sm-5">Username</label>
                                        <div class="col-sm-12">
                                            <input autocomplete="off" type="text" class="form-control" name="username"
                                                value="{{$user->username}}" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-stretch justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                            {{-- Buat nampilin modal konfirmasi password lamanya --}}
                            <a href="/" class="btn btn-default"><i class=" fa fa-power-off"></i>
                                Batal</a>
                        </div>
                    </div>

                </form>
                <form class="form-horizontal need-konfirmasi" id="form-ubahpassword" action="{{route("user.ubah_password")}}"
                    method="post">
                    @csrf
                    @method("PATCH")
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <label class="col-sm-5">Password Baru:</label>
                                        <div class="col-sm-12">
                                            <input autocomplete="new-password" type="password" class="form-control"
                                                name="password_baru" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-5">Konfirmasi Password:</label>
                                        <div class="col-sm-12">
                                            <input autocomplete="new-password" type="password" class="form-control"
                                                name="konfirmasi_password" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer d-flex align-items-stretch justify-content-end">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                            {{-- Buat nampilin modal konfirmasi password lamanya --}}
                            <a href="/" class="btn btn-default"><i class=" fa fa-power-off"></i>
                                Batal</a>
                        </div>
                    </div>

                </form>

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
                                    <input autocomplete="new-password" type="password" name="password"
                                        data-konfirmasi class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer justify-content-end">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" data-konfirmasi>OK</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("extra-script")
<script>
    $("form.need-konfirmasi").on("submit",function(e){
        e.preventDefault()
        $("[data-konfirmasi]")
        $("#modal-konfirmasi")
    })
</script>
@endsection