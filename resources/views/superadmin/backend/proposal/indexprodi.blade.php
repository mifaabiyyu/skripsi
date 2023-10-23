@extends('superadmin.layouts.master')
@section('tittle', 'Verifikasi Prodi')  

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="header bg-danger pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Verifikasi Proposal Kegiatan</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active"><a href="#">Proposal Kegiatan</a></li>
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
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-xl-12">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Verifikasi Prodi</h3>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="table_proposal" class="table text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="10%">No</th>
                            <th width="25%">Nama Proposal</th>
                            <th width="50%">Deskripsi</th>
                            <th width="20%">Status</th>
                            <th width="20%">Download File</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($proposal as $prop)
                            <tr height="50px">
                                <td>
                                  {{ $loop->iteration }}
                                </td>
                                <td>
                                  {{ $prop->name }}
                                </td>
                                <td>
                                    {{ $prop->description }}
                                </td>
                                <td>
                                  @if  ($prop->status == "1")
                                    <h5 class="text-blue">
                                      <b>Berkas belum di Proses</b>
                                    </h5>
                                  @elseif ($prop->status == "10")
                                    <h5 class="text-danger">
                                      <b>Berkas Tidak Disetujui</b>
                                    </h5>
                                  @else
                                    <h5 class="text-success">
                                      <b>Berkas Telah DiSetujui</b>
                                    </h5>
                                  @endif 
                                  
                                </td>
                                <td>
                                    <a href="{{ route('proposal.download', $prop->file )}}"> {{ $prop->file }} </a>
                                </td>
                                <td class="table-actions text-center">
                                    <a href="{{ route('proposal.editprodi', $prop->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Ajuan Proposal">
                                      <i class="fas fa-user-edit"></i>
                                    </a>
                                    
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ajuanproposal" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-secondary" role="document">
      <div class="modal-content">
        <!-- Modal body -->
        <div class="modal-body">
          <form id="dayClick" class="new-event--form" method="POST" action="{{ route('proposal.store')}}" enctype="multipart/form-data">
          @csrf
            <div class="form-group row">
              <label class="col-md-4 col-form-label form-control-label">Nama Proposal</label>
              <div class="col-md-12">
                  <input type="text" id="name" name="name" class="form-control form-control-alternative new-event--title" placeholder="Nama Proposal" value="{{ old('name') }}">
              </div>
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
              <label class="form-control-label" for="deskripsi">Deskripsi</label>
              <textarea class="form-control" id="description" placeholder="Enter Deskripsi" name="description" value="{{ old('description') }}" rows="3"></textarea>
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
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary new-event--add">Add event</button>
          <button type="button" class="btn btn-link ml-auto" data-dismiss="modal">Close</button>
        </div>
      </form>
      </div>
    </div>
  </div>

<script>

    function deleteRow(id)
            {
                    swal({   
                        title: "Apakah anda yakin ingin menghapus ?",   
                        text: "Jabatan akan dihapus selamanya !",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#data-'+id).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Delete Jabatan Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Jabatan Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }

    function deleteRowdesk(id)
            {
                    swal({   
                        title: "Apakah anda yakin ingin menghapus ?",   
                        text: "Deskripsi akan dihapus selamanya !",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#datadesk-'+id).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Delete Deskripsi Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Deskripsi Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }

    function deleteRowanggota(id)
            {
                    swal({   
                        title: "Apakah anda yakin ingin menghapus ?",   
                        text: "Pengurus akan dihapus selamanya !",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#dataanggota-'+id).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Delete Pengurus Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Pengurus Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }

    $(document).ready(function(){
    $('#table_proposal').DataTable({
      "pagingType": "numbers",
      searching: false,
       pageLength: 5,
       lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
    });
    });

    $(document).ready(function(){
        $("#createproposal").click(function(){
            $("#ajuanproposal").modal('show');
        });
    });
    
    </script>

@section('script')
<script src="{{ asset('assetss/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('assetss/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
@endsection

@endsection