@extends('layouts.admin')

@section('titulo', 'Administración | Muestreos')
@section('titulo2', 'Lista de Muestreos')


@section('contenido')

<!-- Modal delete-->
<div id="DeleteModal" class="modal fade text-danger" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Modal content-->
            <form action="" id="deleteForm" method="post">
                
                    <div class="modal-header ">
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
                
            </form>
        </div>
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
                
                <div class="card-body panel panel-primary filterable">
                    <!--
                    <a href="{{route('muestreos.create')}}" class="btn btn-success">
                        <i class="fas fa-plus"></i>Agregar Trabajo Muestreo
                    </a>
                    <br><br>
                    -->

                    <!-- OTRA MANERA DE FILTRAR (INCLUYE COSAS EN EL CONTROLLER DE MUESTREO
                    <div class="row">
                        <div class="col-md-12">
                            <form >
                                <div class="form-group">
                                    <input class="form-control" type="text" name="criterio" id="txtCriterio"/>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary">Buscar</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    

                    <br><br>-->

                    <div class="pull-right">
                        <button class="btn btn-warning btn-filter">Filtrar</button>
                    </div>

                    <br/>


                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <!--
                                <th>Tipo de trabajo</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th>Usuario</th>
                                -->
                                
                                <!-- -->
                                <th>#</th>
                                <th><input type="text" class="form-control" placeholder="Tipo de trabajo" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Estado" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Fecha" disabled></th>
                                <th><input type="text" class="form-control" placeholder="Usuario" disabled></th>
                                <th>Acciones</th>
                    
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($muestreos as $muestreo)
                                <tr>
                                    <td>{{$muestreo->id}}</td>
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

<!-- Delete js -->
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

<!-- Filtro js -->
<script type="text/javascript">
    
    $(document).ready(function(){
        $('.filterable .btn-filter').click(function(){
            var $panel = $(this).parents('.filterable'),
            $filters = $panel.find('.filters input'),
            $tbody = $panel.find('.table tbody');
            if ($filters.prop('disabled') == true) {
                $filters.prop('disabled', false);
                $filters.first().focus();
            } else {
                $filters.val('').prop('disabled', true);
                $tbody.find('.no-result').remove();
                $tbody.find('tr').show();
            }
        });

        $('.filterable .filters input').keyup(function(e){
            /* Ignore tab key */
            var code = e.keyCode || e.which;
            if (code == '9') return;
            /* Useful DOM data and selectors */
            var $input = $(this),
            inputContent = $input.val().toLowerCase(),
            $panel = $input.parents('.filterable'),
            column = $panel.find('.filters th').index($input.parents('th')),
            $table = $panel.find('.table'),
            $rows = $table.find('tbody tr');
            /* Dirtiest filter function ever ;) */
            var $filteredRows = $rows.filter(function(){
                var value = $(this).find('td').eq(column).text().toLowerCase();
                return value.indexOf(inputContent) === -1;
            });
            /* Clean previous no-result if exist */
            $table.find('tbody .no-result').remove();
            /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
            $rows.show();
            $filteredRows.hide();
            /* Prepend no-result row if all rows are filtered */
            if ($filteredRows.length === $rows.length) {
                $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
            }
        });
    });

</script>

@endsection

@section('estilos')
@endsection
