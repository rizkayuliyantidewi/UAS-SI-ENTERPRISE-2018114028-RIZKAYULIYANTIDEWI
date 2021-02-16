@extends('template')
 
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Absensi</h2>
            </div>
            <div class="float-right">
                <button class="btn btn-success" data-toggle="modal" data-target="#createModal">Tambah Absensi</button>
            </div>
        </div>
    </div>
 
    @include('shared.alert')
 
    <table class="table table-bordered">
        <tr>
        
            <th width="20px" class="text-center">No</th>
            <th>Tanggal Absen</th>
            <th>Waktu Absen</th>
            <th>Nama Mahasiswa</th>
            <th>Matakuliah</th>
            <th>Keterangan</th>
            {{-- <th width="280px"class="text-center">Action</th> --}}
        </tr>
        @foreach ($absensis as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ date('d M Y', strtotime($post->tanggal_absen)) }}</td>
            <td>{{ $post->waktu_absen }}</td>
            <td>{{ $post->mahasiswa->nama_mahasiswa }}</td>
            <td>{{ $post->matakuliah->nama_matakuliah }}</td>
            <td>{{ $post->keterangan }}</td>
            {{-- <td class="text-center">
                <form action="{{ route('mahasiswas.destroy',$post->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('absensis.show',$post->id) }}">Absen Disini</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('absensis.edit',$post->id) }}">Edit Absen</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete Absen</button>
                </form>
            </td> --}}
        </tr>
        @endforeach
    </table>
 
    {!! $absensis->links() !!}
 
@include('absensis.modal.create')
@endsection
