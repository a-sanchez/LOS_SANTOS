@extends('layouts.menu')
@push('styles')
    <link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('lib/DataTables/Responsive-2.2.9/css/responsive.dataTables.min.css') }}">
@endpush
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
<div class="container" style="text-align:center">
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
    <div class="col md-12 mt-3" style="text-align:center;font-size:40px">
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">INFORMACIÓN DE PRODUCTO</h1>
        <hr style="color: #b0831e;">
    </div>
    <form id="form-prodord" onsubmit="update_producto({{$usuario[0]->id_orden}})">
        @csrf
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <label>Fecha de Compra:</label>
                <input type="text" style="text-align:center" disabled value="{{Carbon\Carbon::parse($usuario[0]->fecha_comprada)->formatLocalized('%d/%m/%Y')}}" class="form-control" name="fecha_comprada">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-3">
                <label>Categoría</label>
                <input type="text" style="text-transform: uppercase;text-align:center" disabled class="form-control"  value="{{$usuario[0]->producto->categoria}}">
            </div>
            <div class="col-md-3">
                <label>Producto</label>
                <input type="text" style="text-transform: uppercase;text-align:center" disabled class="form-control"  value="{{$usuario[0]->producto->nombre}}">
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <label>Cantidad</label>
                <input type="text" style="text-transform: uppercase;text-align:center" id="cantidad" onkeyup="suma();" class="form-control"  id="cantidad_comprada" name="cantidad_comprada" value="{{$usuario[0]->cantidad_comprada}}">
            </div>
            <div class="col-md-4">
                <label>Santos</label>
                <input type="text" style="text-transform: uppercase;text-align:center" id="santos" disabled onkeyup="suma();" class="form-control" name="precio" value="{{$usuario[0]->producto->precio}}">
            </div>
            <div class="col-md-4">
                <label>Total</label>
                <input type="text" style="text-transform: uppercase;text-align:center" id="total" disabled  class="form-control" value={{$total[0]->total}}>

            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-3">
                <button type="submit" class="btn btn-success mt-3">ACTUALIZAR</button>
                <a class="btn btn-dark mt-3" href="{{url("ordenes/historial/usuario/{$usuario[0]->id_usuario}/folio/{$usuario[0]->folio}")}}">REGRESAR</a>
            </div>
        </div>
    </form>
</div>
@endsection
@push('scripts')
    <script>
        function suma(valor) {
            cantidad = parseInt(document.getElementById("cantidad").value);
            santos=parseFloat(document.getElementById("santos").value);
            total = parseFloat(cantidad * santos).toFixed(2);
            document.getElementById("total").value = total;
            }

        async function update_producto(id){
             event.preventDefault();
             let form =  new FormData(document.getElementById("form-prodord"));
             let url="{{url('/ordenes/producto/{id}')}}".replace("{id}",id);
             let init = {
                 method:"PUT",
                 headers: {
                     'X-CSRF-Token': document.getElementsByName("_token")[0].value
                     , "Content-Type": "application/json"
                 }
                 , body: JSON.stringify(Object.fromEntries(form))
             }
             let req = await fetch(url,init);
             if(req.ok){
                alert("Orden actualizada correctamente");
                window.location.href="{{url("ordenes/historial/usuario/{$usuario[0]->id_usuario}/folio/{$usuario[0]->folio}")}}";
             }
             else{
                 Swal.fire({
                     icon: 'error'
                     , title: 'Error'
                     , text: 'Error al actualizar el producto'
                 , });
             }

        }
        
    </script>
@endpush