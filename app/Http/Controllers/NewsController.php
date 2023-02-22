<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    function news($news){
        echo"Berita $news <br>";
        echo"Polisi tuntas melakukan olah TKP insiden ledakan hebat di rumah milik Darman (65), 
        di Desa Karangbendo, Kecamatan Ponggok, <br>Kabupaten Blitar. Hasilnya, terjadi mal prosedur 
        saat peracikan bahan petasan oleh Arifin dan Widodo.";

    }
}
