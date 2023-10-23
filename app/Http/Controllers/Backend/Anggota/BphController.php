<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\BPH\Deskripsi_BPH;
use App\Models\BPH\Kahima;
use App\Models\BPH\SekretarisBendahara;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BphController extends Controller
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
        return view('superadmin.backend.pengurus.bph.kahimawaka.create');
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
            'name' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required',
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $kahima = new Kahima;
        $kahima->name = $request->name;
        $kahima->jabatan = $request->jabatan;
        $kahima->deskripsi = $request->deskripsi;
        $kahima->photo = $nmfile;

        $upl->move(public_path() . '/img/pengurus/kahimawakahima', $nmfile);
        $kahima->save();

        session()->flash('success', 'Pengurus has been created !!');
        return redirect()->route('bph.index');
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
        $kahim = Kahima::find($id);
        return view('superadmin.backend.pengurus.bph.kahimawaka.edit', compact('kahim'));
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
        $edit = Kahima::find($id);
        $oldphoto = $edit->photo;

        $kahima = [
            'name'      => $request['name'],
            'jabatan'    => $request['jabatan'],
            'deskripsi' => $request['deskripsi'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/pengurus/kahimawakahima', $oldphoto);
        }

        $edit->update($kahima);

        session()->flash('success', 'Pengurus has been edited !!');
        return redirect()->route('bph.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Kahima::find($id);

        $file = public_path('img/pengurus/kahimawakahima/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Pengurus Berhasil Dihapus !');
    }

    // SEKRETARIS BENDAHARA

    public function createsb()
    {
        return view('superadmin.backend.pengurus.bph.sekretaris_bendahara.create');
    }

    public function storesb(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required',
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $sekben = new SekretarisBendahara;
        $sekben->name = $request->name;
        $sekben->jabatan = $request->jabatan;
        $sekben->deskripsi = $request->deskripsi;
        $sekben->photo = $nmfile;

        $upl->move(public_path() . '/img/pengurus/kahimawakahima', $nmfile);
        $sekben->save();

        session()->flash('success', 'Pengurus has been created !!');
        return redirect()->route('bph.index');
    }

    public function editsb($id)
    {
        $sekben = SekretarisBendahara::find($id);
        return view('superadmin.backend.pengurus.bph.sekretaris_bendahara.edit', compact('sekben'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatesb(Request $request, $id)
    {
        $edit = SekretarisBendahara::find($id);
        $oldphoto = $edit->photo;

        $sekben = [
            'name'      => $request['name'],
            'jabatan'    => $request['jabatan'],
            'deskripsi' => $request['deskripsi'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/pengurus/kahimawakahima', $oldphoto);
        }

        $edit->update($sekben);

        session()->flash('success', 'Pengurus has been edited !!');
        return redirect()->route('bph.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroysb($id)
    {
        $hapus = SekretarisBendahara::find($id);

        $file = public_path('img/pengurus/kahimawakahima/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Pengurus Berhasil Dihapus !');
    }
}
