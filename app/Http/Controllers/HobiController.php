<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hobi;

class HobiController extends Controller
{
    function index(){
        return view('hobi', [
            'hobis' => Hobi::all()
        ]);
    }
}
