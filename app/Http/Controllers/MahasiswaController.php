<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('cari')){
            $data_mahasiswa = \App\Models\Mahasiswa::where('nim','LIKE','%'.$request->cari.'%')->get();
        } else {
            $data_mahasiswa = \App\Models\Mahasiswa::all();
        }
        return view('mahasiswa.index', ['data_mahasiswa' => $data_mahasiswa]);
    }

    public function create(Request $request)
    {
        \App\Models\Mahasiswa::create($request->all());
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil diinput');
    }

    public function edit($id)
    {
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        return view('mahasiswa/edit',['mahasiswa'=>$mahasiswa]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mahasiswa -> update($request->all());
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil diupdate');
    }

    public function delete($id)
    {
        $mahasiswa = \App\Models\Mahasiswa::find($id);
        $mahasiswa -> delete($mahasiswa);
        return redirect('/mahasiswa')->with('Sukses', 'Data berhasil dihapus');
    }
}
