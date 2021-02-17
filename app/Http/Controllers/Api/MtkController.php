<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\matakuliah;
use Illuminate\Http\Request;

class MtkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matakuliahs = matakuliah::latest()->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar mata kuliah.',
            'data' => $matakuliahs
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
            'nama_matakuliah'=>'required',
            'sks' => 'required|numeric',
        ]);

        $matakuliah = matakuliah::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah data mata kuliah.',
            'data' => $matakuliah,
        ], 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $matakuliah = matakuliah::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data mata kuliah',
            'data' => $matakuliah, 
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matakuliah'=>'required',
            'sks' => 'required|numeric',
        ]);

        $matakuliah = matakuliah::where('id', $id)->first();
        if(!$matakuliah)
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data mata kuliah.',
                'data' => null, 
            ], 400);
        }

        $matakuliah->nama_matakuliah = $request->nama_matakuliah;
        $matakuliah->sks = $request->sks;
        $matakuliah->save();
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah data mata kuliah.',
            'data' => $matakuliah, 
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $matakuliah = matakuliah :: where ('id',$id)->first();
        $matakuliah -> delete(); 
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data mata kuliah',
            'data' => $matakuliah, 
        ], 200);
    }
}
