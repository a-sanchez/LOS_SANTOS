@extends('layouts.menu')
@push('styles')

<style>
    textarea:focus, input:focus, input[type]:focus {
    box-shadow: 0px 0px 8px #eebe22 inset, 0px 0px 8px #eebe22;
    outline: 0 none;
    }

    .estilo:focus{
        box-shadow: 0px 0px 8px #eebe22 inset, 0px 0px 8px #eebe22;
        outline: 0 none;
    }
</style>
@endpush

@section('body')
<div class="container">
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
    <div class="col md-12 mt-3" style="text-align:center;font-size:40px">
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">ACTUALIZAR INFORMACIÓN DEL PRODUCTO</h1>
        <h4 style="color:gray;font-size:20px;">-Datos del producto</h4>
        <hr style="color: #b0831e;">
    </div>
<form enctype="multipart/form-data" id="form-producto" onsubmit="edit_producto({{$producto->id}});">
    @csrf
    {{-- DATOS PRINCIPALES SOLICITADOS EN CADA ARTICULO --}}
    <div class="row">
        <div class="col-md-6">
            <label >Seleccione la categoria del nuevo producto</label>
            <select name="categoria" id="categoria" class="form-control estilo" style="border-color:#b0831e;text-transform: uppercase;">
                <option stle="text-transform: uppercase;" selected value="{{$producto->categoria}}" >{{strtoupper($producto->categoria)}}</option>
                @if($producto->categoria == 'arte')
                <option value="relojes">RELOJES</option>
                <option value="ropa">ROPA</option>
                <option value="joyeria">JOYERÍA</option>
                <option value="vuelos">VUELOS</option>
                @elseif($producto->categoria == 'relojes')
                <option value="arte">ARTE</option>
                <option value="ropa">ROPA</option>
                <option value="joyeria">JOYERÍA</option>
                <option value="vuelos">VUELOS</option>
                @elseif($producto->categoria == 'ropa')
                <option value="arte">ARTE</option>
                <option value="relojes">RELOJES</option>
                <option value="joyeria">JOYERÍA</option>
                <option value="vuelos">VUELOS</option>
                @elseif($producto->categoria == 'joyeria')
                <option value="arte">ARTE</option>
                <option value="relojes">RELOJES</option>
                <option value="ropa">ROPA</option>
                <option value="vuelos">VUELOS</option>
                @elseif($producto->categoria == 'vuelos')
                <option value="arte">ARTE</option>
                <option value="relojes">RELOJES</option>
                <option value="ropa">ROPA</option>
                <option value="joyeria">JOYERÍA</option>
                @endif
            </select>
        </div>
        <div class="col-md-6">
            <label >Ingrese el nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" style="border-color:#b0831e" value="{{$producto->nombre}}" >
        </div>
    </div>
    <div class="row mt-2 d-flex align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <label>Cantidad de santos</label>
                <input type="text" id="precio" name="precio" class="form-control" style="border-color:#b0831e" value="{{$producto->precio}}" >
            </div>
            <div class="col-md-12 mt-4">
                <label>Cantidad disponible</label>
                <input type="text" name="inventario" id="inventario" class="form-control" style="border-color:#b0831e" value="{{number_format($producto->inventario,0)}}" >
            </div>
        </div>
        <div class="col-md-6 mt-2" style="text-align: center;">
            @if(isset($producto->imagen))
            <div class="row d-flex align-items-end">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <img  height="180px"src="{{$producto->imagen}}">
                </div>
                <div class="col-md-3" style="text-align: start;">
                    <a type="btn" class="btn btn-warning" onclick='borrarImagen({{$producto->id}})' >BORRAR</a>
                </div>
            </div>
            @else
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#producto" onclick="modal({{$producto->id}})">Agregar Imagen</button>
            <form>
                @csrf
                <div id="producto" class="modal fade mt-5" tabindex="-50">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Selecione imagen</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <input type="file" style="text-align:center" name="imagen" id="imagen"class="form-control" >
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" onclick = "guarda_imagen({{$producto->id}})">Subir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>
    @if($producto->categoria=='arte')
         {{-- ARTE --}}
         <div id="arte" >
             <div class="row mt-2">
                 <div class="col-md-6">
                     <label>Descripcion</label>
                     <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_arte" id="descripcion_arte" value="{{$producto->descripcion_arte}}" >
                 </div>
                 <div class="col-md-6">
                     <label>Obra</label>
                     <input type="text" name="obra" id="obra" class="form-control" style="border-color:#b0831e" value="{{$producto->obra}}" >
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-4">
                     <label>Autor</label>
                     <input type="text" name="autor" id="autor" class="form-control" style="border-color:#b0831e" value="{{$producto->autor}}" >
                 </div>
                 <div class="col-md-4">
                     <label>Medidas</label>
                     <input type="text" name="medidas" id="medidas" class="form-control" style="border-color:#b0831e" value="{{$producto->medidas}}" >
                 </div>
                 <div class="col-md-4">
                     <label>Materiales</label>
                     <input type="text" name="material_arte" id="material_arte" class="form-control" style="border-color:#b0831e" value="{{$producto->material_arte}}" >
                 </div>
             </div>
         </div>
        @elseif($producto->categoria=='relojes')
        {{-- RELOJES --}}
        <div id="relojes" >
            <div class="row mt-2">
                <div class="col-md-4">
                    <label>Modelo</label>
                    <input type="text" name="modelo_reloj" id="modelo_reloj" class="form-control" style="border-color:#b0831e"  value="{{$producto->modelo_reloj}}">
                </div>
                <div class="col-md-4">
                    <label>Correa</label>
                    <input type="text" name="correa" id="correa" class="form-control" style="border-color:#b0831e"  value="{{$producto->correa}}">
                </div>
                <div class="col-md-4">
                    <label>Género</label>
                    <select name="genero_reloj" id="genero_reloj" class="form-control estilo"  style="border-color:#b0831e">
                        @if($producto->genero_reloj == 'UNISEX')
                        <option value="UNISEX">UNISEX</option>
                        <option value="MUJER">MUJER</option>
                        <option value="HOMBRE">HOMBRE</option>
                        @elseif($producto->genero_reloj == 'MUJER')
                        <option value="MUJER">MUJER</option>
                        <option value="UNISEX">UNISEX</option>
                        <option value="HOMBRE">HOMBRE</option>
                        @elseif($producto->genero_reloj == 'HOMBRE')
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="UNISEX">UNISEX</option>
                        <option value="MUJER">MUJER</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        @elseif($producto->categoria=='ropa')
        {{-- ROPA --}}
        <div id="ropa">
            <div class="row mt-2">
                <div class="col-md-4">
                    <label>Modelo</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="modelo_ropa" id="modelo_ropa"  value="{{$producto->modelo_ropa}}">
                </div>
                <div class="col-md-4">
                    <label>Color</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="color" id="color" value="{{$producto->color}}" >
                </div>
                <div class="col-md-4">
                    <label>Género</label>
                    <select name="genero_reloj" id="genero_reloj" class="form-control estilo"  style="border-color:#b0831e">
                        @if($producto->genero_reloj == 'UNISEX')
                        <option value="UNISEX">UNISEX</option>
                        <option value="MUJER">MUJER</option>
                        <option value="HOMBRE">HOMBRE</option>
                        @elseif($producto->genero_reloj == 'MUJER')
                        <option value="MUJER">MUJER</option>
                        <option value="UNISEX">UNISEX</option>
                        <option value="HOMBRE">HOMBRE</option>
                        @elseif($producto->genero_reloj == 'HOMBRE')
                        <option value="HOMBRE">HOMBRE</option>
                        <option value="UNISEX">UNISEX</option>
                        <option value="MUJER">MUJER</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
        @elseif($producto->categoria=='joyeria')
        {{-- JOYERIA --}}
        <div id="joyeria" >
            <div class="row mt-2">
                <div class="col-md-6">
                    <label>Modelo</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="modelo_joyeria" id="modelo_joyeria"  value="{{$producto->modelo_joyeria}}">
                </div>
                <div class="col-md-6">
                    <label>Material</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="material_joyeria" id="material_joyeria"  value="{{$producto->material_joyeria}}">
                </div>
            </div>
        </div>
        @elseif($producto->categoria=='vuelos')
        {{-- VUELOS --}}
        <div id="vuelos">
            <div class="row mt-2">
                <div class="col-md-4">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_vuelos" id="descripcion_vuelos"  value="{{$producto->descripcion_vuelos}}">
                </div>
                <div class="col-md-4">
                    <label>Fecha Inicio</label>
                    <input type="date" class="form-control" style="border-color:#b0831e" name="fecha_inicio" id="fecha_inicio"  value="{{$producto->fecha_inicio}}">
                </div>
                <div class="col-md-4">
                    <label>Fecha Final</label>
                    <input type="date" class="form-control" style="border-color:#b0831e" name="fecha_final" id="fecha_final"  value="{{$producto->fecha_final}}">
                </div>
            </div>
        </div>
    @endif 
        <button type="submit" class="btn btn-success mt-3">ACTUALIZAR</button>
        <a type="btn" class="btn btn-danger mt-3" href="{{url('/historial/productos')}}">REGRESAR</a>
    </div> 
</form>
</div>
@endsection

@push('scripts')  
<script>

function modal(id){
        var myModal = new bootstrap.Modal(document.getElementById("producto"));
            myModal.show();
    }

async function guarda_imagen(id){
     event.preventDefault();
     let form = new FormData();
     form.append("imagen",document.getElementById("imagen").files[0]);
     let url="{{url('historial/actualizar/{id}')}}".replace('{id}',id);
     let init={
        method:"POST",
        headers:{
         'X-CSRF-Token':document.getElementsByName("_token")[0].value
        },
        body:form
    }
    let req = await fetch(url,init);
    if(req.ok){
             alert("imagen agregada cotrrectamente");
             location.reload();
         }
         else{
             Swal.fire({
                     icon: 'error'
                     , title: 'Error'
                     , text: 'Error al actualizar la imagen'
                 , });
         }

}

    async function edit_producto(id){
        event.preventDefault();
        let form = new FormData(document.getElementById("form-producto"));
        let url = "{{url('historial/{id}')}}".replace('{id}',id);
        let init = {
            method:"PUT",
            headers:{
                'X-CSRF-Token':document.getElementsByName("_token")[0].value
                    , "Content-Type": "application/json"
            },
            body:JSON.stringify(Object.fromEntries(form))
        }
        let req = await fetch(url,init);
        if(req.ok){
            alert("Se ha actualizado correctamente");
            window.location.href="{{url('/historial')}}";
        }
        else{
            Swal.fire({
                    icon: 'error'
                    , title: 'Error'
                    , text: 'Error al actualizar el producto'
                , });
        }
    }

    async function borrarImagen(id) {
         event.preventDefault();
         let url = "{{url('/historial/eliminar/{id}')}}".replace('{id}',id);
         let init = {
             method:"DELETE",
             headers:{
                 'X-CSRF-Token': document.getElementsByName("_token")[0].value
                 , "Content-Type": "application/json"
             }
         }

         let req = await fetch(url,init);
         if(req.ok){
            location.reload();
         }
         else
         {
             Swal.fire({
                 icon: 'error'
                 , title: 'Error'
                 , text: 'Error al borrar la imagen'
             , });
         }
    }
</script>
@endpush
