<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Storage;
use Validator;

class GuruController extends Controller
{

    public function index()
    {
        //index
        $guru = Guru::latest()->get();
        return view('guru.index', compact('guru'));
    }


    public function create()
    {
        //create
        return view ('guru.create');
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nip' => 'required|min:5',
            'nama_guru' => 'required|min:5',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tmpt_lahir' => 'required',
            'tgal_lahir' => 'required',
            'foto' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $guru = new Guru();
        $guru->nip = $request->nip;
        $guru->nama_guru = $request->nama_guru;
        $guru->jenis_kelamin = $request->jenis_kelamin;
        $guru->agama = $request->agama;
        $guru->tmpt_lahir = $request->tmpt_lahir;
        $guru->tgal_lahir = $request->tgal_lahir;
        // image
        $foto = $request->file('foto');
        $foto->storeAs('public/gurus', $foto->hashName());
        $guru->foto = $foto->hashName();
        $guru->save();
        return redirect()->route('guru.index');
    }

    public function show($id)
    {
        //show
        $guru = Guru::findOrFail($id);
        return view('guru.show', compact('guru'));
    }

    public function edit($id)
    {
        //edit
        $guru = guru::findOrFail($id);
        return view('guru.edit', compact('guru'));
    }

    public function update(Request $request, $id)
{
    // Validate form
    $request->validate([
        'nip' => 'required',
        'nama_guru' => 'required',
        'jenis_kelamin' => 'required',
        'agama' => 'required',
        'tmpt_lahir' => 'required',
        'tgal_lahir' => 'required',
        'foto' => 'image|file|max:1024'
    ]);

    $guru = Guru::find($id);
    $guru->nip = $request->nip;
    $guru->nama_guru = $request->nama_guru;
    $guru->jenis_kelamin = $request->jenis_kelamin;
    $guru->agama = $request->agama;
    $guru->tmpt_lahir = $request->tmpt_lahir;
    $guru->tgal_lahir = $request->tgal_lahir;

    if($request->file('foto')) {
        if ($guru->foto && Storage::exists('public/gurus/' . $guru->foto)) {
            Storage::delete('public/gurus/' . $guru->foto);
        }
        $guru->foto = $request->file('foto')->store('gurus', 'public');
    }

    $guru->save();

    return redirect()->route('guru.index');
}


    public function destroy($id)
    {
        //delete
        $guru = Guru::findOrFail($id);
        Storage::delete('public/gurus/' . $guru->foto);
        $guru->delete();
        return redirect()->route('guru.index');

    }
}