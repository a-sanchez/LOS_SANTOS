<?php

namespace App\Http\Controllers;

use App\Models\ordenes;
use Illuminate\Http\Request;
use App\Models\historial_usuarios;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class OrdenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all()->where("estatus", "activo")->where("tipo_usuario",2);

        return view('ordenes.index_ordenes', compact("usuarios"));
    }

    public function historial(Request $request, $id)
    {
        $name = ordenes::where('id_usuario', $id)->first();
        $usuario = DB::table('ordenes')
            ->select('folio', 'id_usuario', 'estatus', 'created_at', 'folio', 'id','fecha')
            ->where('id_usuario', $id)
            ->groupBy('folio', 'estatus','fecha')
            ->get();
        return view('ordenes.historial_ordenes',compact("name", "usuario"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    


    public function ordenes(Request $request, $id, $fecha,$folio)
    {
        $historiales = DB::table('ordenes')
            ->join('productos', 'ordenes.id_producto', 'productos.id')
            ->join('users', 'ordenes.id_usuario', 'users.id')
            ->select(
                'ordenes.*',
                'productos.categoria',
                'productos.nombre',
                'productos.precio',
                'productos.inventario',
                'productos.imagen',
                'productos.descripcion_arte',
                'productos.obra',
                'productos.autor',
                'productos.medidas',
                'productos.material_arte',
                'productos.modelo_reloj',
                'productos.correa',
                'productos.modelo_ropa',
                'productos.color',
                'productos.modelo_joyeria',
                'productos.material_joyeria',
                'productos.descripcion_vuelos',
                'productos.fecha_inicio',
                'productos.fecha_final',
                'productos.estatus',
                'productos.genero_reloj',
                'users.name',
                DB::raw('(ordenes.cantidad_comprada * productos.precio) as total')
            )
            ->where('ordenes.fecha', $fecha)
            ->where('ordenes.id_usuario', $id)
            ->where('folio',$folio)
            ->where('ordenes.id_status', 1)
            ->get();
        $orden = str_pad($historiales[0]->folio . "/" . date("Y"), 10, "0", STR_PAD_LEFT);
        return view('ordenes.ordenes_show', compact('historiales', 'orden'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //  var_dump($request->all());
        //  die;
    }
    public function eliminar_producto(Request $request, $id)
    {
        $orden = historial_usuarios::where('id_orden', $id)
            ->update(['id_status' => $request['id_status']]);
        return $orden;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function edit_product_orden(Request $request, $id)
    {
        $usuario = ordenes::where('id', $id)->get();
        $total = DB::table('ordenes')
            ->join('productos', 'ordenes.id_producto', 'productos.id')
            ->select(DB::raw('(ordenes.cantidad_comprada * productos.precio) as total'))
            ->where('ordenes.id', $id)
            ->get();
        return view('ordenes.edit_producto_orden', compact('usuario', 'total'));
    }
    public function edit(Request $request, $id)
    {
        $usuario = historial_usuarios::where('id_usuario', $id)->first();
        return view('ordenes.ordenes_edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // var_dump($request->all());
        // die;
        $orden = ordenes::find($id);
        $update = $orden->update($request->all());
        return $update;
    }

    public function actualizar_ordenes(Request $request, $id,$fecha){
        $historiales = DB::table('ordenes')
            ->join('productos', 'ordenes.id_producto', 'productos.id')
            ->join('users', 'ordenes.id_usuario', 'users.id')
            ->select(
                'ordenes.*',
                'productos.categoria',
                'productos.nombre',
                'productos.precio',
                'productos.inventario',
                'productos.imagen',
                'productos.descripcion_arte',
                'productos.obra',
                'productos.autor',
                'productos.medidas',
                'productos.material_arte',
                'productos.modelo_reloj',
                'productos.correa',
                'productos.modelo_ropa',
                'productos.color',
                'productos.modelo_joyeria',
                'productos.material_joyeria',
                'productos.descripcion_vuelos',
                'productos.fecha_inicio',
                'productos.fecha_final',
                'productos.estatus',
                'productos.genero_reloj',
                'users.name',
                DB::raw('(ordenes.cantidad_comprada * productos.precio) as total')
            )
            ->where('ordenes.fecha', $fecha)
            ->where('ordenes.id_usuario', $id)
            ->where('ordenes.id_status', 1)
            ->get();
            return $historiales;
    }

    public function actualizar(Request $request, $id)
    {
        $cambio = $request["cantidad_comprada"];
        $usuario = ordenes::where('id', $id)
            ->update(['cantidad_comprada' => $cambio]);
        // var_dump($usuario);
        // die;
        return $usuario;
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function destroy(ordenes $ordenes)
    {
        //
    }
}
