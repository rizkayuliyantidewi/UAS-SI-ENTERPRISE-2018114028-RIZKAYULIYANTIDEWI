@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Semester</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('semesters.create') }}"> Tambah Semester</a>
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
            <th>Semester</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($semesters as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->semester}}</td>
          
            <td class="text-center">
                <form action="{{ route('semesters.destroy',$post->id) }}" method="POST">
 
                    
 
                    <a class="btn btn-primary btn-sm" href="{{ route('semesters.edit',$post->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
 
    {!! $semesters->links() !!}
 
@endsection
