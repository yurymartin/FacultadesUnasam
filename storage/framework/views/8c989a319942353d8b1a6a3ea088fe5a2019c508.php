<?php $__env->startSection('htmlheader_title'); ?>
Iniciar Sesión
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<body class="hold-transition login-page" style=" background-image: url('<?php echo e(asset('/img/fondo_acceso.jpg')); ?>');background-size: cover;
    background-repeat: no-repeat; height: 100%;">
    <div id="app" v-cloak>
        <div class="login-box" style="width: 450px;">
            <div class="login-logo"
                style="background-color: rgba(0,0,0,0.7) !important;border-radius: 10px;padding: 5px 5px 5px 5px">
                <a href="<?php echo e(url('/home')); ?>" style="color:white;font-size:28px; display:inline-block;"><img
                        src="<?php echo e(asset('/img/unasam.png')); ?>" alt=""
                        style="padding-top: 10px;width: 70px; display:inline-block;font-size: 1"><br><span style=""><strong>
                            Acceso al Panel de Administración de la Pagina web de la Facultad</strong></span><br></a>
            </div><!-- /.login-logo -->
            <?php if(count($errors) > 0): ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Tenemos algunos Algunos Problemas<br>
                <ul style="margin-bottom: 0px;">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($error=="The name field is required."): ?>
                    <li>El campo Usuario es necesario.</li>
                    <?php endif; ?>
                    <?php if($error=="The password field is required."): ?>
                    <li>El campo Contraseña es necesario.</li>
                    <?php endif; ?>
                    <?php if($error=="These credentials do not match our records."): ?>
                    <li>Estas credenciales no coinciden con nuestros registros.</li>
                    <?php endif; ?>
                    <?php if($error=="verifystatus"): ?>
                    <li>El usuario del sistema se encuentra desactivado, comuncarse con el administrador del sistema.
                    </li>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
            <?php endif; ?>
            <?php if(session('errorMessage')): ?>
            <div class="alert alert-danger">
                <strong>Error!</strong> Tenemos algunos Algunos Problemas<br>
                <?php echo e(session('errorMessage')); ?>

            </div>
            <?php endif; ?>
            <div class="login-box-body"
                style="background-color: rgba(0,0,0,0.7) !important;color: white;border-radius: 10px;">
                <p class="login-box-msg" style="font-size: 17px;"> Ingrese sus credenciales para iniciar sesión </p>
                <form action="<?php echo e(url('/login')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="usuario" name="name" id="name" autofocus />
                        <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    </div>

                    <div class="form-group has-feedback">
                        <input type="password" class="form-control"
                            placeholder="<?php echo e(trans('adminlte_lang::message.password')); ?>" name="password" />
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="checkbox icheck">
                                <label>
                                    <input style="display:none;" type="checkbox" name="remember"> Recuerdame
                                </label>
                            </div>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius: 10px">Iniciar Sesión</button>
                        </div><!-- /.col -->
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-danger btn-block btn-flat" id="reset" style="border-radius: 10px">Cancelar</button>
                        </div>
                    </div>
                    <br>
                    <p style=""><span>Developed by </span><a href="http://ogtise.unasam.edu.pe/" target="_blank"> OGTISE UNASAM</a></p>
                </form>
            </div><!-- /.login-box-body -->

        </div><!-- /.login-box -->
    </div>
    <?php echo $__env->make('adminlte::layouts.partials.scripts_auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
        $("#reset").click(function() {
            $("#name").focus();
        });
      });
    </script>
</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('adminlte::layouts.auth', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/vendor/adminlte/auth/login.blade.php ENDPATH**/ ?>