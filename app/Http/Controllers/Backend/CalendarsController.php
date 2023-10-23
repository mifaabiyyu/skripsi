<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Calendar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CalendarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventhima = Calendar::all();
        $event = Calendar::all();
        return view('superadmin.backend.calendar.index', compact('event', 'eventhima'));
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
            'tittle' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'textcolour' => 'required',
            'colour' => 'required',
            'description' => 'required',
        ]);

        $calendar = new Calendar;
        $calendar->tittle = $request->tittle;
        $calendar->datestart = $request->datestart;
        $calendar->dateend = $request->dateend;
        $calendar->colour = $request->colour;
        $calendar->textcolour = $request->textcolour;
        $calendar->description = $request->description;

        $calendar->save();
        session()->flash('success', 'Event has been created !!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calendaredit = Calendar::find($id);
        return view('superadmin.backend.calendar.edit', compact('calendaredit'));
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
        $edit = Calendar::find($id);

        $request->validate([
            'tittle' => 'required',
            'datestart' => 'required',
            'dateend' => 'required',
            'colour' => 'required',
            'textcolour' => 'required',
            'description' => 'required',
        ]);

        $calendar = [
            'tittle'      => $request['tittle'],
            'datestart'      => $request['datestart'],
            'dateend'      => $request['dateend'],
            'colour'      => $request['colour'],
            'textcolour'      => $request['textcolour'],
            'description'      => $request['description'],
        ];


        $edit->update($calendar);

        session()->flash('success', 'Event has been edited !!');
        return redirect()->route('manage-calendar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Calendar::find($id)->delete();
        return back()->withSuccess('Event Berhasil Dihapus !');
    }
}
