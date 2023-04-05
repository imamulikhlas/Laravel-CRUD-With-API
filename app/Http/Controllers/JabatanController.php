<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JabatanPegawai;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatan = JabatanPegawai::all();
        return response()->json($jabatan);
    }

    public function show($id)
    {
        $jabatan = JabatanPegawai::find($id);
        return response()->json($jabatan);
    }

    public function destroy($id)
    {
        $jabatan = JabatanPegawai::find($id);
        $jabatan->delete();

        return response()->json('Pegawai berhasil dihapus');
    }
}
