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
	<div class="row">
		
		<div class="box box-primary panel-group">
			<div class="box-header with-border"
				style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
				<h3 class="box-title">Gestión de usuarios</h3>
				<a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i
						class="fa fa-reply-all" aria-hidden="true"></i>
					Volver</a>
			</div>
			<div class="box-body" style="border: 1px solid #3c8dbc;">
				<div class="row">
					<div class="col-lg-12 margin-tb">
						<div class="pull-left">
							<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create usuario', Model::class)): ?>
							<a class="btn btn-success" href="<?php echo e(route('users.create')); ?>"> Crear Nuevo Usuario</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if($message = Session::get('success')): ?>
		<div class="alert alert-success">
			<p><?php echo e($message); ?></p>
		</div>
		<?php endif; ?>
		<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read usuario', Model::class)): ?>
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
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e(++$i); ?></td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->name); ?></td>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($user->email); ?></td>
						<?php $__currentLoopData = $user->facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px;"><?php echo e($item->nombre); ?></td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<td style="border:1px solid #ddd;font-size: 14px; padding: 5px; vertical-align: middle;">
							<?php if(!empty($user->getRoleNames())): ?>
							<?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<label class="label label-info"><?php echo e($v); ?></label>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							<?php endif; ?>
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
								<a href="<?php echo e(url('/users/altabaja/'.$user->id.'/0')); ?>" class="btn bg-navy"
									data-placement="top" data-toggle="tooltip" title="Desactivar descripcion escuela"><i
										class="fa fa-arrow-circle-down"></i></a>
								<?php else: ?>
								<a href="<?php echo e(url('/users/altabaja/'.$user->id.'/1')); ?>" class="btn btn-success"
									data-placement="top" data-toggle="tooltip" title="Activar descripcion escuela"><i
										class="fa fa-check-circle"></i></a>
								<?php endif; ?>
								<a class="btn btn-primary" href="<?php echo e(route('users.edit',$user->id)); ?>"><i
										class="fa fa-edit"></i></a>
								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete usuario', Model::class)): ?>
								<?php echo Form::open(['method' => 'DELETE','route' => ['users.destroy',
								$user->id],'style'=>'display:inline']); ?>

								<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i></button>
								<?php echo Form::close(); ?>

								<?php endif; ?>
								<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read usuario', Model::class)): ?>
								<a class="btn btn-info" href="<?php echo e(route('users.show',$user->id)); ?>"><i
										class="fa fa-eye"></i></a>
								<?php endif; ?>
							</center>
						</td>
					</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</table>
			</div>
			<?php endif; ?>
			<!-- /.box-body -->
		</div>
	</div>
</div>

<?php echo $data->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/users/index.blade.php ENDPATH**/ ?>