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
        <div class="col-md-12" style="padding-top: 80px">
            <div class="widget-main-title">
                <h4 class="widget-title" style="text-align: left;font-size: 16px;"><strong>ORGANIGRAMA</strong>
                </h4>
            </div>
            <?php if($organigramas != null): ?>
            <div class="widget-main-title">
                <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                    <?php echo e($organigramas->descripcion); ?></p>
            </div>
            <br><br>
            <div class="text-center">
                <img src="<?php echo e(asset('img/Organigramas/'.$organigramas->imagen)); ?>" alt="Responsive image"
                    class="img-thumbnail imagen2 imagen" style="  width:70%;
                            height:50%;">
            </div>
            <?php else: ?>
            <div class="widget-main-title">
                <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                    FALTA DATOS</p>
            </div>
            <br><br>
            <div class="text-center">
                <img src="" alt="FALTA IMAGEN"
                    class="img-thumbnail imagen2 imagen" style="  width:70%;
                            height:50%;">
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/organigrama.blade.php ENDPATH**/ ?>