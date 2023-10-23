@extends('frontend.layouts.master')
@section('tittle','Login')

@section('content')

<div id="content" class="no-top no-bottom">
    <!-- section begin -->
    <section aria-label="section-login" class="full-height relative no-top no-bottom" data-stellar-background-ratio=".2" data-bgimage="url(/assets/images/background/0.jpg">

        <div id="particles-js"></div>

        <div class="overlay-bg t80">
            <div class="center-y fadeScroll relative" data-scroll-speed="4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <form class="form-border img-shadow" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="padding40" data-bgcolor="#fff">
                                    <h3 class="text-center"><b >LOGIN</b></h3>

                                    <div class="field-set">
                                        <label>Email</label>
                                        <input type='email' name='email' id='email' class="form-control " placeholder="Enter Email" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-warning">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="spacer-single"></div>

                                    <div class="field-set">
                                        <label>Password</label>
                                        <input type='password' name='password' id='password' class="form-control " placeholder="Enter Password">
                                    </div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong class="text-warning">{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="spacer-single"></div>
                                    <div id="submit" class="text-center">
                                        <input type="submit" value='Login' class="btn btn-custom color-2">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- section close -->
</div>

@section('script')
<script src="{{ asset('assets/js/particles.js')}}"></script>
<script src="{{ asset('assets/js/app.js')}}"></script>
    
@endsection
@endsection
