<?php

namespace App\Http\Controllers\Backend;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;



class RolesController extends Controller
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
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $roles = Role::all();
        $permissions = Permission::all();
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('superadmin.backend.usermanajemen.roles.index', compact('roles', 'permissions', 'all_permissions', 'permission_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('superadmin.backend.usermanajemen.roles.create', compact('all_permissions', 'permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.requried' => 'Nama roles wajib diisi'
        ]);

        $role = Role::create(
            [
                'name' => $request->name,
            ]
        );

        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        return redirect()->route('roles.index')->withSuccess('Role Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $where = array('id' => $id);
        $role  = Role::where($where)->first();
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('superadmin.backend.usermanajemen.roles.show', compact('role', 'all_permissions', 'permission_groups'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $role = Role::findById($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('superadmin.backend.usermanajemen.roles.edit', compact('role', 'all_permissions', 'permission_groups'));
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
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Nama roles wajib diisi'
        ]);

        $role = Role::findById($id);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated !!');
        return redirect()->route('roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Maaf !! Anda tidak diizinkan mengakses halaman ini !!');
        }
        Role::find($id)->delete();
        return back()->withSuccess('Role Berhasil Dihapus !');
    }
}
