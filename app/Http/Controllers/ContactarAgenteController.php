<?php

namespace App\Http\Controllers;

use App\Models\ContactarAgente;
use Illuminate\Http\Request;

class ContactarAgenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = ContactarAgente::all();
        return view('contactos.contactar_agente',compact('registros'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dump($request->all());
        // die;
        $validation=$request->all();
        $registro = ContactarAgente::create($validation);
        return response()->json('contacto agregado',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactarAgente  $contactarAgente
     * @return \Illuminate\Http\Response
     */
    public function show(ContactarAgente $contactarAgente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactarAgente  $contactarAgente
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactarAgente $contactarAgente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactarAgente  $contactarAgente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $producto = ContactarAgente::find($id);
        $update = $producto->update($request->all());
        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactarAgente  $contactarAgente
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactarAgente $contactarAgente)
    {
        //
    }
}
