@extends('layouts.app')

@section('title','cobaaaaaaa')

@section('content')
<div class="card">
    <div class="card-body">
    <h3> Nama Mahasiswa : {{$mahasiswas['nama_mahasiswa']}}</h3>
    <h3> Alamat : {{$mahasiswas['alamat']}}</h3>
    <h3> No Tlp : {{$no_tlp['no_tlp']}}</h3>
    <h3> Email : {{$email['email']}}</h3>
    </div>
</div>
@endsection
  