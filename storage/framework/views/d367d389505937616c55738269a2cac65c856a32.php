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
            <div class="container">
                <div class="widget-main-title">
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                        <strong>PLANA DOCENTE</strong>
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
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-size: 20px">Categoria:</label>
                            <select class="form-control form-control-lg">
                                <option>Todos</option>
                                <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option><?php echo e($doc->categoria); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                    <?php $__currentLoopData = $docenteweb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <img src="<?php echo e(asset('/img/personas/'.$doc->foto)); ?>" alt="Responsive" class="img-thumbnail imagen imagen2"
                            >
                        <p class="widget-title image" style="text-align: center"><?php echo e($doc->nombres.' '.$doc->apellidos); ?>

                        </p>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="<?php echo e('#'.$doc->doc); ?>">
                            Ver Perfil...
                        </button>
                        <div class="modal fade" id="<?php echo e($doc->doc); ?>" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">PERFIL DEL DOCENTE</h5>
                                    </div>
                                    <div class="modal-body">
                                        <img src="<?php echo e(asset('/img/personas/'.$doc->foto)); ?>" alt="Responsive"
                                            class="img-thumbnail" width="200px" height="200px">
                                        <br><br>
                                        <ul class="text-left">
                                            <ol><strong>DNI: </strong><?php echo e($doc->dni); ?></ol><br>
                                            <ol><strong>Nombre: </strong><?php echo e($doc->nombres.' '. $doc->apellidos); ?></ol><br>
                                            <?php if($doc->genero==1): ?>
                                            <ol><strong>Genero:</strong> MASCULINO</ol>
                                            <?php else: ?>
                                            <ol><strong>Genero:</strong> FEMENINO</ol>
                                            <?php endif; ?><br>
                                            <ol><strong>Carrera Profesional: </strong><?php echo e($doc->tituloprofe); ?></ol><br>
                                            <ol><strong>Grado Academico: </strong><?php echo e($doc->grado); ?></ol><br>
                                            <ol><strong>Categoria: </strong><?php echo e($doc->categoria); ?></ol><br>
                                            <ol><strong>Fecha Ingreso: </strong><?php echo e($doc->fechaingreso); ?></ol>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <!-- MODAL -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/docentesweb.blade.php ENDPATH**/ ?>