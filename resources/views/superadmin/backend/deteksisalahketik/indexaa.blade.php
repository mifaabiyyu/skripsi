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
            <h6 class="h2 text-white d-inline-block mb-0">Hasil Konversi PDF ke Text</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Hasil Konversi PDF ke Text</a></li>
              
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
    <div class="row justify-content-center">
      <div class="col-lg-8 card-wrapper">
            <div class="card">
                <div class="card-header">
                <h3 class="mb-0">Deteksi Kesalahan Ketik Dokumen</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('tipografi.jaro-winkler')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
        
      
                            <textarea class="form-control" id="hasiltext" name="hasiltext" rows="7">{!! $haha !!}</textarea>
                            
                           <hr>
                        </div>
                        <div class="text-right">
                            <button type="submit" id="submit" class="btn btn-success" ><i class="ti-save"></i> Deteksi Salah Ketik</button>
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