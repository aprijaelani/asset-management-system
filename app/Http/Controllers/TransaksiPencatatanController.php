<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\TransaksiInduk;

class TransaksiPencatatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$data_user = Auth::user();
        $transaksis = \App\TransaksiInduk::with('gerbang')->get();   
        return view('transaksi.list',compact('data_user','transaksis'));
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
        $today = date('d-m-Y');
        return view('transaksi.create',compact('data_user','gerbangs','today'));
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
    	$tanggal = date("Y-m-d", strtotime($request->tanggal));
    	$check_data = \App\TransaksiInduk::where('tanggal',$tanggal)->where('id_gerbang',$request->id_gerbang)->where('shift',$request->shift)->where('created_by',$data_user->id)->first();
    	if ($check_data) {
    		flash()->overlay('Data Is Exist');
	        return redirect("/pencatatan");
    	}else{
	        \App\TransaksiInduk::create([
	            'id_gerbang' 	=> $request->id_gerbang,
	            'shift'		  	=> $request->shift,
	            'tanggal'	    => $tanggal,
	            'created_by'    => $data_user->id,
	        ]);
	        flash()->overlay('Data Berhasil Disimpan');
	        return redirect("/pencatatan");
    		
    	}
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
    	$transaksiInduk = TransaksiInduk::where('id',$id)->first();
        $data_user = Auth::user(); 
        $gerbangs = \App\Gerbang::all();
        $today = date('d-m-Y',strtotime($transaksiInduk->tanggal));
        $petugas = \App\Petugas::all();
        $gardu = \App\Gardu::where('id_gerbang',$transaksiInduk->id_gerbang)->get();
        $peralatans = \App\Peralatan::all();
        return view('transaksi.edit',compact('peralatans','data_user','gerbangs','today','transaksiInduk','petugas','gardu'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
