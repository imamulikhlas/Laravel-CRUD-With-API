<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrak;
use App\Models\Pegawai;
use App\Models\JabatanPegawai;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'pegawai_id' => 'required|integer|min:1',
            'jabatan_id' => 'required|integer|min:1',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $pegawai_id = $request->input('pegawai_id');
        $jabatan_id = $request->input('jabatan_id');
        $tanggal_mulai = $request->input('tanggal_mulai');
        $tanggal_selesai = $request->input('tanggal_selesai');
        
        // Simpan data kontrak ke database
        $kontrak = new Kontrak;
        $kontrak->pegawai_id = $pegawai_id;
        $kontrak->jabatan_id = $jabatan_id;
        $kontrak->tanggal_mulai = $tanggal_mulai;
        $kontrak->tanggal_selesai = $tanggal_selesai;
        $kontrak->save();
    
        return redirect()->route('home')->with('success', 'Kontrak berhasil disimpan!');
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
