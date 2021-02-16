@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Kontrak Matakuliah</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('kontraks.create') }}"> Tambah Kontrak MataKuliah</a>
            </div>
        </div>
    </div>
 
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
 
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">Id</th>
            <th>Mahasiswa_id</th>
            <th>Semester_id</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach($kontraks as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->mahasiswa_id}}</td>
            <td>{{ $post->semester_id }}</td>
            <td class="text-center">
                <form action="{{ route('kontraks.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('kontraks.show',$post->id) }}">Tampil</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('kontraks.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $kontraks->links() !!}
 
@endsection
