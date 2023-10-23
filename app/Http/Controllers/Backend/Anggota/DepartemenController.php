<?php

namespace App\Http\Controllers\Backend\Anggota;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
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
        return view('superadmin.backend.pengurus.departemen.departemen.create');
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

            'name' => 'required|unique:departemen,name',
            'jabatan' => 'required',
        ]);

        $departemen = new Departemen;
        $departemen->departemen = $request->departemen;
        $departemen->slug = $request->slug;

        $departemen->save();

        return redirect()->route('anggota.index')->withSuccess('Departemen Berhasil Dibuat !');
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
        $departemen = Departemen::find($id);
        return view('superadmin.backend.pengurus.departemen.departemen.edit', compact('departemen'));
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
        $edit = Departemen::find($id);
        $request->validate([

            'departemen' => 'required',
            'slug' => 'required',
        ]);

        $departemen = [
            'departemen'      => $request['departemen'],
            'slug'      => $request['slug'],
        ];


        $edit->update($departemen);

        session()->flash('success', 'Departemen has been edited !!');
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
        Departemen::find($id)->delete();
        return back()->withSuccess('Departemen Berhasil Dihapus !');
    }
}
