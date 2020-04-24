<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Muestreo;

class MuestreoApiController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->middleware('capturista');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //http://localhost:8000/admin/muestra?criterio=algo

    public function index(Request $request)
    {

        $muestreos = Muestreo::where('usuario','=', $request->user()->id)->get();

        $respuesta = array();        
        $respuesta['muestras'] = $muestreos;

        //Envio respuesta
        return $respuesta;

    }

    //Filtrar en el Api muestras por fecha y que el estado sea nuevo (1)
    public function filtrarNuevas(Request $request)
    {

        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $estadoNuevo = 1;

        $respuesta = array();

        if($fechaInicio && $fechaFin) {
        
            $muestreos = Muestreo::where('usuario','=', $request->user()->id)->
            where('fecha', '>=', $fechaInicio)->
            where('fecha', '<=', $fechaFin)->
            where('id_estado', '=', $estadoNuevo)
            ->get();

            $respuesta['muestras'] = $muestreos;

        } else {

            $muestreos = Muestreo::all();

            $respuesta['muestras'] = $muestreos;

        }

        //Envio respuesta
        return $respuesta;

    }

    //Filtrar en el Api muestras por fecha y que el estado sea finalizado (3)
    public function filtrarFinalizado(Request $request)
    {

        $fechaInicio = $request->input('fechaInicio');
        $fechaFin = $request->input('fechaFin');

        $estadoFinalizado = 3;

        $respuesta = array();

        if($fechaInicio && $fechaFin) {
        
            $muestreos = Muestreo::where('usuario','=', $request->user()->id)->
            where('fecha', '>=', $fechaInicio)->
            where('fecha', '<=', $fechaFin)->
            where('id_estado', '=', $estadoFinalizado)
            ->get();

            $respuesta['muestras'] = $muestreos;

        } else {

            $muestreos = Muestreo::all();

            $respuesta['muestras'] = $muestreos;

        }

        //Envio respuesta
        return $respuesta;

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
        //$nuevoMuestreo->id_estado = $request->input('estado');
        
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
         // Find primary key
         $muestreos = Muestreo::find($id);

         if($muestreos){
             $respuesta = array();
             $respuesta['muestras'] = $muestreos;
         } 
         else 
             $respuesta['muestras']= "No se encontro la muestras";
 
         return $respuesta;
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
        $muestreo = Muestreo::find($id);
        
        //$muestreo->tipo_trabajo = $request->input('tipo_trabajo');
        //$muestreo->descripcion = $request->input('descripcion');
        //$muestreo->nombre_cliente = $request->input('nombre_cliente');
        //$muestreo->nombre_negocio = $request->input('nombre_negocio');
        //$muestreo->rfc_negocio = $request->input('rfc_negocio');
        //$muestreo->fecha = $request->input('fecha');
        //$muestreo->ubicacion = $request->input('ubicacion');

        $muestreo->id_estado = $request->input('id_estado');

        // Arma una respuesta
        $respuesta = array();
        $respuesta['exito'] = false;
        if($muestreo -> save()){
            $respuesta['exito'] = true;
        }

        // Regresa una respuesta
        return $respuesta;

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
