<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\jadwal;

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
         return view ('jadwals.index',compact('jadwals'))
         ->with('i',(request()->input('page',1)-1)*5);
     
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('jadwals.create');
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
             'jadwal'=>'required',
             'matakuliah_id' => 'required',
            
         ]);
 
         Jadwal::create($request->all());
         return redirect()->route('jadwals.index')
             ->with ('success','Jadwal created successfully.');
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
         return view('jadwals.show',['jadwal'=>$jadwal]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $jadwal = jadwal::findOrFail($id);
         return view('jadwals.edit',['jadwal'=>$jadwal]);
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
            'jadwal'=>'required',
            'matakuliah_id' => 'required',
         ]);
 
         Post::update($request->all());
         return redirect()->route('jadwals.index')
             ->with ('success','Jadwal updated successfully.');
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
      $jadwal -> delete(); return redirect()->route('jadwals.index');
      with('success', 'Jadwal deleted succesfully');
     }
 }