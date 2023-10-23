@extends('superadmin.layouts.master')
@section('tittle', 'Deteksi Kesalahan Ketik')  
@section('content')
<style>
    .progress { position:relative; width:200%; }
    .bar { background-color: #00ff00; width:0%; height:100px; }
    .percent { position:absolute; display:inline-block; left:50%; color: #040608;}
</style>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Deteksi Kesalahan Ketik</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Deteksi Kesalahan Ketik</a></li>
               
              </ol>
            </nav>
          </div>
          
        </div>
      </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row justify-content-center">
      <div class="col-lg-8 card-wrapper">
            <div class="card">
                <div class="card-header">
                <h3 class="mb-0">Deteksi Kesalahan Ketik Dokumen Via File Upload</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipografi.pdf-text')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                          <div class="input-group mb-3">
                            <label class="form-control-label" for="file">Upload File</label>
                          </div>
                            <div class="input-group mb-3">
                             
                                <button type="button" class="btn btn-info"><i class="ni ni-single-02 text-white"></i></button>
                                <input type="file" class="form-control" id="file" name="file" >
                                
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
                            
                           <hr>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="submit" class="btn btn-success" ><i class="ti-save"></i> Upload</button>
                        </div>
                    </form>
                </div>
                
            </div>
            <div class="card">
              <div class="card-header">
              <h3 class="mb-0">Deteksi Kesalahan Ketik Via Text</h3>
              </div>
              <div class="card-body">
                  <form action="{{ route('tipografi.jaro-winkler')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div>
      
    
                          <textarea class="form-control" id="hasiltext" name="hasiltext" rows="10"></textarea>
                          
                         <hr>
                      </div>
                      <div class="text-right">
                          <button type="submit" id="submit" class="btn btn-success" ><i class="ti-save"></i> Deteksi Kesalahan Ketik</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    var SITEURL = "{{ route('tipografi.index')}}";
    $(function() {
        $(document).ready(function()
        {
            var bar = $('.bar');
            var percent = $('.percent');
              $('form').ajaxForm({
                beforeSend: function() {
                    var percentVal = '0%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                uploadProgress: function(event, position, total, percentComplete) {
                    var percentVal = percentComplete + '%';
                    bar.width(percentVal)
                    percent.html(percentVal);
                },
                complete: function(xhr) {
                    alert('File Has Been Uploaded Successfully');
                    window.location.href = SITEURL";
                }
              });
        }); 
     });
    </script>
  @endsection