<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use App\Models\Berita\Berita;
use App\Models\Berita\CategoryBerita;
use Illuminate\Http\Request;

class BeritaHimatifaController extends Controller
{
    public function index()
    {
        $dep = Departemen::all();
        $newss = Berita::orderBy('created_at', 'desc')->take(4)->get();
        $kategori = CategoryBerita::all();
        $beritahima = Berita::orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.berita.beritahimatifa', compact('beritahima', 'kategori', 'newss', 'dep'));
    }

    public function show($slug)
    {
        $dep = Departemen::all();
        $newss = Berita::orderBy('created_at', 'desc')->take(3)->get();
        $kategori = CategoryBerita::all();
        $showberita = Berita::where('slug', $slug)->first();
        return view('frontend.berita.detailberita', compact('showberita', 'kategori', 'newss', 'dep'));
    }

    public function showkategori($category)
    {
        $dep = Departemen::all();
        $newss = Berita::orderBy('created_at', 'desc')->take(4)->get();
        $kategori = CategoryBerita::all();
        $hasilkategori = CategoryBerita::where('category', $category)->get();
        $kategori_berita = Berita::where('category', $category)->orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.berita.berita-kategori', compact('kategori_berita', 'kategori', 'newss', 'dep', 'hasilkategori'));
    }
}
