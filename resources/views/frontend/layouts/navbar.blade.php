<header>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- logo begin -->
                <div id="logo">
                    <a href="{{ route('landing.home') }}">
                        <img class="logo" src="{{ asset('assets/images/12.png')}}" alt="">
                        <img class="logo-2" src="{{ asset('assets/images/12.png')}}" alt="">
                    </a>
                </div>
                <!-- logo close -->

                <!-- small button begin -->
                <span id="menu-btn"></span>
                <!-- small button close -->

                <!-- mainmenu begin -->
                <nav>
                    <ul id="mainmenu">
                        <li>
                            <a href="{{ route('landing.home') }}">Home<span></span></a>
                        </li>
                        <li>
                            <a href="{{ route('pengurus.index') }}">Pengurus<span></span></a>
                        </li>
                        <li><a href="#">Program Kerja<span></span></a>
                            <ul>
                                @foreach ($dep as $depa)
                                    <li><a href="{{ route('proker.index', $depa->departemen)}}">{{ $depa->departemen }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('galleryhima.index')}}">Gallery<span></span></a>
                        </li>
                        <li>
                            <a href="{{ route('calendarhima.index')}}">Kalender Kegiatan<span></span></a> 
                        </li>
                        <li>
                            <a href="{{ route('beritahima.index')}}">Berita HIMATIFA<span></span></a>
                        </li>
                        <li><a href="{{ route('pendaftaran.hima')}}">Deteksi Kesalahan Ketik<span></span></a>
                            
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Login<span></span></a>
                        </li>
                    </ul>
                </nav>
                <!-- mainmenu close -->

            </div>
            

        </div>
    </div>
</header>

<div class="modal fade" id="saran" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Kritik & Saran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="contactForm" id='contact_form' class="form-underline" method="post" action="{{ route('kritiksaran.store')}}">
            @csrf
            <div class="field-set">
              <input type='text' name="nama" id="nama" class="form-control" placeholder="Nama Anda">
            </div>
            @error('nama')
            <div class="alert alert-danger">
                <strong>Maaf !</strong> {{ $message }}
              </div>
            @enderror
            <div class="field-set">
                <input type='text' name="npm" id="npm" class="form-control" placeholder="NPM Anda">
            </div>
            @error('npm')
            <div class="alert alert-danger">
                <strong>Maaf !</strong> {{ $message }}
              </div>
            @enderror
            <div class="field-set">
              <textarea type='text' name="kritik_saran" id="kritik_saran" class="form-control" placeholder="Kririk & Saran" rows="3"></textarea>
            </div>
                
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>
