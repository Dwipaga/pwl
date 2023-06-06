<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\MahasiswaModels;
use App\Models\MataKuliah;
use Illuminate\Http\Request;
use PDO;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PDF;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.mahasiswa', [ 'kls' => $kelas]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kelas = Kelas::all();
        return view('mahasiswa.create_mahasiswa', [
            'url_form' => url('/mahasiswa'),
            'kelas' => $kelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nim' => 'required|string|max:10|unique:mahasiswa,nim',
    //         'nama' => 'required|string|max:50',
    //         'jk' => 'required|in:l,p',
    //         'tempat_lahir' => 'required|string|max:50',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:255',
    //         'hp' => 'required|digits_between:6,15',
    //         'foto' => 'mimes:jpeg,jpg,png,gif'
    //     ]);
    //     $foto_mahasiswa = null;
    //     if($request->file('foto')){
    //         $foto_mahasiswa = $request->file('foto')->store('foto_mahasiswa', 'public');
    //     } 
    //     $mahasiswa = new Mahasiswa;
    //     $mahasiswa->nim = $request->get('nim');
    //     $mahasiswa->nama = $request->get('nama');
    //     $mahasiswa->jk = $request->get('jk');
    //     $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //     $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //     $mahasiswa->alamat = $request->get('alamat');
    //     $mahasiswa->hp = $request->get('hp');
    //     $mahasiswa->foto = $foto_mahasiswa;

    //     $kelas = new Kelas;
    //     $kelas->id = $request->get('kelas');

    //     $mahasiswa->kelas()->associate($kelas);
    //     $mahasiswa->save();

    //     return redirect('mahasiswa')
    //         ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    // }

    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $foto_mahasiswa = null;
            if($request->file('foto')){
                $foto_mahasiswa = $request->file('foto')->store('foto_mahasiswa', 'public');
            } 
            $mahasiswa = new MahasiswaModels;
            $mahasiswa->nim = $request->get('nim');
            $mahasiswa->nama = $request->get('nama');
            $mahasiswa->jk = $request->get('jk');
            $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
            $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
            $mahasiswa->alamat = $request->get('alamat');
            $mahasiswa->hp = $request->get('hp');
            $mahasiswa->foto = $foto_mahasiswa;
    
            $kelas = new Kelas;
            $kelas->id = $request->get('kelas');
    
            $mahasiswa->kelas()->associate($kelas);
            $mhs = $mahasiswa->save();

        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs)? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(MahasiswaModels $mahasiswa,$id)
    {
        $mahasiswa  = MahasiswaModels::with('kelas')->find($id);
        return response()->json($mahasiswa);

    }

    public function showKhs(MahasiswaModels $mahasiswa, $id){
        $mahasiswa = MahasiswaModels::with('kelas', 'matakuliah')->find($id);
        $khs = $mahasiswa->matakuliah()->withPivot('nilai')->get();
        return view('mahasiswa.khs', [
            'mahasiswa' => $mahasiswa,
            'khs' => $khs
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = MahasiswaModels::with('kelas')->find($id);
        $kelas = Kelas::all();
        return view('mahasiswa.create_mahasiswa', [
            'mhs' => $mahasiswa,
            'kelas' => $kelas,
            'url_form' => url('/mahasiswa/' . $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
    //         'nama' => 'required|string|max:50',
    //         'jk' => 'required|in:l,p',
    //         'tempat_lahir' => 'required|string|max:50',
    //         'tanggal_lahir' => 'required|date',
    //         'alamat' => 'required|string|max:255',
    //         'hp' => 'required|digits_between:6,15',
    //         'foto' => 'mimes:jpeg,jpg,png,gif'
    //     ]);


    //     $mahasiswa = Mahasiswa::with('kelas')->find($id);
    //     $mahasiswa->nim = $request->get('nim');
    //     $mahasiswa->nama = $request->get('nama');
    //     $mahasiswa->jk = $request->get('jk');
    //     $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
    //     $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
    //     $mahasiswa->alamat = $request->get('alamat');
    //     $mahasiswa->hp = $request->get('hp');

    //     if($request->file('foto')){
    //         if($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))){
    //             Storage::delete('public/' . $mahasiswa->foto);
    //         }

    //         $foto_mahasiswa = $request->file('foto')->store('foto_mahasiswa', 'public');
    //         $mahasiswa->foto = $foto_mahasiswa;

    //     }

    //     $kelas = new Kelas;
    //     $kelas->id = $request->get('kelas');

    //     $mahasiswa->kelas()->associate($kelas);
    //     $mahasiswa->save();

    //     return redirect('mahasiswa')->with('success', 'Mahasiswa Berhasil Diedit');
    // }

    public function update(Request $request, $id)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:255',
            'hp' => 'required|digits_between:6,15',
            'foto' => 'mimes:jpeg,jpg,png,gif'
        ];

        $validator = Validator::make($request->all(), $rule);
        if($validator->fails()){
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' .$validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mahasiswa = MahasiswaModels::with('kelas')->find($id);
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->jk = $request->get('jk');
        $mahasiswa->tempat_lahir = $request->get('tempat_lahir');
        $mahasiswa->tanggal_lahir = $request->get('tanggal_lahir');
        $mahasiswa->alamat = $request->get('alamat');
        $mahasiswa->hp = $request->get('hp');

        if($request->file('foto')){
            if($mahasiswa->foto && file_exists(storage_path('app/public/' . $mahasiswa->foto))){
                Storage::delete('public/' . $mahasiswa->foto);
            }

            $foto_mahasiswa = $request->file('foto')->store('foto_mahasiswa', 'public');
            $mahasiswa->foto = $foto_mahasiswa;

        }

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        $mahasiswa->kelas()->associate($kelas);
        $mhs = $mahasiswa->save();

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs)? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        MahasiswaModels::where('id', '=', $id)->delete();
        return response()->json([
            'message' => 'Data berhasil dihapus',
            'status' => true
        ]);
    }

    public function cetak_pdf($id){
        $mahasiswa = MahasiswaModels::with('kelas', 'matakuliah')->find($id);
        $khs = $mahasiswa->matakuliah()->withPivot('nilai')->get();
        $pdf = PDF::loadView('mahasiswa.khs_pdf', ['mahasiswa' => $mahasiswa, 'khs' => $khs]);
        return $pdf->stream();
    }

    public function data()
    {
        $data = MahasiswaModels::with('kelas')->get();

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
    }
}