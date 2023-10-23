<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\BPH\Deskripsi_BPH;
use App\Models\BPH\Kahima;
use App\Models\BPH\SekretarisBendahara;
use Illuminate\Http\Request;

class DeskripsiBPHController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kahima = Kahima::all();
        $deskripsi_bph = Deskripsi_BPH::all();
        $sekretarisbendahara = SekretarisBendahara::all();
        return view('superadmin.backend.pengurus.index', compact('kahima', 'deskripsi_bph', 'sekretarisbendahara'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.backend.pengurus.bph.deskripsi.create');
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
            'judul' => 'required',
            'deskripsi' => 'required'
        ]);

        $deskripsi_bph = new Deskripsi_BPH;
        $deskripsi_bph->judul = $request->judul;
        $deskripsi_bph->deskripsi = $request->deskripsi;

        $deskripsi_bph->save();

        return redirect()->route('deskbph.index')->withSuccess('Deskripsi Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deskbph = Deskripsi_BPH::find($id);
        return view('superadmin.backend.pengurus.bph.deskripsi.edit', compact('deskbph'));
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
        $edit = Deskripsi_BPH::find($id);

        $deskbph = [
            'judul'      => $request['judul'],
            'deskripsi' => $request['deskripsi'],
        ];


        $edit->update($deskbph);

        session()->flash('success', 'Deskripsi has been edited !!');
        return redirect()->route('deskbph.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Deskripsi_BPH::find($id)->delete();
        return back()->withSuccess('Deskripsi Berhasil Dihapus !');
    }
}
