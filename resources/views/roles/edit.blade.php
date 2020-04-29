@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Usuarios
@endsection
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row container-fluid">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">EDITAR EL ROL</h3>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('roles.index') }}"><i class="fa fa-reply-all"
                            aria-hidden="true"></i> Volver</a>
                </div>
            </div>
            <div class="box-body table-responsive">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ocurrio un error al editar el rol.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" id="name" name="name" class="form-control" placeholder="nombre del rol"
                                value="{{$role->name}}">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <h2><strong>Lista de Permisos</strong></h2>
                                <hr>
                            </div>
                            <div class="col-md-12">
                                <label for="todas" style="font-size: 20px"><input type="checkbox" name="todas"
                                        id="todas" onclick="marcar(this);">Seleccionar
                                    Todo</label>
                                <hr>
                            </div>
                            <br />
                            @foreach($permission as $value)
                            <div class="col-md-3">
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br />
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">EDITAR</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<script>
    function marcar(source) 
        {
            checkboxes=document.getElementsByTagName('input'); //obtenemos todos los controles del tipo Input
            for(i=0;i<checkboxes.length;i++) //recoremos todos los controles
            {
                if(checkboxes[i].type == "checkbox") //solo si es un checkbox entramos
                {
                    checkboxes[i].checked=source.checked; //si es un checkbox le damos el valor del checkbox que lo llamó (Marcar/Desmarcar Todos)
                }
            }
        }
</script>
@endsection