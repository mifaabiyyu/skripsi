<?php

namespace App\Http\Controllers\Backend\Berita;

use App\Http\Controllers\Controller;
use App\Models\Berita\Berita;
use App\Models\Berita\CategoryBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::all();
        $category = CategoryBerita::all();
        return view('superadmin.backend.berita.berita', compact('category', 'berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = CategoryBerita::all();
        return view('superadmin.backend.berita.create_berita', compact('category'));
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
            'title' => 'required|unique:berita,title',
            'category' => 'required',
            'photo' => 'required',
            'slug' => 'required|unique:berita,slug',
            'konten' => 'required',
        ]);

        $konten = $request->konten;

        $dom = new \DomDocument();

        $dom->loadHtml($konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {


            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list($type, $data) = explode(',', $data);

            $data = base64_decode($data);

            $image_name = '/berita' . time() . $k . '.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);
        }


        $konten = $dom->saveHTML();


        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $berita = new Berita;
        $berita->title = $request->title;
        $berita->category = $request->category;
        $berita->slug = $request->slug;
        $berita->konten = $konten;
        $berita->photo = $nmfile;

        $upl->move(public_path() . '/img/berita', $nmfile);
        $berita->save();

        session()->flash('success', 'Berita has been created !!');
        return redirect()->route('manage-berita.index');
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
    public function edit($slug)
    {
        $editber = Berita::where('slug', $slug)->first();
        $category = CategoryBerita::all();
        return view('superadmin.backend.berita.edit_berita', compact('editber', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $edit = Berita::where('slug', $slug)->first();
        $oldphoto = $edit->photo;

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'slug' => 'required',
            'konten' => 'required',
        ]);

        $konten = $request->konten;

        $dom = new \DomDocument();

        @$dom->loadHtml($konten, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);

        $images = $dom->getElementsByTagName('img');

        foreach ($images as $k => $img) {


            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);

            list($type, $data) = explode(',', $data);

            $data = base64_decode($data);

            $image_name = '/berita' . time() . $k . '.png';

            $path = public_path() . $image_name;

            file_put_contents($path, $data);

            $img->removeAttribute('src');

            $img->setAttribute('src', $image_name);
        }


        $konten = $dom->saveHTML();

        $berita = [
            'title'      => $request['title'],
            'category'  => $request['category'],
            'slug'    => $request['slug'],
            'konten' => $konten,
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/berita', $oldphoto);
        }

        $edit->update($berita);

        session()->flash('success', 'Berita has been edited !!');
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
        $hapus = Berita::find($id);

        $file = public_path('img/berita/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Berita Berhasil Dihapus !');
    }

    public function slug(Request $request)
    {
        $slug = Str::slug($request->title);
        return response()->json(['slug' => $slug]);
    }
}
