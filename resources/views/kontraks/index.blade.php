@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Kontrak Matakuliah</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Kontrak MataKuliah</button>
            </div>
        </div>
    </div>

    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Mahasiswa</th>
            <th>Semester</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach($kontraks as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->mahasiswa->nama_mahasiswa }}</td>
            <td>{{ $post->semester->semester }}</td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="{{ route('kontraks.show',$post->id) }}">Tampil</a>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $post->id }}"
                    data-mahasiswa="{{ $post->mahasiswa_id }}"
                    data-semester="{{ $post->semester_id }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $post->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kontraks->links() !!}
 
@include('kontraks.modal.create')
@include('kontraks.modal.edit')
@include('shared.delete_confirmation.modal')
@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'kontraks.destroy'])
<script>
    var mahasiswas = JSON.parse('{!! json_encode($mahasiswas) !!}');
    var semesters = JSON.parse('{!! json_encode($semesters) !!}');

    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route('kontraks.update', ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        setMahasiswa(el);
        setSemester(el);
    }

    function setMahasiswa(el)
    {
        var contents = '';
        for(i = 0; i < mahasiswas.length; i++) {
            var item = mahasiswas[i];
            var status = '';
            if(item.id == el.data('mahasiswa'))
                status = 'selected';

            contents += `<option value="${item.id}" ${status}>${item.nama_mahasiswa}</option>`;
        }
        $("#updateForm select[name=mahasiswa_id]").html(contents);
    }

    function setSemester(el)
    {
        var contents = '';
        for(i = 0; i < semesters.length; i++) {
            var item = semesters[i];
            var status = '';
            if(item.id == el.data('semester'))
                status = 'selected';

            contents += `<option value="${item.id}" ${status}>${item.semester}</option>`;
        }
        $("#updateForm select[name=semester_id]").html(contents);
    }

    function submitUpdate() {
        $("#updateForm").submit();
    }
</script>
@endsection