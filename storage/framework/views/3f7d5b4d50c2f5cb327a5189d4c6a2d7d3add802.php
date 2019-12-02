<?php $__env->startSection('contenido'); ?>
<style>
    .imagen {
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .imagen2:hover {
        -webkit-filter: grayscale(0%);
        filter: none;
        transform: scale(0.98);
        transition: .5s;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3" style="padding-top: 80px">
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-center">
                        <strong></strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background-color: royalblue;color: white">
                            <strong>AUTORIDADES</strong></li>
                        <li class="list-group-item"><a href="decano"><strong>DECANO</strong></a></li>
                        <li class="list-group-item"><a href="consejo"><strong>CONSEJO DE FACULTAD</strong></a></li>
                        <li class="list-group-item"><a href="departacademico"><strong>DEPARTAMENTOS
                                    ACADEMICOS</strong></a></li>
                        <br>
                        <li class="list-group-item"><a href="organigrama"><strong>ORGANIGRAMA</strong></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget-main-title">
                    <?php $__currentLoopData = $decano; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;"><strong><?php echo e($deca->cargo); ?></strong>
                    </h4>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="widget-main-title">
                    <?php $__currentLoopData = $decano; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                        <?php echo e($deca->descripcion); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
                <br><br>
                <div class="text-center">
                    <?php $__currentLoopData = $decano; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                        <?php echo e($deca->descripcion); ?></p>
                    <img src="<?php echo e(asset('/img/personas/'.$deca->foto)); ?>" alt="Responsive image"
                        class="img-thumbnail imagen2 imagen" style="  width:50%;
                            height:50%;">
                    <hr width="50px">
                    <p class="widget-title" style="text-align: center"><?php echo e($deca->nombres.' '$deca->apellidos); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/decano.blade.php ENDPATH**/ ?>