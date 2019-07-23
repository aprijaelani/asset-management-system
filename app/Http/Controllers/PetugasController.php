<?php

namespace App\Http\Controllers;

use App\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_user = Auth::user();

        $petugas = Petugas::all();
        return view('data_master.petugas.list',compact('data_user','petugas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_user = Auth::user();
        return view('data_master.petugas.create',compact('data_user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!empty(request('foto'))) {
            $foto = request('foto')->getClientOriginalName();
            $foto_destination = base_path() . '/public/uploads/petugas';
            request('foto')->move($foto_destination,$foto);
            $data['foto'] = $foto;
            
        }    

        $data['nik'] = request('nik');
        $data['nama_lengkap'] = request('nama_lengkap');
        $data['email'] = request('email');
        $data['telepon'] = request('telepon');
        $data['alamat'] = request('alamat');
        Petugas::create($data);
        flash()->overlay('Data Petugas Berhasil Diperbarui');
        return redirect("/petugas");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        $data_user = Auth::user();
        return view('data_master.petugas.edit',compact('petugas','data_user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        if (!empty(request('foto'))) {
            $foto = request('foto')->getClientOriginalName();
            $foto_destination = base_path() . '/public/uploads/petugas';
            request('foto')->move($foto_destination,$foto);
            $data['foto'] = $foto;
            
        }    

        $data['nik'] = request('nik');
        $data['nama_lengkap'] = request('nama_lengkap');
        $data['email'] = request('email');
        $data['telepon'] = request('telepon');
        $data['alamat'] = request('alamat');
        Petugas::where('id',$id)->update($data);
        flash()->overlay('Data Petugas Berhasil Diperbarui');
        return redirect("/petugas");   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $petugas = Petugas::find($request->id);
        $petugas->delete();
        flash()->overlay('Data Petugas Berhasil Dihapus');
        return redirect("/petugas");
    }
}
