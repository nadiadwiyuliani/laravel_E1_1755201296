<?php

namespace App\Http\Controllers;

use App\dosen;
use App\matakuliah;
use DataTables;
use Illuminate\Http\Request;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dosen.index'); 
    }

     public function dsn_list()
    {
        $dsn =dosen::with('mmatak')->get();
        return DataTables::of($dsn)->addIndexColumn()->addColumn('action',function($dsn){
            $action = '<a class = "text-primary" href="/dsn/edit/'.$dsn->nid.'">edit</a>';
            $action .= ' | <a class = "text-danger" href = "/dsn/delete/'.$dsn->nid.'">hapus</a>';
        return $action;
        })->make();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mk = matakuliah::all();
        return view('dosen.create',compact('mk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nid'=>'required|digits:10','nama_lengkap'=>'required']);
        dosen::create($request->all());
        return redirect()->route('dsn.index')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(dosen $dosen, $id)
    {
        $mk = matakuliah::all();
        $dsn = dosen::find($id);
        return view('dosen.edit', compact('mk','dsn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,dosen $dosen)
    {
        $request->validate(['nama_lengkap' => 'required']);
        $dosen->update($request->all());
        return redirect()->route('dsn.index')->with('success','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dsn.index')->with('success','data berhasil dihapus');
    }
}
