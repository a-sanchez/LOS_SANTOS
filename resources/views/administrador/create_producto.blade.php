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

    .form-control{
        height: auto !important;
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
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">AGREGAR NUEVO PRODUCTO</h1>
        <h4 style="color:gray;font-size:20px;">-Ingresar los datos correspondientes</h4>
        <hr style="color: #b0831e;">
    </div>
<form action="{{route('historial.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <label >Seleccione la categoria del nuevo producto</label>
            <select name="categoria" id="categoria" class="form-control estilo" onchange="mostrar(this.value)" style="border-color:#b0831e" required>
                <option selected value="seleccione">Seleccione:</option>
                <option value="arte">ARTE</option>
                <option value="relojes">RELOJES</option>
                <option value="ropa">ROPA</option>
                <option value="joyeria">JOYERÍA</option>
                <option value="licores">LICORES</option>
                
            </select>
        </div>
        <div class="col-md-6">
            <label >Ingrese el nombre del producto</label>
            <input type="text" id="nombre" name="nombre" class="form-control" style="border-color:#b0831e" required>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-4">
            <label>Cantidad de santos</label>
            <input type="text" id="precio" name="precio" class="form-control" style="border-color:#b0831e" required>
        </div>
        <div class="col-md-4">
            <label>Cantidad disponible</label>
            <input type="text" name="inventario" id="inventario" class="form-control" style="border-color:#b0831e" oninput="llenado()" required>
            <input type="text" style="display:none" name="inventario_back" id="inventario_back" class="form-control" style="border-color:#b0831e;color:black">
        </div>
        <div class="col-md-4">
            <label>IMAGEN</label>
            <input type="file" name="imagen" id="imagen" class="form-control" style="border-color:#b0831e" accept="image/*" required>
        </div>
    </div>
    {{-- ARTE --}}
    <div id="arte" style="display:none">
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Descripcion</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_arte" id="descripcion_arte">
            </div>
            <div class="col-md-6">
                <label>Obra</label>
                <input type="text" name="obra" id="obra" class="form-control" style="border-color:#b0831e">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Autor</label>
                <input type="text" name="autor" id="autor" class="form-control" style="border-color:#b0831e">
            </div>
            <div class="col-md-4">
                <label>Medidas</label>
                <input type="text" name="medidas" id="medidas" class="form-control" style="border-color:#b0831e">
            </div>
            <div class="col-md-4">
                <label>Materiales</label>
                <input type="text" name="material_arte" id="material_arte" class="form-control" style="border-color:#b0831e">
            </div>
        </div>
    </div>
    {{-- RELOJES --}}
    <div id="relojes" style="display:none;">
        <div class="row mt-2">
            <div class="col-md-4">
                <label>Descripción</label>
                <input type="text" name="modelo_reloj" id="modelo_reloj" class="form-control" style="border-color:#b0831e">
            </div>
            <div class="col-md-4">
                <label>Correa</label>
                <input type="text" name="correa" id="correa" class="form-control" style="border-color:#b0831e">
            </div>
            <div class="col-md-4">
                <label>Género</label>
                <select name="genero_reloj" id="genero_reloj" class="form-control estilo"  style="border-color:#b0831e">
                    <option value=" ">Seleccione</option>
                    <option value="unisex">unisex</option>
                    <option value="mujer">mujer</option>
                    <option value="hombre">hombre</option>
                </select>
            </div>
        </div>
    </div>
    {{-- ROPA --}}
    <div id="ropa" style="display:none">
        <div class="row mt-2">
            <div class="col-md-8">
                <label>Descripción</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="modelo_ropa" id="modelo_ropa">
            </div>
            <div class="col-md-4">
                <label>Color</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="color" id="color">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Género</label>
                <select name="genero_ropa" id="genero_ropa" class="form-control estilo"  style="border-color:#b0831e">
                    <option value=" ">Seleccione</option>
                    <option value="unisex">unisex</option>
                    <option value="mujer">mujer</option>
                    <option value="hombre">hombre</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Tallas disponibles</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="tallas_disponibles" id="tallas_disponibles">
            </div>
        </div>
    </div>
    {{-- JOYERIA --}}
    <div id="joyeria" style="display:none">
        <div class="row mt-2">
            <div class="col-md-6">
                <label>Descripción</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="modelo_joyeria" id="modelo_joyeria">
            </div>
            <div class="col-md-6">
                <label>Material</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="material_joyeria" id="material_joyeria">
            </div>
            
        </div>
    </div>
    {{-- licores vuelos--}}
    <div id="licores" style="display:none">
        <div class="row mt-2">
            <div class="col-md-4">
                <label>Descripcion</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="descripcion_licores" id="descripcion_licores">
            </div>
            <div class="col-md-4">
                <label>Mililitros</label>
                <input type="text" class="form-control" style="border-color:#b0831e" name="mililitros" id="mililitros">
            </div>
            {{-- <div class="col-md-4">
                <label>Fecha Final</label>
                <input type="date" class="form-control" style="border-color:#b0831e" name="fecha_final" id="fecha_final">
            </div> --}}
        </div>
    </div>

    <div class="col-md-12 mt-3">
        <button type="submit" class="btn btn-success">GUARDAR</button>
        <a type="btn" class="btn btn-danger" href="{{url('/historial/productos')}}">CANCELAR</a>
    </div> 
</form>
</div>
@endsection

@push('scripts')  
<script>
    function llenado(){
        var x = document.getElementById('inventario').value;
        document.getElementById('inventario_back').value = x;
    }

    function mostrar(id){
        if(id == "seleccione"){
            $("#arte").hide();
            $("#relojes").hide();
            $("#ropa").hide();
            $("#joyeria").hide();
            $("#licores").hide();
        }

        if(id == "arte"){
            $("#arte").show();
            $("#relojes").hide();
            $("#ropa").hide();
            $("#joyeria").hide();
            $("#licores").hide();
        }

        if(id == "relojes"){
            $("#arte").hide();
            $("#relojes").show();
            $("#ropa").hide();
            $("#joyeria").hide();
            $("#licores").hide();
        }

        if(id == "ropa"){
            $("#arte").hide();
            $("#relojes").hide();
            $("#ropa").show();
            $("#joyeria").hide();
            $("#licores").hide();
        }

        if(id == "joyeria"){
            $("#arte").hide();
            $("#relojes").hide();
            $("#ropa").hide();
            $("#joyeria").show();
            $("#licores").hide();
        }

        if(id == "licores"){
            $("#arte").hide();
            $("#relojes").hide();
            $("#ropa").hide();
            $("#joyeria").hide();
            $("#licores").show();
        }

    }
</script>
@endpush
