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
    table.dataTable thead th, table.dataTable thead td {
      padding: 10px 18px;
      border-bottom: 1px solid #d4aa4f;
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
        <div class="col md-12 mt-3" style="text-align:center;">
            <h1 class="h1" style="font-weight:bold;font-family:italic;">CATÁLOGO DE VENDER PROPIEDADES</h1>
            <h4 style="color:gray;font-size:20px;">-HISTORIAL DE SOLICITUDES</h4>
            <hr style="color: #b0831e;">
        </div>
        <table width="100%" id="solicitudes" style="text-align:center">
            <thead>
                <tr style="background-color:#d4aa4f;color:white">
                    <th>Producto</th>
                    <th>Email</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($registros as $registro)
                    <tr>
                        <td>{{$registro->producto}}</td>
                        <td>{{$registro->email}}</td>
                        <td>
                            @if($registro->estatus==1)
                            <a  style="color: black" class="btn" onclick="update_status({{$registro->id}})"><i style="font-size:1.5rem" id="circle-check"  class="fas fa-check-circle"></i></a>
                            @else
                            CONTACTADO
                            @endif
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
let table = $('#solicitudes').DataTable({
    responsive: true
});
async function update_status(id){
    let url='{{url("/ventas/{id}")}}'.replace('{id}',id);
    let init = {
        method:'PUT',
        headers: {
                    'X-CSRF-Token' : "{{ csrf_token() }}",
                        'Content-Type':'application/json'
                },
        body:JSON.stringify({'estatus':2})
    }
    let req = await fetch(url,init);
      if(req.ok){
          alert("Se ha actualizado el estatus");
        window.location.reload();
          }
      else{
           Swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: "Error al autorizar"
                });
       }
}
</script>
@endpush