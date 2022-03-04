@extends('layouts.nav')
@push('styles')
    <style>
        body,html{
            background-image: url('images/background.jpg');
            background-position: center;
            background-repeat:no-repeat; 
            background-size: cover; 
            height: 100%;
        }
        a{
            color:white;
        }
        #colorlib-main {
          float:none;
          width: 100%;
        }
        footer {
         position: fixed;
         bottom: 25px;            
        }
    </style>
@endpush
@section('body')
<div class="col-md-12 col-lg-12 col-xl-12 col-sm-12" style="text-align:center">
</div>
<footer style="width: 90%;">
    <div class="row">
        <div class="col-md-12" style="text-align:end">
           
        </div>
    </div>
</footer>
@endsection