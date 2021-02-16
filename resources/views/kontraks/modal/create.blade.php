<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('kontraks.store') }}" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>Mahasiswa:</strong>
                    <select name="mahasiswa_id" class="form-control">
                        @foreach ($mahasiswas as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mahasiswa }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Semester:</strong>
                    <select name="semester_id" class="form-control">
                        @foreach ($semesters as $item)
                            <option value="{{ $item->id }}">{{ $item->semester }}</option> 
                        @endforeach
                    </select>
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