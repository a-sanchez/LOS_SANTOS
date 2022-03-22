<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title') </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- LINKS CSS -->
    <link rel="stylesheet" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/css.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/icon.css')}}">
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    {{--NUEVA LIBRERIA PARA APRTADO DE CATERGORIAS  --}}
    {{-- <link rel="stylesheet"  href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/> --}}
    {{-- <script src="{{asset('js/main.js')}}"></script>
    <script src="{{ asset('js/sticky-kit.js')}}"></script>
    <script src="{{asset('js/jquery_002.js')}}"></script> --}}
    <!--IMPORTACION DE JS SWIPER-->
    {{-- <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> --}}
    <!-- IMPORTACION JQUERY -->
    <script src="{{ asset('lib/jquery/jquery.min.js') }}" ></script>
    <!-- IMPORTACION BOOTSTRAP -->
    <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" integrity="sha512-RXf+QSDCUQs5uwRKaDoXt55jygZZm2V++WUZduaU/Ui/9EGp3f/2KZVahFZBKGH0s774sd3HmrhUy+SgOFQLVQ==" crossorigin="anonymous"></script> --}}
    <!-- IMPORTACION SWEETALERT 2 -->
    <script src="{{ asset('lib/sweetalert/sweetalert2.all.min.js')}}"></script>
    <style>
        .offcanvas {
            visibility: visible !important;
            position:static !important;
        }
    </style>
    @stack('styles')
</head>
<body>
    @yield('menu')
</body>
@stack('scripts')
</html>