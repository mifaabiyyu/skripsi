<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Proposal\ProposalKegiatan;
use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\User as AuthUser;

class DashboardController extends Controller
{
    public function index()
    {
        $total_admins = count(User::select('id')->get());
        $total_roles = count(Role::select('id')->get());
        $proposal = ProposalKegiatan::select('id')->count();
        $proposalprodi = count(ProposalKegiatan::where('status', '2')->get());
        $proposalwaitprodi = count(ProposalKegiatan::where('status', '1')->get());
        $proposalwaitfakultas = count(ProposalKegiatan::where('status', '2')->get());
        $proposalfakultas = count(ProposalKegiatan::where('status', '3')->get());
        $proposalditolakprodi = count(ProposalKegiatan::where('status', '10')->get());
        $proposalditolakfakultas = count(ProposalKegiatan::where('status', '11')->get());
        return view('superadmin.backend.dashboard', compact('proposalwaitprodi', 'proposalwaitfakultas', 'total_admins', 'total_roles', 'proposal', 'proposalprodi', 'proposalfakultas', 'proposalditolakprodi', 'proposalditolakfakultas'));
    }
}
