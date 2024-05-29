<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Guru;
use Illuminate\Http\Request;

class MapelController extends Controller
{

    public function index()
    {
        //
        $mapel = mapel::latest()->get();
        return view('mapel.index', compact('mapel'));
    }


    public function create()
    {
        //
        $guru = Guru::all();
        return view('mapel.create', compact('guru'));
    }


    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama_mapel' => 'required',
            'kode_mapel' => 'required',
        ]);

        $mapel = new Mapel();
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->id_guru = $request->id_guru;
        $mapel->save();
        return redirect()->route('mapel.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
        $guru = Guru::all();
        $mapel = Mapel::findOrFail($id);
        return view('mapel.edit', compact('mapel','guru'));
    }


    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'nama_mapel' => 'required',
            'kode_mapel' => 'required',
        ]);

        $mapel = Mapel::findOrFail($id);
        $mapel->nama_mapel = $request->nama_mapel;
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->id_guru = $request->id_guru;
        $mapel->save();
        return redirect()->route('mapel.index');
    }


    public function destroy($id)
    {
        //
        $mapel = Mapel::findOrFail($id);
        $mapel->delete();
        return redirect()->route('mapel.index');
    }
}
