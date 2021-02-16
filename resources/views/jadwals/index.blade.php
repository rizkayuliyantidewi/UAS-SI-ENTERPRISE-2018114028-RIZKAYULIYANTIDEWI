@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Jadwal</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Jadwal</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">Id</th>
            <th>Jadwal</th>
            <th>Matakuliah</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($jadwals as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->jadwal}}</td>
            <td>{{ $post->matakuliah->nama_matakuliah }}</td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="{{ route('jadwals.show',$post->id) }}">Hadir</a>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                data-id="{{ $post->id }}"
                data-jadwal="{{ $post->jadwal }}"
                data-matakuliah="{{ $post->matakuliah_id }}"
                onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $post->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $jadwals->links() !!}
 
@include('jadwals.modal.create')
@include('jadwals.modal.edit')
@include('shared.delete_confirmation.modal')
@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'jadwals.destroy'])
<script>
    var matakuliahs = JSON.parse('{!! json_encode($matakuliahs) !!}');
    var days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum\'at', 'Sabtu', 'Minggu'];

    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route('jadwals.update', ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        var day = '';
        for(i = 0; i < days.length; i++) {
            var dayStatus = '';
            if(days[i] == el.data('jadwal'))
                dayStatus = 'selected';

            day += `<option value="${days[i]}" ${dayStatus}>${days[i]}</option>`;
        }
        $("#updateForm select[name=jadwal]").html(day);
        var matakuliah = null;
        for(j = 0; j < matakuliahs.length; j++) {
            var item = matakuliahs[j];
            var status = '';
            if(item.id == el.data('matakuliah'))
                status = 'selected';

            matakuliah += `<option value="${item.id}" ${status}>${item.nama_matakuliah}</option>`;
        }
        console.log(matakuliah);
        $("#updateForm select[name=matakuliah_id]").html(matakuliah);
     }

     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
@endsection