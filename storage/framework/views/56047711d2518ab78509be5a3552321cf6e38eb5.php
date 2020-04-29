<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Roles y Permisos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Datos del Usuario</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo e(route('users.index')); ?>"><i
                            class="fa fa-reply-all" aria-hidden="true"></i> Volver</a>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Login del usuario:</strong>
                            <?php echo e($user->name); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email del usuario:</strong>
                            <?php echo e($user->email); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rol(es):</strong>
                            <?php if(!empty($user->getRoleNames())): ?>
                            <?php $__currentLoopData = $user->getRoleNames(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <label class="label label-info"><?php echo e($v); ?></label>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/users/show.blade.php ENDPATH**/ ?>