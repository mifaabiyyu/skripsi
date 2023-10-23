@extends('superadmin.layouts.master')
@section('tittle', 'Manage Slider')

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
            <div class="col-6">
              <h3 class="mb-0">Striped table</h3>
            </div>
            <div class="col-6 text-right">
              <a href="{{ route('sliders.create')}}" class="btn btn-sm btn-primary btn-round btn-icon" data-toggle="tooltip" data-original-title="Edit product">
                <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                <span class="btn-inner--text">Add Slider</span>
              </a>
            </div>
          </div>
        </div>
        <!-- Light table -->
        <div class="table-responsive py-4">
          <table id="datatable-basic" class="text-center align-items-center table-flush">
            <thead class="thead-light text-center">
              <tr>
                <th width="5%">No</th>
                <th width="10%">Head</th>
                <th width="10%">Tittle</th>
                <th width="40%">Deskripsi</th>
                <th width="20%">Photo</th>
                <th width="15%">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($sliders as $slider)
                <tr height="100px">
                    <td class="text-center">
                      <a>{{ $loop->iteration}}</a>
                    </td>
                    <td>
                      <a>{{ $slider->head }}</a>
                    </td>
                    <td>
                      <a>{{ $slider->tittle }}</a>
                    </td>
                    <td>
                      <a>{{ $slider->deskripsi }}</a>
                    </td>
                    <td class="text-center">
                      <img src="{{ asset('img/slider/'.$slider->photo )}}" height="100px" width="150px" alt="" srcset="">
                    </td>
                    <td class="table-actions text-center">
                      <a href="{{ route('sliders.edit', $slider->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Slider">
                        <i class="fas fa-user-edit"></i>
                      </a>
                      <a href="#!" onclick="deleteRow( {{$slider->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Roles">
                        <i class="fas fa-trash"></i>
                        <form action="{{ route('sliders.destroy', $slider->id)}}" id="data-{{ $slider->id }}" method="POST">
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
<script>

function deleteRow(id)
        {
                swal({   
                    title: "Apakah anda yakin ingin menghapus ?",   
                    text: "Slider akan dihapus selamanya !",   
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
                        swal('Delete Slider Dibatalkan !','','warning');
                    }
                    else{
                        console.log('cancel');
                        swal('Delete Slider Dibatalkan !','','warning');
                    }
                }) 

            
        }

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