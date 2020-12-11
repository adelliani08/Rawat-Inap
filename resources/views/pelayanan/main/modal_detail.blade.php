<div class="modal fade" id="modalDetail" role="dialog">
    <div class="modal-dialog modal-ld" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Konfirmasi Kepulangan Pasien</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
              aria-hidden="true">&times;</span></button>
        </div>
        <form class="form-horizontal fromPasien" action="" method="post">
          @csrf
          <div class="modal-body">
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">No Rawat Inap:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="no_rawatinap">
              </div>
            </div>
  
  
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Nama Pasien:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="nama_pasien">
              </div>
            </div>
            <div class="form-group row">
              <label class="col-sm-4 col-form-label">Kamar:</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="kamar">
              </div>
            </div>
            Atas Nama Pasien Diatas, Apakah Yakin Akan checkout?
  
          </div>
          <div class="modal-footer row">
            <button class="btn bg-green col-2">Ya</button>
            <button class="btn bg-red col-2">Tidak</button>
          </div>
      </div>
  
    </div>
  </div>