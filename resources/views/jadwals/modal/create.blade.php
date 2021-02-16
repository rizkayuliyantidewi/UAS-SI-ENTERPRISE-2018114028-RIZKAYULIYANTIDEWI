<div id="createModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="{{ route('jadwals.store') }}" method="post">
          <div class="modal-content">
              <div class="modal-header">
                  <h4 class="modal-title text-dark text-center">Tambah Data.</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              <div class="modal-body">
                @csrf
                <div class="form-group">
                    <strong>Jadwal:</strong>
                    @php
                        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];
                    @endphp
                    <select name="jadwal" class="form-control">
                        @foreach ($days as $day)
                            <option value="{{ $day }}" @if ($day == old('jadwal'))
                                active
                            @endif>{{ $day }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <strong>Mata Kuliah:</strong>
                    <select name="matakuliah_id" class="form-control">
                        @foreach ($matakuliahs as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_matakuliah }}</option> 
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