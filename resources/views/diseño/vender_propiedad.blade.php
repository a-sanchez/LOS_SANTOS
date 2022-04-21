@extends('layouts.nav_black')
@push('styles')
    <style>
        #colorlib-main {
        width: 100%;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        }        }
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
      /* MOVILES EN HORIZONTAL O TABLES EN VERTICAL */
      @media (min-width:768px){
            .espacio{
                margin-top: 0rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                  top: 820px;
                }
            .imagen2{
                position: absolute;
                  top: 820px;
                }
            .imagen3{
            position: absolute;
              top: 1055px;
            }

            .imagen4{
            position: absolute;
              top: 1050px;
            } */
        }
        @media (min-width:1200px){
            .espacio{
                margin-top: 0rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 60px;
            }

            .imagen1{
                position: absolute;
                  top: 860px;
                }
            .imagen2{
                position: absolute;
                  top: 860px;
                }
            .imagen3{
            position: absolute;
              top: 1095px;
            }

            .imagen4{
            position: absolute;
              top: 1090px;
            }
        }
        @media(max-width:600px){
            .espacio{
                margin-top: 0rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            } 
        }
        /* Tblets en horizonal y escritorios normales */
        @media (min-width:768px) and (max-width:1200px){
            .espacio{
                margin-top: 0rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }
        }

        /* Móviles en horizontal o tablets en vertical */
        @media(max-width:767px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }
        }
        /*  Móviles en vertical */
        @media(max-width:480px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }
        }

        @media(max-width:450px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                  top: 1010px;
                }
            .imagen2{
                position: absolute;
                top: 1235px;
                }
            .imagen3{
            position: absolute;
              top: 1460px;
            }

            .imagen4{
            position: absolute;
              top: 1720px;
            } */
        }
        @media (min-width: 410px) and (max-width: 449px) {
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                top: 980px;
                }
            .imagen2{
                position: absolute;
                top: 1215px;
                }
            .imagen3{
            position: absolute;
              top: 1450px;
            }

            .imagen4{
            position: absolute;
              top: 1680px;
            } */
        }
        @media(max-width:400px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                top: 1120px;
                }
            .imagen2{
                position: absolute;
                top: 1350px;
                }
            .imagen3{
            position: absolute;
              top: 1590px;
            }

            .imagen4{
            position: absolute;
              top: 1840px;
            } */
        }
        @media(max-width:390px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                top: 1120px;
                }
            .imagen2{
                position: absolute;
                top: 1350px;
                }
            .imagen3{
            position: absolute;
              top: 1590px;
            }

            .imagen4{
            position: absolute;
              top: 1840px;
            } */
        }
        /* @media(min-width:351px)and(max-width:380px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 60px;
            }

            .imagen1{
                position: absolute;
                top: 1120px;
                }
            .imagen2{
                position: absolute;
                top: 1350px;
                }
            .imagen3{
            position: absolute;
              top: 1610px;
            }

            .imagen4{
            position: absolute;
              top: 1870px;
            }
        } */
        @media(max-width:350px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen1{
                position: absolute;
                top: 1120px;
                }
            .imagen2{
                position: absolute;
                top: 1350px;
                }
            .imagen3{
            position: absolute;
              top: 1610px;
            }

            .imagen4{
            position: absolute;
              top: 1870px;
            } */
        }
        @media(max-width:326px){
            .espacio{
                margin-top: 3rem !important;
            }
            .img-fluid {
              max-width: 100%;
              height: 55px;
            }

            /* .imagen4{
            position: absolute;
              top: 1895px;
            } */
        }
        

        /* @media(max-width:576px){
            .espacio{
                margin-top: 0rem !important;
            }
            .servicio{
                margin-right: 0px;
                padding-right: 0px;
                padding-left: 0px;
                margin-left: 0px;
            }
        }
        @media(min-width:576px){
            .espacio{
                margin-top: 3rem !important;
                
            }
        }
        @media(max-width:768px){
            .espacio{
                margin-top: 3rem !important;
            }
            .servicio{
                margin-right: 0px;
                padding-right: 0px;
                padding-left: 0px;
                margin-left: 0px;
            }
            .img-fluid {
              max-width: 100%;
              height: 45px;
            }
            .imagen1{
                position: absolute;
                top: 920px;
                }
            .imagen2{
                position: absolute;
                top: 1315px;
                }
            .imagen3{
            position: absolute;
            top: 1120px;
            }

            .imagen4{
            position: absolute;
            top: 1540px;
            }
             */
        }
       



    </style>
@endpush
@section('body')
<div class="container-fluid"> 
    <div class="row">
        <div class="col-md-2"></div>
    <div class="col-md-8 section">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row mt-4" style="text-align:center;"">
                    <a class="buscar" style="color:#b0831e;font-size:40px;font-family:Avenir Next Condensed;text-decoration:none;">¿Buscas incrementar tus posibilidades de venta?</a>
                </div>
                <div class="row mt-2" style="text-align:center">
                    <a style="font-family: Cooper;">Muestra tu propiedad a los mejores prospectos</a>
                </div>
                <div class="row mt-5" style="text-align:center">
                    <a style="font-weight:bold;font-family: Cooper;">¿Qué estas vendiendo?</a>
                </div>
        <form id="ventas" onsubmit="AddVenta()">
        @csrf
                    <div class="row mt-3">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <select class="form-control nuevo" name="producto" id="producto">
                                <option value="Casas">Casas</option>
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
                    <button style="border:none;background-color:white;font-weight: bold;" type="submit">ENVIAR</button>
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-5"></div>
<div class="row mt-5" style="text-align:center">
    <div class="col-md-12">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 70px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 70px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 70px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 70px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 70px;">
    </div>
    <div class="col-md-12">
        <h5 style="font-size: 30px;font-weight: bold;font-family:Cooper">SERVICIO AL CLIENTE</h5>
    </div>
</div>
<div class="row mt-5 mb-3">
        <div class="row mt-5">
            <div class="row servicio">
            {{-- division de columnas --}}
            <div class="col-md-1"></div>
            <div class="col-md-4">
            <div class="row solid" >
                <div class="col-md-1"></div>
                <div class="col-md-10 mt-3 mb-4">
                    <div class="col-2 imagen1">
                        <img src="{{asset('images/iconos/iconos-1.jpg')}}" class="img-fluid">
                    </div>
                    <div class="col-md-12 mt-4 mb-4">
                        <a style="font-family:Cooper;font-size:18px">Verificamos con nuestro grupo de abogados
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
                <div class="col-2 imagen3">
                    <img src="{{asset('images/iconos/iconos-3.jpg')}}" class="img-fluid">
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <a style="font-family:Cooper;font-size:18px"> Ofrecemos servicios profesionales de Análisis
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
        <div class="row solid espacio">
            <div class="col-md-1"></div>
            <div class="col-md-10 mt-3 mb-1">
                <div class="col-2 imagen2" >
                    <img src="{{asset('images/iconos/iconos-2.jpg')}}" class="img-fluid">
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <a style="font-family:Cooper;font-size:17px">
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
                <div class="col-2 imagen4">
                    <img src="{{asset('images/iconos/iconos-4.jpg')}}" class="img-fluid">
                </div>
                <div class="col-md-12 mt-4 mb-4">
                    <a style="font-family:Cooper;font-size:19px">
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
</div>
<div class="row" style="text-align:center;background-color:white;width:100% !important">
  <div class="col-4 mt-1 mb-2" s>
    <div class="row mt-2">
      <div class="col-3" style="padding-right: 0px;">
          <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.instagram.com/santo.vittoria/"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col-3" style="padding-left: 0px;">
          <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.facebook.com/profile.php?id=100077449766753" ><i class="fab fa-facebook-f"></i></i></a>
        </div>
        <div class="col-3" style="padding-left: 0px;">
          <a target="_blank" style="font-size: 1.5rem;color:black" href="http://youtube.com/channel/UCzbH4VQUr4k7MJLzDbkwiUg"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
  </div>
  <div class="col-4 mt-1 mb-2">
    <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 55px;">
  </div>
  <div class="col-4 mt-2 mb-2" style="text-align:end">
    <div class="row" >
        <a href="#" style="text-decoration: none;color: gray;font-family:Cooper">Aviso de Privacidad
          <br>
          Powered by<img src='{{asset("images/ntrance.jpeg")}}' alt="" >
          </a>
    </div>
  </div>
</div>
@endsection
@push('scripts')
<script>
    async function AddVenta(){
        event.preventDefault();
        let form = new FormData(document.getElementById("ventas"));
        let url="{{url('/ventas')}}";
        let init = {
            method: 'POST',
            body: form
        }
        let req = await fetch(url, init);
        if(req.ok){
                alert("Su solicitud ha sido enviada,un asesor se comunicara con usted");
                document.getElementById("ventas").reset();
                
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Error comunicarse con el administrador'
                });
            }

}
</script>
@endpush