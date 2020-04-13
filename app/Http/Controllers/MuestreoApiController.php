<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Muestreo;

class muestreoApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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

        //Crea instancia del modelo
        $nuevoMuestreo = new Muestreo();

        //Llena el modelo con info de la solicitud
        $nuevoMuestreo->usuario = $request->user()->id;
        $nuevoMuestreo->tipo_trabajo = $request->input('tipo_trabajo');
        $nuevoMuestreo->descripcion = $request->input('descripcion');
        $nuevoMuestreo->nombre_cliente = $request->input('nombre_cliente');
        $nuevoMuestreo->nombre_negocio = $request->input('nombre_negocio');
        $nuevoMuestreo->rfc_negocio = $request->input('rfc_negocio');
        $nuevoMuestreo->fecha = $request->input('fecha');
        $nuevoMuestreo->ubicacion = $request->input('ubicacion');
        $nuevoMuestreo->estado = $request->input('estado');
        
        //Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;

        if ($nuevoMuestreo->save()) {
            $respuesta['exito'] = true;
        }

        //Regresa la respuesta
        return $respuesta;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
