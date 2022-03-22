@extends('layouts.nav_black')

@push('styles')
    <style>
        body,html{
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }
        #colorlib-main {
          width: 100%;
        }
        @font-face{
            font-family: 'Kinlock Regular';
            src:url('css/FontsFree-Net-ps-kinlock-regular.ttf') format('truetype');
            font-style: normal;
            font-weight: normal;
        }
        @font-face{
          font-family: 'Avenir Next Condensed';
          src:url('css/Avenir Next Condensed.ttc') format('truetype');
          font-style: normal;
          font-weight: normal;
        }

        .casa{
            background-image: url('images/propiedades/casa.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: auto;
        }
        .edificio{
            background-image: url('images/propiedades/edificio.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            width: 100vw;
            height: auto;
        }
        .contenedor {
            position: relative;
            display: inline-block;
            text-align: center;
        }

        .centrado{
            position: absolute;
            top: 85%;
            left: 15%;
            transform: translate(-50%, -50%);
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 1em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }
        .centrado2{
            position: absolute;
            top: 93%;
            left: 27%;
            transform: translate(-50%, -50%);
        }
        .centrado3{
            position: absolute;
            top: 93%;
            left: 41%;
            transform: translate(-50%, -50%);
        }
        
    </style>
@endpush
@section('body')
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8" style="text-align:center;font-family:Avenir Next Condensed">
            <a class="display-3" style="text-decoration:none;color:black">Encuentra terrenos y casas según tus necesidades y deseos</a>
        </div>
        <div class="col-2"></div>
    </div>
    <div class="row mt-5">
        <div class="col-6 contenedor" style="padding-right: 0px;padding-left: 0px">
            <img src="{{asset('images/propiedades/casa1.jpg')}}" class="img-fluid" style="filter: brightness(0.6);">
            <div class="centrado h3" style="color:white;text-align:center;font-family:Avenir Next Condensed;font-weight:bold">Residencial<i style="font-size:auto;" id="arrow-right"  class="fas fa-arrow-right"></i></div>
            <div class="centrado2" style="color:white;">Te ayudamos a encontrar tu nuevo hogar</div>
        </div>
        
        <div class="col-6 contenedor" style="padding-right: 0px;padding-left: 0px">
            <img src="{{asset('images/propiedades/edificio7.jpg')}}" class="img-fluid" style="filter: brightness(0.7);">
            <div class="centrado h3" style="color:white;text-align:center;font-family:Avenir Next Condensed;font-weight:bold">Terrenos<i style="font-size:auto;" id="arrow-right"  class="fas fa-arrow-right"></i></div>
            <div class="centrado3" style="color:white;width: 100%;">Invierte en un terreno y obtén rentabilidad segura a largo plazo </div>
        </div>
    </div>
<div class="row" style="background-color:rgb(41, 40, 40);text-align:center;color:white">
<p class="mt-4">Para más información, da click <a href="{{url('/contactar_agente')}}" style="color:#B78B1E;text-decoration:none">aquí</a> ,un asesor se contactará contigo.</p>
</div>
<div class="row" style="text-align:center;">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
  </div>
@endsection