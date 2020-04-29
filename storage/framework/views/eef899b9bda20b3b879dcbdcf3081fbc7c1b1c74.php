<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Usuarios
<?php $__env->stopSection(); ?>

<style type="text/css">
	#modaltamanio {
		width: 70% !important;
	}

	.swal2-popup {
		font-size: 1.175em !important;
	}
</style>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">
	<!--CABEZERA--->
	<div class="box box-primary panel-group">
		<div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
			<h3 class="box-title">Gestión de Usuarios</h3>
			<a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i
					class="fa fa-reply-all" aria-hidden="true"></i>
				Volver</a>
		</div>
		<div class="box-body" style="border: 1px solid #3c8dbc;">
			<div class="form-group form-primary">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
					<i class="fa fa-plus-square-o" aria-hidden="true"></i> Nuevo Usuario
				</button>
			</div>
		</div>
	</div>

	<!----------------------------------------------------Modal----------------------------->
	<div class="modal fade" id="modal-default">
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create usuario', Model::class)): ?>
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title"><strong>Nuevo Usuario</strong></h4>
				</div>
				<div class="modal-body">
					<form method="post" action="<?php echo e(url('/usuarios/store')); ?>">
						<?php echo csrf_field(); ?>
						<div class="box-body">
							<div class="col-md-12">
								<div class="form-group">
									<label for="dni" class="col-sm-2 control-label">DNI:*</label>
									<div class="col-sm-4">
										<input type="number" class="form-control" id="dni" name="dni"
											placeholder="DNI del user">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group" style="padding-top: 15px;">
									<label for="nombres" class="col-sm-2 control-label">Nombres:*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="nombres"
											placeholder="Nombres del user">
									</div>
								</div>
							</div>



							<div class="col-md-12">
								<div class="form-group" style="padding-top: 15px;">
									<label for="apellidos" class="col-sm-2 control-label">Apellidos:*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="apellidos"
											placeholder="Apellidos del usuario">
									</div>
								</div>
							</div>

							<div class="col-md-12" style="padding-top: 15px;">
								<div class="form-group">
									<label for="cbuestado" class="col-sm-2 control-label">Genero:*</label>
									<div class="col-sm-4">
										<select class="form-control" name="genero">
											<option value="1">Masculino</option>
											<option value="0">Femenino</option>
										</select>
									</div>
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group" style="padding-top: 15px;">
									<label for="login" class="col-sm-2 control-label">Login:*</label>
									<div class="col-sm-8">
										<input type="text" class="form-control" name="name"
											placeholder="login del usuario" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group" style="padding-top: 15px;">
									<label for="email" class="col-sm-2 control-label">Email:*</label>
									<div class="col-sm-8">
										<input type="email" class="form-control" id="email" name="email"
											placeholder="email del usuario" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group" style="padding-top: 15px;">
									<label for="password" class="col-sm-2 control-label">Password:*</label>
									<div class="col-sm-8">
										<input type="password" class="form-control" id="password" name="password"
											placeholder="password del usuario" autocomplete="off">
									</div>
								</div>
							</div>

							<div class="col-md-12" style="padding-top: 15px;">
								<div class="form-group">
									<label for="rol" class="col-sm-2 control-label">Rol del Usuario:*</label>
									<div class="col-sm-8">
										<select name="rol" class="form-control">
											<option value="0">Seleccione el rol del usuario</option>
											<?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<option id="rol" value="<?php echo e($key); ?>"><?php echo e($value); ?>

											</option>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-12" style="padding-top: 15px;">
								<div class="form-group">
									<label for="estado" class="col-sm-2 control-label">Estado:*</label>
									<div class="col-sm-4">
										<select class="form-control" name="activo">
											<option value="1">Activado</option>
											<option value="0">Desactivado</option>
										</select>
									</div>
								</div>
							</div>

						</div>
						<div class="modal-footer">
							<button type="submit" class="btn btn-info">Guardar</button>
							<button type=" button" class="btn btn-default" id="btnClose"
								data-dismiss="modal">Cerrar</button>
						</div>
					</form>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<?php endif; ?>
	<!-- /.modal -->
	<!--CABEZERA--->
	<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read usuario', Model::class)): ?>
	<div class="row">
		<div class="box box-primary" style="border: 1px solid #3c8dbc;">
			<div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Listado de Docentes</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
				<table class="table table-hover table-bordered table-dark table-condensed table-striped">
					<tbody>
						<tr>
							<th style="border:1px solid #ddd;padding: 5px; width: 5%;">#</th>
							<th style="border:1px solid #ddd;padding: 5px; width: 10%;">Usuario</th>
							<th style="border:1px solid #ddd;padding: 5px; width: 15%;">Email</th>
							<th style="border:1px solid #ddd;padding: 5px; width: 10%;">Rol</th>
							<th style="border:1px solid #ddd;padding: 5px; width: 10%;">Estado</th>
							<th style="border:1px solid #ddd;padding: 5px; width: 15%;">Gestión</th>
						</tr>
						<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<tr>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->id); ?>

							</td>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->name); ?>

							</td>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->email); ?>

							</td>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
								<?php echo e($user->roles->implode('name', ', ')); ?>

							</td>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
								<center>
									<?php if($user->activo == '1'): ?>
									<span class="label label-success">Activo</span>
									<?php else: ?>
									<span class="label label-warning">Inactivo</span>
									<?php endif; ?>
								</center>
							</td>
							<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
								<center>
									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update usuario', Model::class)): ?>
									<?php if($user->activo == '1'): ?>
									<a href="<?php echo e(url('/usuarios/altabaja/'.$user->id.'/0')); ?>" class="btn bg-navy btn-sm"
										data-placement="top" data-toggle="tooltip" title="Desactivar user"><i
											class="fa fa-arrow-circle-down"></i></a>
									<?php else: ?>
									<a href="<?php echo e(url('/usuarios/altabaja/'.$user->id.'/1')); ?>"
										class="btn btn-success btn-sm" data-placement="top" data-toggle="tooltip"
										title="Activar user"><i class="fa fa-check-circle"></i></a>
									<?php endif; ?>
									<a href="<?php echo e(url('/usuarios/'.$user->id.'/edit')); ?>" class="btn btn-warning btn-sm"
										data-placement="top" data-toggle="tooltip" title="Editar user"><i
											class="fa fa-edit" data-toggle="modal" data-target="#modal-edit"></i></a>
									<?php endif; ?>

									<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete usuario', Model::class)): ?>
									<a href="<?php echo e(url('/usuarios/'.$user->id.'/destroy')); ?>" class="btn btn-danger btn-sm"
										data-placement="top" data-toggle="tooltip" title="Borrar user"><i
											class="fa fa-trash"></i></a>
									<?php endif; ?>
								</center>
							</td>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<?php endif; ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/usuario/index.blade.php ENDPATH**/ ?>