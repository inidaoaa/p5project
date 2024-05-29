<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;
use Validator;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //index
        $kelas = Kelas::latest()->get();
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create
        $guru=Guru::all();
        return view('kelas.create', compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // vallidate form
        $this->validate($request, [
            'kelas'=> 'required',
        ]);

        $kelas = new kelas();
        $kelas->kelas = $request->kelas;
        $kelas->id_guru = $request->id_guru;

        // upload img
        // $image = $request->file('image');
        // $image->storeAs('public/kelass', $image->hashName());
        // $kelas->image=$image->hashName();
        $kelas->save();
        return redirect()->route('kelas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $guru=Guru::all();
        $kelas=Kelas::findOrFail($id);
        return view('kelas.edit', compact('kelas', 'guru'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'kelas'=> 'required',
        ]);

        $kelas=Kelas::findOrFail($id);
        $kelas->kelas=$request->kelas;
        $kelas->id_guru=$request->id_guru;
        // upload kelas
        //     $image=$request->file('image');
        //     $image->storeAs('public/kelass', $image->hashName());

        // // delete kelas
        // Storage::delete('public/kelass/'. $kelas->image);

        // $kelas->image=$image->hashName();
        $kelas->save();
        return redirect()->route('kelas.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas=Kelas::findOrFail($id);
        // Storage::delete('public/kelass'. $kelas->image);
        $kelas->delete();
        return redirect()->route('kelas.index');
    }
}