<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\productos;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HistorialUsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $usuarios = User::all()->where("estatus","activo");
        return view("clientes.index_usuario",compact('usuarios'));
    }

        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("clientes.create_user");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->all();
        $user=User::create($validation);
        return response()->json("Usuario creado con exito",201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $usuario = User::find($id);
        return view('clientes.show_user',compact("usuario"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\historial_usuarios  $historial_usuarios
     * @return \Illuminate\Http\Response
     */


    public function edit(Request $request,$id)
    {
        $usuario = User::find($id);
        return view('clientes.edit_user',compact('usuario'));
        // $producto = productos::find($id);
        // return view('administrador.edit_producto',compact("producto"));
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
         $usuarios = User::find($historial);
         $update=$usuarios->update($request->all());
         return $update;
    }


    public function destroy($id)
    {
        //  
    }

    // FUNCIONES PARA LOGIN

    public function login(){
        return view("diseño.login");
    }

}
