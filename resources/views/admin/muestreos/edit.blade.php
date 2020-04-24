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

                    <h3 class="card-title">Edtiar Muestreo: #{{$muestreo->id}}</h3>

                </div>
                
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('muestreos.update',$muestreo->id)}}">

                        @csrf
                        @method('PUT')
                    
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Tipo de trabajo:</label>
                            <input name= "txtTipoTrabajo" type="text" value="{{$muestreo->tipo_trabajo}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Descripcion:</label>
                            <textarea name="txtDescripcion" rows="12" class="form-control" >{{$muestreo->descripcion}}</textarea>
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Nombre del cliente:</label>
                            <input name= "txtNombreCliente" type="text" value="{{$muestreo->nombre_cliente}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Nombre del negocio:</label>
                            <input name= "txtNombreNegocio" type="text" value="{{$muestreo->nombre_negocio}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">RFC del negocio:</label>
                            <input name= "txtRfcNegocio" type="text" value="{{$muestreo->rfc_negocio}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Fecha:</label>
                            <input name= "txtFecha" type="text" value="{{$muestreo->fecha}}" class="form-control" readonly />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Ubicación:</label>
                            <input name= "txtFecha" type="text" value="{{$muestreo->ubicacion}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Estado actual:</label>
                            <input name= "txtEstado" type="text" value="{{$muestreo->id_estado}}" class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Usuario que lo realizo:</label>
                            <input name= "txtUsuario" type="text" value="{{$muestreo->usuario}}" class="form-control" readonly/>
        
                        </div>
                            
                            
                        <div class="form-group">

                            <button class="btn btn-primary">Actualizar</button>
                        </div>  
                    </form>

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
