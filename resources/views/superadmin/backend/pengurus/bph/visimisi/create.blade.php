@extends('superadmin.layouts.master')
@section('tittle', 'Create Visi & Misi')

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
                <h3 class="mb-0 text-center">Add Visi & Misi</h3>
              </div>
              <!-- Card body -->
              <div class="card-body">
                  <form action="{{ route('visimisi.store')}}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label class="form-control-label" for="visi">Visi</label>
                        <textarea class="form-control" id="visi" placeholder="Enter Visi" name="visi" value="{{ old('visi') }}" rows="3"></textarea>
                    </div>
                    @error('visi')
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                            <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @enderror
                      <div class="form-group">
                          <label class="form-control-label" for="misi">Misi</label>
                          <textarea class="form-control" id="misi" placeholder="Enter misi" name="misi" value="{{ old('misi') }}" rows="3"></textarea>
                      </div>
                      @error('misi')
                          <div class="alert alert-danger alert-dismissible fade show" role="alert">
                              <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                              <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                      @enderror
              </div>
              
                  <a type="button" class="btn btn-secondary" href="{{ route('visimisi.index') }}">Back</a>
                  <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
              
              </form>
            </div>
        </div>
      </div>
</div>

<script>
  $(document).ready(function() {
  $('#visi').summernote();
});
  $(document).ready(function() {
  $('#misi').summernote();
});

</script>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endsection