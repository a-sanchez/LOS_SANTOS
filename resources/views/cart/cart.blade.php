@extends('layouts.nav_black')
@push('styles')
    <style>
         #colorlib-main {
          float:none;
          width: 100%;
        }
        .border {
          border: 3px solid #b0831e !important;
        }
        .border_bajo{
            border-bottom:3px solid #b0831e !important;
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
        .diseño{
            box-shadow: 1px 1px 26px 2px rgba(80, 73, 73, 0.67);
        }
    </style>
@endpush
@section('body')
<div class="row" style="border-color:black">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row border">
            <div class="col-md-12 mt-2">
                <div class="row mt-3 ms-3 me-3 mb-3 diseño">
                    <div class="col-md-12">
                        <div class="row mt-5 ms-3 me-3 mb-3">
                            <div class="col-md-12">
                                <a href="#" style="text-decoration: none;color: black;font-size: 30px;font-family: 'Avenir Next Condensed';"><i style="font-size:2rem;color:#b78b1e" id="shopping-cart"  class="fas fa-shopping-cart"></i> Carrito de Compra </a>
                            </div>
                            @if(sizeof($ordenes)==0)
                            <h5 class="mt-5 mb-5" style="font-weight:bold">El carrito No cuenta con productos</h5>
                            @else
                            <input type="hidden" id="santos_actuales" value="{{Auth::user()->puntos}}" oninput="new_valor();">
                            <h5 id="santos_nuevos" class="mt-2" oninput="new_valor();"><b>Cantidad de Santos:</b> {{$cantidad_esperada}}</h5>
                            <input type="hidden" id="totales" value="{{$cantidad_esperada}}" oninput="new_valor();">
                            <form id="form_cantidades">
                                <div class="row">
                                <input type="hidden" id="fecha" name="fecha" value="{{\Carbon\Carbon::parse($ordenes[0]->created_at)->format('Y/m/d')}}">
                                @if($ordenes[0]->folio==null || $ordenes[0]->folio=="")
                                <input type="hidden" value="1">
                                @elseif(date('Y-m-d',strtotime($ordenes[0]->created_at)) == date('Y-m-d',strtotime($date)))
                                <input type="hidden" value="{{$ordenes[0]->folio}}">
                                @else
                                <input type="hidden" value="{{$folio}}">
                                @endif
                                @foreach($ordenes as $orden)
                                    @if($orden->categoria=='arte')
                                        <div class="col-md-6">
                                            <div class="row mt-5">
                                                <div class="col-md-5">
                                                    <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                </div>
                                                <div class="col-md-7" style="align-content: center;display: flex;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                        </div>
                                                        <div class="col-md-12 mt-2"></div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">{{$orden->descripcion_arte}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Obra: {{$orden->obra}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Autor: {{$orden->autor}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Medidas: {{$orden->medidas}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Material: {{$orden->material_arte}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3" style="align-items: center;display:flex;">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <input id="cantidad_comprada-{{$orden->id}}" type="number" name="cantidad_comprada" precio ="{{$orden->precio}}"oninput="new_valor();" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control numeros" onchange="cambio_cantidad({{$orden->id}})">
                                                    <input type="hidden" id="inventario_back-{{$orden->id}}" value="{{$orden->inventario_back}}">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                    @elseif($orden->categoria=='relojes')
                                        <div class="col-md-6">
                                            <div class="row mt-5">
                                                    <div class="col-md-5">
                                                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-7" style="align-content: center;display: flex;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px"> Modelo: {{$orden->modelo_reloj}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Correa:{{$orden->correa}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Genero: {{$orden->genero_reloj}}</h5>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input style="text-align:center" id="cantidad_comprada-{{$orden->id}}"  precio ="{{$orden->precio}}"oninput="new_valor();" type="number" name="cantidad_comprada" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control numeros" onchange="cambio_cantidad({{$orden->id}})">
                                                        <input type="hidden" id="inventario_back-{{$orden->id}}" value="{{$orden->inventario_back}}">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                            </div>
                                    @elseif($orden->categoria=='ropa')
                                                <div class="col-md-6">
                                                    <div class="row mt-5">
                                                        <div class="col-md-5">
                                                            <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-7" style="align-content: center;display: flex;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px"> Modelo: {{$orden->modelo_ropa}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px">{{$orden->genero_reloj}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px">Color: {{$orden->color}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="align-items: center;display:flex;">
                                                </div>
                                                <div class="col-md-3" style="align-items: center;display:flex;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input style="text-align:center" id="cantidad_comprada-{{$orden->id}}" precio ="{{$orden->precio}}"oninput="new_valor();" type="number" name="cantidad_comprada" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control numeros" onchange="cambio_cantidad({{$orden->id}})">
                                                            <input type="hidden" id="inventario_back-{{$orden->id}}" value="{{$orden->inventario_back}}">
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                                    </div>
                                                </div>
                                                @elseif($orden->categoria=='joyeria')
                                                    <div class="col-md-6">
                                                        <div class="row mt-5">
                                                            <div class="col-md-5">
                                                                <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-7" style="align-content: center;display: flex;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                                    </div>
                                                                    <div class="col-md-12 mt-1"></div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="font-size:18px"> Modelo: {{$orden->modelo_joyeria}}</h5>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="font-size:18px">Material: {{$orden->material_joyeria}}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" style="align-items: center;display:flex;">
                                                    </div>
                                                    <div class="col-md-3" style="align-items: center;display:flex;">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="text-align:center" id="cantidad_comprada-{{$orden->id}}" precio ="{{$orden->precio}}"oninput="new_valor();" type="number" name="cantidad_comprada" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control numeros" onchange="cambio_cantidad({{$orden->id}})">
                                                                <input type="hidden" id="inventario_back-{{$orden->id}}" value="{{$orden->inventario_back}}">
                                                            </div>
                                                            <div class="col-md-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                    @elseif($orden->categoria=='vuelos')
                                        <div class="col-md-6">
                                            <div class="row mt-5">
                                                    <div class="col-md-5">
                                                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-7" style="align-content: center;display: flex;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                            </div>
                                                            <div class="col-md-12 mt-1"></div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">{{$orden->descripcion_vuelos}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Fechas:{{$orden->fecha_inicio}}-{{$orden->fecha_final}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input style="text-align:center" id="cantidad_comprada-{{$orden->id}}" precio="{{$orden->precio}}" oninput="new_valor();" type="number" name="cantidad_comprada" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control numeros" onchange="cambio_cantidad({{$orden->id}})">
                                                        <input type="hidden" id="inventario_back-{{$orden->id}}" value="{{$orden->inventario_back}}">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach    
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    <div class="col-md-2">
                                        <div class="row mb-1">
                                            <div class="col-md-12">
                                                <h5 style="font-size:18px;color:#b78b1e;float: right;">Total Santos</h5>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-md-12 border_bajo">
                                                <h5 class="mb-3" style="font-size:18px;float: right;" id="total_final">
                                                ${{number_format($total,2)}}
                                                </h5>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-12">
                                                <button onclick="inventario({{$ordenes}})"style="font-size:20px;color:#b78b1e;float: right;font-weight:bolder;text-decoration:none" type="button">CONTINUAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> 
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="row mt-4" style="text-align:center">
        <div class="col-md-12">
            <a href="{{url('/')}}" style="color:black;text-decoration:none;font-size:20px">SEGUIR COMPRANDO</a>
        </div>
    </div>
</div>
@endsection
@push('scripts') 
<script>
    let bandera=0;
    async function inventario(ordenes){
        ordenes.forEach(async(element)=>{
             event.preventDefault();
             console.log(element.producto);
      });
    }
    async function cantidad(id){
        event.preventDefault();
        let totales = document.getElementById("totales").value;
        // let puntos = {{Auth::user()->puntos}};
        // let newpoints = (puntos - total2).toFixed(2);
         let form = new FormData();
         form.append('puntos',totales);
         let url = "{{url('usuarios/{id}')}}".replace('{id}',id);
         let init = {
                 method:"PUT",
                 headers:{
                     'X-CSRF-Token':document.getElementsByName("_token")[0].value
                         , "Content-Type": "application/json"
                 },
                 body:JSON.stringify({'puntos':totales})
             }
             let req = await fetch(url,init);
             if(req.ok){
                 console.log('ok')
             }
             else{
                 Swal.fire({
                         icon: 'error'
                         , title: 'Error'
                         , text: 'Error al actualizar puntos'
                     , });
             }

    }
    let flag=0;
    function actualizar(ordenes,folio,fecha){
         ordenes.forEach(async(element)=>{
             event.preventDefault();
             let url = "{{url('carrito/{id}')}}".replace('{id}',element.id);
             let init = {
                 method: 'PUT',
                 headers: {
                     'X-CSRF-Token' : "{{ csrf_token() }}",
                         'Content-Type':'application/json'
                 },
                 body:JSON.stringify({'folio':folio,'fecha':fecha})
                }
             let req = await fetch(url,init);
             if(req.ok){
                 if(flag==0){
                 flag++;
                 }
             }
             else{
                 Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: "Error al actualizar estatus"
                      });
             }
      });
    }
 function new_valor(precio,id) {
     var total=0;
 let valor = document.getElementsByClassName("numeros");
 for(let element of valor){
     total += (element.getAttribute("precio")*element.value);
 }
     var formatter = new Intl.NumberFormat('en-US', {
       style: 'currency',
       currency: 'USD',
     });
     document.getElementById("total_final").innerHTML=formatter.format(total);
    let santos = parseFloat(document.getElementById("santos_actuales").value);
    let santos_precio = parseFloat(total);
    document.getElementById("santos_nuevos").innerHTML=(santos - santos_precio);
    document.getElementById("totales").value=(santos - santos_precio);
}


    async function cambio_cantidad(id)
    {
        event.preventDefault();
        let numero = parseInt(document.getElementById(`cantidad_comprada-${id}`).value);
        let inventario = parseInt(document.getElementById(`inventario_back-${id}`).value);
        let cantidad = document.getElementById(`cantidad_comprada-${id}`).value;
        if(numero<=inventario){
            let form = new FormData();
            form.append('id',id);
            form.append('cantidad_comprada',cantidad);
            let url="{{url('carrito/{id}')}}".replace('{id}',id);
            let init = {
                method:"PUT",
                headers:{
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        , "Content-Type": "application/json"
                },
                body:JSON.stringify(Object.fromEntries(form))
            }
            let req = await fetch(url,init);
            if(req.ok){
                console.log("ok");
            }
            else{
                Swal.fire({
                        icon: 'error'
                        , title: 'Error'
                        , text: 'Error al actualizar cantidad'
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
function email() {
     event.preventDefault();
     alert('Se ha mandado la orden a tu correo, espere un momento..');
     window.location.href = '{{url("send-mail")}}';
}
</script>
@endpush