<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\matakuliah;

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
        return view ('matakuliahs.index',compact('matakuliahs'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliahs.create');
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

        matakuliah::create($request->all());
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
        $matakuliah = matakuliah::findOrFail($id);
        return view('matakuliahs.show',['matakuliah'=>$matakuliah]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matakuliah = matakuliah::findOrFail($id);
        return view('matakuliahs.edit',['matakuliah'=>$matakuliah]);
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

        Post::update($request->all());
        return redirect()->route('matakuliahs.index')
            ->with ('success','Matakuliah updated successfully.');
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
        $matakuliah -> delete(); return redirect()->route('matakuliahs.index');
        with('success', 'Matakuliah deleted succesfully');
    }
}
