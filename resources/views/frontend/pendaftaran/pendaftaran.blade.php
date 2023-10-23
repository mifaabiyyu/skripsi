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
                <div class="col-md-7 lg-text-dark">
                    <div class="inner-padding text-center">
                        <h1>Deteksi Kesalahan Ketik Dokumen</h1>
                        <h4>Pendeteksian Kesalahan Ketik Dokumen Dengan Menerapkan Algoritma Jaro-Winker Distance</h4>
                        <div class="spacer-single"></div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mask">
                                    <img src="{{ asset('assets/images/background/20210302_175708.jpg')}}" alt="" class="img-responsive mb30 wow fadeInUp">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mask">
                                    <img src="{{ asset('assets/images/background/hima.jpg')}}" alt="" class="img-responsive mb30 wow fadeInUp" data-wow-delay=".2s">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mask">
                                    <img src="{{ asset('assets/images/background/Pengukuhan Pengurus HIMATIFA Periode 2020-2021_210208.jpg')}}" alt="" class="img-responsive mb30 wow fadeInUp" data-wow-delay=".2s">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-5">
                    <div class="spacer-double"></div>
                    <h4>Deteksi Pengajuan Proposal Kegiatan Via Upload File </h4>
                        <form name="contactForm" id='contact_form' class="form-underline" method="post" enctype="multipart/form-data" action="{{ route('pdf-text.store')}}">
                        @csrf
                            <div class="field-set">
                                <h5>Upload File Proposal</h5>
                                <input type='file' name="file" id="file" class="form-control" placeholder="Choose image">
                            </div>
                            
                            <div class="spacer-half"></div>
                            <div class="spacer-half"></div>

                            <div class="text-center" >
                                <input type="submit"  value='Submit Form' class="btn btn-custom color-2">
                            </div>

                        </form>
                    
                </div>
                <div class="col-md-5">
                    <div class="spacer-double"></div>
                    <h4>Deteksi Pengajuan Proposal Kegiatan Via Teks</h4>
                        <form name="contactForm" id='contact_form' class="form-underline" method="post" enctype="multipart/form-data" action="{{ route('jaro.distance.hima')}}">
                        @csrf
                        <div class="field-set">
                            <textarea type='text' name="hasiltext" id="hasiltext" class="form-control" placeholder="Input Text" rows="3"></textarea>
                        </div>
                       
                            <div class="spacer-half"></div>
                            <div class="spacer-half"></div>

                            <div class="text-center" >
                                <input type="submit"  value='Submit Form' class="btn btn-custom color-2">
                            </div>

                        </form>
                    
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