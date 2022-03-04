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
        $usuarios = User::all()->where("estatus","activo");
        return view('ordenes.index_ordenes',compact("usuarios"));
    }

    public function historial(Request $request,$id){
        $name= historial_usuarios::where('id_usuario',$id)->first();
        $usuario = DB::table('historial_usuarios')
                    ->select('folio','fecha_comprada','id_usuario','estatus')
                    ->where('id_usuario',$id)
                    ->groupBy('fecha_comprada','folio','estatus')
                    ->get();
        $total=DB::table("historial_usuarios")
        ->join('productos','historial_usuarios.id_producto','productos.id')
        ->select(DB::raw('SUM((historial_usuarios.cantidad_comprada * productos.precio)) as total'))
        ->where("id_status",1)
        ->get();
        // var_dump($total);
        // die;
        return view('ordenes.historial_ordenes',compact("name","usuario","total"));
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

    public function ordenes(Request $request,$id,$folio){
        // $historiales = historial_usuarios::with('productos')
        //                 -where('id_usuario',$id)
        //                 ->where('folio',$folio)
        //                 ->get();
        $historiales = DB::table('historial_usuarios')
                    ->join('productos','historial_usuarios.id_producto','productos.id')
                    ->join('users','historial_usuarios.id_usuario','users.id')
                    ->select('historial_usuarios.*','productos.*','users.name',DB::raw('(historial_usuarios.cantidad_comprada * productos.precio) as total'))
                    ->where('historial_usuarios.folio',$folio)
                    ->where('historial_usuarios.id_usuario',$id)
                    ->where('historial_usuarios.estatus',1)
                    ->where('historial_usuarios.id_status',1)
                    ->get();
        return view('ordenes.ordenes_show',compact('historiales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        //  var_dump($request->all());
        //  die;
    }
    public function eliminar_producto(Request $request,$id)
    {
        $orden=historial_usuarios::where('id_orden',$id)
        ->update(['id_status'=>$request['id_status']]);
         return $orden;
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ordenes  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function edit_product_orden(Request $request,$id){
        $usuario = historial_usuarios::where('id_orden',$id)->get();
        $total = DB::table('historial_usuarios')
        ->join('productos','historial_usuarios.id_producto','productos.id')
        ->select(DB::raw('(historial_usuarios.cantidad_comprada * productos.precio) as total'))
        ->where('historial_usuarios.id_orden',$id)
        ->get();
    return view('ordenes.edit_producto_orden',compact('usuario','total'));
    }
    public function edit(Request $request,$id)
    {   $usuario = historial_usuarios::where('id_usuario',$id)->first();
        return view('ordenes.ordenes_edit',compact('usuario'));
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
         $orden=historial_usuarios::find($id);
         $update=$orden->update($request->all());
         return $update;
    }

    public function actualizar(Request $request,$id){
        $cambio = $request["cantidad_comprada"];
        $usuario = historial_usuarios::where('id_orden',$id)
        ->update(['cantidad_comprada'=>$cambio]);
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
