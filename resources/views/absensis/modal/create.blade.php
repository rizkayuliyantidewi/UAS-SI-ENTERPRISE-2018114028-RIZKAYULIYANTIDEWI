<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('absensis.store') }}" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>Tanggal Absen:</strong>
                    <input type="date" name="tanggal_absen" class="form-control" value="{{ old('tanggal_absen') }}" placeholder="Tanggal Absen">
                </div>
                <div class="form-group">
                    <strong>Waktu Absen:</strong>
                    <input type="time" name="waktu_absen" class="form-control" value="{{ old('waktu_absen') }}" placeholder="Tanggal Absen">
                </div>
                <div class="form-group">
                    <strong>Mahasiswa:</strong>
                    <select name="mahasiswa_id" class="form-control">
                        @foreach ($mahasiswas as $item)
                            <option value="{{ $item->id }}" @if (old('mahasiswa_id') == $item->id)
                                selected
                            @endif>{{ $item->nama_mahasiswa }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Matakuliah:</strong>
                    <select name="matakuliah_id" class="form-control">
                        @foreach ($matakuliahs as $item)
                            <option value="{{ $item->id }}" @if (old('matakuliah_id') == $item->id)
                                selected
                            @endif>{{ $item->nama_matakuliah }}</option> 
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Keterangan</strong>
                    @php
                        $keterangan = ['Hadir', 'Tidak Hadir'];
                    @endphp
                    <select name="keterangan" class="form-control">
                        @foreach ($keterangan as $item)
                            <option value="{{ $item }}" @if (old('keterangan') == $item)
                                selected
                            @endif>{{ $item }}</option>
                        @endforeach
                    </select>
                    {{-- <textarea name="keterangan" class="form-control" style="resize: none; height: 150px;">{{ old('keterangan') }}</textarea> --}}
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