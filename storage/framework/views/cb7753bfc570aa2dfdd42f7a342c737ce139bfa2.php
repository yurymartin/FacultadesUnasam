<?php $__env->startSection('contenido'); ?>

<div class="container contenido" id="maincontenido">
    <div class="row">
        <div class="col-md-12"><br>
            <h1 class="tituloa">Comedor Universitario<br><br></h1>
        </div>
        <div class="col-md-12">
            <img class="img-responsive imgc" src="<?php echo e(asset('img/imagen/comedor.png')); ?>" alt="" />
        </div>
        <div class="col-md-12">
            <div class="col-md-4">
                <h3>Horarios</h3>
                <p class="texto">
                    Lunes a Sabado <br>
                    Desayuno: 7:00am - 09:00am <br>
                    Almuerzo: 12:00pm - 2:00pm <br>
                    Cena: 7:00pm - 9:00pm
                </p>
            </div>
            <div class="col-md-4">
                <h3>Servicios</h3>
                <p class="texto">
                    El comedor de la Universidad Nacional Santiago Antúnez de Mayolo, tiene como finalidad mejorar
                    la alimentación de los estudiantes universitarios, brindando una dieta equilibrada y variada
                    usando productos regionales.
                    Esta unidad es dirigida por profesionales especializados en nutrición que después de una previa
                    investigación nutricional elaboran un menú balanceado y supervisan el proceso de cocción de los
                    alimentos.

                </p>
            </div>
            <div class="col-md-4">
                <h3>Dirigido a</h3>
                <p class="texto">
                    Alumnos aplicados de la Universidad de escasos recursos económicos.
                </p>
            </div>
            <div class="col-md-12">
                <p><em><strong>Oficina: DBU - Campus Universitario (Shancayan) , Av. Universitaria S/N<br>
                            Para mas informacion Llamar a 043-640020 Anexo 1708</strong></em></p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Ambcomedor.blade.php ENDPATH**/ ?>