<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery\Category;
use App\Models\Gallery\Gallery;
use Illuminate\Http\Request;

class GallerysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        $category = Category::all();
        return view('superadmin.backend.managegallery.index', compact('category', 'gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        return view('superadmin.backend.managegallery.create', compact('category'));
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
            'category' => 'required',
            'photo' => 'required',
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $gallery = new Gallery;
        $gallery->name = $request->name;
        $gallery->category = $request->category;
        $gallery->photo = $nmfile;

        $upl->move(public_path() . '/img/gallery', $nmfile);
        $gallery->save();

        session()->flash('success', 'Pengurus has been created !!');
        return redirect()->route('gallery.index');
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
        $gallery = Gallery::find($id);
        $category = Category::all();
        return view('superadmin.backend.managegallery.edit', compact('gallery', 'category'));
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
        $edit = Gallery::find($id);
        $oldphoto = $edit->photo;

        $gallery = [
            'name'      => $request['name'],
            'category'  => $request['category'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/gallery', $oldphoto);
        }

        $edit->update($gallery);

        session()->flash('success', 'Pengurus has been edited !!');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Gallery::find($id);

        $file = public_path('img/gallery/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Gallery Berhasil Dihapus !');
    }


    //Category

    public function createcat()
    {
        return view('superadmin.backend.managegallery.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storecat(Request $request)
    {
        $request->validate([

            'category' => 'required|unique:category,category',
        ]);

        $category = new Category;
        $category->category = $request->category;

        $category->save();

        return redirect()->route('gallery.index')->withSuccess('Category Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showcat($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editcat($id)
    {
        $gallery = Gallery::all();
        $category = Category::all();
        $categ = Category::find($id);
        return view('superadmin.backend.managegallery.category.edit', compact('category', 'categ', 'gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatecat(Request $request, $id)
    {
        $edit = Category::find($id);
        $request->validate([

            'category' => 'required|unique:category,category',
        ]);

        $category = [
            'category'      => $request['category'],
        ];


        $edit->update($category);

        session()->flash('success', 'Category has been edited !!');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroycat($id)
    {
        Category::find($id)->delete();
        return back()->withSuccess('Category Berhasil Dihapus !');
    }
}
