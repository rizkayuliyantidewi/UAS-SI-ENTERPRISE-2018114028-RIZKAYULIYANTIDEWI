<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\mahasiswa;
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
        return view ('mahasiswas.index',compact('mahasiswas'))
        ->with('i',(request()->input('page',1)-1)*5);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswas.create');
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
            'nama_mahasiswa'=>'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email'=> 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('mahasiswas.index')
            ->with ('success','Mahasiswa created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('mahasiswas.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('mahasiswas.edit',compact('post'));
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
            'nama_mahasiswa'=>'required',
            'alamat' => 'required',
            'no_tlp' => 'required|numeric',
            'email'=> 'required',
        ]);

        Post::update($request->all());
        return redirect()->route('mahasiswas.index')
            ->with ('success','Mahasiswa updated successfully.');
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
        return redirect()->route('mahasiswas.index')
            ->with ('success','Mahasiswa deleted successfully.');
    }
}