@extends('frontend.layouts.master')
@section('tittle','Berita HIMATIFA')

@section('content')
<section id="subheader" class="dark no-top no-bottom" data-bgimage="url(assets/images/abc.jpg)" data-stellar-background-ratio=".2">
    <div class="overlay-bg t80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>News</h1>
                    <ul class="crumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="sep"></li>
                        <li>News</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">
    <section aria-label="section-services">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @foreach ($beritahima as $berhima)
                    <div class="blog-item">
                        <img src="{{ asset('img/berita/'. $berhima->photo) }}" class="img-responsive preview" alt="">
                        <div class="text">
                            <h3><a href="{{ route('beritahima.show', $berhima->slug)}}">{{ $berhima->title }}</a></h3>
                            <p>{!! Illuminate\Support\Str::limit($berhima->konten, 300) !!}
                                @if (strlen(strip_tags($berhima->konten)) > 300)
                                <a href="{{ route('beritahima.show', $berhima->slug) }}" class="btn-link" >Read More</a>
                                  @endif
                            </p>
                            <div class="post-meta ">
                                <span class="post-date ">{{ $berhima->updated_at->diffForHumans() }}</span>
                                <span class="post-by">Admin HIMATIFA</span>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    <div class="spacer-single"></div>

                    <div class="text-center">
                        <ul class="pagination">
                            <li>{!! $beritahima->links() !!}</li>
                        </ul>
                    </div>
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
@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endsection