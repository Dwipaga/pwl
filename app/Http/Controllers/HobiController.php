<?php

namespace App\Http\Controllers;

use App\Models\Hobi;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hbi = Hobi::all();
        return view('hobi.hobi')
            ->with('hbi', $hbi);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobi.create_hobi')
            ->with('url_form', url('/hobi'));
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
            'nama_hobi' => 'required|string|max:30'
        ]);
        $data = Hobi::create($request->except(['_token']));
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect('hobi')
            ->with('success', 'Hobi Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobi  $hobi
     * @return \Illuminate\Http\Response
     */
    public function show(Hobi $hobi)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobi  $hobi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hobi = Hobi::find($id);
        return view('hobi.create_hobi')
            ->with('hbi', $hobi)
            ->with('url_form', url('/hobi/' . $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hobi  $hobi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_hobi' => 'required|string|max:30' . $id,
        ]);
        $data = Hobi::where('id', '=', $id)->update($request->except(['_token', '_method']));
        return redirect('hobi')
            ->with('success', 'Hobi Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobi  $hobi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Hobi::where('id', '=', $id)->delete();
        return redirect('hobi')
            ->with('success', 'Hobi Berhasil Dihapus');
    }
}
