<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloa">Organigrama de la UNASAM<br><br></h1>
            </div>
            <div class="col-md-12">

                <div class="magnify">
                    <div class="largex"></div>
                    
                    <iframe src="<?php echo e(asset('img/file/organigrama.pdf')); ?>" style="width:100%; height: 900px;" frameborder="0"></iframe>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Organigrama.blade.php ENDPATH**/ ?>