@extends('layouts.admin')

@section('titulo', 'Administración | Muestreos')
@section('titulo2', 'Lista de Muestreos')


@section('contenido')




<div class="container-fluid">
    <a class="btn btn-success btn-sm" style="margin-left: 11px" href="{{route('muestreos.index')}}">
        <i class="fas fa-arrow-left"></i>
            Volver a lista de muestreos
    </a>
    <br><br>

    <div class="row">

        <div class="col-md-12">

            @if(Session::has('exito'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i>¡Exito!</h5>
                {{Session::get('exito')}}
              </div>
            @endif

            @if(Session::has('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> ¡Error! </h5>
                {{Session::get('error')}}
              </div>
            @endif
            <!---->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Muestreo: #{{$muestreo->id}}</h3>

                </div>
                
                <div class="card-body">
                    
                        <h5 style="background-color: #ffffe0; color: #364a91;">Tipo de trabajo:</h5>
                        <div >{{$muestreo->tipo_trabajo}}</div>
                        <h5 style="background-color: #f5ebff; color: #364a91;">Descripción:</h5>
                        <p>{{$muestreo->descripcion}}</p>
                        <h5 style="background-color: #ffffe0; color: #364a91;">Nombre del cliente:</h5>
                        <p>{{$muestreo->nombre_cliente}}</p>
                        <h5 style="background-color: #f5ebff; color: #364a91;">Nombre del negocio:</h5>
                        <p>{{$muestreo->nombre_negocio}}</p>
                        <h5 style="background-color: #ffffe0; color: #364a91;">RFC del negocio:</h5>
                        <p>{{$muestreo->rfc_negocio}}</p>
                        <h5 style="background-color: #f5ebff; color: #364a91;">Fecha:</h5>
                        <p>{{$muestreo->fecha}}</p>
                        <h5 style="background-color: #ffffe0; color: #364a91;">Ubicación:</h5>
                        <p>{{$muestreo->ubicacion}}</p>
                        <h5 style="background-color: #f5ebff; color: #364a91;">Estado actual:</h5>
                        <p>{{$muestreo->estado}}</p>
                        <h5 style="background-color: #ffffe0; color: #364a91;">Usuario que lo realizo:</h5>
                        <p>{{$muestreo->usuario}}</p>
                   

                </div>
            </div>

        </div>
    </div>
</div>


@endsection

@section('scripts')
@endsection

@section('estilos')
@endsection
