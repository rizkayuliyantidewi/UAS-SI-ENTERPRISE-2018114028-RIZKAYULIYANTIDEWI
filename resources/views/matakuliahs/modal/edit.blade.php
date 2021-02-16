<div id="updateModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" method="post" id="updateForm">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Ubah Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <strong>Nama Matakuliah:</strong>
                    <input type="text" name="nama_matakuliah" class="form-control" value="" placeholder="Nama Matakuliah">
                </div>
                <div class="form-group">
                    <strong>SKS</strong>
                    <input type="text" name="sks" class="form-control" value="" placeholder="SKS">
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Ubah Sekarang</button>
              </div>
          </div>
      </form>
    </div>
</div>