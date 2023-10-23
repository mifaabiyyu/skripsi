<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use App\Models\Anggota\DeskripsiAnggota;
use Illuminate\Http\Request;

class DeskripsiAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departemen = Departemen::all();
        return view('superadmin.backend.pengurus.departemen.deskripsi.create', compact('departemen'));
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
            'departemen' => 'required',
            'deskripsi' => 'required'
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $deskripsi_anggota = new DeskripsiAnggota;
        $deskripsi_anggota->departemen = $request->departemen;
        $deskripsi_anggota->deskripsi = $request->deskripsi;
        $deskripsi_anggota->photo = $nmfile;

        $upl->move(public_path() . '/img/pengurus/anggota', $nmfile);
        $deskripsi_anggota->save();

        return redirect()->route('anggota.index')->withSuccess('Deskripsi Berhasil Dibuat !');
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
        $departemen = Departemen::all();
        $deskanggota = DeskripsiAnggota::find($id);
        return view('superadmin.backend.pengurus.departemen.deskripsi.edit', compact('deskanggota', 'departemen'));
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
        $edit = DeskripsiAnggota::find($id);
        $oldphoto = $edit->photo;

        $request->validate([
            'departemen' => 'required',
            'deskripsi' => 'required',
        ]);

        $deskanggota = [
            'departemen' => $request['departemen'],
            'deskripsi' => $request['deskripsi'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/pengurus/anggota', $oldphoto);
        }
        $edit->update($deskanggota);

        session()->flash('success', 'Deskripsi has been edited !!');
        return redirect()->route('anggota.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DeskripsiAnggota::find($id)->delete();
        return back()->withSuccess('Deskripsi Berhasil Dihapus !');
    }
}
