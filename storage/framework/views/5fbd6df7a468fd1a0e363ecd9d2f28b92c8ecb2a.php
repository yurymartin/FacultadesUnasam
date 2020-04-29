<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h3 style="font-family: cursive"><strong>MISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        <?php if($misionvision != null): ?>
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            <?php echo e($misionvision->mision); ?></p>
                        <?php else: ?>
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            FALTA DATOS</p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="widget-main-title">
                    <h3 style="font-family: cursive"><strong>VISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        <?php if($misionvision != null): ?>
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            <?php echo e($misionvision->vision); ?></p>
                        <?php else: ?>
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            FALTA DATOS</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br>
                <div class="widget-inner text-center">
                    <div class="our-campus clearfix">
                        <?php if($misionvision != null): ?>
                        <img src="<?php echo e(asset('img/descripcionFacultades/'.$misionvision->imagen)); ?>" alt="UNASAM"
                            style="width: 300px">
                        <?php else: ?>
                        <img src="" alt="FALTA DATOS"
                            style="width: 300px">
                        <?php endif; ?>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/misionvision.blade.php ENDPATH**/ ?>