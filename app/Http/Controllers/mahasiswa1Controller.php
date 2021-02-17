<?php

namespace App\Http\Controllers;

use App\mahasiswa;
use App\prodi;
use DataTables;
use Illuminate\Http\Request;


class mahasiswa1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return view('mahasiswa.index');   
    }

    public function mhs_list()
    {
        $mhs =mahasiswa::with('mprodi')->get();
        return DataTables::of($mhs)->addIndexColumn()->addColumn('action',function($mhs){
            $action = '<a class = "text-primary" href="/mhs/edit/'.$mhs->nim.'">edit</a>';
            $action .= ' | <a class = "text-danger" href = "/mhs/delete/'.$mhs->nim.'">hapus</a>';
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
        $prodi = prodi::all();
        return view('mahasiswa.create',compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['nim'=>'required|digits:10','nama_lengkap'=>'required']);
        mahasiswa::create($request->all());
        return redirect()->route('mhs.index')->with('success','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(mahasiswa $mahasiswa, $id)
    {
        $prodi = prodi::all();
        $mhs = mahasiswa::find($id);
        return view('mahasiswa.edit', compact('prodi','mhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, mahasiswa $mahasiswa)
    {
        $request->validate(['nama_lengkap' => 'required']);
        $mahasiswa->update($request->all());
        return redirect()->route('mhs.index')->with('success','data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mhs.index')->with('success','data berhasil dihapus');
    }
}
