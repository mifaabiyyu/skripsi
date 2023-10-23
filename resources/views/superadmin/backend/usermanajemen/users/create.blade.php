@extends('superadmin.layouts.master')
@section('tittle', 'Create Users')  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Users Manajement</h6>
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
            <!-- Card header -->
            <div class="card-header">
              <h3 class="mb-0 text-center">Add New Users</h3>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form action="{{ route('users.store')}}" method="POST">
                    @csrf
                    <div class="form-group">
                    <label class="form-control-label" for="name">Username</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Username" name="name" value="{{ old('name') }}">
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
                    <div class="form-group">
                        <label class="form-control-label" for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter E-mail" name="email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                            <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label class="form-control-label" for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password">
                    </div>
                    @error('password')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                            <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label" for="exampleFormControlSelect1">Role Select</label>
                        <select name="roles[]" id="roles" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            
                <a type="button" class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
                <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
            
            </form>
          </div>
      </div>
    </div>
</div>
@endsection
           
         