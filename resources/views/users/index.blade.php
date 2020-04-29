@extends('vendor.adminlte.layouts.app')

@section('htmlheader_title')
Gestión de Usuarios
@endsection

<style type="text/css">
	#modaltamanio {
		width: 70% !important;
	}

	.swal2-popup {
		font-size: 1.175em !important;
	}
</style>
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">
	<div class="row">
		{{-- ------------------------------------- boton crea --------------------------------------------------}}
		<div class="box box-primary panel-group">
			<div class="box-header with-border"
				style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Gestión de usuarios</h3>
				<a style="float: right;" type="button" class="btn btn-default" href="{{URL::to('home')}}"><i
						class="fa fa-reply-all" aria-hidden="true"></i>
					Volver</a>
			</div>
			<div class="box-body" style="border: 1px solid #3c8dbc;">
				<div class="row">
					<div class="col-lg-12 margin-tb">
						<div class="pull-left">
							@can('create usuario', Model::class)
							<a class="btn btn-success" href="{{ route('users.create') }}"> Crear Nuevo Usuario</a>
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
		@can('read usuario', Model::class)
		<div class="box box-primary" style="border: 1px solid #3c8dbc;">
			<div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Listado de Usuarios</h3>
				<div class="box-tools">

					<form action="/users" method="GET" role="search">
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
						<th style="border:1px solid #ddd;padding: 5px; width: 5%;">#</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 10%;">Name</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 20%;">Email</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 20%;">Facultad</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 20%;">Roles</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 10%;">Estado</th>
						<th style="border:1px solid #ddd;padding: 5px; width: 20%;">Gestión</th>
					</tr>
					@foreach ($data as $key => $user)
					<tr>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ ++$i }}</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ $user->name }}</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ $user->email }}</td>
						@foreach ($user->facultades as $item)
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">{{ $item->nombre }}</td>
						@endforeach
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
							@if(!empty($user->getRoleNames()))
							@foreach($user->getRoleNames() as $v)
							<label class="label label-info">{{ $v }}</label>
							@endforeach
							@endif
						</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
							<center>
								@if ($user->activo == '1')
								<span class="label label-success">Activo</span>
								@else
								<span class="label label-warning">Inactivo</span>
								@endif
							</center>
						</td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
							<center>
								@can('update usuario', Model::class)
								@if ($user->activo == '1')
								<a href="{{ url('/users/altabaja/'.$user->id.'/0') }}" class="btn bg-navy"
									data-placement="top" data-toggle="tooltip" title="Desactivar descripcion escuela"><i
										class="fa fa-arrow-circle-down"></i></a>
								@else
								<a href="{{ url('/users/altabaja/'.$user->id.'/1') }}" class="btn btn-success"
									data-placement="top" data-toggle="tooltip" title="Activar descripcion escuela"><i
										class="fa fa-check-circle"></i></a>
								@endif
								<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}"><i
										class="fa fa-edit"></i></a>
								@endcan
								@can('delete usuario', Model::class)
								{!! Form::open(['method' => 'DELETE','route' => ['users.destroy',
								$user->id],'style'=>'display:inline']) !!}
								<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								{!! Form::close() !!}
								@endcan
								@can('read usuario', Model::class)
								<a class="btn btn-info" href="{{ route('users.show',$user->id) }}"><i
										class="fa fa-eye"></i></a>
								@endcan
							</center>
						</td>
					</tr>
					@endforeach
				</table>
			</div>
			@endcan
			<!-- /.box-body -->
		</div>
	</div>
</div>

{!! $data->render() !!}
@endsection