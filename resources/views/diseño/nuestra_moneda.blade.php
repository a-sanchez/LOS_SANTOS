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

        
        @media(max-width: 767px){
            .ocultar{
            display:none;
        }
        }
        @media(max-width:600px){
            .ocultar{
            display:none;
        }
        }
        @media(max-width:450px){
            .ocultar{
            display:none;
        }
        }
        @media(min-width: 768px){
            .ocultar{
            display:none;
        }
        }
        @media(min-width: 768px) and (max-width: 1200px){
            .ocultar{
            display:none;
        }
        }
        @media (min-width: 1024px){
            .ocultar{
            display:none;
        }
        }
        @media(min-width: 1200px){
            .ocultar{
            display:flex;
        }
        }
    </style>
@endpush

@section('body')
<div class="row mt-5 fondo_estilo">
    <div class="col-4"></div>
    <div class="col-4">
        <div class="row ocultar">
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
            <a style="font-size:20px;font-family:Cooper;">
                Santo Vittoria le otorga una moneda digital a sus clientes que podrán usar <br>en nuestra plataforma a su disposición.<br>
                Con la moneda tendrán el poder de adquirir los productos y servicios que <br>ofrecemos o donar la cantidad que prefieran a diferentes causas sociales
            </a>
        </div>
        <div class="row mt-2" style="text-align:center">
            <a style="font-size:20px;font-weight:bold;font-family:Cooper">
                A esta moneda le denominamos como:
            </a>
        </div>
        <div class="row" style="text-align:center">
            <a style="color:#b0831e;font-size:40px;font-weight:bold;font-family:Cormorant1">“SANTOS”</a>
        </div>
        <div class="row mt-2 mb-1"></div>
        <div class="row" style="text-align:center;font-size:20px;font-family:Cooper">
            <a>Nuestra moneda es para festejar el éxito de nuestros clientes e impulsarlos a<br> tener una
                vida llena de éxito</a>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-3 mb-5">
    <div class="row mt-5 mb-5" style="display: flex;align-items: center;">
        <div class="col-md-1"></div>
        <div class="col-md-10" style="text-align:center">
            {{-- <h1  class="display-1" style="color:white;font-family:Cormorant1">Nuestro trabajo es darte el poder, y el tuyo usarlo a tu antojo</h1> --}}
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="row" style="text-align:center;background-color:white;width:100% !important;margin-left: 0px;margin-right: 0px;">
    <div class="col-4 mt-1 mb-2" s>
      <div class="row mt-2">
        <div class="col-3" style="padding-right: 0px;">
            <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.instagram.com/santo.vittoria/"><i class="fab fa-instagram"></i></a>
          </div>
          <div class="col-3" style="padding-left: 0px;">
            <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.facebook.com/profile.php?id=100077449766753" ><i class="fab fa-facebook-f"></i></i></a>
          </div>
          <div class="col-3" style="padding-left: 0px;">
            <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.youtube.com/channel/UCQXErDNKkurEz8VPm-UikeQ"><i class="fab fa-youtube"></i></a>
          </div>
      </div>
    </div>
    <div class="col-4 mt-1 mb-2">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 55px;">
    </div>
    <div class="col-4 mt-2 mb-2" style="text-align:end">
      <div class="row" >
          <a target="_blank" href="{{asset('aviso/AvisoPrivacidad_SV.pdf')}}" style="text-decoration: none;color: gray;font-family:Cooper">Aviso de Privacidad
            <br>
            Powered by<img src='{{asset("images/ntrance.jpeg")}}' alt="" >
            </a>
      </div>
    </div>
  </div>

@endsection

@push('scripts')
    <script></script>
@endpush