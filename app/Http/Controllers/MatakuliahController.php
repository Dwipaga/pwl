<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mkl = Matakuliah::all();
        return view('matakuliah.matakuliah')
        ->with('mkl', $mkl);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('matakuliah.create_matakuliah')
            ->with('url_form', url('/matakuliah'));
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
            'nama_matkul' => 'required|string|max:255',
            'nama_dosen' => 'required|string|max:255'
        ]);
        $data = Matakuliah::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('matakuliah')
            ->with('success', 'Matkul Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(Matakuliah $matkul)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $matkul = Matakuliah::find($id);
        return view('matakuliah.create_matakuliah')
                    ->with('mkl', $matkul)
                    ->with('url_form', url('/matakuliah/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_matkul' => 'required|string|max:255'.$id,
            'nama_dosen' => 'required|string|max:255'
        ]);
        $data = Matakuliah::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('matakuliah')
            ->with('success', 'Matkul Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Matakuliah::where('id', '=', $id)->delete();
        return redirect('matakuliah')
        ->with('success', 'Matkul Berhasil Dihapus');
    }
}