@extends('superadmin.layouts.master')
@section('tittle', 'Manage Pendaftaran HIMA')  

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
                        <h3 class="mb-0">Pendaftar HIMATIFA</h3>
                      </div>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <!-- Projects table -->
                    <table id="table-pendaftaran" class="tableku text-center align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th width="20%">Nama</th>
                          <th width="10%">NPM</th>
                          <th width="15%">Departemen 1</th>
                          <th width="15%">Departemen 2</th>
                          <th width="10%">Status</th>
                          <th width="20%">Photo</th>
                          <th width="15%">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($list as $pendaftar)
                          <tr height="70px">
                              <td>
                                {{ $pendaftar->nama }}
                              </td>
                              <td>
                                {{ $pendaftar->npm }}
                              </td>
                              <td>
                                  {{ $pendaftar->departemen1 }}
                              </td>
                              <td>
                                  {{ $pendaftar->departemen2 }}
                              </td>
                              <td>
                                {{ $pendaftar->status }}
                              </td>
                              <td class="text-center">
                                <img src="{{ asset('img/pengurus/calon_pengurus/'.$pendaftar->photo )}}" height="150px" width="100px" alt="" srcset="">
                              </td>
                              <td class="table-actions text-center">
                                  <a id="viewstatus" data-id="{{ $pendaftar->id }}" data-toggle="modal" class="viewstatus table-action text-success" data-original-title="View Pengurus">
                                    <i class="fas fa-user-edit"></i>
                                  </a>
                                  <a href="#!" onclick="deleteRow( {{$pendaftar->id}} )" class="table-action text-danger sa-warning" data-toggle="tooltip" data-original-title="Delete Pengurus">
                                    <i class="fas fa-trash"></i>
                                    <form action="{{ route('contact-us-admin.destroy', $pendaftar->id)}}" id="data-{{ $pendaftar->id }}" method="POST">
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


<div class="modal fade " id="viewpendaftar" tabindex="-1" role="dialog" aria-labelledby="new-event-label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-secondary modal-xl" role="document">
    <div class="modal-content">
      <!-- Modal body -->
      <div class="modal-body">
        <form id="dayClick" class="new-event--form" method="POST" action="{{ route('contact-us-admin.store')}}">
        @csrf
        <input type="hidden" id="id" name="id" value="">
          <div class="form-group row">
            <label class="col-md-2 col-form-label form-control-label">Nama</label>
            <div class="col-md-4">
              <input id="nama" name="nama" class="form-control" readonly>
            </div>
            <label class="col-md-2 col-form-label form-control-label">NPM</label>
            <div class="col-md-4">
              <input id="npm" name="npm" class="form-control" readonly>
            </div>
          </div>
          <div class="form-group row">
            <h3 class="col-md-2 col-form-label form-control-label">Departemen 1</h3>
            <div class="col-md-4">
              <input id="departemen1" name="departemen1" class="form-control" readonly>
            </div>
            <label class="col-md-2 col-form-label form-control-label">Departemen 2</label>
            <div class="col-md-4">
              <input id="departemen2" name="departemen2" class="form-control" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label form-control-label">Visi</label>
            <div class="col-md-10">
              <textarea id="visi" name="visi" class="form-control" rows="3" readonly></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label form-control-label">Misi</label>
            <div class="col-md-10">
              <textarea id="misi" name="misi" class="form-control" rows="3" readonly></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label form-control-label">Alasan Memilih Departemen</label>
            <div class="col-md-10">
              <textarea id="alasan_departemen" name="alasan_departemen" class="form-control" rows="3" readonly></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-md-2 col-form-label form-control-label">Alasan Join Hima</label>
            <div class="col-md-10">
              <textarea id="alasan_hima" name="alasan_hima" class="form-control" rows="3" readonly></textarea>
            </div>
          </div>
        
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="col-md-4">
          <select id="status" name="status" class="form-control" data-toggle="select">
            <option value="">- Pilih Status -</option>
            <option value="Data Tidak Valid">Data Invalid</option>
            <option value="Data Valid">Data Valid</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary new-event--add">Submit</button>
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

    
    $(document).ready(function(){
    $('#table-pendaftaran').DataTable({
      "pagingType": "numbers",
      pageLength: 5,
       lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
    });
    });

    $(document).ready(function(){
    $('#table-kritiksaran').DataTable({
      "pagingType": "numbers",
      pageLength: 5,
       lengthMenu: [[5, 10, 20, -1], [5, 10, 20]]
    });
    });

   
    $(document).ready(function(){
        

        $(".viewstatus").click(function(){
          var pendaftaran_id = $(this).data('id');
            $.get('contact-us-admin/'+pendaftaran_id+'/edit', function (data) {
            $("#viewpendaftar").modal('show');
            $('#id').val(data.id);
            $('#status').val(data.status);
            $('#nama').val(data.nama);
            $('#npm').val(data.npm);
            $('#visi').val(data.visi);
            $('#misi').val(data.misi);
            $('#departemen1').val(data.departemen1);
            $('#departemen2').val(data.departemen2);
            $('#alasan_departemen').val(data.alasan_departemen);
            $('#alasan_hima').val(data.alasan_hima);
            $('#photo').val(data.photo);
            })
            
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


	    
	