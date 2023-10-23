@extends('superadmin.layouts.master')
@section('tittle', 'Pengurus Hima')  

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="header bg-warning pb-6">
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
    <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
            <div class="row">
                <div class="col-xl-6">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Kahima & Wakahima</h3>
                        </div>
                        <div class="col text-right">
                          <a href="{{ route('bph.create')}}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="datatable-basic" class="text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="15%">Nama</th>
                            <th width="15%">Jabatan</th>
                            <th width="20%">Deskripsi</th>
                            <th width="40%">Photo</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($kahima as $kahim)
                            <tr height="100px">
                                <td>
                                  {{ $kahim->name }}
                                </td>
                                <td>
                                    {{ $kahim->jabatan }}
                                </td>
                                <td>
                                    {{ $kahim->deskripsi }}
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('img/pengurus/kahimawakahima/'.$kahim->photo )}}" height="150px" width="100px" alt="" srcset="">
                                </td>
                                <td class="table-actions text-center">
                                    <a href="{{ route('bph.edit', $kahim->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Pengurus">
                                      <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" onclick="deleteRow( {{$kahim->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Pengurus">
                                      <i class="fas fa-trash"></i>
                                      <form action="{{ route('bph.destroy', $kahim->id)}}" id="data-{{ $kahim->id }}" method="POST">
                                          @csrf
                                          @method('delete')
                                      </form>
                                    </a>
                                  </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Deskripsi BPH</h3>
                        </div>
                        <div class="col text-right">
                          <a href="{{ route('deskbph.create') }}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="table_deskripsibph" class="text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="40%">Judul</th>
                            <th width="50%">Deskripsi</th>
                            <th width="25%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($deskripsi_bph as $deskbph)
                          <tr height="100px" style="font-size: small;">
                            <td>
                              {{ $deskbph->judul }}
                            </td>
                            <td>
                              {{ $deskbph->deskripsi }}
                            </td>
                            <td class="text-center">
                              <a href="{{ route('deskbph.edit', $deskbph->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Deskripsi">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a href="#!" onclick="deleteRowdesk( {{$deskbph->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Deskripsi">
                                <i class="fas fa-trash"></i>
                                <form action="{{ route('deskbph.destroy', $deskbph->id)}}" id="datadesk-{{ $deskbph->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                </form>
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

            {{-- SEKRETARIS DAN BENDAHARA --}}

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Sekretaris & Bendahara</h3>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('bph.createsb')}}" class="btn btn-sm btn-primary">Create</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="table-sekretarisbendahara" class="text-center align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th width="15%">Nama</th>
                          <th width="15%">Jabatan</th>
                          <th width="50%">Deskripsi</th>
                          <th width="40%">Photo</th>
                          <th width="15%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($sekretarisbendahara as $sekben)
                          <tr height="100px">
                              <td>
                                {{ $sekben->name }}
                              </td>
                              <td>
                                  {{ $sekben->jabatan }}
                              </td>
                              <td>
                                  {{ $sekben->deskripsi }}
                              </td>
                              <td class="text-center">
                                  <img src="{{ asset('img/pengurus/kahimawakahima/'.$sekben->photo )}}" height="150px" width="100px" alt="" srcset="">
                              </td>
                              <td class="table-actions text-center">
                                  <a href="{{ route('bph.editsb', $sekben->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Pengurus">
                                    <i class="fas fa-user-edit"></i>
                                  </a>
                                  <a href="#!" onclick="deleteRowsb( {{$sekben->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Pengurus">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('bph.destroysb', $sekben->id)}}" id="datasb-{{ $sekben->id }}" method="POST">
                                        @csrf
                                        @method('delete')
                                    </form>
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

<script>

    function deleteRow(id)
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
                            $('#data-'+id).submit();
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

    function deleteRowsb(id)
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
                            $('#datasb-'+id).submit();
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
    $('#table_deskripsibph').DataTable({
      "pagingType": "numbers"
    });
    });

    $(document).ready(function(){
    $('#table-sekretarisbendahara').DataTable({
      "pagingType": "numbers"
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