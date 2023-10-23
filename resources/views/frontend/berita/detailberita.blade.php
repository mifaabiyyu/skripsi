@extends('frontend.layouts.master')
@section('tittle')
{{ $showberita->title }}
@endsection
@section('content')
<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(/assets/images/abc.jpg)" data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $showberita->title }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <section aria-label="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-read">

                        <img src="{{ asset('img/berita/'. $showberita->photo) }}" class="img-responsive" alt="">

                        <div class="post-text">
                            <h3>{{ $showberita->title }}</h3>
                            <p>{!! $showberita->konten !!}</p>


                            <span class="post-date ">{{ $showberita->updated_at->diffForHumans() }}</span>
                            <span class="post-by">Admin HIMATIFA</span>

                        </div>

                    </div>

                    <div class="spacer-single"></div>


                </div>

                <div id="sidebar" class="col-md-3">
                    <div class="widget widget-post">
                        <h4>Recent Posts</h4>
                        <div class="small-border"></div>
                        <ul>
                            @foreach ($newss as $item)
                                <li><span class="date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at)->format('d M') }}</span><a href="{{ route('beritahima.show', $item->slug) }}">{{ $item->title }}</a></li>
                            @endforeach

                        </ul>
                    </div>

                    <div class="widget widget_tags">
                        <h4>Kategori</h4>
                        <div class="small-border"></div>
                        <ul>
                            @foreach ($kategori as $kate)
                                <li><a href="{{ route('kategori.beritahima', $kate->category)}}">{{ $kate->category}}</a></li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>
<!-- content close -->
<!-- content close -->
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection