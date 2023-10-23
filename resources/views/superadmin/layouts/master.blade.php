<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
   <meta name="author" content="Creative Tim">
   <title>@yield('tittle')</title>
   <!-- Favicon -->
   <link rel="icon" href="{{ asset('assetss/img/brand/hima.png')}}" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('assetss/vendor/nucleo/css/nucleo.css') }}" type="text/css">
   <link rel="stylesheet" href="{{ asset('assetss/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
   <!-- Page plugins -->
   <link rel="stylesheet" href="{{ asset('assetss/vendor/animate.css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assetss/vendor/sweetalert2/dist/sweetalert2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assetss/vendor/select2/dist/css/select2.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assetss/vendor/quill/dist/quill.core.css') }}">
   @yield('styles')
   <!-- Argon CSS -->
   <link rel="stylesheet" href="{{ asset('assetss/css/argon.css?v=1.1.0')}}" type="text/css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 
 <body>
   <!-- Sidenav -->
   @include('superadmin.layouts.sidebar')
   <!-- Main content -->
   <div class="main-content" id="panel">
     <!-- Topnav -->
     @include('superadmin.layouts.navbar')
     <!-- Header -->
     <!-- Header -->

     @yield('content')

     @include('sweetalert::alert')
    </div>
   <!-- Argon Scripts -->
   <!-- Core -->
   <script src="{{ asset('assetss/vendor/jquery/dist/jquery.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/js-cookie/js.cookie.js') }}"></script>
   <script src="{{ asset('assetss/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
   <!-- Optional JS -->
   <script src="{{ asset('assetss/vendor/chart.js/dist/Chart.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/chart.js/dist/Chart.extension.js') }}"></script>
   <script src="{{ asset('assetss/vendor/sweetalert2/dist/sweetalert2.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
   <script src="{{ asset('assetss/vendor/select2/dist/js/select2.min.js')}}"></script>
   <script src="{{ asset('assetss/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
   <script src="{{ asset('assetss/vendor/nouislider/distribute/nouislider.min.js')}}"></script>
   <script src="{{ asset('assetss/vendor/quill/dist/quill.min.js')}}"></script>
   <script src="{{ asset('assetss/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
   <script src="{{ asset('assetss/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
   @yield('script')
   <!-- Argon JS -->
   <script src="{{ asset('assetss/js/argon.js?v=1.1.0') }}"></script>
   <!-- Demo JS - remove this in your project -->
   <script src="{{ asset('assetss/js/demo.min.js') }}"></script>
   
 </body>
 
 </html>