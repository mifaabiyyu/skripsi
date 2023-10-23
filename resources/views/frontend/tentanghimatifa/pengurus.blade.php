@extends('frontend.layouts.master')
@section('tittle','Pengurus HIMATIFA')

@section('content')

<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(assets/images/abc.jpg)"
    data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Pengurus Hima</h1>
                    <ul class="crumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="sep"></li>
                        <li>Team</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="section-process" class="dark no-top no-bottom" style="background-image: linear-gradient(#ffffff, #ffffff);">
    
        <div class="container">
            <div class="row">
                <div class="spacer-single"></div>
                <div class="col-md-12 text-center">
                    <h2 class="mb20">VISI & MISI</h2>
                </div>

                <div class="col-md-12">
                <div class="de_tab tab_steps style-2">
                    <ul class="de_nav">
                        <li class="active wow fadeInRight" data-wow-delay="0s"><span><i class="icon_lightbulb_alt"></i>Visi</span>
                            <div class="arrow"></div>
                        </li>
                        <li class="wow fadeInRight" data-wow-delay=".3s"><span><i class="icon_easel"></i>Misi</span>
                            <div class="arrow"></div>
                        </li>
                    </ul>

                    <div class="de_tab_content">
                        @foreach ($visimisi as $vismis)
                        <div id="tab1">
                            <div class="col-md-6 col-md-offset-3">
                                <h4 class="text-center">
                                    {!! $vismis->visi !!}
                                </h4>
                            </div>
                        </div>

                        <div id="tab2">
                            <div class="col-md-6 col-md-offset-3">
                                <h4 class="text-left">
                                    {!! $vismis->misi !!}
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                
                </div>
            </div>
        </div>
    
</section>
<!-- subheader close -->
<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <section aria-label="section-team" style="background-image: linear-gradient(#ffffff, #f4f75f);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskripsi_bph as $deskbph)
                    <h2 class="mb20">{{ $deskbph->judul }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kahima as $kahim)
                    <div class="col-md-3 mx-auto sq-item wow " style="margin:auto;">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/kahimawakahima/'. $kahim->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kahim->deskripsi }}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/kahimawakahima/'. $kahim->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kahim->name }}</h3>
                            <span class="subtitle">{{ $kahim->jabatan }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($sekben as $sb)
                    <div class="col-md-3 mx-auto sq-item wow " style="margin:auto;">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/kahimawakahima/'. $sb->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $sb->deskripsi }}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/kahimawakahima/'. $sb->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $sb->name }}</h3>
                            <span class="subtitle">{{ $sb->jabatan }}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#f4f75f, #AED6F1);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskadvo as $deskad)
                    <h2 class="mb20">{{ $deskad->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadepadvo as $kadvo)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kadvo->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kadvo->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kadvo->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kadvo->name}}</h3>
                            <span class="subtitle">{{ $kadvo->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotaadvo as $angadvo)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $angadvo->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $angadvo->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $angadvo->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $angadvo->name}}</h3>
                            <span class="subtitle">{{ $angadvo->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#AED6F1, #F3F781);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskkader as $kader)
                    <h2 class="mb20">{{ $kader->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadepkader as $kakader)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kakader->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kakader->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kakader->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kakader->name}}</h3>
                            <span class="subtitle">{{ $kakader->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotakader as $angkader)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $angkader->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $angkader->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $angkader->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $angkader->name}}</h3>
                            <span class="subtitle">{{ $angkader->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#F3F781,#ABEBC6);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($desklugri as $lugri)
                    <h2 class="mb20">{{ $lugri->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadeplugri as $kalugri)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kalugri->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kalugri->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kalugri->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kalugri->name}}</h3>
                            <span class="subtitle">{{ $kalugri->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotalugri as $anglugri)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $anglugri->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $anglugri->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $anglugri->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $anglugri->name}}</h3>
                            <span class="subtitle">{{ $anglugri->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#ABEBC6, #81F781);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskpendidikan as $deskpend)
                    <h2 class="mb20">{{ $deskpend->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadeppendidikan as $kapend)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kapend->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kapend->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kapend->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kapend->name}}</h3>
                            <span class="subtitle">{{ $kapend->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotapendidikan as $angpend)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $angpend->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $angpend->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $angpend->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $angpend->name}}</h3>
                            <span class="subtitle">{{ $angpend->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#81F781, #8181F7);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskkominfo as $deskkom)
                    <h2 class="mb20">{{ $deskkom->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadepkominfo as $kakom)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kakom->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kakom->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kakom->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kakom->name}}</h3>
                            <span class="subtitle">{{ $kakom->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotakominfo as $angkom)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $angkom->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $angkom->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $angkom->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $angkom->name}}</h3>
                            <span class="subtitle">{{ $angkom->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <section aria-label="section-team" style="background-image: linear-gradient(#8181F7,#F5A9D0, #ffffff);">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 text-center">
                    @foreach ($deskdanus as $deskdan)
                    <h2 class="mb20">{{ $deskdan->departemen }}</h2>
                    @endforeach
                    <div class="spacer-single"></div>
                </div>
                <div class="clearfix"></div>
                <div class="sequence community-images center-block">
                    @foreach ($kadepdanus as $kadanus)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $kadanus->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $kadanus->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $kadanus->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $kadanus->name}}</h3>
                            <span class="subtitle">{{ $kadanus->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="sequence community-images center-block">
                    @foreach ($anggotadanus as $angdan)
                    <div class="col-md-3 sq-item wow text-center" style="margin:auto">
                        <div class="profile_pic text-center">
                            <figure class="picframe mb30">
                                <a class="image-popup" href="{{ asset('img/pengurus/anggota/'. $angdan->photo)}}">
                                    <span class="overlay-v">
                                        <span>{{ $angdan->deskripsi}}</span>
                                    </span>
                                </a>
                                <img src="{{ asset('img/pengurus/anggota/'. $angdan->photo)}}" class="img-responsive" alt="">
                            </figure>
                            <h3>{{ $angdan->name}}</h3>
                            <span class="subtitle">{{ $angdan->jabatan}}</span>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </section>
    <!-- section close -->
</div>

@include('frontend.layouts.footer')
@endsection