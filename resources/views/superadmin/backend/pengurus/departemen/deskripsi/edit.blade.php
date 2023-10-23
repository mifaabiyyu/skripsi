@extends('superadmin.layouts.master')
@section('tittle', 'Edit Deskripsi Anggota')  

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
                <h3 class="mb-0 text-center">Edit Deskripsi Anggota</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <form action="{{ route('deskanggota.update', $deskanggota->id )}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                      <label class="form-control-label" for="departemen">Departemen</label>
                      <select name="departemen" id="departemen" class="form-control" data-toggle="select">
                        <option value="">- Pilih Departemen -</option>
                        @foreach ($departemen as $dep)
                            <option value="{{ $dep->name }}" {{ old('departemen', $deskanggota->departemen) == $dep->name ? 'selected' : null }}>{{ $dep->name }}</option>
                        @endforeach
                      </select>
                    </div>
                    @error('departemen')
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
                          <textarea class="form-control" id="deskripsi" placeholder="Enter Deskripsi" name="deskripsi" rows="3">{{ $deskanggota->deskripsi }}</textarea>
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
                      <div class="form-group text-center">
                        <img src="{{ asset('img/pengurus/anggota/'.$deskanggota->photo )}}" height="10%" width="50%" alt="" srcset="">
                      </div>
              </div>
              
                  <a type="button" class="btn btn-secondary" href="{{ route('deskbph.index') }}">Back</a>
                  <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
              
              </form>
            </div>
        </div>
      </div>
</div>


<script>
  $(document).ready(function() {
  $('#deskripsi').summernote();
});

</script>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection