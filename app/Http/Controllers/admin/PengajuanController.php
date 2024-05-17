<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuan = Pengajuan::orderBy('created_at', 'desc')->get();
        return view('admin.pengajuan', [
            'pengajuan' => $pengajuan,
        ]);
    }

    public function showPegawai()
    {
        return view('admin.pegawai');
    }
    public function addPegawai()
    {
        return view('admin.tambah-pegawai');
    }
    public function updateStatus(Request $request)
    {
        // dd($request->all());
        Pengajuan::where('id', $request->id)->update([
            'status' => $request->status,
        ]);
        return redirect()->route('admin.pengajuan');
    }

}