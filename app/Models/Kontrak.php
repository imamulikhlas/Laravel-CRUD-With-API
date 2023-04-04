<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontrak extends Model
{
    use HasFactory;

    protected $table = 'kontrak';
    protected $fillable = ['pegawai_id', 'jabatan_id', 'tanggal_mulai', 'tanggal_selesai'];
    
    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai');
    }
    
    public function jabatanPegawai()
    {
        return $this->belongsTo('App\Models\JabatanPegawai');
    }
}
