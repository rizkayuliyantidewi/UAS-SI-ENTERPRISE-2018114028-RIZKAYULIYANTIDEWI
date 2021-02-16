<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\kontrak;

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
         return view ('kontraks.index',compact('kontraks'))
         ->with('i',(request()->input('page',1)-1)*5);
     
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('kontraks.create');
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
 
         Kontrak::create($request->all());
         return redirect()->route('kontraks.index')
             ->with ('success','Kontrak created successfully.');
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
         return view('kontraks.show',['kontrak'=>$kontrak]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $kontrak = kontrak::findOrFail($id);
         return view('kontraks.edit',['kontrak'=>$kontrak]);
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
 
         Post::update($request->all());
         return redirect()->route('kontraks.index')
             ->with ('success','Kontrak updated successfully.');
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
      $kontrak -> delete(); return redirect()->route('kontraks.index');
      with('success', 'Kontrak Matakuliah deleted succesfully');
     }
 }
 
