{{-- Delete Modal --}}
<div id="deleteModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" id="deleteForm" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Hapus Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                @method('DELETE')
                <h5>PERINGATAN! Setelah data dihapus, maka data tidak akan bisa dikembalikan dan data yang berhubungan akan terhapus juga.</h5>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Ya, Hapus</button>
              </div>
          </div>
      </form>
    </div>
</div>