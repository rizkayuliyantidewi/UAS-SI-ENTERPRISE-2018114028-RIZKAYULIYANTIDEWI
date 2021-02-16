@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Mahasiswa</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Mahasiswa</button>
            </div>
        </div>
    </div>

    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Nama Mahasiswa</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Email</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($mahasiswas as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_mahasiswa}}</td>
            <td>{{ $post->alamat }}</td>
            <td>{{ $post->no_tlp }}</td>
            <td>{{ $post->email }}</td>
            <td class="text-center">
                <a class="btn btn-info btn-sm" href="{{ route('mahasiswas.show',$post->id) }}">Lihat</a>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $post->id }}"
                    data-nama="{{ $post->nama_mahasiswa }}"
                    data-alamat="{{ $post->alamat }}"
                    data-notelp="{{ $post->no_tlp }}"
                    data-email="{{ $post->email }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $post->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $mahasiswas->links() !!}

@include('mahasiswas.modal.create')
@include('mahasiswas.modal.edit')
@include('shared.delete_confirmation.modal')
@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'mahasiswas.destroy'])
<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route('mahasiswas.update', ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=nama_mahasiswa]").val(el.data('nama'));
        $("#updateForm input[name=alamat]").val(el.data('alamat'));
        $("#updateForm input[name=no_tlp]").val(el.data('notelp'));
        $("#updateForm input[name=email]").val(el.data('email'));
     }

     function submitUpdate() {
        $("#updateForm").submit();
     }
</script>
@endsection