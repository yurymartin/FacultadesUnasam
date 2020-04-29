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
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3><strong>PLANA DOCENTE DE LA FACULTAD</strong></h3>
            </div>
            <div class="container">
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="GET" class="form-inline">
                            <div class="form-group">
                                <label style="font-size: 20px">CATEGORIA:</label>
                            </div>
                            <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                <select class="form-control form-control-lg" name="buscar" id="buscar"
                                    style="width: 500px">
                                    <option value='0'><strong>TODOS LOS DOCENTES</strong></option>
                                    <?php $__currentLoopData = $categoria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($cat->id); ?>" id="buscar">DOCENTES <?php echo e($cat->categoria); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">BUSCAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <?php $__currentLoopData = $docenteweb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-3" style="padding-bottom: 5px;padding-top: 5px">
                    <img src="<?php echo e(asset('/img/personas/'.$doc->foto)); ?>" alt="Responsive" class="imagen imagen2"
                        width="70%" height="70%" style="border-radius: 5px">
                    <h4><strong><?php echo e($doc->abreviatura .' '. $doc->nombres.' '.$doc->apellidos); ?></strong></h4>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="<?php echo e('#'.$doc->doc); ?>">
                        Perfil del Docente
                    </button>
                    <div class="modal fade" id="<?php echo e($doc->doc); ?>" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content"
                                style="width: 450px;margin-left: auto;margin-right: auto">
                                <div class="modal-header" style="background-color: <?php echo e($estilos->fondoheader); ?>;color: <?php echo e($estilos->textoheader); ?>">
                                    <h5 class="modal-title" id="exampleModalLongTitle"
                                        style="color: <?php echo e($estilos->textoheader); ?>">PERFIL DEL
                                        DOCENTE</h5>
                                    <div class="modal-footer"
                                        style="position: absolute;right: -5px;top: -23px;border-top: <?php echo e($estilos->fondoheader); ?>;color: <?php echo e($estilos->textoheader); ?>">
                                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"
                                            style="color: white">X</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo e(asset('/img/personas/'.$doc->foto)); ?>" alt="Responsive"
                                        class="img-thumbnail" style="border-radius: 20px" width="200px" height="200px">
                                    <br><br>
                                    <ul class="text-left">
                                        <ol><strong>DNI: </strong><?php echo e($doc->dni); ?></ol>
                                        <ol><strong>Nombre: </strong><?php echo e($doc->nombres.' '. $doc->apellidos); ?></ol>
                                        <?php if($doc->genero==1): ?>
                                        <ol><strong>Genero:</strong> MASCULINO</ol>
                                        <?php else: ?>
                                        <ol><strong>Genero:</strong> FEMENINO</ol>
                                        <?php endif; ?>
                                        <ol><strong>Carrera Profesional: </strong><?php echo e($doc->tituloprofe); ?></ol>
                                        <ol><strong>Grado Academico: </strong><?php echo e($doc->grado); ?></ol>
                                        <ol><strong>Categoria: </strong><?php echo e($doc->categoria); ?></ol>
                                        <ol><strong>Fecha Ingreso: </strong><?php echo e($doc->fechaingreso); ?></ol>
                                    </ul>
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
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/docentesweb.blade.php ENDPATH**/ ?>