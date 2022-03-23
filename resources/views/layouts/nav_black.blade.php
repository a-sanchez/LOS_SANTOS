@extends('layouts.base')
@push('styles')
    <style>
        .navbar-light .navbar-nav .nav-link {
          color: black;
          font-size: 15px;
          font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar-nav.navbar-center {
          position: relative;
        }
        
        
      .form-control{
        border-color: #B78B1E;
      }
      textarea:focus, input:focus, input[type]:focus {
        border-color: #B78B1E;
        box-shadow: 0 1px 1px #e4c020 inset, 0 1px 8px #e4c020;
        outline: 0 none;
      }
      #email::placeholder{
        color:black;
      }

      #password::placeholder{
        color:black;
      }
      .navbar-light .navbar-nav .nav-link:hover  {
      color: #e7b22b;
      text-decoration:#e7b22b;
      border-bottom: 2px solid;
      font-weight: 600;
      
      }

     .boton:hover{
        color: #e7b22b !important;
        border-bottom: 2px solid #e7b22b;
        font-weight: 600;
      }


      
    </style>
@endpush
@section('menu')
<nav class="navbar navbar-expand-lg navbar-light " >
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">
          <img style="width:50px;" src='{{asset("images/Isotipo-3.png")}}'>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <div class="d-flex justify-content-between" style="width:100%;padding-left: 12px;">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-center" data-animation="center">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/objetivo')}}" >Objetivo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('/propiedades')}}" >Propiedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/nuestra_moneda')}}"   aria-disabled="true">Nuestra Moneda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/contactar_agente')}}"   aria-disabled="true">Contactar Agente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/vender_propiedad')}}"   aria-disabled="true">Vender Propiedad</a>
          </li>
        </div>

        <div class="d-flex">
          <li class="nav-item" style="list-style: none;">
            @if(Auth::check())
            <div class="dropdown mt-1">
              <button class="btn dropdown-toggle boton" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:black;font-size:14px">
                {{Auth::user()->name}}
                <br>
                {{Auth::user()->puntos}} SANTOS
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{url('/salir')}}">SALIR</a></li>
              </ul>
            </div>
            @else
            <a type="button" class="btn nav-link mt-1 boton" style="color:black;font-family:Arial, Helvetica, sans-serif" data-bs-toggle="modal" data-bs-target="#Modal">
              Ingresar
            </a>
            @endif
          </li>
        </div>

        </ul>
      </div>
    </div>
  </nav>
  <div class="modal fade"  id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <main>
      <div id="colorlib-main">
		  	<div class="colorlib-contact">
		  		<div class="container-fluid">
		  			<!-- titulo -->
            <div class="row">
		  				<div class="col-md-12">
		  					<h1 class="animate-box fadeInLeft animated" data-animate-effect="fadeInLeft">
                    @yield('title')
                </h1>
		  				</div>
		  			</div>
                 <!-- body -->
                 @yield("body")
	    			</div>
	    		</div>
	    	</div>
	    </div>
    </main> 
@endsection
@push('scripts')
    <script>
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