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
                    <h1><strong>GALERIAS DE FOTOS DE LA FACULTAD</strong></h1>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mdb-lightbox">
                                            <?php $__currentLoopData = $galeriaEscuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeriaEscuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <figure class="col-md-4" style="margin-bottom: 20px">
                                                <a href="<?php echo e(asset('/img/galeriaFacultad/'.$galeriaEscuela->imagen)); ?>"
                                                    data-size="500x500" class="fancybox" rel="gallery1">
                                                    <img alt="picture"
                                                        src="<?php echo e(asset('/img/galeriaFacultad/'.$galeriaEscuela->imagen)); ?>"
                                                        class="img-fluid" width="350px" height="200px"
                                                        id="campo-laboral-imagen">
                                                </a>
                                            </figure>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/galeriasFacultad.blade.php ENDPATH**/ ?>