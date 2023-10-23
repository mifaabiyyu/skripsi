<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Anggota;
use App\Models\Anggota\Departemen;
use App\Models\Anggota\DeskripsiAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        $departemen = Departemen::all();
        $deskripsi_anggota = DeskripsiAnggota::all();
        return view('superadmin.backend.pengurus.departemen.anggota.index', compact('anggota', 'departemen', 'deskripsi_anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departemen = Departemen::all();
        return view('superadmin.backend.pengurus.departemen.anggota.create', compact('departemen'));
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
            'departemen' => 'required',
            'jabatan' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required',
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $anggota = new Anggota;
        $anggota->name = $request->name;
        $anggota->jabatan = $request->jabatan;
        $anggota->deskripsi = $request->deskripsi;
        $anggota->photo = $nmfile;

        $upl->move(public_path() . '/img/pengurus/anggota', $nmfile);
        $anggota->save();

        session()->flash('success', 'Pengurus has been created !!');
        return redirect()->route('anggota.index');
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
        $anggota = Anggota::find($id);
        $departemen = Departemen::all();
        return view('superadmin.backend.pengurus.departemen.anggota.edit', compact('anggota', 'departemen'));
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
        $edit = Anggota::find($id);
        $oldphoto = $edit->photo;

        $anggota = [
            'name'      => $request['name'],
            'departemen'  => $request['departemen'],
            'jabatan'    => $request['jabatan'],
            'deskripsi' => $request['deskripsi'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/pengurus/anggota', $oldphoto);
        }

        $edit->update($anggota);

        session()->flash('success', 'Pengurus has been edited !!');
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
        $hapus = Anggota::find($id);

        $file = public_path('img/pengurus/anggota/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Pengurus Berhasil Dihapus !');
    }
}
