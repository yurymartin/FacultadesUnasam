<?php $__env->startSection('contenido'); ?>
<style>
    #imagen:hover {
        transform: scale(0.97);
        transition: .5s;
        border: 1px solid royalblue;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title" style="text-align: center">
                    <h1><strong>DOCUMENTOS DE LA FACULTAD</strong></h1>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-2"
                                style="border-radius: 20px;background-color: #fafafa;margin-left: 10px;padding-bottom: 10px;padding-top: 10px;width: 15%"
                                id="imagen">
                                <h5 class="blog-list-title"><strong><?php echo e($documento->titulo); ?></strong></h5>
                                <br>
                                <a href="/doc/documentoFacultades/<?php echo e($documento->ruta); ?>" class="fancybox" rel="gallery1"
                                    target="_blank"><img src="/img/documentoFacultades/<?php echo e($documento->imagen); ?>" alt=""
                                        style="width: 150px;height: 100px;border-radius: 5px"></a>

                                <p class="blog-list-meta small-text" style="text-align: center"><strong>Fecha Publicacion:</strong></p>
                                <p><?php echo e($documento->fecha); ?></p>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/documentos.blade.php ENDPATH**/ ?>