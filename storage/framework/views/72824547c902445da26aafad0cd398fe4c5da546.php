<?php $__env->startSection('contenido'); ?>
<style>
    img:hover {
        transform: scale(1.07);
        transition: .5s;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title" style="text-align: center">
                    <h1><strong>VIDEOS DE LA FACULTAD</strong></h1>
                </div> <!-- /.widget-main-title -->
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $__currentLoopData = $videofacultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videofacultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <?php
                echo $videofacultad->link;
                ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/videosfacultad.blade.php ENDPATH**/ ?>