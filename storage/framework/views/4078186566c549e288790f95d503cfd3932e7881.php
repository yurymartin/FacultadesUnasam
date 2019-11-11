<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloa">Auditorio Universitario<br><br></h1>
            </div>
            <div class="col-md-12">
                <img class="img-responsive imgc" src="<?php echo e(asset('img/imagen/auditorio.png')); ?>" alt="" />
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <h3>Horarios</h3>
                    <p class="texto">
                        Lun-Vie: 8:00am - 10:00pm <br>
                        Sab: 8:00am - 2:00pm <br>
                        DOm: No hay atencion
                    </p>
                </div>
                <div class="col-md-6">
                    <h3>Servicios</h3>
                    <p class="texto">
                        <p class="texto">
                            La Universidad Nacional Santiago Antúnez de Mayolo, posee diversos auditorios modernos y de
                            amplia capacidad que cuentan con una conexión de fibra óptica que permite el acceso rápido a
                            internet. Estos auditorios están destinados a la realización de múltiples actividades
                            académicas, artísticas, culturales y gremiales universitarias.
                        </p>
                    </p>
                </div>
                <div class="col-md-12">
                    <p><em><strong>Oficina: Unidad de Servicios Academicos - Local Central (Independencia) , Av.
                                Centenario Nro. 200<br>
                                Para mas informacion Llamar a 043 42-0000</strong></em></p>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Ambauditorio.blade.php ENDPATH**/ ?>