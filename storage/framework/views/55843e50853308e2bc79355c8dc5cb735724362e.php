<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row container-fluid">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">CREAR NUEVO ROL</h3>
                <div class="pull-right">
                    <a class="btn btn-default" href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-reply-all"
                            aria-hidden="true"></i> Volver</a>
                </div>
            </div>
            <div class="modal-body">
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong>Errores que Ocurrieron<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>

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

                <form action="<?php echo e(route('roles.store')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('post'); ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre del Rol:</label>
                                    <?php echo Form::text('name', null, array('placeholder' => 'Name','class' =>
                                    'form-control')); ?>

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
                                    <?php $__currentLoopData = $permission; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <label style="font-size: 13px">
                                            <?php echo e(Form::checkbox('permission[]', $value->id, false, array('class' => 'name'))); ?>

                                            <?php echo e($value->name); ?>

                                        </label>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/roles/create.blade.php ENDPATH**/ ?>