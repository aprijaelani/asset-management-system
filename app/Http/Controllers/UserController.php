<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{
    public function index()
    {
    	$data_user = Auth::user();

    	$users = User::all();
        return view('data_master.user.list_user',compact('data_user','users'));
    }

    public function edit(User $user)
    {
    	$data_user = Auth::user();
    	return view('data_master.user.edit_user',compact('user','data_user'));
    }

    public function update ($id)
    {
        if (!empty(request('foto'))) {
            $foto = request('foto')->getClientOriginalName();
            $foto_destination = base_path() . '/public/uploads/foto';
            request('foto')->move($foto_destination,$foto);
            $data['foto'] = $foto;
            
        }    

        if (request('password') != '') {
            $data['password'] = request('password');
        }

        $data['nik'] = request('nik');
        $data['username'] = request('username');
        $data['nama_lengkap'] = request('nama_lengkap');
        $data['email'] = request('email');
        $data['telepon'] = request('telepon');
        $data['alamat'] = request('alamat');
        $data['level'] = request('level');
        $data['unit_kerja'] = request('unit_kerja');
    	User::where('id',$id)->update($data);
    	flash()->overlay('Data User Berhasil Diperbarui');
        return redirect("/user");	
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        flash()->overlay('Data User Berhasil Dihapus');
        return redirect("/user");
    }
}
