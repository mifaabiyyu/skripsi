@extends('superadmin.layouts.master')
@section('tittle', 'Edit Event HIMATIFA')  

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection

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
                <h3 class="mb-0 text-center">Edit Event {{ $calendaredit->tittle }}</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <form action="{{ route('manage-calendar.update', $calendaredit->id )}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                      @csrf
                      <div class="form-group row">
                        <label class="col-md-3 col-form-label form-control-label">Event title</label>
                        <div class="col-md-9">
                            <input type="text" id="tittle" name="tittle" class="form-control form-control-alternative new-event--title" placeholder="Event Title" value="{{ $calendaredit->tittle }}">
                        </div>
                      </div>
                      @error('tittle')
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                  <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                        @enderror
                      <div class="form-group row">
                        <label for="example-date-input" class="col-md-3 col-form-label form-control-label">Date Start</label>
                        <div class="col-md-9">
                          <input class="form-control" type="datetime-local"  id="datestart" name="datestart" value="{{ date('Y-m-d\TH:i', strtotime($calendaredit->datestart)) }}">
                        </div>
                      </div>
                      @error('datestart')
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                  <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                        @enderror
                      <div class="form-group row">
                        <label for="example-date-input" class="col-md-3 col-form-label form-control-label">Date End</label>
                        <div class="col-md-9">
                          <input class="form-control" type="datetime-local"  id="dateend" name="dateend" value="{{ date('Y-m-d\TH:i', strtotime($calendaredit->dateend)) }}">
                        </div>
                      </div>
                      @error('dateend')
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                  <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                        @enderror
                        <div class="form-group mb-0">
                          <label class="form-control-label d-block mb-3">Text color</label>
                          <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                            <label class="btn active" style="background-color: #ffffff;"><input type="radio" name="textcolour" id="textcolour" value="#ffffff" autocomplete="off" checked></label>
                            <label class="btn" style="background-color: #000000;"><input type="radio" name="textcolour" id="textcolour" value="#000000" autocomplete="off"></label>
                          </div>
                        </div>
                      <div class="form-group mb-0">
                        <label class="form-control-label d-block mb-3">Status color</label>
                        <div class="btn-group btn-group-toggle btn-group-colors event-tag" data-toggle="buttons">
                          <label class="btn active" style="background-color: #ffccdd;"><input type="radio" name="colour" id="colour" value="#ffccdd" autocomplete="off" checked></label>
                      <label class="btn" style="background-color: #99ffff;"><input type="radio" name="colour" id="colour" value="#99ffff" autocomplete="off"></label>
                      <label class="btn" style="background-color: #f33a3a;"><input type="radio" name="colour" id="colour" value="#f33a3a" autocomplete="off"></label>
                      <label class="btn" style="background-color: #70ff66;"><input type="radio" name="colour" id="colour" value="#70ff66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #ffea66;"><input type="radio" name="colour" id="colour" value="#ffea66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #ff8f66;"><input type="radio" name="colour" id="colour" value="#ff8f66" autocomplete="off"></label>
                      <label class="btn" style="background-color: #cd4c77;"><input type="radio" name="colour" id="colour" value="#cd4c77" autocomplete="off"></label>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="form-control-label" for="deskripsi">Deskripsi</label>
                        <textarea class="form-control" id="description" placeholder="Enter Deskripsi" name="description" rows="3">{{ $calendaredit->description }}</textarea>
                      </div>
                      @error('description')
                              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                  <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                    @enderror
              </div>
              
                  <a type="button" class="btn btn-secondary" href="{{ route('anggota.index') }}">Back</a>
                  <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
              
              </form>
            </div>
        </div>
      </div>
</div>

<script>

    $(document).ready(function() {
        $('#description').summernote();
    });

    
</script>

@endsection

@section('script')

    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection