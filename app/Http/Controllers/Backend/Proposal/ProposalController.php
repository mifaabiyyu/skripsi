<?php

namespace App\Http\Controllers\Backend\Proposal;

use App\Http\Controllers\Controller;
use App\Models\Proposal\ProposalKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProposalController extends Controller
{
    public $user;


    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexhima()
    {
        if (is_null($this->user) || !$this->user->can('proposal.edithima')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $proposal = ProposalKegiatan::all();
        return view('superadmin.backend.proposal.indexhima', compact('proposal'));
    }

    public function indexprodi()
    {
        if (is_null($this->user) || !$this->user->can('proposal.editprodi')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $proposal = ProposalKegiatan::where('status', '1')->orwhere('status', '2')->orwhere('status', '10')->get();
        return view('superadmin.backend.proposal.indexprodi', compact('proposal'));
    }

    public function indexfakultas()
    {
        if (is_null($this->user) || !$this->user->can('proposal.editfakultas')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $proposal = ProposalKegiatan::where('status', '2')->orwhere('status', '3')->orwhere('status', '11')->get();
        return view('superadmin.backend.proposal.indexfakultas', compact('proposal'));
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
        if (is_null($this->user) || !$this->user->can('proposal.edithima')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'file' => 'required',
            'keterangan' => 'nullable'
        ]);

        $upl = $request->file;
        $nmfile = $upl->getClientOriginalName() . "." . $upl->getClientOriginalExtension();

        $proposal = new ProposalKegiatan;
        $proposal->name = $request->name;
        $proposal->description = $request->description;
        $proposal->status = "1";
        $proposal->keterangan = "-";
        $proposal->file = $nmfile;

        $upl->move(public_path() . '/proposal', $nmfile);
        $proposal->save();

        session()->flash('success', 'Proposal Berhasil diajukan !!');
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
        if (is_null($this->user) || !$this->user->can('proposal.edithima')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $proposal = ProposalKegiatan::find($id);
        return view('superadmin.backend.proposal.detail-proposal', compact('proposal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editprodi($id)
    {
        if (is_null($this->user) || !$this->user->can('proposal.editprodi')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $propprodi = ProposalKegiatan::find($id);
        return view('superadmin.backend.proposal.editprodi', compact('propprodi'));
    }

    public function editfakultas($id)
    {
        if (is_null($this->user) || !$this->user->can('proposal.editfakultas')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $propfakultas = ProposalKegiatan::find($id);
        return view('superadmin.backend.proposal.editfakultas', compact('propfakultas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateprodi(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('proposal.editprodi')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $request->validate([
            'keterangan' => 'nullable'
        ]);
        $editprodi = ProposalKegiatan::find($id);
        $oldfile = $editprodi->file;


        $editprodi->status = $request->status;
        $editprodi->file = $oldfile;
        if ($request->keterangan) {
            $editprodi->keterangan = $request->keterangan;
        }

        if ($request->hasfile('file')) {
            $request->file->move(public_path() . '/proposal', $oldfile);
        }

        $editprodi->save();

        session()->flash('success', 'Proposal has been edited !!');
        return redirect()->route('proposal.indexprodi');
    }

    public function updatefakultas(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('proposal.editfakultas')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $request->validate([
            'keterangan' => 'nullable'
        ]);
        $editfakultas = ProposalKegiatan::find($id);
        $oldfile = $editfakultas->file;

        $editfakultas->status = $request->status;
        $editfakultas->file = $oldfile;
        if ($request->keterangan) {
            $editfakultas->keterangan = $request->keterangan;
        }

        if ($request->hasfile('file')) {
            $request->file->move(public_path() . '/proposal', $oldfile);
        }

        $editfakultas->save();

        session()->flash('success', 'Proposal has been edited !!');
        return redirect()->route('proposal.indexfakultas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = ProposalKegiatan::find($id);

        $file = public_path('proposal/') . $hapus->file;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();
        return back()->withSuccess('Proposal Berhasil Dihapus !');
    }

    public function downloadprop($file)
    {
        $files = public_path() . '/proposal/' . $file;
        return response()->download($files);
    }
}
