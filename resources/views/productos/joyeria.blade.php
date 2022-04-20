@extends('layouts.nav_black')
@push('styles')
<style>
  #colorlib-main {
    float: none;
    width: 100%;
  }

  footer {
    position: fixed;
    bottom: 25px;
  }


  .zoom {
    transition: transform .2s;
    height: 400px;
    width: 360px;
    filter: grayscale(100%);
  }

  .zoom:hover {
    transform: scale(1.2);
    filter: brightness(100%);
    opacity: 1;
  }

  .img {
    height: 280px;
    width: 100%;
  }

  .swiper {
    width: 100%;
    height: 100%;
  }

  .swiper-slide {
    width: 358px !important;
  }

  .form-control {
    border: 2px solid #B78B1E;
  }

  .colorlib-blog,
  .colorlib-work,
  .colorlib-about,
  .colorlib-services,
  .colorlib-contact {
    padding-top: 0em;
    padding-bottom: 0em;
    clear: both;
    width: 100%;
    display: block;
  }

  #caja4 {
    box-shadow: 10px 10px 30px 6px gray;
  }

  .diseño {
    box-shadow: 0px 0px 30px 15px rgb(80, 73, 73);
  }

  .words {
    word-break: break-all;
    text-decoration: none;
    color: black;
  }
</style>
@endpush
@section('body')
<div class="row">
  <div class="col-md-12" style="text-align:center">
    <a style="font-family:Cormorant2;font-size:60px;"> JOYERÍA</a>
  </div>
</div>
<div class="row mb-3">
  <div class="col-md-4"></div>
  <div class="col-md-4" style="text-align: center;">
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4">
        <select name="cantidad" id="cantidad" class="form-control" style="text-align:center" onclick="filtrado()">
          <option value="0" selected="selected" disabled hidden >
            @if($categorias=="1")
            TODOS
            @elseif($categorias=="2")
            1-10 Santos
            @elseif($categorias=="3")
            10-20 Santos
            @elseif($categorias=="4")
            20-30 Santos
            @elseif($categorias=="5")
            30-40 Santos
            @elseif($categorias=="6")
            40-50 Santos
            @endif
          </option>
          <option value="1">TODOS</option>
          <option value="2">1-10 Santos</option>
          <option value="3">10-20 Santos</option>
          <option value="4">20-30 Santos</option>
          <option value="5">30-40 Santos</option>
          <option value="6">40-50 Santos</option>
        </select>
      </div>
      <div class="col-md-4"></div>
    </div>
  </div>
  <div class="col-md-4"></div>
</div>
<div class="row">
  <div class="swiper">
    <div class="swiper-wrapper">

      @foreach($joyas as $joya)
      <div class="swiper-slide" style="width: 380px !important;">
        <div class="card zoom">
          <a onclick="modal({{$joya->id}})">
            <img src='{{$joya->imagen}}' class=" img-fluid img" style="object-fit: fill;">
          </a>
          <div class="card-body">
            <h5 class="card-title" style="font-family:Cooper;font-weight:bold">{{$joya->nombre}}</h5>
            <p class="card-text" style="font-family:Cooper;">{{number_format($joya->precio,0)}} SANTOS
            </p>
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
@if(Auth::check())
<div class="row">
  <div class="col-md-12" style="text-align:center">
    <a href="{{url('/carrito')}}" style="color:black;font-size:25px;text-decoration: none;">VER CARRITO DE COMPRA</a>
  </div>
</div>
@endif
<footer class="vw-100" style="padding-right: 15px;">
  <div class="row" style="text-align:center;background-color:white">
    <div class="col-4 mt-1 " style="padding-left: 30px;">
    <div class="row mt-2">
      <div class="col-2" style="padding-right: 0px;">
        <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.instagram.com/santo.vittoria/"><i class="fab fa-instagram"></i></a>
      </div>
      <div class="col-2" style="padding-left: 0px;">
        <a target="_blank" style="font-size: 1.5rem;color:black" href="https://www.facebook.com/profile.php?id=100077449766753" ><i class="fab fa-facebook-f"></i></i></a>
      </div>
      <div class="col-2" style="padding-left: 0px;">
        <a target="_blank" style="font-size: 1.5rem;color:black" href="http://youtube.com/channel/UCzbH4VQUr4k7MJLzDbkwiUg"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>
  <div class="col-4 mt-1">
    <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 55px;">
  </div>
  <div class="col-4 mt-2" style="text-align:end">
    <div class="row" style="padding-right: 5px;">
      <div class="col-11">
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
      <div class="col-1"></div>
      
    </div>
  </div>
</div>
</footer>

<form id="count_products" onsubmit="InsertProductjoya()">
  @csrf
  <!-- Modal -->
  <div class="modal bd-example-modal-xl" id="myModal" tabindex="-1" role="dialog"
    aria-labelledby="mmyExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl diseño">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" style="font-family:Cooper;font-size:25px;font-weight:bold" id="titulo_modal"></h5>
          <button type="button" class="btn-close" onclick="closeModal();"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" id="caja4">
                  <img class="img-fluid" id="modal-imagen"
                    style="height: 380px !important;width:100%;object-fit: cover;">
                </div>
                <div class="col-md-1"></div>
              </div>
            </div>
            <div class="col-md-5">
              <input type="text" id="id_producto" name="id_producto" style="display:none">
              <div class="row">
                <div class="col-md-12 mt-3" style="line-height: 1;">
                  <a style="font-family:Cooper;font-size:25px" id="joya_nombre"></a>
                </div>
                <div class="col-md-12">
                  <a style="font-family:Cooper;font-size:20px;color:#B78B1E" id="santos"></a>
                </div>
                <div class="col-md-12 mt-3 text-break">
                  <a style="font-size:20px;font-family:Cooper;" id="modelo_joyeria">
                  </a>
                </div>
                <div class="col-md-12 mt-2">
                  <a style="font-size:20px;font-family:Cooper;" id="material_joya">
                  </a>
                </div>
                <div class="row mt-5 mb-4">
                  <div class="col-md-3">
                    <input id="cantidad_comprada" onclick="cambio_inventario()" type="number" name="cantidad_comprada" value="0" min="0"
                      class="form-control">
                  </div>
                  <div class="col-md-7">
                  </div>
                </div>
              </div>
              <div class="row mb-2">
                <label style="font-size:12px;font-family:Cooper;border:none"> Cantidad Disponible:
                  <input id="inventario" name="inventario"
                    style="font-size:12px;font-family:Cooper;border:none">
                </label>
              </div>
            </div>
            <div class="col-md-1">
              <input type="hidden" name="precio" id="precio">
            </div>
          </div>
          @if(Auth::check())
          <div class="row mb-3">
            <input type="text" id="id_usuario" name="id_usuario" value="{{Auth::user()->id}}" style="display:none">
            <div class="col-md-6"></div>
            <div class="col-md-6">
              <button type="submit" class="btn" style="background-color:white;color:black;display: contents;font-family:Cooper; font-weight:bold"><a>
                <img class="imagen" width="30" heigth="30" src="{{asset("images/carrito.png")}}"></a>Agregar
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
          {{-- <button type="button" class="btn" style="background-color:white;color:black;display: contents;"><a href={{url("creditos/view_creditos")}}><i
            style="font-size:2rem;color:#b78b1e" id="shopping-cart" class="fas fa-shopping-cart"></i></a>Agregar al
          carrito</button> --}}
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
      document.getElementById("inventario").value = parseFloat(data.inventario).toFixed(0);
      document.getElementById("id_producto").value = data.id;
      document.getElementById("titulo_modal").innerHTML = "Categoría de Comprador/ JOYERIA/ " + parseFloat(data.precio).toFixed(0) + " Santos/ " + data.nombre
      document.getElementById("santos").innerHTML = parseFloat(data.precio).toFixed(0) + " SANTOS";
      document.getElementById("modal-imagen").src = data.imagen;
      document.getElementById("material_joya").innerHTML = "Material: " + data.material_joyeria;
      document.getElementById("modelo_joyeria").innerHTML = "Modelo: " + data.modelo_joyeria;
      document.getElementById("joya_nombre").value = data.nombre;
      document.getElementById("precio").value= data.precio;

      $("#myModal").toggle();

      }
    }

async function cambio_inventario() {
  event.preventDefault();
  let numero = parseInt(document.getElementById("cantidad_comprada").value);
  let inventario = parseInt(document.getElementById("inventario").value);
  let id = document.getElementById("id_producto").value;
  if(numero <= inventario){
    let resultado = (inventario-numero);
    let form = new FormData();
    let url="{{url('historial/{id}')}}".replace('{id}',id);
    let init = {
                method:"PUT",
                headers: {
                    'X-CSRF-Token': document.getElementsByName("_token")[0].value
                    , "Content-Type": "application/json"
                }
                , body: JSON.stringify({'inventario':resultado})
              }
    let req= await fetch(url,init);
    if(req.ok){
      "actualizado";
    }
    else{
        Swal.fire({
               icon: 'error',
               title: 'Error',
               text: "Error al autorizar"
             });
    }
    
  }
  else{
        Swal.fire({
               icon: 'error',
               title: 'Error',
               text: "No contamos con esa cantidad"
             });
    }
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
async function InsertProductjoya() {
event.preventDefault();
let numero = parseInt(document.getElementById("cantidad_comprada").value);
    let inventario = parseInt(document.getElementById("inventario").value);
    if(numero <= inventario){
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

async function filtrado(){
      event.preventDefault();
      let categoria = document.getElementById('cantidad').value;
      if(categoria != "0"){
       let form = new FormData();
       form.append('categoria','joyeria');
       form.append('filtrado',document.getElementById('cantidad').value);
       let url = '{{url("/joyeria/{categoria}")}}'.replace('{categoria}',categoria);
       let init = {
                   method:'POST',
                   headers: {
                     'X-CSRF-TOKEN': "{{csrf_token()}}",
                     'Content-Type':'application/json'
                  },
                  body:JSON.stringify(form)
       }
       let req = await fetch(url,init);
       if(req.ok){
         window.location.href=url;
       }
    }
  }
</script>
@endpush