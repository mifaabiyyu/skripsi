@extends('frontend.layouts.master')
@section('tittle')
@foreach ($showproker as $proker)
    {{ $proker->departemen }}
@endforeach
@endsection

@section('content')

<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(/assets/images/abc.jpg)" data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @foreach ($showproker as $prokertit)
                        <h1>{{ $prokertit->departemen }}</h1>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <!-- section begin -->
    <section aria-label="section-services">
        <div class="container">
            @foreach ($showproker as $prkr)
                <div class="row table">
                    <div class="padding40">
                        <div class="row">
                            <div class="text-center">
                                <img src="{{ asset('img/pengurus/anggota/'. $prkr->photo)}}" class="img-responsive" height="400px" width="700px" alt="" srcset="">
                            </div>
                        </div>
                        <div class="spacer-single"></div>
                        <p class="desk">{!! $prkr->deskripsi !!}</p>
                        
                    </div>
                    
                </div>
            @endforeach
            <div class="spacer-single"></div>
            
        </div>
    </section>
    <!-- section close -->
</div>

@include('frontend.layouts.footer')

@endsection