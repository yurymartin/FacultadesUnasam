<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row container-fluid">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <h3 class="box-title">EDITAR EL USUARIO</h3>
            </div>
            <div class="box-body table-responsive">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="<?php echo e(route('users.index')); ?>"><i class="fa fa-reply-all"
                                    aria-hidden="true"></i> Volver</a>
                        </div>
                    </div>
                    <hr>
                </div>
                <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <?php endif; ?>
                

                <?php if($message = Session::get('danger')): ?>
                <div class="alert alert-danger">
                    <p><?php echo e($message); ?></p>
                </div>
                <?php endif; ?>

                <?php echo Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]); ?>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Password:</strong>
                            <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <strong>Confirm Password:</strong>
                            <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
                            'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <strong>Role:</strong>
                            <?php echo Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')); ?>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group">
                            <strong>Facultades:</strong>
                            <select class="form-control" id="facultad_id" name="facultad_id">
                                <option value="0">Seleccionar la Facultad...</option>
                                <?php $__currentLoopData = $facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($facultad->id == $user->facultad_id): ?>
                                <option value="<?php echo e($facultad->id); ?>" selected>
                                    <?php echo e($facultad->nombre.' - '.$facultad->abreviatura); ?>

                                </option>
                                <?php else: ?>
                                <option value="<?php echo e($facultad->id); ?>"><?php echo e($facultad->nombre.' - '.$facultad->abreviatura); ?>

                                </option>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/users/edit.blade.php ENDPATH**/ ?>