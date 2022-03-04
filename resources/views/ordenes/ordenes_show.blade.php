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
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">HISTORIAL DE ORDENES</h1>
        <hr style="color: #b0831e;">
    </div>
    <div class="col-md-12">
        <a type="btn" class="btn btn-dark" href="{{url('/ordenes')}}">REGRESAR</a>
    </div>
    <div class="col-md-12 mt-2" style="text-align:center">
        <h5><b>CLIENTE: {{$historiales[0]->name}}</b></h5>
        <h5><b>FOLIO: {{$historiales[0]->folio}}</b></h5>
        <h5><b>FECHA DE COMPRA: 
            {{Carbon\Carbon::parse($historiales[0]->fecha_comprada)->formatLocalized('%d/%m/%Y')}}
             </b></h5>
    </div>
    <a class="btn btn-success">Agregar producto en la orden</a>
    <div class="col-md-12 mt-4"></div>
    <table class="table" id="ordenes_table" width="100%" style="text-align:center">
        <thead>
            <tr style="background-color:#d4aa4f;color:white">
                <th>CATEGORIA</th>
                <th>PRODUCTO</th>
                <th>CANTIDAD</th>
                <th>SANTOS</th>
                <th>TOTAL</th>
                <th>OPCIONES</th>
            </tr>
        </thead>
        <tbody>
            @foreach($historiales as $historial)
            <tr>
                <td scope="row">
                    {{$historial->categoria}}
                </td>
                <td>
                    {{$historial->nombre}}
                </td>
                <td>
                    {{number_format($historial->cantidad_comprada,0)}}
                </td>
                <td>
                    {{number_format($historial->precio,2)}}
                </td>
                <td>
                    {{number_format($historial->total,2)}}
                </td>
                <td>
                    <a  style="color: black" href="{{url("ordenes/producto/{$historial->id_orden}")}}"  class="btn"><i style="font-size:1.5rem" id="pen"  class="fas fa-pen"></i></a>
                    <a  style="color: black" onclick="borrarProducto({{$historial->id_orden}},{{$historial->id_usuario}},'{{$historial->folio}}')"class="btn"><i style="font-size:1.5rem" id="trash-alt"  class="fas fa-trash-alt"></i></a>
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
        let table = $("#ordenes_table").DataTable({
            responsive:true
        });

        async function borrarProducto(id,usuario,folio) {
        event.preventDefault();
        let url = "{{url('ordenes/historial/usuario/{id}/folio/{folio}')}}".replace('{id}',id);
        let url2 = url.replace('{folio}',folio);
        let init = {
                method:"PUT",
                headers:{
                    'X-CSRF-TOKEN': "{{csrf_token()}}",
                    'Content-Type':'application/json'
                },
                body:JSON.stringify({'id_status':0})
            }

          let req = await fetch(url2,init);
          if(req.ok){
              alert("Se elimino el producto");
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