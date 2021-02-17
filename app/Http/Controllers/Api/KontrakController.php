<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $kontraks = kontrak::latest()->paginate(5);
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar kontrak mata kuliah.',
            'data' => $kontraks,
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
            'mahasiswa_id'=>'required|numeric',
            'semester_id' => 'required|numeric',
           
        ]);

        $kontrak = Kontrak::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah data kontrak mata kuliah.',
            'data' => $kontrak,
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
        $kontrak = kontrak::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data detail kontrak mata kuliah.',
            'data' => $kontrak, 
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
           'mahasiswa_id'=>'required',
           'semester_id' => 'required'
       ]);
       
       $kontrak = kontrak::where('id', $id)->first();
       if(!$kontrak)
           abort(404);
           
       $kontrak->mahasiswa_id = $request->mahasiswa_id;
       $kontrak->semester_id = $request->semester_id;
       $kontrak->save();
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah data kontrak mata kuliah.',
            'data' => $kontrak, 
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
       $kontrak = kontrak :: where ('id',$id)->first();
       $kontrak -> delete();
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data kontrak mata kuliah',
            'data' => $kontrak, 
        ], 200);
    }
}
