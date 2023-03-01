<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    function index(){
        return view
        (
            'Layout.aboutus',
            [
                'nama' => 'Dwi Paga Ayuba',
                'nim' => '2141720251'
            ]
            );
    }
}
