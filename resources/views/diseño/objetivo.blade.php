@extends('layouts.nav_black')
@push('styles')
    <style>
        #colorlib-main {
        width: 100%;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        }
        body,html{
            
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }
        #fo
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
        #fondo3
        {
            background-image: url('images/objetivo2_copia.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 40vw;
            width: 100vw;
            filter: brightness(0.8);
        }
        .solid {border-style: solid;border-color: #b0831e}
        #trans{
            background-color: rgba(0, 0, 0, .5);
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 2em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }
    </style>
@endpush
@section('body')
<div class="row" style="text-align:center">
    <div class="col-md-3">
        <img src='{{asset("images/Isotipo-1.png")}}' class="img-fluid" style="height:230px;">
    </div>
    <div class="col-md-6">
        <h5 style="font-size:80px;font-family:Avenir Next Condensed">Celebramos el éxito de nuestros clientes</h5>
    </div>
    <div class="col-md-3">
        <img src='{{asset("images/Isotipo-1.png")}}' class="img-fluid"style="height:230px;">
    </div>
</div>
<div class="row mt-2" style="text-align:center">
    <div class="col-md-12">
        <h5 style="color:#b0831e;font-weight:bold;font-size:28px;font-family:Avenir Next Condensed">En Casas Los Santos buscamos la grandeza dentro de la vida.</h5>
    </div>
</div>
<div class="row" style="text-align:center">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="font-size:25px;font-family:cursive">Filosofía: Siempre más y nunca menos.</div>
    <div class="col-md-3"></div>
</div>
<div class="row mt-5"></div>
<div class="row mt-5" style="text-align:center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h5 style="font-size:25px;font-family:'Times New Roman', Times, serif">La compra de una propiedad es un evento que debe de celebrarse y Los Santos lo hace a través de monedas digitales que podrás utilizar en nuestra plataforma para comprar o ayudar a otras personas a tu disposición.</h5>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-5"  id="fondo3" style="text-align:center">
    {{-- <img style="width:130px;position: absolute;top: 35px;left: 630px;" src='{{asset("images/Isotipo-1.png")}}'> --}}
    <div class="row mt-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row mt-5 solid" id="trans">
                <p></p>
                <p></p>
                <p></p>
                <a style="color:#b0831e;font-size:60px;font-family:Kinlock Regular">
                    EL PODER ES TUYO
                </a>
                <a style="color:white;font-size:30px;">Recuerda; Siempre más y nunca menos </a>
                <p></p>
                <p></p>
                <p></p>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
<div class="row" style="text-align:center;background-color:white">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
</div>
@endsection