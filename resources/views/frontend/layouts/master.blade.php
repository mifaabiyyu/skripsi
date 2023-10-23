<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <title>@yield('tittle')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Linea is Creative Website Template">
    <meta name="keywords" content="business, clean, creative, corporate, light, minimal, modern, portfolio, website, template">
    <meta name="author" content="">

    <!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<![endif]-->

    <!-- CSS Files
    ================================================== -->
    <link rel="icon" href="{{ asset('assetss/img/brand/hima.png')}}" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css')}}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" type="text/css">

    <!-- background -->
    <link rel="stylesheet" href="{{ asset('assets/css/bg.css')}}" type="text/css">

    <!-- color scheme -->
    <link rel="stylesheet" id="colors" href="{{ asset('assets/css/colors/orange.css')}}" type="text/css">
    <!-- RS5.0 Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{ asset('assetss/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
    @yield('styles')
    <!-- RS5.0 Layers and Navigation Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/revolution/css/navigation.css')}}">
	
	<link rel="stylesheet" href="{{ asset('assets/css/rev-settings.css')}}" type="text/css">

</head>

<body id="homepage">

    <div id="wrapper">

        <!-- header begin -->
        @include('frontend.layouts.navbar')
        <!-- header close -->

        <!-- content begin -->
        @yield('content')
        <!-- content close -->
        @include('sweetalert::alert')


        <a href="#" id="back-to-top"></a>
        <div id="preloader">
            <div class="s1">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>



    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('assets/js/easing.js')}}"></script>
    <script src="{{ asset('assets/js/owl.carousel.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.countTo.js')}}"></script>
    <script src="{{ asset('assets/js/validation.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{ asset('assets/js/enquire.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.stellar.min.js')}}"></script>
    <script src="{{ asset('assets/js/jquery.plugin.js')}}"></script>
    <script src="{{ asset('assets/js/typed.js')}}"></script>
    <script src="{{ asset('assets/js/typed-custom.js')}}"></script>
    <script src="{{ asset('assets/js/designesia.js')}}"></script>
    <script src="{{ asset('assetss/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    @yield('script')
    <!-- RS5.0 Core JS Files -->
    <script src="{{ asset('assets/revolution/js/jquery.themepunch.tools.min.js?rev=5.0')}}"></script>
    <script src="{{ asset('assets/revolution/js/jquery.themepunch.revolution.min.js?rev=5.0')}}"></script>

    <!-- RS5.0 Extensions Files -->
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script src="{{ asset('assets/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="{{ asset('assetss/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
    <!-- current page only scripts -->
    <script src="{{ asset('assets/js/typed.js')}}"></script>
    <script src="{{ asset('assets/js/typed-custom.js')}}"></script>
	
	<script>
        jQuery(document).ready(function () {
            // revolution slider
            jQuery("#revolution-slider").revolution({
                sliderType: "standard",
                sliderLayout: "fullwidth",
                delay: 5000,
                navigation: {
                    arrows: { enable: true }
                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                },
                spinner: "off",
                gridwidth: 1140,
                gridheight: 600,
                disableProgressBar: "on"
            });
        });
    </script>
</body>

</html>