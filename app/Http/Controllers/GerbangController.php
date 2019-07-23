<?php

namespace App\Http\Controllers;

use App\Gerbang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GerbangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();
        $gerbangs = Gerbang::all();
        return view('data_master.gerbang.list',compact('data_user','gerbangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        return view('data_master.gerbang.create',compact('data_user'));
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
        Gerbang::create([
            'nomor_gerbang' => $request->nomor_gerbang,
            'nama_gerbang'  => $request->nama_gerbang,
            'deskripsi'     => $request->deskripsi,
            'created_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Gerbang Berhasil Disimpan');
        return redirect("/gerbang");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gerbang  $gerbang
     * @return \Illuminate\Http\Response
     */
    public function show(Gerbang $gerbang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gerbang  $gerbang
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerbang $gerbang)
    {
        $data_user = Auth::user();
        return view('data_master.gerbang.edit',compact('data_user','gerbang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gerbang  $gerbang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerbang $gerbang)
    {
        $data_user = Auth::user();
        Gerbang::where('id',$gerbang->id)->update([
            'nomor_gerbang' => $request->nomor_gerbang,
            'nama_gerbang'  => $request->nama_gerbang,
            'deskripsi'     => $request->deskripsi,
            'updated_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Gerbang Berhasil Diupdate');
        return redirect("/gerbang");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gerbang  $gerbang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = Gerbang::find($request->id);
        $user->delete();
        flash()->overlay('Data Gerbang Berhasil Dihapus');
        return redirect("/gerbang");
    }
}
