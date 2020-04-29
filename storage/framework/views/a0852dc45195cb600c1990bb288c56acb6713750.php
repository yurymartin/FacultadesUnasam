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
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">EDITAR EL USUARIO</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <form method="put" action="<?php echo e(url('usuarios',$usuarios->id)); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <div class="col-md-12">
                        <div class="form-group" style="padding-top: 15px;">
                            <label for="login" class="col-sm-2 control-label">Login:*</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" placeholder="login del usuario"
                                    autocomplete="off" value="<?php echo e($usuarios->name); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group" style="padding-top: 15px;">
                            <label for="email" class="col-sm-2 control-label">Email:*</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="email del usuario" autocomplete="off" value="<?php echo e($usuarios->email); ?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group" style="padding-top: 15px;">
                            <label for="password" class="col-sm-2 control-label">Password:*</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="password del usuario" autocomplete="off" value="">
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
                                    <?php if($usuarios->hasRole($value)): ?>
                                    <option id="rol" value="<?php echo e($value); ?>" selected><?php echo e($value); ?>

                                        <?php else: ?>
                                    <option id="rol" value="<?php echo e($value); ?>"><?php echo e($value); ?>

                                        <?php endif; ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
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
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/usuario/edit.blade.php ENDPATH**/ ?>