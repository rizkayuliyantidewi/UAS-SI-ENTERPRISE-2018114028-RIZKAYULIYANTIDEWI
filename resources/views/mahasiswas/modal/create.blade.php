<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('mahasiswas.store') }}" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>Nama Mahasiswa:</strong>
                    <input type="text" name="nama_mahasiswa" class="form-control" value="{{ old('nama_mahasiswa') }}" placeholder="Nama Mahasiswa">
                </div>
                <div class="form-group">
                    <strong>Alamat:</strong>
                    <input type="string" name="alamat" class="form-control" value="{{ old('alamat') }}" placeholder="Alamat">
                </div>
                <div class="form-group">
                    <strong>No Telepon:</strong>
                    <input type="string" name="no_tlp" class="form-control" value="{{ old('no_tlp') }}" placeholder="No Telepon">
                </div>
                <div class="form-group">
                    <strong>Email</strong>
                    <input type="string" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Tambah Sekarang</button>
              </div>
          </div>
      </form>
    </div>
</div>