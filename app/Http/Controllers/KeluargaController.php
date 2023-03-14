<?php

namespace App\Http\Controllers;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    function index(){
        return view('keluarga', [
            'keluarga' => Keluarga::all()
        ]);
    }
}
