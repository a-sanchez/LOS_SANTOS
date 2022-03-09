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
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">CATÁLAGO DE ORDENES</h1>
        <h4 style="color:gray;font-size:20px;">-HISTORIAL DE ORDENES</h4>
        <hr style="color: #b0831e;">
    </div>
    <div class="col-md-12">
        <a type="btn" class="btn btn-dark" href="{{url('/ordenes')}}">REGRESAR</a>
    </div>
    <div class="col-md-12 mt-2" style="text-align:center">
        <h5><b>CLIENTE: </b>{{$name->cliente->name}}</h5>
    </div>
    <div class="col-md-12 mt-4"></div>
    @if($usuario->isEmpty())
        <h5>Este usuario no cuenta con ordenes registradas</h5>
    @else
    <form>
        <table class="table" id="ordenes_table" width="100%" style="text-align:center">
            <thead>
                <tr style="background-color:#d4aa4f;color:white">
                    <th>FOLIO</th>
                    <th>FECHA</th>
                    <th>ESTATUS</th>
                    <th width="20%">VER</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuario as $user)
                <tr>
                    <td scope="row">
                        @if($user->folio=="" || $user->folio==NULL)
                            EN PROCESO DE COMPRA
                        @else
                        {{str_pad($user->folio . "/" . date("Y"), 10, "0", STR_PAD_LEFT)}}
                        @endif
                    </td>
                    <td>
                        {{date('d-m-Y',strtotime($user->created_at))}}
                    </td>
                    <td>
                        @if($user->estatus==1)
                            PENDIENTE
                        @else
                        ENTREGADO
                        @endif
                    </td>
                    <td>
                        <a  style="color: black" onclick="busqueda('{{$user->id_usuario}}','{{$user->fecha}}');"  class="btn"><i style="font-size:1.5rem" id="eye"  class="fas fa-eye"></i></a>
                        {{-- <a  style="color: black" href="{{url("ordenes/{$user->id_usuario}/edit")}}"  class="btn"><i style="font-size:1.5rem" id="pen"  class="fas fa-pen"></i></a> --}}
    
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </form>
    @endif
    
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
    <script src="{{asset('lib/DataTableswe/Responsive-2.2.9/js/dataTables.responsive.js')}}"></script>

    <script>
        let table = $("#ordenes_table").DataTable({
            responsive:true
        });


        async function busqueda(id,fecha) {
           event.preventDefault();
            let form = new FormData();
            form.append("id",id);
            form.append("fecha",fecha);
            let url = "{{url('ordenes/historial/usuario/{id}/fecha/{fecha}')}}".replace('{id}',id);
            let url2 = url.replace('{fecha}',fecha);
            let init = {
                method:"GET"
            }
            let req = await fetch(url2,init);
            if(req.ok){
                window.location.href = url2;
            }
            else{
                Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'ERROR EN LA BUSQUEDA',
        });
            }
        }

    </script>
@endpush