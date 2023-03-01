<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function index()
    {
        return view(
            'profil',
            [
                'nama' => 'Dwi Paga Ayuba',
                'nim' => '2141720251',
                'kelas' => 'TI 2A'
            ]
        );
    }
}
