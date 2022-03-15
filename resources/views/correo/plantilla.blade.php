<style>
    html, body {
      width: 100%;
      height:100%;
    }


    #contenido {
      padding-bottom:90px; /* este valor debe ser igual o mayor al alto del pie */
    }

    #pie {
      height:90px;
      background:white;
      text-align:center;
      position:absolute;
      bottom:0;
      left:0;
      width:100%;
    }


</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRUEBA DEL CORREO</title>
</head>
<body>
    <div>
            <div style="text-align: center">
                <h1 style="color:#B78B1E;font-size:45px;">{{$nombre}}</h1>
            <p style="font-weight:bold;font-size:20px;">{{$title}}</p>
        </div>
        <div class="col-md-12 mt-3" style="text-align:center">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 50px;">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 50px;">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 50px;">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 50px;">
            <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 50px;">
        </div>
        <div class="col-md-12" style="text-align:center">
            <a>Celebramos el éxito de nuestros clientes.</a>
        </div>
        <div class="col-md-12" style="text-align:center">
            <a> Un asesor se pondrá en contacto contigo para verificar disponibilidad del producto.</a>
        </div>
        <div class="col-md-12" style="text-align:center">
            <p>Pedido N° {{$folio}}</p>
        </div>
        <div class="col-md-12 mt-2" style="text-align:center">
            <p style="font-weight:bold">Producto(s): </p>
        </div>
        <table width="100%" class="mt-3">
            @foreach($ordenes as $orden)
                @if($orden->categoria=='arte')
                <tr>
                    <td width="15%"></td>
                    <td width="30%" style="text-align:center">
                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" width="60%">
                    </td>
                    <td width="40%" class="mt-1 mb-1">
                        Nombre:{{$orden->nombre}}
                        <br>
                        Precio:{{$orden->precio}}
                        <br>
                        Descripción:{{$orden->descripcion_arte}}
                        <br>
                        Obra: {{$orden->obra}}
                        <br>
                        Autor: {{$orden->autor}}
                        <br>
                        Medidas: {{$orden->medidas}}
                        <br>
                        Material: {{$orden->material_arte}}
                        <br>
                        Cantidad:{{number_format($orden->cantidad_comprada,0)}} ud
                        <br>
                        Total:{{number_format($orden->precio*$orden->cantidad_comprada,2)}} Santos
                    </td>
                    <td width="15%"></td>
                </tr>
                <br>
                @endif
            @endforeach
        </table>
        <table width="100%" class="mt-3">
            @foreach($ordenes as $orden)
                @if($orden->categoria=='relojes')
                <tr>
                    <td width="15%"></td>
                    <td width="30%" style="text-align:center">
                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" width="60%">
                    </td>
                    <td width="40%" width="40%" class="mt-1 mb-1">
                        Nombre:{{$orden->nombre}}
                        <br>
                            Precio:{{$orden->precio}}
                        <br>
                            Modelo: {{$orden->modelo_reloj}}
                        <br>
                            Correa:{{$orden->correa}}
                        <br>
                            Género: {{$orden->genero_reloj}}
                        <br>
                        Cantidad:{{number_format($orden->cantidad_comprada,0)}} ud
                        <br>
                        Total:{{number_format($orden->precio*$orden->cantidad_comprada,2)}} Santos
                    </td>
                    <td width="15%"></td>
                </tr>
                <br>
                @endif
            @endforeach
        </table>
        <table width="100%"  class="mt-3">
            @foreach($ordenes as $orden)
                @if($orden->categoria=='ropa')
                <tr>
                    <td width="15%"></td>
                    <td width="30%" style="text-align:center">
                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" width="60%">
                    </td>
                    <td width="40%" width="40%" class="mt-1 mb-1">
                        Nombre:{{$orden->nombre}}
                        <br>
                        Precio:{{$orden->precio}}
                        <br>
                        Modelo: {{$orden->modelo_ropa}}
                        <br>
                        Género:{{$orden->genero_ropa}}
                        <br>
                        Color: {{$orden->color}}
                        <br>
                        Cantidad:{{number_format($orden->cantidad_comprada,0)}} ud
                        <br>
                        Total:{{number_format($orden->precio*$orden->cantidad_comprada,2)}} Santos
                    </td>
                    <td width="15%"></td>
                </tr>
                <br>
                @endif
            @endforeach
        </table>
        <table width="100%"  class="mt-3">
            @foreach($ordenes as $orden)
                @if($orden->categoria=='joyeria')
                <tr>
                    <td width="15%"></td>
                    <td width="30%" style="text-align:center">
                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" width="60%">
                    </td>
                    <td width="40%" width="40%" class="mt-1 mb-1">
                        Nombre:{{$orden->nombre}}
                        <br>
                        Precio:{{$orden->precio}}
                        <br>
                        Modelo: {{$orden->modelo_joyeria}}
                        <br>
                        Material: {{$orden->material_joyeria}}
                        <br>
                        Cantidad:{{number_format($orden->cantidad_comprada,0)}} ud
                        <br>
                        Total:{{number_format($orden->precio*$orden->cantidad_comprada,2)}} Santos
                    </td>
                    <td width="15%"></td>
                </tr>
                <br>
                @endif
            @endforeach
        </table>
        <table width="100%" class="mt-3">
            @foreach($ordenes as $orden)
                @if($orden->categoria=='vuelos')
                <tr>
                    <td width="15%"></td>
                    <td width="30%" style="text-align:center">
                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" width="60%">
                    </td>
                    <td width="40%" width="40%" class="mt-1 mb-1">
                        Nombre:{{$orden->nombre}}
                        <br>
                        Precio:{{$orden->precio}}
                        <br>
                        Descripción:{{$orden->descripcion_vuelos}}
                        <br>
                        Fechas:{{$orden->fecha_inicio}}-{{$orden->fecha_final}}
                        <br>
                        Cantidad:{{number_format($orden->cantidad_comprada,0)}} ud
                        <br>
                        Total:{{number_format($orden->precio*$orden->cantidad_comprada,2)}} Santos
                    </td>
                    <td width="15%"></td>
                </tr>
                <br>
                @endif
                @endforeach
            </table>
            <footer id="pie">
                <hr style="color:#B78B1E;width:75%;"></hr>
                <div style="text-align:center;font-size:20px">
                <a style="font-weight:bold">THE WORLD IS</a>
            </div>
            <div style="text-align:center">
                <img src='{{asset("images/Yours.png")}}' width="30%">
            </div>
        </footer>
    </div>
</body>
</html>