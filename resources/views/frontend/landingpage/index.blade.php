@extends('frontend.layouts.master')
@section('tittle','Himpunan Mahasiswa Teknik Informatika - UPN "Veteran" Jawa Timur')

@section('styles')
<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
@endsection

@section('content')
<div id="content" class="no-bottom no-top">
    <div id="top"></div>

    <!-- section begin -->
    <section id="section-slider" class="fullwidthbanner-container" aria-label="section-slider">
        <div id="revolution-slider">
            <ul>
                @foreach ($sliders as $slide)
                <li data-transition="fade" data-slotamount="10" data-masterspeed="default" data-thumb="">
                    <!--  BACKGROUND IMAGE -->
                    <img src="{{ asset('img/slider/'. $slide->photo)}}"  alt=""  data-lazyload="{{ asset('img/slider/'. $slide->photo)}}" data-bgposition="right center" data-kenburns="on" data-duration="30000" data-ease="Power1.easeOut" data-scalestart="110" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" class="rev-slidebg" data-no-retina>
                    
                    <div class="tp-caption tp-teaser"
                        data-x="center"
                        data-y="180"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                        data-transform_out="opacity:0;y:-100;s:400;e:Power2.easeInOut;"
                        data-start="500"
                        data-splitin="none"
                        data-splitout="none"
                        data-responsive_offset="on">
                        {{ $slide->head}}
                    </div>
                    
                    <div class="tp-caption big-s1"
                        data-x="center"
                        data-y="center"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                        data-transform_out="opacity:0;y:-100;s:200;e:Power2.easeInOut;"
                        data-start="600"
                        data-splitin="none"
                        data-splitout="none"
                        data-type="text" 
                        data-responsive_offset="on">
                        {{ $slide->tittle}}
                    </div>

                    <div class="tp-caption text-center"
                        data-x="center"
                        data-y="400"
                        data-width="none"
                        data-height="none"
                        data-whitespace="nowrap"
                        data-transform_in="y:100px;opacity:0;s:500;e:Power2.easeOut;"
                        data-transform_out="opacity:0;y:-100;s:600;e:Power2.easeInOut;"
                        data-start="700">
                        {!! $slide->deskripsi!!}
                    </div>
                    
                </li>
                @endforeach 
            </ul>
        </div>
    </section>
    <!-- section close -->
    <!-- section service begin -->
    <section id="section-startup-about">
        <div class="container">
            <div class="row table">
                <div class="padding60">
                    <h2 class="mb20">Sejarah HIMATIFA</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.</p>
                </div>
                <div class="col-md-6 text-middle">
                    <img src="{{ asset('assets/images/background/20210302_175708.jpg') }}" class="img-responsive img-rounded" alt="">
                </div>
                <div class="col-md-6 text-middle">
                    <img src="{{ asset('assets/images/background/20210302_175708.jpg') }}" class="img-responsive img-rounded" alt="">
                </div>
            </div>
            <div class="spacer-double"></div>
            <div class="row table">
                <div class="col-md-6 text-middle">
                    <img src="{{ asset('assets/images/background/hima1.png') }}" class="img-responsive img-rounded" alt="">
                    
                </div>
                <div class="col-md-6 text-middle">
                    <div class="padding60">
                        <h2 class="mb20">Arti LOGO</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est
                            laborum.
                        </p>
                    </div>
                </div>
            </div>

            

            

        </div>
    </section>
    <!-- section service close -->
     <!-- section begin -->
     <section id="section-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    <h2><span class="uptitle">News</span>Latest Post</h2>
                </div>
            </div>
        </div>

        <div id="blog-carousel" class="owl-carousel owl-theme">
            @foreach ($newss as $newber)
            <div class="bloglist item">
                <div class="post-content">
                    <div class="post-image">
                        <img src="{{ asset('img/berita/'. $newber->photo) }}" alt="" />
                    </div>

                    <div class="post-text">
                        <h3><a href="{{ route('beritahima.show', $newber->slug)}}">{{ $newber->title }}</a></h3>
                        <p>
                            {!! Illuminate\Support\Str::limit($newber->konten, 200) !!}
                            @if (strlen(strip_tags($newber->konten)) > 200)
                                <a href="{{ route('beritahima.show', $newber->slug) }}" class="btn-link" >Read More</a>
                            @endif
                        </p>
                        <span class="post-date">{{ $newber->updated_at->diffForHumans() }}</span>
                        <span class="post-by">Admin HIMATIFA</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </section>
    <!-- section close -->


    <!-- section begin -->
    <section class="no-top text-dark" style="background-color: #ffffff;">
        
            <div class="container">

                <div class="row sequence">
                    <div class="col-md-12 text-center">
                        <h2><span class="uptitle">Let's</span>Find Us</h2>
                    </div>

                    <!-- feature box begin -->
                    <div class="col-md-8 text-left sq-item wow sq-item wow">
                        <iframe width="700" height="450" style="border:0" loading="lazy" allowfullscreen
                        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ2xicV5b71y0R5azn4T4wPRY&key=AIzaSyCphlAhXXcr3aKqtns3gquOD9Sechuc34s"></iframe>
                    </div>
                    <div class="col-md-4 feature-box left sq-item wow sq-item wow">
                        <i class="icon_pin id-color"></i>
                        <div class="text">
                            <h3>Alamat</h3>
                            Jl. Rungkut Madya No.1, Gn. Anyar, Kec. Gn. Anyar, Kota SBY, Jawa Timur
                        </div>
                    </div>
                    <div class="col-md-4 feature-box left sq-item wow sq-item wow">
                        <i class="lni lni-instagram-original id-color"></i>
                        <div class="text">
                            <h3>Instagram</h3>
                            <a href="https://www.instagram.com/himatifaupnvjatim/?hl=id">@himatifaupnvjatim</a>
                        </div>
                    </div>
                    <div class="col-md-4 feature-box left sq-item wow sq-item wow">
                        <i class="lni lni-facebook id-color"></i>
                        <div class="text">
                            <h3>Facebook</h3>
                            <a href="https://www.facebook.com/himatifa.jatim">Himatifa Upn Veteran Jatim</a>
                        </div>
                    </div>
                    <div class="col-md-4 feature-box left sq-item wow sq-item wow">
                        <i class="lni lni-line id-color"></i>
                        <div class="text">
                            <h3>Line</h3>
                            <a >@uiy1854u</a>
                        </div>
                    </div>
                    <div class="col-md-4 feature-box left sq-item wow sq-item wow">
                        <i class=" social_spotify id-color"></i>
                        <div class="text">
                            <h3>PODSTICS</h3>
                            <a href="https://open.spotify.com/show/0Pc2dla9Ep5SOmlkNlBYq7?si=5JJN3MymT7aeDgKlwxAdsQ">HIMATIFA UPN V JATIM</a>
                        </div>
                    </div>
                    <!-- feature box close -->
                </div>
            </div>
            
            
    </section>
    <!-- section close -->


    
   

</div>

@include('frontend.layouts.footer')
@endsection