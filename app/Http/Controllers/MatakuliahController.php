<?php

namespace App\Http\Controllers;
use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    function index(){
        return view('matakuliah', [
            'matakuliah' => MataKuliah::all()
        ]);
    }
}
