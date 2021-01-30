<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\absensi;

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
        return view ('absensis.index',compact('absensis'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absensis.create');
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

        Post::create($request->all());
        return redirect()->route('matakuliahs.index')
            ->with ('success','Matakuliah created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('matakuliahs.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('matakuliahs.edit',compact('post'));
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
            'waktu_absen' => 'required|datetime',
            'nama_mahasiswa' =>'required',
            'matakuliah'=>'required',
        ]);

        Post::update($request->all());
        return redirect()->route('absensis.index')
            ->with ('success','Absensi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::delete();
        return redirect()->route('absensis.index')
            ->with ('success','Absensi deleted successfully.');
    }
}
