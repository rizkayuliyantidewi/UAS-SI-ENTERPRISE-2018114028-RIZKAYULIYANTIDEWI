<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use\App\Models\semester;

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
         return view ('semesters.index',compact('semesters'))
         ->with('i',(request()->input('page',1)-1)*5);
     
     }
 
     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function create()
     {
         return view('semesters.create');
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
 
         Semester::create($request->all());
         return redirect()->route('semesters.index')
             ->with ('success','Semester created successfully.');
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
         return view('semesters.show',['semester'=>$semester]);
     }
 
     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {
         $semester = semester::findOrFail($id);
         return view('semesters.edit',['semester'=>$semester]);
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
 
         Post::update($request->all());
         return redirect()->route('semesters.index')
             ->with ('success','Semester updated successfully.');
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
      $semester -> delete(); return redirect()->route('semesters.index');
      with('success', 'Semester deleted succesfully');
 }
}
