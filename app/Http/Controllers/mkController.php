<?php

namespace App\Http\Controllers;

use App\matakuliah;
use Illuminate\Http\Request;

class mkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mk = matakuliah::all();
        return view('matakuliah.index',compact('mk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['kode_mk'=>'required|digits:10','nama_mk'=>'required']);
        matakuliah::create($request->all());
        return redirect()->route('matakuliah.index')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(matakuliah $matakuliah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mk=matakuliah::find($id);
        return view('matakuliah.edit',compact('mk'));
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
        $mk=matakuliah::find($id);
        $mk->kode_mk= $request->input('kode_mk');
        $mk->nama_mk= $request->input('nama_mk');
        $mk->sks= $request->input('sks');
        $mk->semester= $request->input('semester');
        $mk->save();
        return redirect('/');
           
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mk=matakuliah::find($id);
        $mk->delete();
        return redirect('/');
    }
}
