<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\jadwal;
use Illuminate\Http\Request;

class JdwlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwals = jadwal::latest()->paginate(5);

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar jadwal.',
            'data' => $jadwals, 
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   //  public function create()
   //  {
   //      return view('jadwals.create');
   //  }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
           'jadwal'=>'required',
           'matakuliah_id' => 'required',
       
       ]);

       $jadwal = jadwal::where([
           ['jadwal', $request->jadwal],
           ['matakuliah_id', $request->matakuliah_id]
       ])->first();

       if($jadwal)
       {
            return response()->json([
                'success' => false,
                'message' => 'Gagal, data jadwal sudah ada.',
                'data' => null, 
            ], 400);
       }

       $jadwal = jadwal::create($request->all());
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah jadwal.',
            'data' => $jadwal, 
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
        $jadwal = jadwal::findOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data jadwal',
            'data' => $jadwal, 
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   //  public function edit($id)
   //  {
   //      $jadwal = jadwal::findOrFail($id);
   //      return view('jadwals.edit',['jadwal'=>$jadwal]);
   //  }

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
           'jadwal'=>'required',
           'matakuliah_id' => 'required',
        ]);

       $jadwal = jadwal::where('id', $id)->first();
       if(!$jadwal)
       {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah jadwal',
                'data' => null, 
            ], 400);
       }
           
       $jadwal->matakuliah_id = $request->matakuliah_id;
       $jadwal->jadwal = $request->jadwal;
       $jadwal->save();
       
       return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah jadwal.',
            'data' => $jadwal, 
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
        $jadwal = jadwal :: where ('id',$id)->first();
        $jadwal -> delete();
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus jadwal.',
            'data' => $jadwal, 
        ], 200);
    }
}
