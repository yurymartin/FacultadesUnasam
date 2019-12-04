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
                <?php $__currentLoopData = $organigrama; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $org): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="widget-main-title">
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;"><strong>ORGANIGRAMA</strong></h4>
                </div>
                <div class="widget-main-title">
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px"><?php echo e($org->descripcion); ?></p>
                </div>
                <br><br>
                <div class="text-center">
                    <img src="<?php echo e(asset('img/Organigramas/'.$org->imagen)); ?>" alt="Responsive image"
                        class="img-thumbnail imagen2 imagen" style="  width:100%;
                            height:50%;">
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/organigrama.blade.php ENDPATH**/ ?>