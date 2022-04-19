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
          padding-top: 0em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }
        #fondo8{
                    background-image: url('images/objetivo2_copia.jpg');
                    background-position: center;
                    background-repeat:no-repeat; 
                    background-size: cover; 
                    filter: brightness(0.8);
                    width:100vw;
                }

        /* margin-left: 0px;
            margin-right: 0px;
            border-right-width: 0px;
            border-right-style: solid;
            padding-right: 150px;
            padding-left: 150px;
            margin-top: 100px;
            margin-bottom: 100px; 

            .texto1{
            font-size:60px;
            }
            .texto2{
            font-size:30px;
            }*/
            @media (min-width:576px) {  
                .poder{
                    margin-left: 0px;
                    margin-right: 0px;
                    border-right-width: 0px;
                    border-right-style: solid;
                    padding-right: 5rem !important;
                    padding-left: 5rem !important;
                    margin-top: 2rem !important;
                    margin-bottom: 5rem !important;
                    }
                    .texto1{
                    font-size:40px;
                    text-decoration: none;
                    }
                    .texto2{
                    font-size:25px;
                    text-decoration: none;
                    }
                    .celebrar{
                        height:230px;
                    }
                    .celebrar2{
                        height:230px;
                    }
                    .texto_nuestro{
                        font-size:30px;
                    }
            }
            @media(max-width:576px){
                .poder{
                    margin-left: 0px;
                    margin-right: 0px;
                    border-right-width: 0px;
                    border-right-style: solid;
                    padding-right: 9rem !important;
                    padding-left: 9rem !important;
                    margin-top: 5rem !important;
                    margin-bottom: 5rem !important;
                    }
                    .texto1{
                    font-size:15px;
                    text-decoration: none;
                    }
                    .texto2{
                    font-size:10px;
                    text-decoration: none;
                    }

                    .celebrar{display:none;

                    }
                    .celebrar2{
                        height:180px;
                    }
                    .texto_nuestro{
                        font-size:30px;
                    }
                    
            }

            @media (min-width: 768px){
                .poder{
                    margin-left: 0px;
                    margin-right: 0px;
                    border-right-width: 0px;
                    border-right-style: solid;
                    padding-right: 9rem !important;
                    padding-left: 9rem !important;
                    margin-top: 5rem !important;
                    margin-bottom: 5rem !important;
                    }
                    .texto1{
                    font-size:70px;
                    text-decoration: none;
                    }
                    .texto2{
                    font-size:30px;
                    text-decoration: none;
                    }
                    .celebrar2{
                        height:180px;
                    }
                    .texto_nuestro{
                        font-size:60px;
                    }
                    
            }
            @media (max-width: 768px) {
                #fondo3{
                    background-image: url('images/objetivo2_copia.jpg');
                    background-position: center;
                    background-repeat:no-repeat; 
                    background-size: cover; 
                    height: 70vw;
                    width: 100vw;
                    filter: brightness(0.8);
                }
                .poder{
                    margin-left: 0px;
                    margin-right: 0px;
                    border-right-width: 0px;
                    border-right-style: solid;
                    padding-right: 1rem !important;
                    padding-left: 2rem !important;
                    margin-top: 2rem !important;
                    margin-bottom: 5rem !important;
                    }
                    .texto1{
                    font-size:25px;
                    text-decoration: none;
                    }
                    .texto2{
                    font-size:15px;
                    text-decoration: none;
                    }
                    .celebrar{
                        display:none;
                    }
                    .celebrar2{
                        height:180px;
                    }
                    .texto_nuestro{
                        font-size:30px;
                    }
                    
            }

            

    </style>
@endpush
@section('body')
<div class="row" style="text-align:center">
    <div class="col-3">
        <div class="row">
            <div class="col-4" style="padding-left: 0px;">
                <img src='{{asset("images/isotipo_mitad2.png")}}' class="img-fluid">
            </div>
            <div class="col-8"></div>
        </div>
    </div>
    <div class="col-6">
        <img src='{{asset("images/celebramos.png")}}' class="img-fluid">
    </div>
    <div class="col-3">
        <div class="row">
            <div class="col-8">
            </div>
            <div class="col-4" style="padding-right: 0px;">
                <img src='{{asset("images/isotipo_mitad.png")}}' class="img-fluid">
            </div>
        </div>
    </div>
    {{-- <div class="col-md-3">
        <img src='{{asset("images/Isotipo-1.png")}}' class="img-fluid celebrar">
    </div>
    <div class="col-md-6">
        <h5  style="font-family:Avenir Next Condensed" class="texto_nuestro">Celebramos el éxito de nuestros clientes</h5>
    </div>
    <div class="col-md-3">
        <img src='{{asset("images/Isotipo-1.png")}}' class="img-fluid celebrar2">
    </div> --}}
</div>
{{-- <div class="row mt-2" style="text-align:center">
    <div class="col-md-12">
        <h5 style="color:#b0831e;font-weight:bold;font-size:28px;font-family:Avenir Next Condensed">En Casas Los Santos buscamos la grandeza dentro de la vida.</h5>
    </div>
</div>
<div class="row" style="text-align:center">
    <div class="col-md-3"></div>
    <div class="col-md-6" style="font-size:25px;font-family:cursive">Filosofía: Siempre más y nunca menos.</div>
    <div class="col-md-3"></div>
</div> --}}
<div class="row mt-4" style="text-align:center">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <h5 style="font-family:Cooper;">
            La compra de una propiedad es un evento que debe de celebrarse y Los Santos<br>
            lo hace a través de monedas digitales que podrás utilizar en nuestra plataforma<br>
            para comprar o ayudar a otras personas a tu disposición.</h5>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-5" id="fondo8" style="text-align:center">
    <div class="row mb-5 d-flex" >
        <div class="col-12">
            <img src='{{asset("images/poder.png")}}' class="img-fluid">
        </div>
    </div>
</div>
<div class="row" style="text-align:center;background-color:white">
    <div class="col-4 mt-1 mb-2" style="padding-left: 30px;">
      <div class="row mt-2">
        <div class="col-2" style="padding-right: 0px;">
          <a style="font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col-2" style="padding-right: 25px;padding-left: 0px;">
          <a style="font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></i></a>
        </div>
      </div>
    </div>
    <div class="col-4 mt-1 mb-2">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 55px;">
    </div>
    <div class="col-4 mt-2 mb-2" style="text-align:end">
      <div class="row" style="padding-right: 5px;">
        <div class="col-12">
          <a href="#" style="text-decoration: none;color: gray;font-family:Cooper">Aviso de Privacidad</a>
          <div class="row">
            <div class="col-8"></div>
            <div class="col-3" style="padding-right: 0px;">
              <a href="#" style="text-decoration: none;color: gray;font-family:Cooper">Powered by</a>
            </div>
            <div class="col-1" style="padding-left: 2px;">
              <a><img src='{{asset("images/ntrance.jpeg")}}' alt="" ></a>
            </div>
          </div>
        </div>
  
      </div>
    </div>
  </div>
@endsection