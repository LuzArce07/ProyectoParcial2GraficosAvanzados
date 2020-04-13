@extends('layouts.admin')

@section('titulo', 'Administración | Muestreos')
@section('titulo2', 'Lista de Muestreos')





@section('contenido')
<!-- Modal -->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
      <!-- Modal content-->
      <form action="" id="deleteForm" method="post">
          <div class="modal-content">
              <div class="modal-header bg-danger">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title text-center">Borrar muestreo</h4>
              </div>
              <div class="modal-body">
                 @csrf
                 @method('DELETE')
                  <p class="text-center">¿Seguro que quieres borrar el muestreo?</p>
              </div>
              <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                      <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">Si, borrar</button>
              </div>
          </div>
      </form>
    </div>
</div>

<div class="container-fluid">
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

                    <h3 class="card-title">@yield('titulo2')</h3>

                </div>
                
                <div class="card-body">
                    <!--
                    <a href="{{route('muestreos.create')}}" class="btn btn-success">
                        <i class="fas fa-plus"></i>Agregar Trabajo Muestreo
                    </a>
                    <br><br>
                    -->

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tipo de trabajo</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <tbody>

                           

                            @foreach($muestreos as $muestreo)
                                <tr>
                                    <td>{{$muestreo->tipo_trabajo}}</td>
                                    <td>{{$muestreo->estado}}</td>
                                    <td>{{$muestreo->fecha}}</td>
                                    <td>{{$muestreo->usuario}}</td>

                                    <td>
                                        <form method="POST" action="{{route('muestreos.destroy', $muestreo->id)}}">

                                            <a href="{{route('muestreos.show',$muestreo->id)}}" class="btn btn-primary">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{route('muestreos.edit',$muestreo->id)}}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            
                                                @csrf
                                                @method('DELETE')

                                                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$muestreo->id}})" data-target="#DeleteModal" class="btn btn-danger">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    function deleteData(id)
    {
        var id = id;
        var url = '{{ route("muestreos.destroy", ":id") }}';
        url = url.replace(':id', id);
        $("#deleteForm").attr('action', url);
    }
    function formSubmit()
    {
        $("#deleteForm").submit();
    }
 </script>
@endsection

@section('estilos')
@endsection
