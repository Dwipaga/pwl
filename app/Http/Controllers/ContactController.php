<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    function index()
    {
        return view(
            'Layout.contact',
            [
                'kontak' => 'Contact Us'
            ]
        );
    }
}
