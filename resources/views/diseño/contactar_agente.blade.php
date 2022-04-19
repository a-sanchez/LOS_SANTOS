@extends('layouts.nav_black')
@push('styles')
    <style>
        #colorlib-main {
        width: 100%;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        }
        /* SOLO SE LE ASIGNA EL COLOR AL NOMBRE Y TELEFONO YA QUE EL ESITLO DE EMAIL VIENE EN LOS EXTENDS*/
        #nombre::placeholder{
        color:black;
        font-size:13px;
        }
        #telefono::placeholder{
        color:black;
        font-size:13px;}
        
        /*ASIGNARLE COLOR AL PLACEHOLDER EN UN TEXT AREA */
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: black;
            opacity: 1; /* Firefox */
            font-size:13px;
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

    </style>
@endpush
@section('body')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 section">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row mt-4" style="text-align:center;"">
                    <a style="color:#b0831e;font-size:40px;font-family:Cooper;font-weight:bold">Contactar Agente</a>
                </div>
                <div class="row">
                    <a style="font-family:Cooper;font-size:22px;">Contáctanos para que un agente de Los Santos te ayude a buscar una
                    propiedad fuera de nuestra página y puedas obtener nuestros servicios.</a>
                </div>
                <div class="row mt-4">
                    <a style="font-weight:bold;font-family:Cooper">Agente Gerardo del Bosque</a>
                </div>
                <div class="row">
                    <a>8443924199</a>
                </div>
            <form id="contactar_agente" onsubmit="addContacto();" style="padding-right: calc(var(--bs-gutter-x) * .5);
            padding-left: calc(var(--bs-gutter-x) * .5);">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <input type="text" class="form-control mt-5" name="nombre" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="row">
                            <input type="email" class="form-control mt-3" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="row">
                            <input type="tel" class="form-control mt-3" name="telefono" id="telefono" placeholder="Telefono (opcional)">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <textarea class=" mt-5" placeholder="Mensaje" name="mensaje" id="mensaje" style="border:solid 1px #B78B1E;padding-left: 10px;padding-top:8px" cols="30" rows="5" ></textarea>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-1" style="text-align:end">
                        <button type="submit" style="border:none;background-color:white;font-weight: bold;font-family:Cooper">ENVIAR</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </form>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row" style="text-align:center;background-color:white">
    <div class="col-4 mt-1 mb-2" style="padding-left: 30px;">
      <div class="row mt-4">
        <div class="col-2" style="padding-right: 0px;">
          <a style="font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="col-2" style="padding-right: 25px;padding-left: 0px;">
          <a style="font-size: 1.5rem;"><i class="fab fa-facebook-f"></i></i></a>
        </div>
      </div>
    </div>
    <div class="col-4 mt-4 mb-2">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 55px;">
    </div>
    <div class="col-4 mt-4 mb-2" style="text-align:end">
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
@push('scripts')
    <script>
        async function addContacto(){
            event.preventDefault();
            let form = new FormData(document.getElementById("contactar_agente"));
            let url="{{url('/contactos')}}";
            let init = {
                method: 'POST',
                body: form
            }
            let req = await fetch(url, init);
            if(req.ok){
                alert("Su solicitud ha sido enviada,un asesor se comunicara con usted");
                document.getElementById("contactar_agente").reset();

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