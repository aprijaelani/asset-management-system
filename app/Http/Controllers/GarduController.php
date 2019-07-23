<?php

namespace App\Http\Controllers;

use App\Gardu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GarduController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();
        $gardus = Gardu::with('gerbang')->get();
        return view('data_master.gardu.list',compact('data_user','gardus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        $gerbangs = \App\Gerbang::all();
        return view('data_master.gardu.create',compact('data_user','gerbangs'));
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
        Gardu::create([
            'id_gerbang' => $request->id_gerbang,
            'nomor_gardu' => $request->nomor_gardu,
            'nama_gardu'  => $request->nama_gardu,
            'deskripsi'     => $request->deskripsi,
            'created_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Gardu Berhasil Disimpan');
        return redirect("/gardu");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gardu  $gardu
     * @return \Illuminate\Http\Response
     */
    public function show(Gardu $gardu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gardu  $gardu
     * @return \Illuminate\Http\Response
     */
    public function edit(Gardu $gardu)
    {
        $data_user = Auth::user();
        $gerbangs = \App\Gerbang::all();
        return view('data_master.gardu.edit',compact('data_user','gerbangs','gardu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gardu  $gardu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gardu $gardu)
    {
        $data_user = Auth::user();
        Gardu::where('id',$gardu->id)->update([
            'id_gerbang' => $request->id_gerbang,
            'nomor_gardu' => $request->nomor_gardu,
            'nama_gardu'  => $request->nama_gardu,
            'deskripsi'     => $request->deskripsi,
            'updated_by'    => $data_user->id,
        ]);
        flash()->overlay('Data Gardu Berhasil Diupdate');
        return redirect("/gardu");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gardu  $gardu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $gardu = Gardu::find($request->id);
        $gardu->delete();
        flash()->overlay('Data Gardu Berhasil Dihapus');
        return redirect("/gardu");
    }
}
