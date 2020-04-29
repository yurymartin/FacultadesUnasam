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
<?php $__currentLoopData = $comiestudiantiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="widget-main">
                    <div class="widget-main-title">
                        <h2 class="text-center text-primary"><strong><?php echo e($comite->titulo); ?></strong></h2>
                        <p><?php echo e($comite->descripcion); ?></p>
                    </div>
                </div>
                <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($alumno->comiestudiantil_id == $comite->id): ?>
                <div class="col-md-3 text-center" style="padding-bottom: 5px;padding-top: 5px">
                    <img src="<?php echo e(asset('/img/personas/'.$alumno->foto)); ?>" alt="Responsive" class="imagen imagen2"
                        width="70%" height="70%" style="border-radius: 5px">
                    <h5 style="font-family: 'Times New Roman', Times, serif"><strong>Nombre:
                        </strong><?php echo e($alumno->nombres.' '.$alumno->apellidos); ?></h5>
                    <h5 style="font-family: 'Times New Roman', Times, serif"><strong>DNI: </strong><?php echo e($alumno->dni); ?></h5>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/comestudiantil.blade.php ENDPATH**/ ?>