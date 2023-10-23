@extends('superadmin.layouts.master')
@section('tittle', 'Create Kahima & Wakahima')  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active"><a href="#">Roles</a></li>
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
                <h3 class="mb-0 text-center">Add Kahima & Wakahima</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <form action="{{ route('bph.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label class="form-control-label" for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ old('name') }}">
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
                          <label class="form-control-label" for="jabatan">Jabatan</label>
                          <input type="teks" class="form-control" id="jabatan" placeholder="Enter Jabatan" name="jabatan" value="{{ old('jabatan') }}">
                      </div>
                      @error('jabatan')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      @enderror
                      <div class="form-group">
                          <label class="form-control-label" for="deskripsi">Deskripsi</label>
                          <textarea class="form-control" id="deskripsi" placeholder="Enter Deskripsi" name="deskripsi" value="{{ old('deskripsi') }}" rows="3"></textarea>
                      </div>
                      @error('deskripsi')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      @enderror
                      <div class="form-group">
                        <label class="form-control-label" for="photo">Picture</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                      </div>
                      @error('photo')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      @enderror
              </div>
              
                  <a type="button" class="btn btn-secondary" href="{{ route('bph.index') }}">Back</a>
                  <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
              
              </form>
            </div>
        </div>
      </div>
</div>


@endsection