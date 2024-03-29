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
            <div class="col-md-3" style="padding-top: 60px">
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
            <div class="col-md-9 container">
                <div class="row">
                    <div class="widget-main-title">
                        <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                            <strong>DEPARTAMENTOS ACADEMICOS</strong>
                        </h4>
                    </div>
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">El
                        decanato
                        es un Órgano de Dirección y la máxima autoridad de gobierno de la Facultad, representa a la
                        Facultad
                        de Ciencias Sociales, Educación y de la Comunicación, dirige la gestión académica y
                        administrativa,
                        representa a la Facultad ante el Consejo Universitario y la Asamblea Universitaria conforme
                        lo
                        dispone
                        la Ley Universitaria N° 30220.</p>
                </div>
                <div class="row container">
                    <div class="row text-center">
                        <?php $__currentLoopData = $departacademico; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dep): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-4">
                            <h4><strong><?php echo e($dep->cargo); ?></strong></h4>
                            <a href="<?php echo e(asset('/img/personas/'.$dep->foto)); ?>" class="fancybox" rel="gallery1"><img src="<?php echo e(asset('/img/personas/'.$dep->foto)); ?>" alt="Responsive"
                                class="img-thumbnail imagen imagen2" width="200px" height="200px"></a>
                            <hr width="50px">
                            <p class="widget-title image" style="text-align: center">
                                <?php echo e($dep->nombres.' '.$dep->apellidos); ?>

                            </p>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/departacademico.blade.php ENDPATH**/ ?>