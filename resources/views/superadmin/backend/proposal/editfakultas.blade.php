@extends('superadmin.layouts.master')
@section('tittle')
Validasi Proposal {{ $propfakultas->name }}
@endsection  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Validasi Fakultas</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              
              </ol>
            </nav>
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
                  <div class="row">
                    <h3 class="mb-0 col-10 text-left">Proposal {{ $propfakultas->name }}</h3> 
                  </div>
              </div>
              <!-- Card body -->
            <form method="POST" action="{{ route('proposal.updatefakultas', $propfakultas->id)}}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                        <div class="form-group">
                        <label class="form-control-label" for="name">Nama proposal :</label>
                            <h4>{{ $propfakultas->name }}</h4>
                        </div>            
                        <div class="form-group">
                            <label class="form-control-label" for="deskripsi">Deskripsi Proposal</label>
                            <h4>{{ $propfakultas->description }}</h4>
                        </div>
                        <div class="form-group">
                            <label class="form-control-label" for="file">File</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        @error('file')
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-icon"><i class="ni ni-fat-remove"></i></span>
                                <span class="alert-text"><strong>Error !</strong> {{$message}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                        <div class="form-group">
                            <label class="form-control-label" for="file">Status Proposal</label>
                            <div class="col-md-4">
                                <select id="status" name="status" class="form-control" data-toggle="select">
                                <option value="">- Pilih Status -</option>
                                <option value="11">Proposal Tidak Disetujui</option>
                                <option value="3">Proposal di Setujui</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                          <label class="form-control-label" for="keterangan">Keterangan</label>
                          <textarea class="form-control" id="keterangan" placeholder="Tambahkan Keterangan" name="keterangan" rows="3">{{$propfakultas->keterangan}}</textarea>
                        </div>
                        <div class="text-right">
                            <a class="col-2 btn btn-secondary" href="{{ route('proposal.indexfakultas') }}">Back</a>
                            <button type="submit" class="btn btn-primary new-event--add">Submit & Setujui</button>
                        </div>
            </form>
                </div>
              
                  
              
            </div>
            
        </div>
      </div>
</div>

@endsection