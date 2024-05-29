<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Storage;

class SiswaController extends Controller
{

    public function index()
    {
        $siswa = Siswa::latest()->get();
        return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        return view('siswa.create', compact('kelas','jurusan'));
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tmpt_lahir' => 'required',
            'tgal_lahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $siswa = new siswa();
        $siswa->nama_siswa = $request->nama_siswa;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->agama = $request->agama;
        $siswa->tmpt_lahir = $request->tmpt_lahir;
        $siswa->tgal_lahir = $request->tgal_lahir;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->id_jurusan = $request->id_jurusan;
        // upload foto
        $foto = $request->file('foto');
        $foto->storeAs('public/siswas', $foto->hashName());
        $siswa->foto = $foto->hashName();
        $siswa->save();
        return redirect()->route('siswa.index');
    }

    public function show($id)
    {
        $siswa =Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }

    public function edit($id)
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $siswa = Siswa::findOrFail($id);
        return view('siswa.edit', compact('siswa', 'kelas', 'jurusan'));
    }

    public function update(Request $request, $id)
    { $this->validate($request, [
        'nama_siswa' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'tmpt_lahir' => 'required',
        'tgal_lahir' => 'required',
        'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
    ]);

    $siswa = new siswa();
    $siswa->nama_siswa = $request->nama_siswa;
    $siswa->jenis_kelamin = $request->jenis_kelamin;
    $siswa->agama = $request->agama;
    $siswa->tmpt_lahir = $request->tmpt_lahir;
    $siswa->tgal_lahir = $request->tgal_lahir;
    $siswa->id_kelas = $request->id_kelas;
    $siswa->id_jurusan = $request->id_jurusan;
    // upload foto
    $foto = $request->file('foto');
    $foto->storeAs('public/siswas', $foto->hashName());
    $siswa->foto = $foto->hashName();
    $siswa->save();
    return redirect()->route('siswa.index');

    }

    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id);
        Storage::delete('public/siswas/' . $siswa->foto);
        $siswa->delete();
        return redirect()->route('siswa.index');

    }
}