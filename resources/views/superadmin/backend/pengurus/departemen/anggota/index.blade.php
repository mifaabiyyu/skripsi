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
                <div class="col-xl-4">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Departemen</h3>
                        </div>
                        <div class="col text-right">
                          <a href="{{ route('departemen.create')}}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="table-jabatan" class="table text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="30%">No</th>
                            <th width="60%">Departemen</th>
                            <th width="30%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($departemen as $dep)
                            <tr height="50px">
                                <td>
                                  {{ $loop->iteration }}
                                </td>
                                <td>
                                  {{ $dep->departemen }}
                                </td>
                                <td class="table-actions text-center">
                                    <a href="{{ route('departemen.edit', $dep->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Departemen">
                                      <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" onclick="deleteRow( {{$dep->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Departemen">
                                      <i class="fas fa-trash"></i>
                                      <form action="{{ route('departemen.destroy', $dep->id)}}" id="data-{{ $dep->id }}" method="POST">
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
                <div class="col-xl-8">
                  <div class="card">
                    <div class="card-header border-0">
                      <div class="row align-items-center">
                        <div class="col">
                          <h3 class="mb-0">Deskripsi Anggota</h3>
                        </div>
                        <div class="col text-right">
                          <a href="{{ route('deskanggota.create') }}" class="btn btn-sm btn-primary">Create</a>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="table_deskripsibph" class="tableku align-items-center table-flush">
                        <thead height="20px" class="text-center thead-light">
                          <tr >
                            <th width="10%">Departemen</th>
                            <th width="50%">Deskripsi</th>
                            <th width="20%">Photo</th>
                            <th width="15%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($deskripsi_anggota as $deskanggota)
                          <tr  height="100px" style="font-size: small;">
                            <td class="text-center">
                              {{ $deskanggota->departemen }}
                            </td>
                            <td class="text-justify">
                              {!! Illuminate\Support\Str::limit($deskanggota->deskripsi, 200) !!}
                                @if (strlen(strip_tags($deskanggota->deskripsi)) > 200)
                                ... <a href="{{ route('deskanggota.edit', $deskanggota->id) }}" >Read More</a>
                                  @endif
                            </td>
                            <td class="text-center">
                              <img src="{{ asset('img/pengurus/anggota/'.$deskanggota->photo )}}" height="80px" width="120px" alt="" srcset="">
                          </td>
                            <td class="text-center">
                              <a href="{{ route('deskanggota.edit', $deskanggota->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Deskripsi">
                                <i class="fas fa-user-edit"></i>
                              </a>
                              <a href="#!" onclick="deleteRowdesk( {{$deskanggota->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Deskripsi">
                                <i class="fas fa-trash"></i>
                                <form action="{{ route('deskanggota.destroy', $deskanggota->id)}}" id="datadesk-{{ $deskanggota->id }}" method="POST">
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
                        <h3 class="mb-0">Anggota Pengurus Himatifa</h3>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('anggota.create')}}" class="btn btn-sm btn-primary">Create</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="table-sekretarisbendahara" class="tableku text-center align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th width="15%">Nama</th>
                          <th width="15%">Departemen</th>
                          <th width="15%">Jabatan</th>
                          <th width="40%">Deskripsi</th>
                          <th width="40%">Photo</th>
                          <th width="15%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($anggota as $ang)
                          <tr height="100px">
                              <td>
                                {{ $ang->name }}
                              </td>
                              <td>
                                {{ $ang->departemen }}
                              </td>
                              <td>
                                  {{ $ang->jabatan }}
                              </td>
                              <td>
                                  {{ $ang->deskripsi }}
                              </td>
                              <td class="text-center">
                                  <img src="{{ asset('img/pengurus/anggota/'.$ang->photo )}}" height="150px" width="100px" alt="" srcset="">
                              </td>
                              <td class="table-actions text-center">
                                  <a href="{{ route('anggota.edit', $ang->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Pengurus">
                                    <i class="fas fa-user-edit"></i>
                                  </a>
                                  <a href="#!" onclick="deleteRowanggota( {{$ang->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Pengurus">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('anggota.destroy', $ang->id)}}" id="dataanggota-{{ $ang->id }}" method="POST">
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
    $('#table_deskripsibph').DataTable({
      "pagingType": "numbers",
      pageLength: 2,
       lengthMenu: [[2, 5, 10, -2], [2, 5, 10]]
    });
    });

    $(document).ready(function(){
    $('#table-jabatan').DataTable({
      "pagingType": "numbers",
      searching: false,
       pageLength: 5,
       lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
    });
    });

    $(document).ready(function(){
    $('#table-sekretarisbendahara').DataTable({
      "pagingType": "numbers",
      pageLength: 5,
       lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
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