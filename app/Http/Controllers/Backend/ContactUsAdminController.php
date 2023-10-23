<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\contactus\Kritiksaran;
use App\Models\contactus\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ContactUsAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Pendaftaran::all();

        return view('superadmin.backend.contactus.index', compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kritiksaran = Kritiksaran::all();
        return view('superadmin.backend.contactus.kritiksaran', compact('kritiksaran'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statusid = $request->id;
        Pendaftaran::updateOrCreate(
            ['id' => $statusid],
            [
                'status' => $request->status
            ]
        );


        session()->flash('success', 'Status has been edited !!');
        return back();
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

    // public function update()
    // {
    //     $commentid = input::get('pk');
    //     $newcomment = input::get('commenter_comment');
    //     $commentdata = comment::whereid($commentid)->first();
    //     $commentdata->comment = $newcomment;
    //     if ($commentdata->save())         return response::json(array('status' => 1));
    //     else         return response::json(array('status' => 0));
    // }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $where = array('id' => $id);
        $pendaftaran = Pendaftaran::where($where)->first();
        return Response::json($pendaftaran);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Pendaftaran::find($id);

        $file = public_path('img/pengurus/calon_pengurus/') . $hapus->photo;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Pendaftaran Berhasil Dihapus !');
    }
}
