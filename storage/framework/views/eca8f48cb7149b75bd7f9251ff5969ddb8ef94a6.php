<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h1><strong>FILOSOFIA</strong></h1>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        <p style="font-size: 16px;font-family: 'Times New Roman', Times, serif;text-align: justify">
                            <?php echo e($filosofia->filosofia); ?></p>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br><br><br>
                <div class="widget-inner text-right">
                    <div class="our-campus clearfix">
                        <a href="<?php echo e(asset('/img/descripcionFacultades/'.$logos->imagen)); ?>" class="fancybox"
                            rel="gallery1"><img src="<?php echo e(asset('/img/descripcionFacultades/'.$logos->imagen)); ?>"
                                alt="UNASAM" style="width: 350px"></a>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/filosofia.blade.php ENDPATH**/ ?>