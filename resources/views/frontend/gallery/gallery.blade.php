@extends('frontend.layouts.master')
@section('tittle','Gallery Himatifa')

@section('content')

        <section id="subheader" class="dark no-top no-bottom" data-bgimage="url(assets/images/abc.jpg)"
            data-stellar-background-ratio=".2">
            <div class="overlay-bg t80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Gallery</h1>
                            <ul class="crumb">
                                <li><a href="index.html">Home</a></li>
                                <li class="sep"></li>
                                <li>Gallery HIMATIFA</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- subheader close -->

        <!-- content begin -->
        <div id="content" class="no-top no-bottom">
            <!-- section begin -->
            <section id="section-portfolio" aria-label="section-portfolio">
                <div class="container">

                    <!-- portfolio filter begin -->
                    <div class="row">

                        <div class="col-md-12 text-center">
                            <ul id="filters">
                                <li><a href="#" data-filter="*" class="selected">ALL</a></li>
                            @foreach ($category as $cat)
                                <li><a href="#" data-filter=".{{$cat->category}}">{{$cat->category}}</a></li>
                            @endforeach
                            </ul>
                            



                            <div id="gallery" class="gallery full-gallery de-gallery pf_full_width pf_4_cols grid sequence">

                                @if(count($gallery))
                                <!-- gallery item -->
                                @foreach ($gallery as $item)
                                <div class="item {{$item->category}} website gallery-item">
                                    <div class="picframe wow">
                                        <a class="image-popup" href="{{ asset('img/gallery/'. $item->photo)}}">
                                            <span class="overlay">
                                                <span class="pf_text">
                                                    <span class="project-name">{{$item->name}}</span>
                                                </span>
                                            </span>
                                            <img src="{{ asset('img/gallery/'. $item->photo)}}" class="wow" alt="" />
                                        </a>
                                    </div>
                                </div>
                                @endforeach
                                
                                @else
                                <div class="text-center">
                                    <h3>Tidak Ada</h3>
                                </div>
                                @endif
                                <!-- close gallery item -->

                            </div>
                        </div>
                        <!-- portfolio filter close -->

                    </div>

                </div>


            </section>
            <!-- section close -->
        </div>

        @include('frontend.layouts.footer')
@endsection