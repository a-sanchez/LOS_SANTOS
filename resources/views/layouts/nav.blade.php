@extends('layouts.base')
@push('styles')
    <style>
        .navbar-light .navbar-nav .nav-link {
          color: white;
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

      .show {
      background-color:rgba(0, 0, 0, .5)!important;
      }


    </style>
@endpush
@section('menu')
<nav class="navbar navbar-expand-lg navbar-light " >
    <div class="container-fluid">
      <a class="navbar-brand" href="{{url('/')}}">
          <img style="width:50px;" src='{{asset("images/Isotipo-2.png")}}'>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" style="filter: invert(100%);" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 navbar-center" style="margin-left: 30px;text-align: center;" data-animation="center">
          <li class="nav-item">
            <a class="nav-link " aria-current="page" href="{{url('/objetivo')}}" style="padding-right: 25px;">Objetivo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="padding-right: 25px;">Propiedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/nuestra_moneda')}}" style="padding-right: 25px;"  aria-disabled="true">Nuestra Moneda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/contactar_agente')}}" style="padding-right: 25px;"  aria-disabled="true">Contactar Agente</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="{{url('/vender_propiedad')}}" style="padding-right: 25px;"  aria-disabled="true">Vender Propiedad</a>
          </li>
          <li class="nav-item">
            @if(Auth::check())
            <div class="dropdown">
              <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="color:white;font-size:12px">
                {{Auth::user()->name}}
                <br>
                {{Auth::user()->puntos}} SANTOS
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{url('/salir')}}">SALIR</a></li>
              </ul>
            </div>
            @else
            <a type="button" class="btn nav-link mt-1" style="color:rgb(253, 253, 253)" data-bs-toggle="modal" data-bs-target="#exampleModal">
              Ingresar
            </a>
            @endif
          </li>
        </ul>
      </div>
    </div>
  </nav>
 
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
    </script>
@endpush