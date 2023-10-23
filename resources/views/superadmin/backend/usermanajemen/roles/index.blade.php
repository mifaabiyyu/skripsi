@extends('superadmin.layouts.master')
@section('tittle', 'Roles')  

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
            <h6 class="h2 text-white d-inline-block mb-0">Roles & Permissions</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active"><a href="#">Roles</a></li>
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
                <div class="col-6">
                    <h3 class="mb-0">Role Table</h3>
                </div>
                <div class="col-6 text-right">
                    <a href="{{ route('roles.create')}}" class="btn btn-sm btn-neutral btn-round btn-icon" data-toggle="tooltip"  data-original-title="Tambah Roles">
                        <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                        <span class="btn-inner--text">Add Roles</span>
                    </a>
                    
                </div>
            </div>
        </div>
        <!-- Light table -->
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table id="datatable-basic" class=" text-center align-items-center table-flush">
                <thead class="thead-light">
                    <tr height="100px">
                      <th width="5%">No</th>
                      <th width="10%">Roles</th>
                      <th width="40%">Permissions</th>
                      <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr height="100px">
                            <td class="table-user">
                                <b>{{ $loop->iteration }}</b>
                            </td>
                            <td class="table-user">
                                <b>{{ $role->name }}</b>
                            </td>
                            <td>
                              @foreach ($role->permissions as $perm)
                                  <span class="badge badge-info mr-1">
                                        {{ $perm->name }}
                                  </span>
                              @endforeach
                           </td>
                            <td class="table-actions text-center">
                                <a href="#!" class="table-action btn-show text-success" data-id="{{ $role ->id}}" data-toggle="tooltip" data-original-title="View Roles Permission">
                                    <i class="fa fa fa-eye"></i>
                                </a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="table-action text-info" data-toggle="tooltip" data-original-title="Edit Roles">
                                    <i class="fas fa-user-edit"></i>
                                </a>
                                <a href="#!" onclick="deleteRow( {{$role->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Roles">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('roles.destroy', $role->id)}}" id="data-{{ $role->id }}" method="POST">
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
@include('superadmin.backend.usermanajemen.roles.script')

<div class="modal fade" id="showmodal" tabindex="-1" role="dialog" aria-labelledby="showmodal" aria-hidden="true">
    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="modal-title-default">View Role Permissions</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
        </div>
      </div>
    </div>
  </div>

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
@endsection