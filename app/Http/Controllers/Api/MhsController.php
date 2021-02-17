<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahasiswas = mahasiswa::latest()->paginate(5);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil daftar mahasiswa',
            'data' => $mahasiswas,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('mahasiswas.create');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa'=>'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email'=> 'required',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menambah data mahasiswa.',
            'data' => $mahasiswa, 
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
        $mahasiswa = mahasiswa::with('absensi')->findOrFail($id);
        
        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengambil data mahasiswa',
            'data' => $mahasiswa, 
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     $mahasiswa = mahasiswa::findOrFail($id);
    //     return view('mahasiswas.edit',['mahasiswa'=>$mahasiswa]);
    // }

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
            'nama_mahasiswa'=>'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email'=> 'required',
        ]);
        
        $mahasiswa = mahasiswa::where('id', $id)->first();
        if(!$mahasiswa)
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengubah data mahasiswa',
                'data' => null, 
            ], 400);
        }

        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->no_tlp = $request->no_tlp;
        $mahasiswa->email = $request->email;
        $mahasiswa->save();

        return response()->json([
            'success' => true,
            'message' => 'Berhasil mengubah data mahasiswa',
            'data' => $mahasiswa, 
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
        $mahasiswa = mahasiswa::where('id',$id)->first();
        if(!$mahasiswa)
        {
            return response()->json([
                'success' => false,
                'message' => 'Gagal menghapus data mahasiswa',
                'data' => null, 
            ], 400);
        }
            
        $mahasiswa->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil menghapus data mahasiswa',
            'data' => $mahasiswa, 
        ], 200);
    }
}
