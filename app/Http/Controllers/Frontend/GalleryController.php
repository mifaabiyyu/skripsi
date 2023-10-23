<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Anggota\Departemen;
use App\Models\Gallery\Category;
use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $dep = Departemen::all();
        $category = Category::all();
        $gallery = Gallery::all();
        return view('frontend.gallery.gallery', compact('category', 'gallery', 'dep'));
    }
}
