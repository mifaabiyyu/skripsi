@extends('frontend.layouts.master')
@section('tittle','Deteksi Kesalahan Ketik')

@section('content')
<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(/assets/images/abc.jpg)"
    data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pendeteksian Kesalahan Ketik</h1>
                    <ul class="crumb">
                        {{-- <li><a href="index.html">Home</a></li>
                        <li class="sep"></li>
                        <li>Team</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <!-- section service begin -->
    <section class="side-bg left no-top np-bottom" data-bgcolor="#f6f6f6">
        <div class="image-container col-md-7 pull-left" data-delay="0">
            <div class="background-image"></div>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="col-md-12 lg-text-dark">
                    <div class="inner-padding text-center">
                        <h1>Deteksi Kesalahan Ketik Dokumen</h1>
                        <h4>Pendeteksian Kesalahan Ketik Dokumen Dengan Menerapkan Algoritma Jaro-Winker Distance</h4>
                        <div class="spacer-single"></div>
                        
                        <div class="card" style="align-content: center;">
                            <div class="card-header">
                            
                            </div>
                            <div class="card-body" >
                                <form action="{{ route('jaro.distance.hima')}}" method="POST" enctype="multipart/form-data">
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
    </section>
    <!-- section close -->
</div>
<!-- content close -->
<script>
      
    var loadFile = function(event){
        var output = document.getElementById('image_preview_container');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
     
    </script>
@endsection