@extends('layouts.menu')
@push('styles')
<link rel="stylesheet"  type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="{{ asset('lib/DataTables/Responsive-2.2.9/css/responsive.dataTables.min.css') }}">

<style>
    table {
            text-transform: uppercase;
        }
        
    .dataTables_filter{
        margin-bottom:0.5rem;
    }

    
    table.dataTable.no-footer {
    border-bottom: 1px solid  #d4aa4f;
    }

        tbody, td, tr {
    border-color:  #d4aa4f;
    border-style: solid;
    border-width: 1px;
    vertical-align: middle;
    border-bottom:white;
    }
</style>
@endpush
@section('body')
<div class="container" >
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
    <div class="col md-12 mt-3" style="text-align:center;font-size:40px">
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">CATÁLOGO DE PRODUCTOS</h1>
        <h4 style="color:gray;font-size:20px;">-LISTADO DE PRODUCTOS</h4>
        <hr style="color: #b0831e;">
    </div>
    <div class="col-md-12">
        <a type="button" class="btn btn-success" href="{{url('historial/create')}}" >Agregar Nuevo Producto</a>
    </div>
    <div class="col-md-12 mt-3"></div>
    <table class="table" id="productos_table" width="100%" style="text-align:center">
        <thead>
            <tr style="background-color:#d4aa4f;color:white">
                <th>CATEGORIA</th>
                <th width="35%">PRODUCTO</th>
                <th>SANTOS</th>
                <th width="15%">INVENTARIO</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td scope="row">
                    {{$producto->categoria}}
                </td>
                <td>
                    {{$producto->nombre}}
                </td>
                <td>
                    {{$producto->precio}}
                </td>
                <td>
                    {{number_format($producto->inventario),1}}
                </td>
                <td>
                    <a  style="color: black" href="{{url("historial/{$producto->id}/edit")}}"  class="btn"><i style="font-size:1.5rem" id="pen"  class="fas fa-pen"></i></a>
                    <a  style="color: black" href="{{url("historial/{$producto->id}")}}"  class="btn"><i style="font-size:1.5rem" id="info-circle"  class="fas fa-info-circle"></i></a>
                    <a  style="color: black"  onclick='borrarProducto({{$producto->id}})' class="btn"><i style="font-size:1.5rem" id="trash-alt"  class="fas fa-trash-alt"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <div class="col-md-12" style="text-align:center">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 80px;">
        </div>
    </footer>
</div>
@endsection
@push('scripts')
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="{{asset('lib/DataTables/Responsive-2.2.9/js/dataTables.responsive.js')}}"></script>

<script>
    let table = $("#productos_table").DataTable({
        responsive:true
    });

    async function borrarProducto(id) {
        event.preventDefault();
        let url='{{url("/historial/{id}")}}'.replace('{id}',id);
        let init = {
            method:"PUT",
            headers:{
                'X-CSRF-TOKEN': "{{csrf_token()}}",
                'Content-Type':'application/json'
            },
            body:JSON.stringify({'estatus':0})
        }

        let req = await fetch(url,init);
        if(req.ok){
            location.reload();
        }
        else
        {
            Swal.fire({
                icon:"error",
                title:"Error",
                text:"ERROR"
            });
        }

    }
</script>
@endpush