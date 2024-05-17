<?php

namespace App\Http\Controllers\pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CutiController extends Controller
{
    public function index()
    {
        $jeniscuti = DB::table('jeniscutis')->get();
        return view('pegawai.dashboard', [
            'jeniscuti' => $jeniscuti,
        ]);
    }
    public function kirimCuti(Request $request)
    {
        $validasi = $request->validate([
            'tanggal_mulai' => 'required',
            'tanggal_akhir' => 'required',
            'jenis_cuti' => 'required',
            'keterangan' => 'required',
        ]);
        // dd($request->all());
        Pengajuan::create([
            'user_id' => auth()->user()->id,
            'jeniscuti_id' => $validasi['jenis_cuti'],
            'tanggal_mulai' => $validasi['tanggal_mulai'],
            'tanggal_selesai' => $validasi['tanggal_akhir'],

            'keterangan' => $validasi['keterangan'],
        ]);
        return redirect()->route('pegawai.pengajuan.cuti');
    }

    public function pengajuanCuti()
    {
        $pengajuan = Pengajuan::where('user_id', auth()->user()->id)->get();

        return view('pegawai.status', [
            'pengajuan' => $pengajuan,
        ]);
    }
}
