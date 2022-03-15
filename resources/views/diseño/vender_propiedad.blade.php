@extends('layouts.nav_black')
@push('styles')
    <style>
        #colorlib-main {
        width: 100%;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        }
        @font-face{
          font-family: 'Avenir Next Condensed';
          src:url('css/Avenir Next Condensed.ttc') format('truetype');
          font-style: normal;
          font-weight: normal;
        }
        /* SOLO SE LE ASIGNA EL COLOR AL NOMBRE Y TELEFONO YA QUE EL ESITLO DE EMAIL VIENE EN LOS EXTENDS*/
        #nombre::placeholder{
        color:black;
        }
        #telefono::placeholder{
        color:black;}
        
        /*ASIGNARLE COLOR AL PLACEHOLDER EN UN TEXT AREA */
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: black;
            opacity: 1; /* Firefox */
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 0em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }

        .section{
           box-shadow: 28px 28px 15px #ededed;
        }
        textarea:focus, input:focus, input[type]:focus {
        border-color: #B78B1E;
        box-shadow: 0 1px 1px #e4c020 inset, 0 1px 8px #e4c020;
        outline: 0 none;
      }

      .nuevo select:focus{
        border-color: #B78B1E;
        box-shadow: 0 1px 1px #e4c020 inset, 0 1px 8px #e4c020;
        outline: 0 none;
      }
      .solid {border-style: solid;border-color: #b0831e}

    </style>
@endpush
@section('body')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 section">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row mt-4" style="text-align:center;"">
                    <a style="color:#b0831e;font-size:40px;font-family:Avenir Next Condensed">¿Buscas incrementar tus posibilidades de venta?</a>
                </div>
                <div class="row mt-2" style="text-align:center">
                    <a>Muestra tu propiedad a los mejores prospectos</a>
                </div>
                <div class="row mt-5" style="text-align:center">
                    <a style="font-weight:bold">¿Qué estas vendiendo?</a>
                </div>
                <div class="row mt-3">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <select class="form-control nuevo" name="venta" id="venta">
                            <option value="Residencial">Casas</option>
                            <option value="Terrenos">Terrenos</option>
                        </select>
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                    <div class="col-md-3"></div>
                </div>
                <div class="row mb-3">
    
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row mb-5" style="text-align:center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <button style="border:none;background-color:white;font-weight: bold;">ENVIAR</button>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-5"></div>
<div class="row mt-5">
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
</div>
<div class="row" style="text-align:center">
    <div class="col-md-12">
        <h5 style="font-size: 30px;font-weight: bold;font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">SERVICIO AL CLIENTE</h5>
    </div>
</div>
<div class="row mt-5">
<div class="row">
{{-- division de columnas --}}
<div class="col-md-1"></div>
<div class="col-md-4">
    <div class="row solid" >
        <div class="row">
            {{-- <img src="{{asset("images/iconos/document.jpg")}}" style="height: 60px;width: 80px;position: absolute;top: 825px;left: 130px;"> --}}
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-3 mb-3">
            <div class="col-md-12 mt-4 mb-4">
                <a style="font-family:venir Next Condensed;font-size:18px">Verificamos con nuestro grupo de abogados
                    que la documentación de su inmueble esté
                    en orden.
                </a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row mt-5"></div>
    <div class="row solid">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-3 mb-3">
            <div class="col-md-12 mt-4 mb-4">
                <a style="font-family:venir Next Condensed;font-size:18px"> Ofrecemos servicios profesionales de Análisis
                    de Mercado Comparativo personalizado a tu
                    inmueble.
                </a>
                </div>
            </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="col-md-2"></div>
<div class="col-md-4">
    <div class="row solid">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-3 mb-3">
            <div class="col-md-12 mt-4 mb-4">
                <a style="font-family:venir Next Condensed;font-size:17px">
                    Nuestra marca enfatiza la atención al cliente.
                    Por eso brindamos asesoría legal con total disponibilidad durante el transcurso de la venta.    
                </a> 
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
    <div class="row mt-5"></div>
    <div class="row solid">
        <div class="col-md-1"></div>
        <div class="col-md-10 mt-3 mb-3">
            <div class="col-md-12 mt-4 mb-4">
                <a style="font-family:venir Next Condensed;font-size:19px">
                    Todo es respaldado de un plan de mercado
                    elaborado por agencias de marketing de
                    primer nivel.
                </a>
            </div>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>
<div class="col-md-1"></div>
</div>
<div class="row mt-2" style="text-align:center;background-color:white;">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
</div>
@endsection
@push('scripts')
    
@endpush