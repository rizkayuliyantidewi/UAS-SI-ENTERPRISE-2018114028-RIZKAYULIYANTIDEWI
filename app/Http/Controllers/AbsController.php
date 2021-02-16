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
            'waktu_absen' => 'required',
            'mahasiswa_id' =>'required|numeric',
            'matakuliah_id'=>'required',
            'keterangan'=>'required',

        ]);

        absensi::create($request->all());
        return redirect('absensis')
            ->with ('success','Absensi created successfully.');
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
        return view('absensis.show',compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $absensi = absensi::findOrFail($id);
        return view('absensis.edit',['absensi'=>$absensi]);
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
            'waktu_absen' => 'required',
            'mahasiswa_id' =>'required',
            'matakuliah_id'=>'required',
            'keterangan'=>'required',
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
