<?php

namespace App\Http\Controllers;

use App\Peralatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeralatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();
        $peralatans = Peralatan::all();
        return view('data_master.peralatan.list',compact('data_user','peralatans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        return view('data_master.peralatan.create',compact('data_user'));        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data_user = Auth::user();
        Peralatan::create([
            'nama_alat'     => $request->nama_alat,
            'indikator'     => $request->indikator,
            'keterangan'    => $request->keterangan,
            'created_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Peralatan Berhasil Disimpan');
        return redirect("/peralatan");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function show(Peralatan $peralatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Peralatan $peralatan)
    {
        $data_user = Auth::user();
        return view('data_master.peralatan.edit',compact('data_user','peralatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peralatan $peralatan)
    {
        $data_user = Auth::user();
        Peralatan::where('id',$peralatan->id)->update([
            'nama_alat'     => $request->nama_alat,
            'indikator'     => $request->indikator,
            'keterangan'    => $request->keterangan,
            'created_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Peralatan Berhasil Diupdate');
        return redirect("/peralatan");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Peralatan  $peralatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $peralatan = Peralatan::find($request->id);
        $peralatan->delete();
        flash()->overlay('Data Peralatan Berhasil Dihapus');
        return redirect("/peralatan");
    }
}
