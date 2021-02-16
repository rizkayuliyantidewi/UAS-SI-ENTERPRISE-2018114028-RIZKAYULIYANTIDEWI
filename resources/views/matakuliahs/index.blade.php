@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Matakuliah</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Matakuliah</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Nama Matakuliah</th>
            <th>SKS</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($matakuliahs as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_matakuliah}}</td>
            <td>{{ $post->sks }}</td>
        
            <td class="text-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $post->id }}"
                    data-namamk="{{ $post->nama_matakuliah }}"
                    data-sks="{{ $post->sks }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $post->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $matakuliahs->links() !!}

@include('matakuliahs.modal.create')
@include('matakuliahs.modal.edit')
@include('shared.delete_confirmation.modal')
@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'matakuliahs.destroy'])
<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route('matakuliahs.update', ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=nama_matakuliah]").val(el.data('namamk'));
        $("#updateForm input[name=sks]").val(el.data('sks'));
    }

    function submitUpdate() {
        $("#updateForm").submit();
    }
</script>
@endsection