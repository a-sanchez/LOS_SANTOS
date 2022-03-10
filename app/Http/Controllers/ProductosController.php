<?php

namespace App\Http\Controllers;

use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ProductosController extends Controller
{public function index()
    {
        return view("administrador.bienvenido");
    }

    public function productos(){
        $productos = productos::all()->where("estatus",1);
        return view("administrador.index",compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("administrador.create_producto");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                "categoria"=>"string|required",
                "nombre"=>"string|required",
                "precio"=>"numeric|required",
                "inventario"=>"numeric|required",
                "imagen"=>"required|image|mimes:jpeg,png,jpg",
                 "descripcion_arte"=>"nullable|string",
                 "obra"=>"nullable|string",
                 "autor"=>"nullable|string",
                 "medidas"=>"nullable|string",
                 "material_arte"=>"nullable|string",
                 "modelo_reloj"=>"nullable|string",
                 "correa"=>"nullable|string",
                 "modelo_ropa"=>"nullable|string",
                 "color"=>"nullable|string",
                 "modelo_joyeria"=>"nullable|string",
                 "material_joyeria"=>"nullable|string",
                 "descripcion_vuelos"=>"nullable|string",
                 "fecha_inicio"=>"nullable|date",
                 "fecha_final"=>"nullable|date",
                 "genero_reloj"=>"nullable|string",
                 "genero_ropa"=>"nullable|string",
                 "inventario_back"=>"nullable"

            ]
        );
        $producto = productos::create($validate);
        $producto->setFile($validate["imagen"]);
        $productos = productos::all()->where("estatus",1);
        return view("administrador.index",compact('productos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $producto = productos::find($id);
        // dump($producto[0]->categoria);
        // die;
        return view('administrador.show_producto',compact("producto"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */


    public function edit(Request $request,$id)
    {
        $producto = productos::find($id);
        return view('administrador.edit_producto',compact("producto"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $historial)
    {
        $productos = productos::find($historial);
        $update=$productos->update($request->all());
        return $update;
    }

    public function actualizar(Request $request,int $id){
        // dump($id);
        // dd($request->imagen);
        $producto = productos::find($id);
        $producto->setFile($request->imagen);

        // switch($request->imagen){
        //     case 'imagen':
        //         $producto->setFile($request->imagen);
        //         break;
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */

    public function eliminar_imagen($id){
        $eliminar = productos::find($id);
        $eliminar -> delete_image();
        return response()->json("imagen eliminada");
        // Storage::disk("public")->delete("storage/imagenes/productos/".$eliminar->imagen);
        // $eliminar->update(['imagen'=> null]);
        //  return $eliminar;
    }
    public function destroy($id)
    {
         $eliminar = productos::find($id)
         ->update(['estatus'=> 0]);
        // // var_dump($eliminar);
        // // die;
        return $eliminar;
    }

    public function arte(){
        $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('productos.arte',compact('artes','date'));
    }

    public function relojes(){
        $relojes=productos::where('categoria','relojes')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('productos.relojes',compact('relojes','date'));
    }

    public function ropas(){
        $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('productos.ropa',compact('ropas','date'));
    }

    public function joyeria(){
        $joyas=productos::where('categoria','joyeria')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('productos.joyeria',compact('joyas','date'));
    }

    public function vuelos(){
        $vuelos=productos::where('categoria','vuelos')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        return view('productos.vuelos',compact('vuelos','date'));
    }

    public function datos(int $id){
        $data = productos::find($id);
        return response()-> json($data);
    }
    
}
