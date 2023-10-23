@extends('superadmin.layouts.master')
@section('tittle', 'Users Manajement')  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">User Manajemen</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">User Manajemen</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-6">
                    <h3 class="mb-0">Users Table</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip" data-original-title="Add Users">
                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                        <span class="btn-inner--text">Add New Users</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="roletable" class="table text-center align-items-center table-flush">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="table-user">
                                <b>{{ $loop->iteration }}</b>
                            </td>
                            <td class="table-user">
                                <b>{{ $user->name }}</b>
                            </td>
                            <td class="table-user">
                                <b>{{ $user->email }}</b>
                            </td>
                            <td class="table-user">
                                @foreach ($user->roles as $role)
                                    <span class="badge badge-info mr-1">
                                        {{ $role->name }}
                                    </span>
                                @endforeach
                            </td>
                            <td class="table-actions">
                                <a href="{{ route('users.edit', $user->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Roles">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#!" onclick="deleteRow( {{$user->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Roles">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('users.destroy', $user->id)}}" id="data-{{ $user->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
   

</script>
<!-- /.modal-dialog -->
@include('superadmin.backend.usermanajemen.users.script')
@endsection