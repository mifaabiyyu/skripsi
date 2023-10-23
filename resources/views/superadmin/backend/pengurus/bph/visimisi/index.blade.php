@extends('superadmin.layouts.master')
@section('tittle', 'Visi Misi')  

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
                    <h3 class="mb-0">Visi & Misi Table</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('visimisi.create')}}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip"  data-original-title="Create">
                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                        <span class="btn-inner--text">Create</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="datatable-basic" class="tableku align-items-center table-flush">
                <thead class="thead-light text-center">
                    <tr>
                      <th width="50%">Visi</th>
                      <th width="50%">Misi</th>
                      <th width="20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($visimisi as $vismis)
                        <tr height="100px">
                            <td class="table-user text-left">
                                {!! $vismis->visi !!}
                            </td>
                            <td class="text-left">
                                {!! $vismis->misi !!}
                           </td>
                            <td class="table-actions text-center">
                                <a href="{{ route('visimisi.edit', $vismis->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Roles">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#!" onclick="deleteRow( {{$vismis->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Roles">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('visimisi.destroy', $vismis->id)}}" id="data-{{ $vismis->id }}" method="POST">
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
                        text: "Data akan dihapus selamanya !",   
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
                            swal('Delete Dibatalkan !','','warning');
                        }
                        else{
                            console.log('cancel');
                            swal('Delete Dibatalkan !','','warning');
                        }
                    }) 
    
                
            }
</script>
@endsection

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
<!-- /.modal-dialog -->
