<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloa">Centro Medico<br><br></h1>
            </div>
            <div class="col-md-12">
                <img class="img-responsive imgc" src="<?php echo e(asset('img/imagen/centromedico.png')); ?>" alt="" />
            </div>
            <div class="col-md-12">
                <div class="col-md-6">
                    <h3>Horarios</h3>
                    <p class="texto">
                        Lun-Vie: 8:00am - 01:00pm, 2:00pm - 5:00pm <br>
                        Sab-Dom: No hay Atencion
                    </p>
                </div>
                <div class="col-md-6">
                    <h3>Servicios</h3>
                    <p class="texto">
                        El Centro Médico de la Universidad Nacional Santiago Antúnez de Mayolo, es una unidad médica que
                        brinda servicio ambulatorio y atención de urgencias para la comunidad universitaria, en las
                        áreas de medicina general, odontología, psicología, ginecología y obstetricia.
                        De igual manera el centro médico cuenta con modernos equipos de análisis clínicos y ecografías
                        generales lo que permite que los pacientes reciban una atención de calidad a bajo costo.

                    </p>
                </div>
                <div class="col-md-12">
                    <p><em><strong>Dirección: DBU - Campus Universitario (Shancayan) , Av. Universitaria S/N<br>
                                Para mas informacion Llamar a 043-640020 Anexo 1701 </strong></em></p>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Servcentromedico.blade.php ENDPATH**/ ?>