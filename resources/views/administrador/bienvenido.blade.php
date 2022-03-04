@extends('layouts.menu')
@section('body')
@if(Auth::check())
    @if(Auth::user()->tipo_usuario==2)
    @php
        header('Location:'.URL::to('/'),true,302);
        exit();
    @endphp
    @else
    <div class="container" style="text-align:center">
        <div class="col-md-12 mt-3">
            <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
            <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
            <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
            <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
            <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        </div>
        <div class="row mt-4" >
            <div class="col-md-12">
                <h1 style="font-weight:bold;font-family:italic;font-size:50px;">BIENVENIDO</h1>
            </div>
        </div>
        <div class="row mt-4" >
            <div class="col-md-12">
                <h4 style="color:gray;font-size:15px;">-SELECCIONE UNA OPCIÓN EN EL MENÚ</h4>
            </div>
        </div>
        <footer class="mt-5">
            <div class="col-md-12" >
                <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 80px;">
            </div>
        </footer>
    </div>
    @endif    
@endif
@endsection