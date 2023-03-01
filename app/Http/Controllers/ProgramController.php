<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //
    function index()
    {
        return view(
            'Layout.program',
            [
                'judul' => 'Daftar Program', 'program' => ['penghijauan', 'konservasi']
            ]
        );
    }
    function penghijauan()
    {
        return view(
            'Layout.program',
            [
                'judul' => 'Penghijauan', 'program' => ['Menanam Pohon']
            ]
        );
    }
    function konservasi()
    {
        return view(
            'Layout.program',
            [
                'judul' => 'Konservasi', 'program' => ['Pemeliharaan Hewan']
            ]
        );
    }
}
