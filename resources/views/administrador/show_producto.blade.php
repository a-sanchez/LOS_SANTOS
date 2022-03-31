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
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">INFORMACIÓN DEL PRODUCTO</h1>
        <h4 style="color:gray;font-size:20px;">-Datos del producto</h4>
        <hr style="color: #b0831e;">
    </div>
<form enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label >Seleccione la categoria del nuevo producto</label>
            <select name="categoria" id="categoria" class="form-control estilo" style="border-color:#b0831e" disabled>
                <option selected value="{{$producto->categoria}}">{{$producto->categoria}}</option>
            </select>
        </div>
        <div class="col-md-6">
            <label >Ingrese el nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" style="border-color:#b0831e" value="{{$producto->nombre}}" disabled>
        </div>
    </div>
    <div class="row mt-2 d-flex align-items-center">
        <div class="col-md-6">
            <div class="col-md-12">
                <label>Cantidad de santos</label>
                <input type="text" id="precio" name="precio" class="form-control" style="border-color:#b0831e" value="{{$producto->precio}}" disabled>
            </div>
            <div class="col-md-12 mt-4">
                <label>Cantidad disponible</label>
                <input type="text" name="inventario" id="inventario" class="form-control" style="border-color:#b0831e" value="{{number_format($producto->inventario,0)}}" disabled>
            </div>
        </div>
        @if(isset($producto->imagen))
            <div class="col-md-6 mt-2" style="text-align: center;">
                <img  height="180px"src="{{$producto->imagen}}">
            </div>
        @else
        Este producto no contiene imagen
        @endif

    </div>
    @if($producto->categoria=='arte')
         {{-- ARTE --}}
    <div id="arte" >
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Descripcion</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_arte" id="descripcion_arte" value="{{$producto->descripcion_arte}}" disabled>
            </div>
            <div class="col-md-6">
                <label>Obra</label>
                <input type="text" name="obra" id="obra" class="form-control" style="border-color:#b0831e" value="{{$producto->obra}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" style="border-color:#b0831e" value="{{$producto->autor}}" disabled>
            </div>
            <div class="col-md-4">
                <label>Medidas</label>
                <input type="text" name="medidas" id="medidas" class="form-control" style="border-color:#b0831e" value="{{$producto->medidas}}" disabled>
            </div>
            <div class="col-md-4">
                <label>Materiales</label>
                <input type="text" name="material_arte" id="material_arte" class="form-control" style="border-color:#b0831e" value="{{$producto->material_arte}}" disabled>
            </div>
        </div>
    </div>
        @elseif($producto->categoria=='relojes')
        {{-- RELOJES --}}
        <div id="relojes" >
            <div class="row mt-2">
                <div class="col-md-4">
                    <label>Modelo</label>
                    <input type="text" name="modelo_reloj" id="modelo_reloj" class="form-control" style="border-color:#b0831e" disabled value="{{$producto->modelo_reloj}}">
                </div>
                <div class="col-md-4">
                    <label>Correa</label>
                    <input type="text" name="correa" id="correa" class="form-control" style="border-color:#b0831e" disabled value="{{$producto->correa}}">
                </div>
                <div class="col-md-4">
                    <label>Género</label>
                    <select name="genero_reloj" id="genero_reloj" class="form-control estilo"  disabled style="border-color:#b0831e">
                        @if($producto->genero_reloj == 'unisex')
                        <option value="unisex">unisex</option>
                        <option value="mujer">mujer</option>
                        <option value="hombre">hombre</option>
                        @elseif($producto->genero_reloj == 'mujer')
                        <option value="mujer">mujer</option>
                        <option value="unisex">unisex</option>
                        <option value="hombre">hombre</option>
                        @elseif($producto->genero_reloj == 'hombre')
                        <option value="hombre">hombre</option>
                        <option value="unisex">unisex</option>
                        <option value="mujer">mujer</option>
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
                    <textarea type="text" class="form-control" style="border-color:#b0831e" name="color" id="color" value="{{$producto->color}}" disabled>{{$producto->modelo_ropa}}</textarea>
                </div>
                <div class="col-md-4">
                    <label>Color</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="color" id="color" value="{{$producto->color}}" disabled>
                </div>
                <div class="col-md-4">
                    <label>Género</label>
                    <select name="genero_reloj" id="genero_reloj" class="form-control estilo" disabled  style="border-color:#b0831e">
                        @if($producto->genero_reloj == 'unisex')
                        <option value="unisex">unisex</option>
                        <option value="mujer">mujer</option>
                        <option value="hombre">hombre</option>
                        @elseif($producto->genero_reloj == 'mujer')
                        <option value="mujer">mujer</option>
                        <option value="unisex">unisex</option>
                        <option value="hombre">hombre</option>
                        @elseif($producto->genero_reloj == 'hombre')
                        <option value="hombre">hombre</option>
                        <option value="unisex">unisex</option>
                        <option value="mujer">mujer</option>
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
                    <input type="text" class="form-control" style="border-color:#b0831e" name="modelo_joyeria" id="modelo_joyeria" disabled value="{{$producto->modelo_joyeria}}">
                </div>
                <div class="col-md-6">
                    <label>Material</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="material_joyeria" id="material_joyeria" disabled value="{{$producto->material_joyeria}}">
                </div>
            </div>
        </div>
        @elseif($producto->categoria=='vuelos')
        {{-- VUELOS --}}
        <div id="vuelos">
            <div class="row mt-2">
                <div class="col-md-4">
                    <label>Descripcion</label>
                    <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_vuelos" id="descripcion_vuelos" disabled value="{{$producto->descripcion_vuelos}}">
                </div>
                <div class="col-md-4">
                    <label>Fecha Inicio</label>
                    <input type="date" class="form-control" style="border-color:#b0831e" name="fecha_inicio" id="fecha_inicio" disabled value="{{$producto->fecha_inicio}}">
                </div>
                <div class="col-md-4">
                    <label>Fecha Final</label>
                    <input type="date" class="form-control" style="border-color:#b0831e" name="fecha_final" id="fecha_final" disabled value="{{$producto->fecha_final}}">
                </div>
            </div>
        </div>
    @endif

    <div class="col-md-12 mt-3">
        <a type="btn" class="btn btn-danger" href="{{url('/historial/productos')}}">REGRESAR</a>
    </div> 
</form>
</div>
@endsection

@push('scripts')  
<script>
</script>
@endpush
