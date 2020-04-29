<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Roles y Permisos
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="row container-fluid">
    <div class="box box-primary" style="border: 1px solid #3c8dbc;">
        <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Permisos del Rol</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default" href="<?php echo e(route('roles.index')); ?>"><i class="fa fa-reply-all"
                        aria-hidden="true"></i> Volver</a>
                </div>
            </div>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <strong>Name:</strong>
                <?php echo e($role->name); ?>

            </div>
            <div class="form-group">
                <strong>Permissions:</strong>
                <?php if(!empty($rolePermissions)): ?>
                <?php $__currentLoopData = $rolePermissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <label class="label label-success"><?php echo e($v->name); ?>,</label>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/roles/show.blade.php ENDPATH**/ ?>