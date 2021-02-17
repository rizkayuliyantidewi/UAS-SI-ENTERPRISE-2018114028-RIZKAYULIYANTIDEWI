<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\semester;
use Illuminate\Http\Request;

class SmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = semester::latest()->paginate(5);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar semester',
            'data' => $semesters
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
            'semester'=>'required',
          
        ]);

        $semester = Semester::create($request->all());
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah data semester.',
            'data' => $semester,
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
        $semester = semester::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data semester.',
            'data' => $semester
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
           'semester'=>'required', 
       ]);

       $semester = semester :: where ('id',$id)->first();
       if(!$semester)
       {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data semester',
                'data' => null, 
            ], 400);
       }

       $semester->semester = $request->semester;
       $semester->save();
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah data semester.',
            'data' => $semester,
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
       $semester = semester :: where ('id',$id)->first();
       $semester -> delete(); 
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data semester.',
            'data' => $semester, 
        ], 200);
    }
}
