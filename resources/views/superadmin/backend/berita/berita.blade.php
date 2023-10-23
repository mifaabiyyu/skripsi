@extends('superadmin.layouts.master')
@section('tittle', 'Manage Berita')  

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}">
@endsection

@section('content')
<div class="header bg-success pb-6">
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
                          <h3 class="mb-0">Category</h3>
                        </div>
                      </div>
                    </div>
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table id="table-jabatan" class="table text-center align-items-center table-flush">
                        <thead class="thead-light">
                          <tr>
                            <th width="30%">No</th>
                            <th width="60%">Category</th>
                            <th width="30%">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $cate)
                            <tr height="50px">
                                <td>
                                  {{ $loop->iteration }}
                                </td>
                                <td>
                                  {{ $cate->category }}
                                </td>
                                <td class="table-actions text-center">
                                    <a href="{{ route('category-berita.edit', $cate->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Category">
                                      <i class="fas fa-user-edit"></i>
                                    </a>
                                    <a href="#!" onclick="deleteRow( {{$cate->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Category">
                                      <i class="fas fa-trash"></i>
                                      <form action="{{ route('category-berita.destroy', $cate->id)}}" id="data-{{ $cate->id }}" method="POST">
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
                        <!-- Card header -->
                        <div class="card-header">
                          <h3 class="mb-0 text-center">Create Category</h3>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <form action="{{ route('category-berita.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                <label class="form-control-label" for="category">Category</label>
                                    <input type="text" class="form-control" id="category" placeholder="Enter Category" name="category" value="{{ old('category') }}">
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
                          <div class="text-right">
                            <button type="submit" class="btn btn-success"  value="create"><i class="ti-save"></i> Save</button>
                          </div>
                        </form>
                      </div>
                  </div>
                </div>
            </div>


            <div class="row">
              <div class="col-12 align-items-center">
                <div class="card">
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Berita</h3>
                      </div>
                      <div class="col text-right">
                        <a href="{{ route('manage-berita.create')}}" class="btn btn-sm btn-primary">Create</a>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="table-sekretarisbendahara" class="tableku text-center align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%">Title</th>
                          <th width="10%">Slug</th>
                          <th width="10%">Category</th>
                          <th width="50%">Konten</th>
                          <th width="20%">Photo</th>
                          <th width="10%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($berita as $ber)
                          <tr height="100px">
                              <td>
                                {{ $ber->title }}
                              </td>
                              <td>
                                {{ $ber->slug }}
                              </td>
                              <td>
                                {{ $ber->category }}
                              </td>
                              <td>
                                {!! Illuminate\Support\Str::limit($ber->konten, 200) !!}
                                @if (strlen(strip_tags($ber->konten)) > 200)
                              ... <a href="{{ route('manage-berita.edit', $ber->slug) }}" >Read More</a>
                                @endif
                              </td>
                              <td class="text-center">
                                  <img src="{{ asset('img/berita/'.$ber->photo )}}" height="100px" width="150px" alt="" srcset="">
                              </td>
                              <td class="table-actions text-center">
                                  <a href="{{ route('manage-berita.edit', $ber->slug) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Berita">
                                    <i class="fas fa-user-edit"></i>
                                  </a>
                                  <a href="#!" onclick="deleteRowberita( {{$ber->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Pengurus">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('manage-berita.destroy', $ber->id)}}" id="databerita-{{ $ber->id }}" method="POST">
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
                        text: "Berita akan dihapus selamanya !",   
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
                            swal('Delete Berita Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Berita Dibatalkan !','','warning');
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

    function deleteRowberita(id)
            {
                    swal({   
                        title: "Apakah anda yakin ingin menghapus ?",   
                        text: "Berita akan dihapus selamanya !",   
                        type: "warning",   
                        showCancelButton: true,   
                        confirmButtonColor: "#DD6B55",   
                        confirmButtonText: "Ya, Hapus!",
                        cancelButtonText: "Cancel !",   
                        closeOnConfirm: false,
                        closeOnCancel: false  
                    }) .then((res) => {
                        if (res.value) {
                            $('#databerita-'+id).submit();
                        }
                        else if( res.dismiss == 'cancel') {
                            console.log('cancel');
                            swal('Delete Berita Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Berita Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }

    $(document).ready(function(){
    $('#table_deskripsibph').DataTable({
      "pagingType": "numbers",
      pageLength: 1,
       lengthMenu: [[1, 5, 10, -1], [1, 5, 10]]
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