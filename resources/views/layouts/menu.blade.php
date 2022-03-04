@extends('layouts.base')
@section('menu')
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 2px;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <ul class="navbar-nav">
            <li>
              <a class="nav-link active" aria-current="page" href="{{url('usuarios')}}">CATÁLAGO DE CLIENTES</a>
              <a class="nav-link active" href="{{url('historial/productos')}}">CATÁLAGO DE PRODUCTOS</a>
              <a class="nav-link active" href="{{url('/ordenes')}}">CATÁLAGO DE ORDENES</a>
              <a class="nav-link active " href="{{url('/salir')}}" >SALIR</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>
  
    <aside id="colorlib-aside" role="complementary" class="border" style="border: 1px solid #efc76e !important">
        <nav id="colorlib-main-menu" role="navigation">
            <div class="row">
                <div class="col-md-12">
                    <img class="img-fluid img-thumbnail" id="img" src='{{asset("images/Isotipo-1.png")}}'/>
                </div>
            </div>
            <ul>
                <li class="colorlib-active">
                        <li><a href="{{url('/usuarios')}}">Catálago de clientes</a></li>
                        <li><a href="{{url('/historial/productos')}}">Catálago de productos</a></li>
                        <li><a href="{{url('/ordenes')}}">Catálago de ordenes</a></li>
                        <li><a href="{{url('/salir')}}">Salir</a></li>
                </li>
            </ul>
        </nav>
    </aside>
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
