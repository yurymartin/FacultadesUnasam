<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloa">Misión & Visión<br><br></h1>
            </div>
            <div class="col-md-12">
                <img class="img-responsive imgc" src="<?php echo e(asset('img/imagen/universidad.jpg')); ?>" alt="" />
            </div>
            <div class="col-md-12">
                <div class="col-md-4 col-md-offset-1">
                    <h3>Misión</h3>
                    <p class="texto">
                        Formar Profesionales líderes y emprendedores con valores éticos, comprometidos con el desarrollo
                        sostenible de la región a través de la investigación con responsabilidad social.
                    </p>
                </div>
                <div class="col-md-4 col-md-offset-2">
                    <h3>Visión</h3>
                    <p class="texto">
                        Ser reconocidos nacional e internacionalmente por la calidad en la formación profesional
                        científica, tecnológica y humanística.
                    </p>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Misionvision.blade.php ENDPATH**/ ?>