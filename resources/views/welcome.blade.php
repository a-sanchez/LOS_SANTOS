@extends('layouts.nav')
@push('styles')
    <style>
        body,html{
            background-image: url('images/background.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        }
        #colorlib-main {
          float:none;
          width: 100%;
        }
        footer {
         position: fixed;
         bottom: 25px;            
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
        .loader {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url('images/Isotipo-2.png') 50% 50% no-repeat rgba(0, 0, 0, 0.76);
            background-size: auto 100%;  
            opacity: 1;
        }
        
        #fondo{
          background-image: url('images/background.jpg');
          background-position: center;
          background-repeat:no-repeat; 
          background-size: cover; 
          height: 100%;
          width: 100%;
          filter: brightness(0.8);
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
        padding-top: 2em;
        padding-bottom: 0em;
        clear: both;
        width: 100%;
        display: block;}

        .row{
          margin-left: 0;
        }
        .zoom {
            transition: transform .2s; 
            height: 500px;
            width:330px;
            filter: grayscale(100%);
            opacity: 0.6;
        }

        .zoom:hover {
            transform: scale(1.1); 
            filter:brightness(85%);
            opacity:1;
        }
        .swiper {
          width: 100%;
          height: 500px;
        }
        .swiper-button-next{
          opacity:0;
        }
        .swiper-button-prev{
          opacity:0;
        }
        .swiper-button-next:hover{
          opacity:1;
          color: white;
        }
        .swiper-button-prev:hover{
          opacity:1;
          color: white;
        }
        .swiper-button-next.swiper-button-disabled, .swiper-button-prev.swiper-button-disabled {
          opacity: 0;
          cursor: auto;
          pointer-events: none;
        }

        .texto{
            position: absolute;
            top: 90%;
            left: 35%;
            transform: translate(-50%, -50%);
        }
        .texto_ropa{
          position: absolute;
            top: 90%;
            left: 35%;
            transform: translate(-50%, -50%);
        }

        .modal-header{
          border-bottom: 2px solid #B78B1E;
        }
        .modal-footer{
          border-top: 2px solid #B78B1E;
        }
    </style>
@endpush
@section('body')
<div class="loader">
    <H1 style="color:white">CARGANDO...</H1>
</div>
<div class="row mb-2">
    <div class="col-md-12 col-sm-4" style="text-align:center">
        <h1 style="color:white;font-family:Kinlock Regular;font-size:95px;">THE WORLD IS</h1>
    </div>
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10" style="text-align:center">
        <img class="img-fluid"src='{{asset("images/Yours.png")}}' >
    </div>
    <div class="col-md-1"></div>
</div>
<div class="row mt-5"></div>
<div class="row mt-5"></div>
<div style="width: 100%;">
    <div class="row mt-5">
        <div class="col-md-12" style="text-align:end">
            <a href="" type="link" style="color:white;text-decoration: underline 3px;font-size:20px">CHAT EN VIVO</a>
        </div>
    </div>
</div>
<div class="row mt-5"></div>

<div class="row" style="background-color:white">
        <nav class="navbar navbar-expand-lg navbar-light " >
            <div class="container-fluid">
              <a class="navbar-brand" href="#">
                  <img style="width:50px;" src='{{asset("images/Isotipo-3.png")}}'>
              </a>
              {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" style="filter: invert(100%);" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button> --}}
              <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-center" style="margin-left: 30px;text-align: center;" data-animation="center">
                  <li class="nav-item">
                    <a class="nav-link " style="color:black" aria-current="page" href="{{url('/objetivo')}}"  style="padding-right: 25px;">Objetivo</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:black" href="#" style="padding-right: 25px;">Propiedades</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:black" href="{{url('/nuestra_moneda')}}" style="padding-right: 25px;"  aria-disabled="true">Nuestra Moneda</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:black"  href="{{url('/contactar_agente')}}" style="padding-right: 25px;"  aria-disabled="true">Contactar Agente</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" style="color:black"  href="{{url('/vender_propiedad')}}" style="padding-right: 25px;"  aria-disabled="true">Vender Propiedad</a>
                  </li>
                  <li class="nav-item">
                    @if(Auth::check())
                    <div class="dropdown mt-1">
                      <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;font-size:12px">
                        {{Auth::user()->name}}
                        <br>
                      {{Auth::user()->puntos}} SANTOS
                      </button>
                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{url('/salir')}}">SALIR</a></li>
                      </ul>
                    </div>
                    @else
                    <a type="button" class="btn nav-link mt-1" style="color:black" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Ingresar
                    </a>
                    @endif
                    
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          {{-- MODAL DE INICIO DE SESION --}}
          <div class="modal fade"  id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <div class="col-md-11" style="text-align:center">
                    <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold;">Ingresa a tu perfil</h5>
                  </div>
                  <div class="col-md-1">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                </div>
                <form id="login" onsubmit="submitForm()">
                  @csrf
                  <div class="modal-body">
                    <div class="col-md-12" style="text-align: center;">
                      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
                     {{-- <a style="font-size: 3rem;"><i class="fas fa-user-circle" style="color:#B78B1E"></i></a> --}}
                    </div>
                    <div class="col-md-12" style="text-align:center">
                      <h5 style="color:#B78B1E;font-family:Avenir Next Condensed;font-weight:bold;font-size:21px">CUENTA</h5>
                    </div>
                    <div class="input-group col-md-12 mt-3">
                      <span class="input-group-text" style="background-color:#B78B1E;border-color: #B78B1E;"><a style="color:white"><i class="fas fa-envelope"></i></a></span>
                      <input type="text" placeholder="Email" id="email" class="form-control" style="text-align:center;color:black">
                    </div>
                    <div class="input-group col-md-12 mt-4 mb-5">
                      <span class="input-group-text" style="background-color:#B78B1E;border-color: #B78B1E;"><a style="color:white"><i class="fas fa-lock"></i></a></span>
                      <input type="password"placeholder="Contraseña" id="password" class="form-control" style="text-align:center;color:black">
                    </div>
                  </div>
                  <div class="modal-footer justify-content-center">
                    <button type="submit" class="btn" style="color:#B78B1E;font-weight:bold;font-size:21px">Continuar</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
</div>
<div class="row" style="text-align: center;background-color:white">
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
</div>
<div class="row " style="text-align: center;background-color:white">
  <h1 style="font-weight: bold;">UTILIZA TUS SANTOS</h1>
  <h1><br></h1>
</div>
<div class="row option" style="background-color:#212224;">
  <div class="col-md-12 mt-3 mb-3" style="background-color:#212224;">
  <h1 style="color:white;font-family:Avenir Next Condensed;font-size:50px;">Categorías de Comprador</h1>
  </div>
  <div class="row">
    <div class="swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <a href="{{url('/arte')}}"><img src='{{asset("images/Arte.jpg")}}' class="zoom"></a>
          <div class="texto" style="color:white;font-size:40px;font-family:Avenir Next Condensed">
            ARTE
            <a><i style="font-size:2rem;" id="arrow-right"  class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="swiper-slide">
          <a href="{{url('/relojes')}}"><img src='{{asset("images/Relojes.jpg")}}' alt="" class="zoom"></a>
          <div class="texto" style="color:white;font-size:40px;font-family:Avenir Next Condensed">
            RELOJES
            <a ><i style="font-size:2rem;" id="arrow-right"  class="fas fa-arrow-right"></i></a>
          </div>
          <i class="fa-solid fa-arrow-right"></i>
        </div>
        <div class="swiper-slide">
          <a href="{{url('/ropas')}}"><img src='{{asset("images/Ropa_Accesorios.jpg")}}' alt="" class="zoom"></a>
          <div class="texto_ropa" style="color:white;font-size:28px;font-family:Avenir Next Condensed">
            <a >ROPA Y ACCESORIOS<i style="font-size:2rem;" id="arrow-right"  class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="swiper-slide">
          <a href="{{url('/joyeria')}}">
            <img src='{{asset("images/Joyas.jpg")}}' alt="" class="zoom">
          </a>
          <div class="texto" style="color:white;font-size:40px;font-family:Avenir Next Condensed">JOYERÍA
            <a ><i style="font-size:2rem;" id="arrow-right"  class="fas fa-arrow-right"></i></a>
          </div>
        </div>
        <div class="swiper-slide">
          <a href="{{url('/vuelos')}}">
          <img src='{{asset("images/Viajes.jpg")}}' alt="" class="zoom">
          </a>
          <div class="texto" style="color:white;font-size:40px;font-family:Avenir Next Condensed">VIAJES
            <a ><i style="font-size:2rem;" id="arrow-right"  class="fas fa-arrow-right"></i></a>
          </div>
        </div>
      </div>
      <!-- Add Pagination -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </div>


    <div class="row mt-5" style="background-color:#212224;">
      <h1 style="color:white;font-family:Avenir Next Condensed;font-size:50px;">Categorías de Inversionista</h1>
    </div>
    <div class="row  mt-5" id="fondo" style="background-color:#212224;">
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="row mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-11 mb-5">
          <a style="color:white;font-size:40px;font-family:Avenir Next Condensed">Startups / Franquicias <i style="font-size:2rem"class="fas fa-long-arrow-alt-right"></i></a>
          <h5 style="color:white;font-family:Avenir Next Condensed;font-size:15px">136,842 LISTINGS </h5>
        </div>
      </div>
    </div>

    <div class="row mt-5" style="background-color:#212224;">
      <h1 style="color:white;font-family:Avenir Next Condensed;font-size:50px;">Categorías de Filantropía</h1>
    </div>
    <div class="row  mt-5" id="fondo" style="background-color:#212224;">
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="col-md-12 mt-5"></div>
      <div class="row mt-5">
        <div class="col-md-1"></div>
        <div class="col-md-11 mb-5">
          <a style="color:white;font-size:50px;font-family:Avenir Next Condensed">Proyectos <i style="font-size:2rem"class="fas fa-long-arrow-alt-right"></i></a>
          <h5 style="color:white;font-family:Avenir Next Condensed;font-size:15px">16,342 LISTINGS </h5>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row" style="text-align:center;background-color:white">
  <div class="col-md-12">
    <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
  </div>
</div>


@endsection
@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $(".loader").fadeOut(4000);
    });
    

    var swiper = new Swiper('.swiper', {
      slidesPerView: 4,
      spaceBetween: 0,
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    async function submitForm(){
       event.preventDefault();
       let form= new FormData(document.getElementById('login'));
       form.append('email',document.getElementById('email').value);
       form.append('password',document.getElementById('password').value);
       let url = "{{url('/login')}}";
       let init = {
         method: 'POST',
         body: form
       };
       let req = await fetch(url,init);
       if (req.ok){
         let res = await req.json();
         if(res==1){
           window.location.href='{{url("/historial")}}';
         }
         else{
          window.location.href='{{url("/")}}';
         }
        
       }
    }
    </script>
@endpush