@extends('superadmin.layouts.master')
@section('tittle', 'Edit Gallery')  
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
                <h3 class="mb-0 text-center">Edit Gallery</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <form action="{{ route('gallery.update', $gallery->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                      <label class="form-control-label" for="name">Name</label>
                          <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="{{ $gallery->name }}">
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
                        <label class="form-control-label" for="category">Category</label>
                        <select name="category" id="category" class="form-control" data-toggle="select">
                          <option value="">- Pilih Category -</option>
                          @foreach ($category as $cat)
                              <option value="{{ $cat->category }}" {{ old('category', $gallery->category) == $cat->category ? 'selected' : null }}>{{ $cat->category }}</option>
                          @endforeach
                        </select>
                      </div>
                      @error('category')
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
                      <div class="form-group text-center">
                        <img src="{{ asset('img/gallery/'.$gallery->photo )}}" height="10%" width="30%" alt="" srcset="">
                      </div>
              </div>
              
                  <a type="button" class="btn btn-secondary" href="{{ route('gallery.index') }}">Back</a>
                  <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
              
              </form>
            </div>
        </div>
      </div>
</div>


@endsection