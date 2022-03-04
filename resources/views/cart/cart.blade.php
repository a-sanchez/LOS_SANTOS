@extends('layouts.nav_black')
@push('styles')
    <style>
         #colorlib-main {
          float:none;
          width: 100%;
        }
        .border {
          border: 3px solid #b0831e !important;
        }
        .border_bajo{
            border-bottom:3px solid #b0831e !important;
        }
        @font-face{
            font-family: 'Kinlock Regular';
            src:url('css/FontsFree-Net-ps-kinlock-regular.ttf') format('truetype');
            font-style: normal;
            font-weight: normal;
        }
        @font-face{
          font-family: 'Avenir Next Condensed';
          src:url('css/Avenir Next Condensed.ttc') format('truetype');
          font-style: normal;
          font-weight: normal;
        }
        .diseño{
            box-shadow: 1px 1px 26px 2px rgba(80, 73, 73, 0.67);
        }
    </style>
@endpush
@section('body')
<div class="row" style="border-color:black">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="row border">
            <div class="col-md-12 mt-2">
                <div class="row mt-3 ms-3 me-3 mb-3 diseño">
                    <div class="col-md-12">
                        <div class="row mt-5 ms-3 me-3 mb-3">
                            <div class="col-md-12">
                                <a href="#" style="text-decoration: none;color: black;font-size: 30px;font-family: 'Avenir Next Condensed';"><i style="font-size:2rem;color:#b78b1e" id="shopping-cart"  class="fas fa-shopping-cart"></i> Carrito de Compra </a>
                            </div>
                            <div class="row">
                                @foreach($ordenes as $orden)
                                    @if($orden->categoria=='arte')
                                    <div class="col-md-6">
                                        <div class="row mt-5">
                                                <div class="col-md-5">
                                                    <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                </div>
                                                <div class="col-md-7" style="align-content: center;display: flex;">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                        </div>
                                                        <div class="col-md-12 mt-2"></div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">{{$orden->descripcion_arte}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Obra: {{$orden->obra}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Autor: {{$orden->autor}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Medidas: {{$orden->medidas}}</h5>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <h5 style="font-size:18px">Material: {{$orden->material_arte}}</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3"></div>
                                        <div class="col-md-3" style="align-items: center;display:flex;">
                                            <div class="row">
                                                <div class="col-md-3"></div>
                                                <div class="col-md-6">
                                                    <input id="cantidad" type="number" name="cantidad" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control">
                                                </div>
                                                <div class="col-md-3"></div>
                                            </div>
                                        </div>
                                    @elseif($orden->categoria=='relojes')
                                        <div class="col-md-6">
                                            <div class="row mt-5">
                                                    <div class="col-md-5">
                                                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-7" style="align-content: center;display: flex;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px"> Modelo: {{$orden->modelo_reloj}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Correa:{{$orden->correa}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Genero: {{$orden->genero_reloj}}</h5>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input style="text-align:center" id="cantidad" type="number" name="cantidad" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control" onchange="cambio_cantidad({{$orden->id}})">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                            </div>
                                            @elseif($orden->categoria=='ropa')
                                            <div class="col-md-6">
                                                <div class="row mt-5">
                                                        <div class="col-md-5">
                                                            <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                        </div>
                                                        <div class="col-md-7" style="align-content: center;display: flex;">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px"> Modelo: {{$orden->modelo_ropa}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px">{{$orden->genero_reloj}}</h5>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h5 style="font-size:18px">Color: {{$orden->color}}</h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3" style="align-items: center;display:flex;">
                                                </div>
                                                <div class="col-md-3" style="align-items: center;display:flex;">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input style="text-align:center" id="cantidad" type="number" name="cantidad" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control">
                                                        </div>
                                                        <div class="col-md-3">
                                                        </div>
                                                    </div>
                                                </div>
                                                @elseif($orden->categoria=='joyeria')
                                                <div class="col-md-6">
                                                    <div class="row mt-5">
                                                            <div class="col-md-5">
                                                                <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-7" style="align-content: center;display: flex;">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                                    </div>
                                                                    <div class="col-md-12 mt-1"></div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="font-size:18px"> Modelo: {{$orden->modelo_joyeria}}</h5>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <h5 style="font-size:18px">Material: {{$orden->material_joyeria}}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3" style="align-items: center;display:flex;">
                                                    </div>
                                                    <div class="col-md-3" style="align-items: center;display:flex;">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input style="text-align:center" id="cantidad" type="number" name="cantidad" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control" onchange="cambio_cantidad2({{$orden->id}})">
                                                            </div>
                                                            <div class="col-md-3">
                                                            </div>
                                                        </div>
                                                    </div>
                                    @elseif($orden->categoria=='vuelos')
                                        <div class="col-md-6">
                                            <div class="row mt-5">
                                                    <div class="col-md-5">
                                                        <img src="{{asset('storage/imagenes/productos/'.$orden->imagen)}}" class="img-fluid">
                                                    </div>
                                                    <div class="col-md-7" style="align-content: center;display: flex;">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h4 style="font-family: 'Avenir Next Condensed';font-weight: bolder;">{{$orden->nombre}}</h4>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="color:#b78b1e">{{$orden->precio}}</h5>
                                                            </div>
                                                            <div class="col-md-12 mt-1"></div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">{{$orden->descripcion_vuelos}}</h5>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <h5 style="font-size:18px">Fechas:{{$orden->fecha_inicio}}-{{$orden->fecha_final}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="align-items: center;display:flex;">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input style="text-align:center" id="cantidad" type="number" name="cantidad" value={{number_format($orden->cantidad_comprada,0)}} min="0" class="form-control">
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach          
                            </div>
                            <div class="row">
                                <div class="col-md-10"></div>
                                <div class="col-md-2">
                                    <div class="row mb-1">
                                        <div class="col-md-12">
                                            <h5 style="font-size:18px;color:#b78b1e;float: right;">Total Santos</h5>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12 border_bajo">
                                            <h5 class="mb-3" style="font-size:18px;float: right;">
                                            {{number_format($total,2)}}
                                        </h5>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12">
                                            <a href="#" style="font-size:20px;color:#b78b1e;float: right;font-weight:bolder;text-decoration:none">CONTINUAR</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4" style="text-align:center">
            <div class="col-md-12">
                <a href="{{url('/')}}" style="color:black;text-decoration:none;font-size:20px">SEGUIR COMPRANDO</a>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>
@endsection
@push('scripts') 
<script>
    async function cambio_cantidad(id){
        alert(id);
    }
    async function cambio_cantidad2(id){
        alert(id);
    }
</script>
@endpush