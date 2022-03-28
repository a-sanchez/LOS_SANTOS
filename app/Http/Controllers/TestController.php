<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    public function sendMailWithPDF()
    {
        $email = Auth::user()->email;
        $nombre = Auth::user()->name;
        $user=Auth::user()->id;
        $date=Carbon::today();
        $folio = DB::table('ordenes')
                ->select('folio')
                ->whereDate('ordenes.created_at',$date)
                ->max('folio');
        $ordenes=DB::table('ordenes')
                 ->select('ordenes.*','productos.categoria','productos.nombre','productos.nombre',
                 'productos.precio','productos.inventario','productos.imagen','productos.descripcion_arte',
                 'productos.obra','productos.autor','productos.medidas','productos.material_arte',
                 'productos.modelo_reloj','productos.correa','productos.modelo_ropa','productos.color',
                 'productos.modelo_joyeria','productos.material_joyeria','productos.descripcion_vuelos',
                 'productos.fecha_inicio','productos.fecha_final','productos.estatus','productos.genero_reloj','productos.genero_ropa',DB::raw('(productos.precio * ordenes.cantidad_comprada) as total'))
                ->join('productos','productos.id','=','ordenes.id_producto')
                ->where('ordenes.id_usuario',$user)
                ->whereDate('ordenes.created_at',$date)
                ->where('folio',$folio)
                ->get();
        $folio =str_pad($ordenes[0]->folio . "/" . date("Y"), 10, "0", STR_PAD_LEFT);
        $data["email"] = $email;
        $data["nombre"] = $nombre;
        $data["title"] = "¡GRACIAS POR TU COMPRA!";
        $data["date"]=$date;
        $data["ordenes"]=$ordenes;
        $data["folio"]=$folio;
        // dd($data);

        $pdf = \PDF::loadView('correo.plantilla', $data);
        Mail::send('correo.gracias', $data, function ($message) use ($data, $pdf) {
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "orden.pdf");
        });

        return redirect('/');
    }
}
