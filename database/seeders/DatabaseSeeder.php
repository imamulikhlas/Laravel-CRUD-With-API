<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pegawai;
use App\Models\JabatanPegawai;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Seed pegawai table
        Pegawai::create([
            'nama' => 'Alexantuys Fers',
            'alamat' => 'Jl. Raya No. 1',
            'no_telepon' => '08123456789'
        ]);

        Pegawai::create([
            'nama' => 'Amir Khan',
            'alamat' => 'Jl. Soedarmin No. 2',
            'no_telepon' => '08234567890'
        ]);

        // Seed jabatan_pegawai table
        JabatanPegawai::create([
            'nama_jabatan' => 'Manager',
            'deskripsi' => 'Memimpin dan mengatur seluruh karyawan'
        ]);

        JabatanPegawai::create([
            'nama_jabatan' => 'Staff',
            'deskripsi' => 'Bertanggung jawab atas tugas-tugas administratif'
        ]);
    }
}
