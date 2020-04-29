<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Usuarios
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">
    <div class="row">
        <div class="box box-primary" style="border: 1px solid #3c8dbc;">
            <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Crear Nuevo usuario</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-default" href="<?php echo e(route('users.index')); ?>"><i class="fa fa-reply-all"
                                aria-hidden="true"></i> Volver</a>
                    </div>
                </div>
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
            <div class="alert alert-danger" style="margin-top: 20px">
                <p><?php echo e($message); ?></p>
            </div>
            <?php endif; ?>

            <div class="box-body">
                <?php echo Form::open(array('route' => 'users.store','method'=>'POST')); ?>

                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group">
                            <label for="activo">Estado de usuario:</label>
                            <select class="form-control" id="facultad_id" name="facultad_id">
                                <option value="0">Seleccionar la Facultad...</option>
                                <?php $__currentLoopData = $facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($facultad->id); ?>"><?php echo e($facultad->nombre.' - '.$facultad->abreviatura); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-2">
                        <div class="form-group">
                            <label for="dni">DNI:</label>
                            <input type="number" name="dni" placeholder="dni del usuario" class="form-control" required
                                maxlength="8">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group">
                            <label for="nombres">Nombres:</label>
                            <?php echo Form::text('nombres', null, array('placeholder' => 'nombres del usuarios','class' =>
                            'form-control')); ?>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-5">
                        <div class="form-group">
                            <label for="apellidos">Apellidos:</label>
                            <?php echo Form::text('apellidos', null, array('placeholder' => 'Apellidos de usuario','class' =>
                            'form-control')); ?>

                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="genero">Genero:</label>
                            <select class="form-control" id="genero" name="genero">
                                <option value="1">Masculino</option>
                                <option value="0">Femenino</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-3">
                        <div class="form-group">
                            <label for="activo">Estado de usuario:</label>
                            <select class="form-control" id="activo" name="activo">
                                <option value="1">Activo</option>
                                <option value="0">Desactivado</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="name">Login:</label>
                            <?php echo Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <?php echo Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <?php echo Form::password('password', array('placeholder' => 'Password','class' => 'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4">
                        <div class="form-group">
                            <label for="confirm-password">Password de Confirmacion:</label>
                            <?php echo Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
                            'form-control')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-8">
                        <div class="form-group">
                            <label for="roles">Roles:</label>
                            <?php echo Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')); ?>

                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/users/create.blade.php ENDPATH**/ ?>