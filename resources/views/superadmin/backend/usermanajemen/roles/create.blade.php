@extends('superadmin.layouts.master')
@section('tittle', 'Create Roles')  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Notifications</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Components</a></li>
                <li class="breadcrumb-item active" aria-current="page">Notifications</li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="#" class="btn btn-sm btn-neutral">New</a>
            <a href="#" class="btn btn-sm btn-neutral">Filters</a>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class="col-lg-8 card-wrapper">
            <div class="card">
                <div class="card-header">
                <h3 class="mb-0">Create New Roles</h3>
                </div>
                <div class="card-body">
                    <form id="form-create-edit" name="form-create-edit" action="{{ route('roles.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="input-group mb-3">
                                <button type="button" class="btn btn-info"><i class="ni ni-single-02 text-white"></i></button>
                                <input type="text" class="form-control" placeholder="Enter Roles Name Here" aria-label="name" id="name" name="name" value="{{ old('name') }}">
                            </div>
                                @error('name')
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                        <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @enderror
                            <div class="input-group mb-3">
                                <label for="permission" class="control-label col-form-label">Permission</label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="custom-control custom-checkbox custom-checkbox-success">
                                    <input type="checkbox" class="custom-control-input" id="checkPermissionAll" value="1">
                                    <label class="custom-control-label" for="checkPermissionAll">All</label>
                                </div>
                            </div>
                            <hr>
                            @php $i = 1; @endphp
                            @foreach ($permission_groups as $group)
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                            <label class="form-check-label" for="permission">{{ $group->name }}</label>
                                        </div>
                                    </div>
                                    <div class="col-9 role-{{ $i }}-management-checkbox">
                                        @php
                                            $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                            $j = 1;
                                        @endphp
                                        @foreach ($permissions as $permission)
                                            <div class="custom-control custom-checkbox custom-checkbox-danger">
                                                <input type="checkbox" class="custom-control-input" name="permissions[]" id="permission{{ $permission ->id }}" value="{{ $permission ->name }}">
                                                <label class="custom-control-label" for="permission{{ $permission ->id }}">{{ $permission ->name }}</label>
                                            </div>
                                            @php  $j++; @endphp
                                        @endforeach
                                    </div>
                                    
                                </div>
                                @php  $i++; @endphp
                            @endforeach
                            
                        </div>
                        <div class="modal-footer">
                            <a type="button" class="btn btn-secondary" href="{{ route('roles.index') }}">Back</a>
                            <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
    </div>
</div>
@include('superadmin.backend.usermanajemen.roles.script')
  @endsection