<?php $__env->startSection('contenido'); ?>

<div class="container cont" id="maincontenido">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloe">Instrumentos de Gestion<br>
                    <hr class="cab">
                </h1>
            </div>
        </div>
        <br><br>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12 table">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DOCUMENTO</th>
                                <th>ACRONIMO</th>
                                <th>Abrir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $instrumentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inst): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <th><?php echo e($contador++); ?></th>
                                    <th><?php echo e($inst->nombreInstrumento); ?></th>
                                    <th><?php echo e($inst->codigoInstrumento); ?></th>
                                    <th><a href="<?php echo e(asset('img/instrumentos/'. $inst->ruta )); ?>"><span class="glyphicon glyphicon-save"></span></a>
                                    </th>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 espacio"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-4 col-md-offset-4">
                    <hr class="pie"><br>

                </div>
            </div>
        </div>
        <br><br>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Instrumentosgestion.blade.php ENDPATH**/ ?>