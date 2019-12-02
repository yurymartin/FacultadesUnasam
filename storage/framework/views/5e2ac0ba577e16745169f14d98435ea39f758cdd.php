<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h3><strong>MISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        <?php $__currentLoopData = $misionvision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif"><?php echo e($mision->mision); ?></p>   
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                       </div>
                </div>
                <div class="widget-main-title">
                    <h3><strong>VISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                            <?php $__currentLoopData = $misionvision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vision): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif"><?php echo e($vision->vision); ?></p>   
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br>
                <div class="widget-inner text-center">
                    <div class="our-campus clearfix">
                        <?php $__currentLoopData = $misionvision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e(asset('img/descripcionFacultades/'.$logo->imagen)); ?>" alt="UNASAM" style="width: 300px">  
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/misionvision.blade.php ENDPATH**/ ?>