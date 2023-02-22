<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function produk($daftar_product)
    {
        echo "Daftar Produk $daftar_product";
        echo "<ul><li>List 1</li>
        <li>List 2</li>
        <li>List 3</li>
        <li>List 4</li></ul>";
    }
}
