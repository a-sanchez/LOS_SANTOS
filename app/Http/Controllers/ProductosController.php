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
                 "inventario_back"=>"nullable",
                 "mililitros"=>"nullable|string",
                 "tallas_disponibles"=>"nullable|string",


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

    public function arte(Request $request, $categoria){
        if($categoria=="1"){
            $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
            }
            elseif($categoria=="2"){
                $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')
                            ->whereBetween('precio',[1,10])
                            ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="3"){
                $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')
                            ->whereBetween('precio',[10,20])
                            ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="4"){
                $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')
                            ->whereBetween('precio',[20,30])
                            ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="5"){
                $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')
                            ->whereBetween('precio',[30,40])
                            ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="6"){
                $artes=productos::where('categoria','arte')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')
                            ->whereBetween('precio',[40,50])
                            ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }

        return view('productos.arte',compact('artes','date','categorias'));
    }

    public function relojes(Request $request,$categoria){
        if($categoria=="1"){
        $relojes=productos::where('categoria','relojes')
                            ->where('imagen','!=','NULL')
                            ->where('estatus','1')->get();
        $date = Carbon::now()->format('Y-m-d');
        $categorias =$categoria; 
        }
        elseif($categoria=="2"){
            $relojes=productos::where('categoria','relojes')
            ->where('imagen','!=','NULL')
            ->where('estatus','1')
            ->whereBetween('precio',[1,10])
            ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
        }
        elseif($categoria=="3"){
            $relojes=productos::where('categoria','relojes')
            ->where('imagen','!=','NULL')
            ->where('estatus','1')
            ->whereBetween('precio',[10,20])
            ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
        }
        elseif($categoria=="4"){
            $relojes=productos::where('categoria','relojes')
            ->where('imagen','!=','NULL')
            ->where('estatus','1')
            ->whereBetween('precio',[20,30])
            ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
        }
        elseif($categoria=="5"){
            $relojes=productos::where('categoria','relojes')
            ->where('imagen','!=','NULL')
            ->where('estatus','1')
            ->whereBetween('precio',[30,40])
            ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
        }
        elseif($categoria=="6"){
            $relojes=productos::where('categoria','relojes')
            ->where('imagen','!=','NULL')
            ->where('estatus','1')
            ->whereBetween('precio',[40,50])
            ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
        }
        return view('productos.relojes',compact('relojes','date','categorias'));
    }

    public function ropas(Request $request, $categoria){
        if($categoria=="1"){
            $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
            }
            elseif($categoria=="2"){
                $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[1,10])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="3"){
                $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[10,20])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="4"){
                $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                ->whereBetween('precio',[20,30])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="5"){
                $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                ->whereBetween('precio',[30,40])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="6"){
                $ropas=productos::where('categoria','ropa')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                ->whereBetween('precio',[40,50])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; }
        return view('productos.ropa',compact('ropas','date','categorias'));
    }

    public function joyeria(Request $request, $categoria){
        if($categoria=="1"){
            $joyas=productos::where('categoria','joyeria')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')->get();
            $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
            }
            elseif($categoria=="2"){
                $joyas=productos::where('categoria','joyeria')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[1,10])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="3"){
                $joyas=productos::where('categoria','joyeria')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[10,20])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="4"){
                $joyas=productos::where('categoria','joyeria')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[20,30])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="5"){
                $joyas=productos::where('categoria','joyeria')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[30,40])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="6"){
                $joyas=productos::where('categoria','joyeria')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[40,50])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; }
        return view('productos.joyeria',compact('joyas','date','categorias'));
    }

    public function licores(Request $request, $categoria){
        if($categoria=="1"){
            $vuelos=productos::where('categoria','licores')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->get();
        $date = Carbon::now()->format('Y-m-d');
            $categorias =$categoria; 
            }
            elseif($categoria=="2"){
                $vuelos=productos::where('categoria','licores')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[1,10])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="3"){
                $vuelos=productos::where('categoria','licores')
                        ->where('imagen','!=','NULL')
                        ->where('estatus','1')
                        ->whereBetween('precio',[10,20])
                        ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="4"){
                $vuelos=productos::where('categoria','licores')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[20,30])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="5"){
                $vuelos=productos::where('categoria','licores')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[30,40])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; 
            }
            elseif($categoria=="6"){
                $vuelos=productos::where('categoria','licores')
                ->where('imagen','!=','NULL')
                ->where('estatus','1')
                ->whereBetween('precio',[40,50])
                ->get();
                $date = Carbon::now()->format('Y-m-d');
                $categorias =$categoria; }
        return view('productos.vuelos',compact('vuelos','date','categorias'));
    }

    public function datos(int $id){
        $data = productos::find($id);
        return response()-> json($data);
    }
    
}
