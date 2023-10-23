@extends('superadmin.layouts.master')
@section('tittle', 'Dashboard')  
@section('content')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-lg-6 col-7">
                        <h6 class="h2 text-white d-inline-block mb-0">Dashboard</h6>
                        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                        </ol>
                        </nav>
                    </div>
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Diajukan</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposal}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Proposal Kegiatan</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Di Setujui Prodi</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalprodi}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-money-coins"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Di Setujui Fakultas</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalfakultas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-chart-bar-32"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Di Setujui</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalfakultas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                        <i class="ni ni-folder-17"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Di Tolak Prodi</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalditolakprodi}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-danger text-white rounded-circle shadow">
                                        <i class="ni ni-delivery-fast"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Di Tolak Fakultas</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalditolakfakultas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-diamond"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Menunggu Di Setujui Prodi</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalwaitprodi}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-warning text-white rounded-circle shadow">
                                        <i class="ni ni-email-83"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-stats">
                        <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Proposal Menunggu Di Setujui Fakultas</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$proposalwaitfakultas}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                                        <i class="ni ni-laptop"></i>
                                        </div>
                                    </div>
                                </div>
                                    <p class="mt-3 mb-0 text-sm">
                                        <span class="text-success mr-2"> -</span>
                                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <!-- Page content -->
    <div class="container-fluid mt--6">
       
    </div>
    <div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
        <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
          <div class="modal-content bg-gradient-danger">
            <div class="modal-header">
              <h6 class="modal-title" id="modal-title-notification">Welcome !</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="py-3 text-center">
                <i class="ni ni-satisfied ni-3x"></i>
                <h4 class="heading mt-4">Selamat Datang Kembali {{ Auth::user()->name }}</h4>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <script>
    $(document).ready(function(){
        $(window).on('load', function() {
            $('#welcome').modal('show');
        });
    });
    </script>
@endsection