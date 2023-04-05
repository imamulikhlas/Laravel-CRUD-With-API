<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use App\Models\Pegawai;
use App\Models\JabatanPegawai;

class KontrakController extends Controller
{
    public function index()
    {
        $kontrak = Kontrak::all();
        $kontrak = $kontrak->map(function ($item) {
            $pegawai = Pegawai::find($item->pegawai_id);
            $jabatan = JabatanPegawai::find($item->jabatan_id);
            $item->nama_pegawai = $pegawai->nama;
            $item->nama_jabatan = $jabatan->nama_jabatan;
            return $item;
        });
        return response()->json($kontrak);
    }


    public function show($id)
    {
        $kontrak = Kontrak::find($id);
        return response()->json($kontrak);
    }

    public function store(Request $request)
    {
        $kontrak = new Kontrak;
        $kontrak->nama = $request->nama;
        $kontrak->alamat = $request->alamat;
        $kontrak->save();

        return response()->json($kontrak);
    }

    public function update(Request $request, $id)
    {
        $kontrak = Kontrak::find($id);
        $kontrak->nama = $request->nama;
        $kontrak->alamat = $request->alamat;
        $kontrak->save();

        return response()->json($kontrak);
    }

    public function destroy($id)
    {
        $kontrak = Kontrak::find($id);
        $kontrak->delete();

        return response()->json('kontrak berhasil dihapus');
    }
}
