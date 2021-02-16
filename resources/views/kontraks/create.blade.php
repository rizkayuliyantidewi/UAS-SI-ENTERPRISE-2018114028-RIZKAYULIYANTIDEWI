@extends('template')
 
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Kontrak Matakuliah</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('kontraks.index') }}"> Back</a>
        </div>
    </div>
</div>
 
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oops!</strong> Anda salah menginputkan data Kontrak Matakuliah.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 
<form action="{{ route('kontraks.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Mahasiswa_id:</strong>
                <input type="text" name="mahasiswa_id" class="form-control" placeholder="Mahasiswa_id">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Semester_id</strong>
                <input type="string" name="semester_id" class="form-control" placeholder="Semester_id">
            </div>
        </div>
       
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection

