@extends('vendor.adminlte.layouts.app')
@section('htmlheader_title')
Gestión de Roles y Permisos
@endsection
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
	<div class="row">
		<!------------------------------------------------------------------------------------------------------->
		<div class="box box-primary panel-group" style="border: 1px solid #3c8dbc;">
			<div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Gestión de los Roles de los usuarios</h3>
				<a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i
						class="fa fa-reply-all" aria-hidden="true"></i>
					Volver</a>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-12 margin-tb">
						<div class="pull-left">
							@can('create roles')
							<a class="btn btn-success" href="{{ route('roles.create') }}"><i class="fa fa-plus-square-o"
									aria-hidden="true"></i> Crear Nuevo Rol</a>
							@endcan
						</div>
					</div>
				</div>
			</div>
		</div>
		@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
		@endif
		<div class="box box-primary panel-group" style="border: 1px solid #3c8dbc;">
			<div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Listado de Roles</h3>
				<div class="box-tools">
					<form action="/roles" method="GET">
						<div class="input-group input-group-sm" style="width: 300px;">
							<input type="text" name="buscar" class="form-control pull-right" placeholder="Buscar"
								v-model="buscar">
							<div class="input-group-btn">
								<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
				<table class="table table-hover table-bordered table-dark table-condensed table-striped">
					<tr>
						<th style="border:1px solid #ddd;padding: 5px; width: 10%;">#</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 50%;">Rol</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 40%;">Gestión</th>
					</tr>
					@foreach ($roles as $key => $role)
					<tr>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ ++$i }}</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ $role->name }}
						</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
							<center>
								@can('read roles', Model::class)
								<a class="btn btn-info btn-sm" href="{{ route('roles.show',$role->id) }}"
									title="ver el rol y sus permiso"><i class="fa fa-eye"></i></a>
								@endcan
								@can('update roles', Model::class)
								<a class="btn btn-primary btn-sm" href="{{ route('roles.edit',$role->id) }}"
									title="editar un rol"><i class="fa fa-edit"></i></a>
								@endcan
								@can('delete roles', Model::class)
								{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy',
								$role->id],'style'=>'display:inline']) !!}
								<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"
										title="eliminar un rol"></i></button>
								{!! Form::close() !!}
								@endcan
							</center>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			<!-- /.box-body -->
		</div>
		<div class="alert alert-danger">
			<h3>RECOMENDACIONES</h3>
			<ul style="font-family: sans-serif;">
				<li>
					Modificar los permisos del rol admin causaria problemas en el sistema ya que el rol
					admin cuenta con todo los permisos.
				</li>
				<li>
					Para tener un rol personalizado es recomendable crear un nuevo rol y no modificar alguno de
					los roles que viene por defecto en el sistema
				</li>
				<li>
					para poder dar permisos de editar y/o crear tambien se tiene que dar los permisos de read
					para poder ingresar en las vistas
				</li>
				<li>
					Para que un usuario no tenga no ningun permiso se tiene que desactivar el usuario en la
					interfaz de usuario ala cual solo tiene acceso el super-admin
				</li>
				<strong>
					<li>create = crear</li>
					<li>read = leer</li>
					<li>update = editar</li>
					<li>delete = eliminar</li>
					<li style="list-style: none;color: blue">ejemplo:</li>
					<li style="list-style: none;">create usuario = crear usuarios</li>
					<li style="list-style: none;">read usuario = navegar y visualizar usuarios</li>
					<li style="list-style: none;">update usuario = editar usuarios</li>
					<li style="list-style: none;">delete usuario = eliminar usuarios</li>
				</strong>
				<br>
				<h4 style="text-decoration: underline">Roles del sistema por defecto</h4>
				<br>
				<li>
					<strong>Rol Admin</strong> : Acceso Total
				</li>
				<li>
					<strong>Rol Editor</strong> : tiene permisos solo para editar la informacion excepto el de
					los usuarios y roles
				</li>
				<li>
					<strong>Rol Invitado</strong> : tiene permisos solo para navegar y visualizar la
					informacion excepto el de los usuarios y roles
				</li>
			</ul>
		</div>
	</div>
</div>
{!! $roles->render() !!}
@endsection