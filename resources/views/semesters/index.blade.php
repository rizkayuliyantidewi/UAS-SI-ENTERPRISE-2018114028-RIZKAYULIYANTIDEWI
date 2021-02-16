@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Semester</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Semester</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Semester</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($semesters as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->semester}}</td>
            <td class="text-center">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#updateModal" 
                    data-id="{{ $post->id }}"
                    data-semester="{{ $post->semester }}"
                    onclick="updateData(this)">Edit</button>

                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" onclick="deleteData('{{ $post->id }}')">Delete</button>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $semesters->links() !!}
 
@include('semesters.modal.create')
@include('semesters.modal.edit')
@include('shared.delete_confirmation.modal')
@endsection

@section('scripts')
@include('shared.delete_confirmation.script', ['routeName' => 'semesters.destroy'])
<script>
    function updateData(element) {
        var el = $(element);
        var id = el.data('id');
        var url = '{{ route('semesters.update', ":id") }}';
        url = url.replace(':id', id);
        $("#updateForm").attr('action', url);
        $("#updateForm input[name=semester]").val(el.data('semester'));
    }

    function submitUpdate() {
        $("#updateForm").submit();
    }
</script>
@endsection