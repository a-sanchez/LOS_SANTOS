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
        <h4 style="color:gray;font-size:20px;">-HISTORIAL DE CLIENTES CON ORDENES</h4>
        <hr style="color: #b0831e;">
    </div>
    <div class="col-md-12 mt-3"></div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <table class="table" id="ordenes_table" width="100%" style="text-align:center">
                <thead>
                    <tr style="background-color:#d4aa4f;color:white">
                        <th>CLIENTE</th>
                        <th width="15%">OPCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        <td scope="row">
                            {{$usuario->name}}
                        </td>
                        <td>
                            <a  style="color: black" href="{{url("ordenes/historial/{$usuario->id}")}}"  class="btn"><i style="font-size:1.5rem" id="history"  class="fas fa-history"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>
    </div>
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
    </script>
@endpush