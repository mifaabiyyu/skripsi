<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use App\Models\Anggota\DeskripsiAnggota;
use Illuminate\Http\Request;

class ProgramKerjasController extends Controller
{
    public function index($departemen)
    {
        $dep = Departemen::all();
        $showproker = DeskripsiAnggota::where('departemen', $departemen)->get();

        return view('frontend.program-kerja.prokerdepartemen', compact('showproker', 'dep'));
    }
}
