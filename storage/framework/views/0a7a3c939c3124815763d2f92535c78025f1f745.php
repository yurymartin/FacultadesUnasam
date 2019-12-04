<?php $__env->startSection('contenido'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3" style="padding-top: 90px">
                <div class="card" style="width: 25rem;">
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
                <div class="widget-main">
                    <div class="widget-main-title">
                        <?php $__currentLoopData = $consejos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consejo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                            <strong><?php echo e($consejo->cargo); ?></strong>
                        </h4>
                        <?php break; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit fugiat aspernatur a, sequi ea
                        repellendus voluptatem iure magnam consectetur labore illo magni at eum suscipit temporibus
                        dolor iste aut tenetur!Totam eum incidunt porro! Labore omnis quos tenetur repellendus
                        similique consequuntur repudiandae, rerum nesciunt, temporibus quae reprehenderit dolorem
                        neque provident voluptatem laborum saepe? Voluptatum, doloremque sint id repellat qui
                        incidunt!</p>
                    <div class="widget-inner">
                        <?php $__currentLoopData = $consejos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $consejo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <a href="<?php echo e(asset('/img/personas/'.$consejo->foto)); ?>" class="fancybox"
                                    rel="gallery1"><img src="<?php echo e(asset('/img/personas/'.$consejo->foto)); ?>"
                                        alt="<?php echo e($consejo->nombres.' '.$consejo->apellidos); ?>"></a>
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list"><?php echo e($consejo->nombres.' '.$consejo->apellidos); ?></h5>
                                <p class="small-text"><strong>CARGO: </strong><?php echo e($consejo->cargo); ?></p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/consejo.blade.php ENDPATH**/ ?>