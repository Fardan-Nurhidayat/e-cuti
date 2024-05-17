<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawai = User::where('role', 'pegawai')->get();
        return view('admin.pegawai', [
            'pegawai' => $pegawai,
        ]);
    }

    public function storePegawai(Request $request)
    {
        // dd($request->all());
        $validate = $request->validate([
            'name' => 'required' , 'unique:users' ,
            'email' => 'required' , 'unique:users' ,
            'password' => 'required',
            'repeat_password' => 'required|same:password',
        ]);
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password']),
            'role' => 'pegawai',
        ]);
        return redirect()->route('admin.pegawai');
    }

    public function updatePegawai(Request $request)
    {
        // dd($request->all());
        User::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->route('admin.pegawai');
    }

    public function deletePegawai(Request $request)
    {
        User::where('id', $request->id)->delete();
        return redirect()->route('admin.pegawai');
    }
}
