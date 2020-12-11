<div class="modal fade" id="modal-konfirmasi" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Konfirmasi</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data ini?</p>

            </div>
            <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger" form="form-konfirmasi">Hapus</button>
                <form action="" method="post" id="form-konfirmasi">
                    @csrf
                    @method("DELETE")
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(".btn-hapus").click(function(e){
        e.preventDefault();
        
        $("#form-konfirmasi").attr("action",$(e.target).data("action"))
        $("#modal-konfirmasi").modal("show");
    })

</script>