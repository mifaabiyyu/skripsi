@extends('superadmin.layouts.master')
@section('tittle')
Detail Pengajuan {{ $proposal->name }}
@endsection  
@section('content')
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Detai Proposal Kegiatan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                
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
    <div class="row justify-content-center">
        <div class="col-lg-8 card-wrapper">
          <div class="card">
              <!-- Card header -->
              <div class="card-header">
                  <div class="row">
                    <h3 class="mb-0 col-10 text-left">Detail Pengajuan {{ $proposal->name }}</h3> 
                    <a class="col-2 btn btn-secondary" href="{{ route('proposal.indexhima') }}">Back</a>
                  </div>
              </div>
              <!-- Card body -->
              <div class="card-body">
                      <div class="form-group">
                      <label class="form-control-label" for="name">Nama proposal :</label>
                          <h4>{{ $proposal->name }}</h4>
                      </div>            
                      <div class="form-group">
                          <label class="form-control-label" for="deskripsi">Deskripsi Proposal</label>
                          <h4>{{ $proposal->description }}</h4>
                      </div>
                      <div class="form-group">
                          <label class="form-control-label" for="deskripsi">Keterangan</label>
                          <h4>{{ $proposal->keterangan }}</h4>
                      </div>
                      
                      <div class="card card-timeline px-2 border-none">
                        @if  ($proposal->status == "1")
                            <ul class="bs4-order-tracking">
                                <li class="step active">
                                    <div><i class="fas fa-user"></i></div> Proposal Sampai di Prodi
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-times"></i></div> Prodi Belum Menyetujui Proposal
                                </li>
                                <li class="step">
                                    <div><i class="fas fa-truck"></i></div> Proposal Belum Sampai di Fakultas
                                </li>
                                <li class="step ">
                                    <div><i class="fas fa-times"></i></div> Fakultas Belum Menyetujui Proposal
                                </li>
                            </ul>
                            <h5 class="text-center"><b>Sampai di Prodi</b>. Proposal Telah sampai di Prodi Informatika !</h5>
                        @elseif($proposal->status == "2")
                            <ul class="bs4-order-tracking">
                                <li class="step active">
                                    <div><i class="fas fa-user"></i></div> Proposal Sampai di Prodi
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-check"></i></div> Prodi Telah Menyetujui Proposal
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-truck"></i></div> Proposal Sampai di Fakultas
                                </li>
                                <li class="step ">
                                    <div><i class="fas fa-times"></i></div> Fakultas Belum Menyetujui Proposal
                                </li>
                            </ul>
                            <h5 class="text-center"><b>Sampai di Fakultas</b>. Prodi telah menyetujui Proposal dan akan diteruskan ke Fakultas!</h5>
                        @elseif($proposal->status == "3")
                            <ul class="bs4-order-tracking">
                                <li class="step active">
                                    <div><i class="fas fa-user"></i></div> Proposal Sampai di Prodi
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-check"></i></div> Prodi Telah Menyetujui Proposal
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-truck"></i></div> Proposal Sampai di Fakultas
                                </li>
                                <li class="step active">
                                    <div><i class="fas fa-check"></i></div> Fakultas Telah Menyetujui Proposal
                                </li>
                            </ul>
                            <h5 class="text-center"><b>Fakultas Telah Menyetujui</b>. Proposal anda telah disetujui oleh pimpinan Fakultas !</h5>
                        @elseif($proposal->status == "10")
                        <div class=" text-center">
                            <h3 class="text-red">Mohon maaf Proposal anda Tidak Disetujui oleh Prodi</h3>
                        </div>

                        @elseif($proposal->status == "11")
                        <div class=" text-center">
                            <h3 class="text-red">Mohon maaf Proposal anda Tidak Disetujui oleh Fakultas</h3>
                        </div>
                            
                        @endif 
                        
                    </div>
              </div>
              
                  
              
            </div>
            
        </div>
      </div>
</div>

@endsection