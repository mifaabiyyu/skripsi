<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SlidersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('superadmin.backend.managelanding.sliderbackground.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $sliders = Slider::all();
        return view('superadmin.backend.managelanding.sliderbackground.create');
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
            'head' => 'required',
            'tittle' => 'required',
            'deskripsi' => 'required',
            'photo' => 'required',
        ]);

        $upl = $request->photo;
        $nmfile = time() . rand(100, 999) . "." . $upl->getClientOriginalExtension();

        $slide = new Slider;
        $slide->head = $request->head;
        $slide->tittle = $request->tittle;
        $slide->deskripsi = $request->deskripsi;
        $slide->photo = $nmfile;

        $upl->move(public_path() . '/img/slider', $nmfile);
        $slide->save();

        session()->flash('success', 'Slider has been created !!');
        return redirect()->route('sliders.index');
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
        $slider = Slider::find($id);
        return view('superadmin.backend.managelanding.sliderbackground.edit', compact('slider'));
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
        $edit = Slider::find($id);
        $oldphoto = $edit->photo;

        $slide = [
            'head'      => $request['head'],
            'tittle'    => $request['tittle'],
            'deskripsi' => $request['deskripsi'],
            'photo'     => $oldphoto,
        ];

        if ($request->hasfile('photo')) {
            $request->photo->move(public_path() . '/img/slider', $oldphoto);
        }

        $edit->update($slide);

        session()->flash('success', 'Slider has been edited !!');
        return redirect()->route('sliders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Slider::find($id);

        $file = public_path('img/slider/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Slider Berhasil Dihapus !');
    }
}
