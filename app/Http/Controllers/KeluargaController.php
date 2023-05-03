<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;
 
class KeluargaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $klg = Keluarga::all();
        return view('keluarga.keluarga')
        ->with('klg', $klg);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keluarga.create_keluarga')
            ->with('url_form', url('/keluarga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ktp' => 'required|string|max:50',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
            'hp' => 'required|string|max:15'
        ]);
        $data = Keluarga::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('keluarga')
            ->with('success', 'Keluarga Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $keluarga)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function edit($ktp)
    {
        $keluarga = Keluarga::find($ktp);
        return view('keluarga.create_keluarga')
                    ->with('klg', $keluarga)
                    ->with('url_form', url('/keluarga/'. $ktp));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ktp)
    {
        $request->validate([
            'ktp' => 'required|string|max:50',
            'nama' => 'required|string|max:50'.$ktp,
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:20',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:500',
            'hp' => 'required|string|max:15'
        ]);
        $data = Keluarga::where('ktp', '=', $ktp)->update($request->except(['_token', '_method']));
        return redirect('keluarga')
            ->with('success', 'Keluarga Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $keluarga
     * @return \Illuminate\Http\Response
     */
    public function destroy($ktp)
    {
        Keluarga::where('ktp', '=', $ktp)->delete();
        return redirect('keluarga')
        ->with('success', 'Keluarga Berhasil Dihapus');
    }
}