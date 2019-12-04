<?php $__env->startSection('contenido'); ?>
<?php $__currentLoopData = $comiestudiantiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                            <strong><?php echo e($comite->titulo); ?></strong>
                        </h4>
                    </div>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                        <?php echo e($comite->descripcion); ?></p>
                    <div class="widget-inner" style="border-radius: 3px;background-color:   #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                        <?php $__currentLoopData = $alumnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($alumno->comiestudiantil_id == $comite->id): ?>
                        <div class="prof-list-item" >
                            <div class="prof-thumb">
                                <a class="fancybox" href="/img/personas/<?php echo e($alumno->foto); ?>">
                                    <img src="/img/personas/<?php echo e($alumno->foto); ?>" alt=""
                                        width="170px" height="250px">
                                </a>
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list"><?php echo e($alumno->nombres.' '.$alumno->apellidos); ?></h5>
                                <p class="small-text"><strong>DNI:</strong><?php echo e($alumno->dni); ?></p> 
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/comestudiantil.blade.php ENDPATH**/ ?>