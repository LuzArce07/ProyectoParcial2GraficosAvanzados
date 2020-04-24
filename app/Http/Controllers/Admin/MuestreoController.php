<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;

use App\Muestreo;

class MuestreoController extends Controller
{

    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        //Verificar si en la solicitud viene un parametro llamado 'criterio' (para filtar)
        $criterio = $request->input('criterio');
        $muestreos = array();
        if($criterio) {
            
            //Busca el resultado por el criterio
            //Esto seria igual a que pusiera:
            //SELECT * FROM muestreo WHERE tipo_trabajo LIKE '%criterio%'
            $muestreos = Muestreo::where('tipo_trabajo', 'LIKE', '%'.$criterio.'%')->get();


        } else {

            //Me trae todo
            $muestreos = Muestreo::all();

        }
        */

        $muestreos = Muestreo::leftJoin(
            'estado', //La tabla a unir
            'estado.id_estado', //primer columna a evaluar
            '=', //Como lo va a evaluar
            'muestra.id_estado' //segunda columna a evaluar
        )->get();

        

        //DESCOMENTARIAR ESTO DESPUES---------------
        //$muestreos = Muestreo::all();

        $argumentos = array();
        $argumentos['muestreos'] = $muestreos;

        return view('admin.muestreos.index', $argumentos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.muestreos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $muestreo = new Muestreo();
        
        $muestreo->tipo_trabajo = $request->input('txtTipoTrabajo');
        $muestreo->descripcion = $request->input('txtDescripcion');
        $muestreo->nombre_cliente = $request->input('txtNombreCliente');
        $muestreo->nombre_negocio = $request->input('txtNombreNegocio');
        $muestreo->rfc_negocio = $request->input('txtRfcNegocio');
        $muestreo->fecha = $request->input('txtFecha');
        $muestreo->ubicacion = $request->input('txtUbicacion');
        $muestreo->estado = $request->input('txtEstado');
        $muestreo->usuario = $request->input('txtUsuario');

        if ($muestreo->save()) {

            //Si pude guardar la noticia
            return redirect()->route('muestreos.index')->with('exito', '¡El muestreo ha sido guardado con éxito!');
            

        }

        //Aqui no se pudo guardar
        return redirect()->route('muestreos.index')->with('error', 'No se pudo agregar el muestreo');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $muestreo = Muestreo::find($id);
        if($muestreo){
            $argumentos = array();
            $argumentos['muestreo'] = $muestreo;
            return view('admin.muestreos.show', $argumentos);
        }
        return redirect()->route('muestreos.index')->with('error', 'No se encontró el muestreo solicitado');
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $muestreo = Muestreo::find($id);
        //Si encontro el muestreo redirigete al edit
        if($muestreo){

            $argumentos = array();
            $argumentos['muestreo'] = $muestreo;
            return view('admin.muestreos.edit', $argumentos);

        }

        return redirect()->route('muestreos.index')->with('error', 'No se encontró el muestreo');
    
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
        if($muestreo){

            $muestreo->tipo_trabajo = $request->input('txtTipoTrabajo');
            $muestreo->descripcion = $request->input('txtDescripcion');
            $muestreo->nombre_cliente = $request->input('txtNombreCliente');
            $muestreo->nombre_negocio = $request->input('txtNombreNegocio');
            $muestreo->rfc_negocio = $request->input('txtRfcNegocio');
            $muestreo->fecha = $request->input('txtFecha');
            $muestreo->ubicacion = $request->input('txtUbicacion');
            $muestreo->estado = $request->input('txtEstado');
            $muestreo->usuario = $request->input('txtUsuario');
            

            if($muestreo->save()){

                return redirect()->route('muestreos.edit',$id)->with('exito','¡El muestreo se ACTUALIZÓ exitosamente!');
                
            }
            
            return redirect()->route('muestreos.edit',$id)->with('error','El muestreo NO se pudo actualizar');
            
        }

        return redirect()->route('muestreos.index')->with('error','No se encontró el muestreo');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $muestreo = Muestreo::find($id);

        if($muestreo){

            if($muestreo->delete()){

                return redirect()->route('muestreos.index')->with('exito', 'Muestreo eliminado exitosamente!');

            }

            return redirect()->route('muestreos.index')->with('error', 'No se puedo eliminar el muestreo');

        }

        return redirect()->route('muestreos.index')->with('error', 'No se encontró el muestreo');

    }

}
