@extends('superadmin.layouts.master')
@section('tittle', 'Kritik & Saran HIMATIFA')  

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" href="{{ asset('assetss/css/bootstrap-editable.css')}}">
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
              <div class="col-12">
                
                  <div class="card-header border-0">
                    <div class="row align-items-center">
                      <div class="col">
                        <h3 class="mb-0">Kritik & Saran</h3>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="table-kritiksaran" class="tableku text-center align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th width="10%">No</th>
                          <th width="50%">Kritik & Saran</th>
                          <th width="35%">Nama</th>
                          <th width="35%">NPM</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($kritiksaran as $krisar)
                          <tr height="70px">
                              <td>
                                {{ $loop->iteration }}
                              </td>
                              <td>
                                  {{ $krisar->kritik_saran }}
                              </td>
                              <td>
                                {{ $krisar->nama }}
                              </td>
                              <td>
                                {{ $krisar->npm }}
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

<script>


    $(document).ready(function(){
    $('#table-kritiksaran').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csv', 'excel', 'pdf', 'print'
        ],
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
<script src="{{ asset('assetss/js/bootstrap-editable.js') }}"></script>
<script src="{{ asset('assetss/js/bootstrap-editable.min.js') }}"></script>
@endsection

@endsection


	    
	