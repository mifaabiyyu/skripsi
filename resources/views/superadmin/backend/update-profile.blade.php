@extends('superadmin.layouts.master')
@section('tittle')
Update Profile
@endsection  
@section('content')
    <div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(../assetss/img/theme/test.jpg); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-12 col-md-10">
            <h1 class="display-2 text-white">Hello {{ Auth::user()->name }}</h1>
            <p class="text-white mt-0 mb-5">Menu Edit Profile Himatifa</p>
            
            </div>
        </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
        
        <div class="col-xl-8 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Edit profile </h3>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('update-profile.update')}}" method="POST">
                    @csrf 
                    <h6 class="heading-small text-muted mb-4">User information</h6>
                    <div class="pl-lg-4">
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Username</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Username" value="{{ $user->name }}">
                            </div>
                        </div>
                        @error('name')
                            <div class="col-lg-6 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="name" name="email" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                        @error('email')
                            <div class="col-lg-6 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-first-name">New Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="New Password">
                            </div>
                        </div>
                        @error('password')
                            <div class="col-lg-6 alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-last-name">Confirm New Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-success">Edit profile</button>
                        </div>
                    </div>
                    
                    </form>
                    
                </div>
        </div>
        <!-- Footer -->
    </div>
@endsection