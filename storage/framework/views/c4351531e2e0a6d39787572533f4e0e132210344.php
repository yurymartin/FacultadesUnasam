<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloa">Gimnasio<br><br></h1>
            </div>
            <div class="col-md-12">
                <img class="img-responsive imgc" src="<?php echo e(asset('img/imagen/gimnasio.png')); ?>" alt="" />
            </div>
            <div class="col-md-12">
                <div class="col-md-4">
                    <h3>Horarios</h3>
                    <p class="texto">
                        Lun-Vie: 8:00am - 01:00pm, 2:00pm - 5:00pm <br>
                        Sab-Dom: No hay Atencion
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Servicios</h3>
                    <p class="texto">
                        El gimnasio de la Universidad Nacional Santiago Antúnez de Mayolo, ofrece a la comunidad
                        universitaria la posibilidad del esparcimiento y el desarrollo físico a través del acceso a
                        máquinas de ejercicio, programas de baile y aeróbicos.
                        Para poder acceder a este servicio el usuario tiene la posibilidad de elegir el horario y la
                        frecuencia de asistencia que más se adecua a sus actividades diarias.

                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Dirigido a</h3>
                    <p class="texto">
                        Docentes, administrativos y al Público en general.<br>
                        Inscripciones en la oficina de Obuyae


                    </p>
                </div>
                <div class="col-md-12">
                    <p><em><strong>Oficina: OGBUYAE - Campus Universitario (Shancayan) , Av. Universitaria S/N<br>
                                Para mas informacion Llamar a 043 42-0000</strong></em></p>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Gimnasio.blade.php ENDPATH**/ ?>