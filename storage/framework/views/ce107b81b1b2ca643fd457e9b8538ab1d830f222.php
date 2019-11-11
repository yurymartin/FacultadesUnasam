<?php $__env->startSection('contenido'); ?>


<?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noti): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container cont" id="maincontenido">

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloe"><?php echo e($noti->tituloNoticia); ?><br>
                    <hr class="cab">
                </h1>
            </div>
        </div>

        <div class="cold-md-12 ">
            <a href="<?php echo e(asset('img/noticias/'. $noti->ruta )); ?>" rel="prettyPhoto[<?php echo e($noti->tituloNoticia); ?>]" title="">
                <img class="img-responsive" src="<?php echo e(asset('img/noticias/'. $noti->ruta )); ?>" alt="" style="z-index: 10;">
            </a>
        </div>

        <div class="fb-share-button" data-href="https://unasam.edu.pe/verNoticia/<?php echo e($noti->id); ?>"
            data-layout="button_count" data-size="small"><a target="_blank"
                href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"
                class="fb-xfbml-parse-ignore">Compartir</a></div>

        <div class="col-md-12 espaciop"></div>
    </div>
</div>

<div id="content">
    <!-- TEST -->
    <div class="container cont">
        <div class="row">
            <div class="col-md-12 contf">
                <div class="col-md-12">
                    <div style="float:right; font-weight:bold;font-size:19px;"><?php echo e($noti->fechaNoticia); ?>

                        <?php echo e($noti->horaNoticia); ?></div>
                </div>

                <div class="col-md-12">
                    <p class="texto"></p>
                    <p style="text-align:justify"><span style="background-color:white"><span
                                style="font-size:11.5pt"><span
                                    style="font-family:&quot;Bookman Old Style&quot;,serif"><span style="color:#333333">
                                        <?php echo $noti->descrNoticia ?> </span></span></span></span>
                    </p>

                    <div class="col-md-12">
                        <div class="fb-comments" data-href="https://unasam.edu.pe/verNoticia/<?php echo e($noti->id); ?>"
                            data-width="1024px" data-numposts="10"></div>

                    </div>
                </div>

            </div>
            <div class="col-md-12 espacio"></div>

        </div>
    </div>

</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Descrnoticia.blade.php ENDPATH**/ ?>