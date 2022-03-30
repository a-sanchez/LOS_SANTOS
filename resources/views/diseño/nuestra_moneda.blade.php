@extends('layouts.nav_black')
@push('styles')
    <style>
        body,html{
            
            background-image: url('images/final.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }
        .navbar{
            background-color: white;
        }
        /* #fondo3
        {
            background-image: url('images/objetivo2_copia.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 10vw;
            width: 100vw;
            filter: brightness(0.8);
        } */
        #fondo4
        {
            background-image: url('images/final.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 35vw;
            width: 100vw;
            filter: brightness(0.5);
        }
        #colorlib-main {
          width: 100%;
          float: right;
          -webkit-transition: 0.5s;
          -o-transition: 0.5s;
          transition: 0.5s;
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 0em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }
        @font-face{
            font-family: 'Kinlock Regular';
            src:url('css/FontsFree-Net-ps-kinlock-regular.ttf') format('truetype');
            font-style: normal;
            font-weight: normal;
        }
        .section {
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url("images/final.jpg");
            background-position: center; 
            background-repeat:no-repeat; 
            background-size: 250% 100%; 
            height: 30vw;
            width: 100vw;
        }
        .fondo_estilo{
            margin: 0;
            height: 50px;
        }
        .container-fluid{
            padding-left: 0px;padding-right: 0px;
        }
    </style>
@endpush

@section('body')
<div class="row mt-5 fondo_estilo">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-3">
                <img class="img-fluid" src='{{asset("images/moneda.png")}}' >
            </div>
            <div class="col-4"></div>
        </div>
    </div>
    <div class="col-4"></div>
</div>
<div class="row pt-5 pb-5" style="background-color: white">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="row" style="text-align:center">
            <a style="font-size:20px;font-family:Avenir Next Condensed;">
                Casas Los Santos le otorga una moneda digital a sus clientes que podrán <br>
                usar en nuestra plataforma para comprar o donar a su disposición.
            </a>
        </div>
        <div class="row mt-2" style="text-align:center">
            <a style="font-size:20px;font-weight:bold;font-family:Cormorant1">
                A esta moneda le denominamos como:
            </a>
        </div>
        <div class="row" style="text-align:center">
            <a style="color:#b0831e;font-size:40px;font-weight:bold;font-family:Cormorant1">“SANTOS”</a>
        </div>
        <div class="row mt-2 mb-1"></div>
        <div class="row" style="text-align:center;font-size:20px;font-family:Avenir Next Condensed">
            <a>Nuestra moneda es para agradecer a nuestros clientes e impulsarlos <br>
                a seguir con una vida llena de éxito.</a>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-3 mb-5">
    <div class="row mt-5 mb-5" style="display: flex;align-items: center;">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align:center">
            <h1  class="display-1" style="color:white;font-family:Cormorant1">Nuestro trabajo es darte el poder, y el tuyo usarlo a tu antojo</h1>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="row" style="text-align:center;background-color:white">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
</div>

@endsection

@push('scripts')
    <script></script>
@endpush