<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{

    public function index()
    {
        //index
        $jurusan = Jurusan::latest()->get();
        return view('jurusan.index', compact('jurusan'));
    }


    public function create()
    {
        //create
        return view('jurusan.create');
    }


    public function store(Request $request)
    {
        //store
        $this->validate($request, [
            'nama_jurusan' => 'required',
        ]);

        $jurusan = new Jurusan();
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect()->route('jurusan.index');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //edit
        $jurusan = jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }


    public function update(Request $request, $id)
    {
        //update
        $this->validate($request, [
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->nama_jurusan = $request->nama_jurusan;
        $jurusan->save();
        return redirect()->route('jurusan.index');
    }


    public function destroy($id)
    {
        //
        $jurusan = jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index');
    }
}
