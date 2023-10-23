<?php

namespace App\Http\Controllers\Backend\Berita;

use App\Http\Controllers\Controller;
use App\Models\Berita\Berita;
use App\Models\Berita\CategoryBerita;
use Illuminate\Http\Request;

class CategoryBeritasController extends Controller
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

            'category' => 'required|unique:category,category',
        ]);

        $category = new CategoryBerita;
        $category->category = $request->category;

        $category->save();

        return redirect()->route('manage-berita.index')->withSuccess('Category Berhasil Dibuat !');
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
        $berita = Berita::all();
        $category = CategoryBerita::all();
        $categ = CategoryBerita::find($id);
        return view('superadmin.backend.berita.category-edit', compact('category', 'categ', 'berita'));
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
        $edit = CategoryBerita::find($id);
        $request->validate([

            'category' => 'required|unique:category,category',
        ]);

        $category = [
            'category'      => $request['category'],
        ];


        $edit->update($category);

        session()->flash('success', 'Category has been edited !!');
        return redirect()->route('manage-berita.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryBerita::find($id)->delete();
        return back()->withSuccess('Category Berhasil Dihapus !');
    }
}
