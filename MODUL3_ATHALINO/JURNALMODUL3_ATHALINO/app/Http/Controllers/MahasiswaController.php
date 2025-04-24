<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // ==================2==================
        // - Buat object mahasiswa dengan data dummy (nama, nim, email, jurusan, fakultas, foto)
        $mahasiswa = [
            'nama' => 'Naufal Athalino Bakti',
            'nim' => '102022300239',
            'email' => 'athalino71@gmail.com',
            'jurusan' => 'S1 Sistem Informasi',
            'fakultas' => 'Fakultas Rekayasa Industri',
            'foto' =>'images/logo-ead.png'
        ];
        // - Kirim object tersebut ke view 'profil'
        return view('profil', ['mahasiswa' => $mahasiswa]);
    }
}
