<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Anggota;
use App\Models\Anggota\Departemen;
use App\Models\Anggota\DeskripsiAnggota;
use App\Models\BPH\Deskripsi_BPH;
use App\Models\BPH\Kahima;
use App\Models\BPH\SekretarisBendahara;
use App\Models\BPH\Visimisi;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep = Departemen::all();
        // Visimisi
        $visimisi = Visimisi::all();

        // BPH
        $kahima = Kahima::all();
        $deskripsi_bph = Deskripsi_BPH::all();
        $sekben = SekretarisBendahara::all();

        // ADVOKESMA
        $kadepadvo = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Advokesma')->get();
        $anggotaadvo = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Advokesma')->get();
        $deskadvo = DeskripsiAnggota::where('departemen', 'Departemen Advokesma')->get();

        //KADER 
        $kadepkader = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Kaderisasi')->get();
        $anggotakader = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Kaderisasi')->get();
        $deskkader = DeskripsiAnggota::where('departemen', 'Departemen Kaderisasi')->get();

        // Luar Negeri
        $kadeplugri = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Luar Negeri')->get();
        $anggotalugri = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Luar Negeri')->get();
        $desklugri = DeskripsiAnggota::where('departemen', 'Departemen Luar Negeri')->get();

        // Pendidikan
        $kadeppendidikan = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Pendidikan')->get();
        $anggotapendidikan = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Pendidikan')->get();
        $deskpendidikan = DeskripsiAnggota::where('departemen', 'Departemen Pendidikan')->get();

        // Kominfo
        $kadepkominfo = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Kominfo')->get();
        $anggotakominfo = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Kominfo')->get();
        $deskkominfo = DeskripsiAnggota::where('departemen', 'Departemen Kominfo')->get();

        // Dana Usaha
        $kadepdanus = Anggota::where('jabatan', 'Kepala Departemen')->where('departemen', 'Departemen Dana Usaha')->get();
        $anggotadanus = Anggota::where('jabatan', 'Anggota')->where('departemen', 'Departemen Dana Usaha')->get();
        $deskdanus = DeskripsiAnggota::where('departemen', 'Departemen Dana Usaha')->get();

        return view('frontend.tentanghimatifa.pengurus', compact('visimisi', 'kahima', 'deskripsi_bph', 'sekben', 'kadepadvo', 'anggotaadvo', 'deskadvo', 'kadepkader', 'anggotakader', 'deskkader', 'kadeplugri', 'anggotalugri', 'desklugri', 'kadeppendidikan', 'anggotapendidikan', 'deskpendidikan', 'kadepkominfo', 'anggotakominfo', 'deskkominfo', 'kadepdanus', 'anggotadanus', 'deskdanus', 'dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
