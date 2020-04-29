@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Usuarios
@endsection
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row container-fluid">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">CREAR NUEVO ROL</h3>
                <div class="pull-right">
                    <a class="btn btn-default" href="{{ route('roles.index') }}"><i class="fa fa-reply-all"
                            aria-hidden="true"></i> Volver</a>
                </div>
            </div>
            <div class="modal-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong>Errores que Ocurrieron<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="/roles/create" method="GET" role="search">
                    <div class="input-group input-group-sm" style="width: 550px;">
                        <input type="text" name="buscar" class="form-control pull-left"
                            placeholder="Busqueda de permisos" v-model="buscar">
                        <div class="input-group-btn">
                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>
                <hr>

                <form action="{{ route('roles.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol:</label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name','class' =>
                                    'form-control'))
                                    !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="todas" style="font-size: 24px" class="text-danger"><input
                                                type="checkbox" name="todas" id="todas"
                                                onclick="marcar(this);">Seleccionar
                                            Todo</label>
                                    </div>
                                    <br />
                                    @foreach($permission as $value)
                                    <div class="col-md-3">
                                        <label style="font-size: 13px">
                                            {{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                            {{ $value->name }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </div>
                </form>
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