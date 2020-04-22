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

            
            <!---->
            <div class="card">

                <div class="card-header">

                    <h3 class="card-title">Crear Muestreo</h3>

                </div>
                
                <div class="card-body">
                    
                    <form method="POST" enctype="multipart/form-data" action="{{route('muestreos.store')}}">

                        @csrf
                    
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Tipo de trabajo:</label>
                            <input name= "txtTipoTrabajo" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Descripcion:</label>
                            <textarea name="txtDescripcion" rows="12" class="form-control" ></textarea>
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Nombre del cliente:</label>
                            <input name= "txtNombreCliente" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Nombre del negocio:</label>
                            <input name= "txtNombreNegocio" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">RFC del negocio:</label>
                            <input name= "txtRfcNegocio" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Fecha (Año, Mes, Dia):</label>
                            <input name= "txtFecha" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Ubicación:</label>
                            <input name= "txtUbicacion" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #f5ebff; color: #364a91;">Estado actual:</label>
                            <input name= "txtEstado" type="text"  class="form-control" />
        
                        </div>
                        <div class="form-group">

                            <label style="background-color: #ffffe0; color: #364a91;">Usuario que lo realizo:</label>
                            <input name= "txtUsuario" type="text"  class="form-control" />
        
                        </div>
                            
                            
                        <div class="form-group">

                            <button class="btn btn-primary">Guardar</button>
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