@extends('layouts.nav_black')
@push('styles')
    <style>
        /* body,html{
            background-image: url('images/background.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 100%;
            width: 100%;
            overflow-x: hidden;
        } */
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
        .zoom {
            transition: transform .2s; 
            height:400px;
            width:360px;
            filter: grayscale(100%);
        }

        .zoom:hover {
            transform: scale(1.2); 
            filter:brightness(100%);
            opacity:1;
        }
        .img{
          height: 280px;
          width: 100%;
        }
        .swiper {
          width: 100%;
          height:100%;
        }
        .swiper-slide{
          width: 358px !important;
        }
        .form-control {
          border: 2px solid #B78B1E;
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 0em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }
        #caja4{box-shadow: 10px 10px 30px 6px gray;}

        .diseño{
          box-shadow: 0px 0px 30px 15px rgb(80, 73, 73);
        }

        .words{
          word-break: break-all;
          text-decoration: none;
          color:black;
        }

        
        
    </style>
@endpush
@section('body')
<div class="row">
    <div class="col-md-12" style="text-align:center">
        <a style="font-family:Avenir Next Condensed;font-size:60px;">VUELOS</a>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="text-align: center;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <select name="cantidad" id="cantidad" class="form-control" style="text-align:center">
                    <option value="25">25 Santos</option>
                </select>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<div class="row">
    <div class="swiper" >
      <div class="swiper-wrapper">

          @foreach($vuelos as $vuelo)
          <div class="swiper-slide" style="width: 380px !important;">
            <div class="card zoom">
              <a onclick="modal({{$vuelo->id}})">
                <img src='{{$vuelo->imagen}}' class=" img-fluid img" style="object-fit: fill;" >
              </a>
              <div class="card-body">
                <h5 class="card-title" style="font-family:Avenir Next Condensed;font-weight:bold">{{$vuelo->nombre}}</h5>
                <p class="card-text" style="font-family:Avenir Next Condensed;">{{number_format($vuelo->precio,0)}} SANTOS</p>
              </div>
            </div>
          </div>
          @endforeach
      </div>
      <!-- Add Pagination -->
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
</div>
<div class="row">
  <div class="col-md-12" style="text-align:center">
    <a href="{{url('/carrito')}}" style="color:black;font-size:25px;text-decoration: none;">VER CARRITO DE COMPRA</a>
  </div>
</div>
<div class="row" style="text-align:center;background-color:white">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
</div>

<form id="count_products" onsubmit="InsertProductVuelo()">
  @csrf
  <!-- Modal --> 
  <div class="modal bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mmyExtraLargeModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl diseño">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-family:Avenir Next Condensed;font-size:25px" id="titulo_modal"></h5>
            <button type="button" class="btn-close" onclick="closeModal();"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" id="caja4">
                  <img class="img-fluid" id= "modal-imagen" style="height: 380px !important;width:100%;object-fit: cover;" >
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
            <div class="col-md-5">
              <input type="text" id="id_producto" name="id_producto" style="display:none">
                <div class="row">
                  <div class="col-md-12 mt-3" style="line-height: 1;">
                    <a style="font-family:Avenir Next Condensed;font-size:25px" id="vuelo_nombre"></a>
                  </div>
                  <div class="col-md-12">
                    <a style="font-family:Avenir Next Condensed;font-size:20px;color:#B78B1E" id="santos"></a>
                  </div>
                  <div class="col-md-12 mt-2 mb-4">
                    <a style="font-size:20px;font-family:Avenir Next Condensed;" id="descripcion" >
                    
                    </a>
                  </div>
                  <div class="col-md-12">
                    <a style="font-size:20px;font-family:Avenir Next Condensed;" id="fecha_inicio">
                    </a>
                  </div>
                  <div class="row mt-5 mb-4">
                    <div class="col-md-3">
                      <input id="cantidad_comprada" type="number" name="cantidad_comprada" value="0" min="0" class="form-control">
                    </div>
                    <div class="col-md-7">
                    </div>
                  </div>
                </div>
                <div class="row mb-2">
                  <label style="font-size:12px;font-family:Avenir Next Condensed;border:none"> Cantidad Disponible:
                    <input id="inventario" name="inventario" style="font-size:12px;font-family:Avenir Next Condensed;border:none">
                  </label>
                </div>
            </div>
            <div class="col-md-1"></div>
          </div>
          @if(Auth::check())
          <div class="row mb-3">
            <input type="text" id="id_usuario" name="id_usuario" value="{{Auth::user()->id}}" style="display:none">
            <div class="col-md-6"></div>
            <div class="col-md-6">
              <button type="submit" class="btn" style="background-color:white;color:black;display: contents;"><a><i
                    style="font-size:2rem;color:#b78b1e" id="shopping-cart" class="fas fa-shopping-cart"></i></a>Agregar
                al carrito</button>
            </div>
          </div>
          @else
          <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6" style="text-align:end">
              <h5 style="font-size:15px">Si desea ordenar inicie sesión</h5>
            </div>
          </div>
          @endif
        </div>
        <div class="modal-footer d-flex align-items-center">
          {{-- <button type="button" class="btn" style="background-color:white;color:black;display: contents;"><a href={{url("creditos/view_creditos")}}><i style="font-size:2rem;color:#b78b1e" id="shopping-cart"  class="fas fa-shopping-cart"></i></a>Agregar al carrito</button> --}}
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@push('scripts')

    <script type="text/javascript">
      
      async function modal(id){
        let url = "{{url('/datos/{id}')}}".replace('{id}',id);
        let req = await fetch(url);
        if (req.ok) {
        let data = await req.json();
        let date_inicio = new Date(data.fecha_inicio);
        let date_final = new Date(data.fecha_final);
        const months = ["Enero", "Febrero", "Marzo","Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", 
        "Octubre", "Noviembre", "Diciembre"];

        const formatDate = (date_inicio)=>{
            let formatted_date_inicio = date_inicio.getDate() + " " + months[date_inicio.getMonth()];
            return formatted_date_inicio;
        }

        const formatDate2 = (date_final)=>{
            let formatted_date_final = date_final.getDate() + " " + months[date_final.getMonth()];
            return formatted_date_final;
        }
        // console.log(formatDate(date));
        // console.log(data);
        document.getElementById("inventario").value = parseFloat(data.inventario).toFixed(0);
        document.getElementById("id_producto").value = data.id;
        document.getElementById("titulo_modal").innerHTML = "Categoría de Comprador/ Vuelos/ " + parseFloat(data.precio).toFixed(0) + " Santos/ " + data.nombre
        document.getElementById("santos").innerHTML = parseFloat(data.precio).toFixed(0) + " SANTOS";
        document.getElementById("modal-imagen").src = data.imagen;
        document.getElementById("descripcion").innerHTML = data.descripcion_vuelos;
        document.getElementById("vuelo_nombre").innerHTML = data.nombre;
        document.getElementById("fecha_inicio").innerHTML = "Fechas: " + formatDate(date_inicio) + " - " + formatDate2(date_final);

        // var modal = document.getElementById('')
        $("#myModal").toggle();

        }
        // .then(response => {
        //   let data = response.json();
        //   document.getElementById("modal-imagen").src = data.imagen;
        //   $("myModal").show();
        // })
      }
function closeModal() {
  $("#myModal").toggle();
}
    var swiper = new Swiper('.swiper', {
      slidesPerView: 3,
      pagination: {
        el: '.swiper-pagination',
        type: 'fraction',
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
async function InsertProductVuelo() {
  event.preventDefault();
  let numero = parseInt(document.getElementById("cantidad_comprada").value);
      let inventario = parseInt(document.getElementById("inventario").value);
      if(numero < inventario){
        let form = new FormData(document.getElementById("count_products"));
        let url="{{url('/carrito')}}";
        let init = {
          method: 'POST',
          body: form
        }
        let req = await fetch(url, init);
        if (req.ok){
          alert("El producto se agrego al carrito de producto");
          document.getElementById('count_products').reset();
          window.location.reload();
        }
        else{
          Swal.fire({
              icon: 'error',
              title: 'Error',
              text: "Error comunicarse con el administrador"
              });
        }
      }
      else{
        Swal.fire({
             icon: 'error',
             title: 'Error',
             text: "Lo sentimos, no contamos con la cantidad registrada"
             });
      }
}
    </script>
@endpush