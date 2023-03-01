<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    function index()
    {
        return view(
            'Layout.product',
            [
                'judul' => 'Daftar Produk', 'product' => ['kertas', 'pulpen']
            ]
        );
    }
    function kertas()
    {
        return view(
            'Layout.product',
            [
                'judul' => 'Kertas', 'product' => ['Kertas Lipat', 'Kertas HVS', 'Kertas Kado']
            ]
        );
    }
    function pulpen()
    {
        return view(
            'Layout.product',
            [
                'judul' => 'Pulpen', 'product' => ['Pulpen Joyko', 'Pulpen Kenko', 'Pulpen Merah']
            ]
        );
    }
}
