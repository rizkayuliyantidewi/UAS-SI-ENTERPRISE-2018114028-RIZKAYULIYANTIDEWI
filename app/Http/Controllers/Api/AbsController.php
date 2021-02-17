<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\absensi;
use Illuminate\Http\Request;

class AbsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absensis = absensi::latest()->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar absensi.',
            'data' => $absensis, 
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_absen' => 'required',
            'waktu_absen' => 'required',
            'mahasiswa_id' =>'required|numeric',
            'matakuliah_id'=>'required',
            'keterangan'=>'required',
        ]);

        $absensi = absensi::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah data absensi.',
            'data' => $absensi, 
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Absensi $id)
    {
        $absensi = absensi::find($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data absensi.',
            'data' => $absensi, 
        ], 200);
    }
}
