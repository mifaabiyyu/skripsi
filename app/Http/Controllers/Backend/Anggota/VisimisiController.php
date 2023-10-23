<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\BPH\Visimisi;
use Illuminate\Http\Request;

class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = Visimisi::all();
        return view('superadmin.backend.pengurus.bph.visimisi.index', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superadmin.backend.pengurus.bph.visimisi.create');
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
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $visimisi = new Visimisi;
        $visimisi->visi = $request->visi;
        $visimisi->misi = $request->misi;

        $visimisi->save();

        return redirect()->route('visimisi.index')->withSuccess('Deskripsi Berhasil Dibuat !');
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
        $visimisi = Visimisi::find($id);
        return view('superadmin.backend.pengurus.bph.visimisi.edit', compact('visimisi'));
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
        $edit = Visimisi::find($id);

        $request->validate([
            'visi' => 'required',
            'misi' => 'required',
        ]);

        $deskanggota = [
            'visi'      => $request['visi'],
            'misi'      => $request['misi'],
        ];


        $edit->update($deskanggota);

        session()->flash('success', 'Visi Misi has been edited !!');
        return redirect()->route('visimisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Visimisi::find($id)->delete();
        return back()->withSuccess('Visi & Misi Berhasil Dihapus !');
    }
}
