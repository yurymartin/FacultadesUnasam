<?php $__env->startSection('contenido'); ?>

<div class="container cont" id="maincontenido">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12"><br>
                <h1 class="tituloe">Convocatorias de Personal<br>
                    <hr class="cab">
                </h1>
            </div>
        </div>

        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-12 table">

                    <div class="panel-body">
                    </div>

                    <div class="panel-body" style="padding-top: 5px;">
                        <ul class="nav nav-tabs">

                            <li class=""><a href="#Caducadas" data-toggle="tab" aria-expanded="true">Caducadas</a>
                            </li>

                            <li class="active" style="color: #337ab7;"><a href="#Vigentes" data-toggle="tab"
                                    style="color: #337ab7;" aria-expanded="false">Vigentes</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="Vigentes">

                                <?php $__currentLoopData = $convocatoriaV; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;"><?php echo e($contador++); ?></th>
                                            <th><?php echo e($cv->convocatoria); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <strong>Tipo de Contrato: </strong> <?php echo e($cv->tipoconvocatoria); ?>

                                                <br><br>
                                                <strong>Facultad:</strong> <?php echo e($cv->facultad); ?>

                                                <br><br>
                                                <strong>Personal Requerido:</strong> <?php echo e($cv->requerido); ?>

                                                <br><br>
                                                <strong>Numero de plazas:</strong> <?php echo e($cv->nroplazas); ?>

                                                <br><br>
                                                

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Asignaturas a Dictar:</strong><br><br>
                                                <div style="padding-left:20px;">
                                                        <?php echo $cv->asignaturas; ?>                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <strong>Fecha de Inicio:</strong> <?php echo e($cv->fechaini); ?> <br>
                                                <strong>Fecha Final:</strong> <?php echo e($cv->fechafin); ?>


                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><a href="<?php echo e(asset('img/convocatorias/'. $cv->ruta )); ?>"
                                                    target="_blank"><span class="glyphicon glyphicon-list-alt"></span>
                                                    Detalles y Cronograma</a> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Resultados en Proceso</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>


                            <div class="tab-pane fade in" id="Caducadas">
                                <?php $__currentLoopData = $convocatoriaC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width:3%;"><?php echo e($contadore++); ?></th>
                                            <th><?php echo e($cc->convocatoria); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="2">
                                                <strong>Tipo de Contrato: </strong> <?php echo e($cc->tipoconvocatoria); ?>

                                                <br><br>
                                                <strong>Facultad:</strong> <?php echo e($cc->facultad); ?>

                                                <br><br>
                                                <strong>Personal Requerido:</strong> <?php echo e($cc->requerido); ?>

                                                <br><br>
                                                <strong>Numero de plazas:</strong> <?php echo e($cc->nroplazas); ?>

                                                <br><br>
                                                

                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><strong>Asignaturas a Dictar:</strong><br><br>
                                                <div style="padding-left:20px;">
                                                    <?php echo $cc->asignaturas; ?>

                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <strong>Fecha de Inicio:</strong> <?php echo e($cc->fechaini); ?> <br>
                                                <strong>Fecha Final:</strong> <?php echo e($cc->fechafin); ?>


                                            </td>

                                        </tr>
                                        <tr>
                                            <td colspan="2"><a href="<?php echo e(asset('img/convocatorias/'. $cc->ruta )); ?>"
                                                    target="_blank"><span class="glyphicon glyphicon-list-alt"></span>
                                                    Detalles y Cronograma</a> </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">Resultados publicados en el departamento académico de la
                                                escuela.</td>
                                        </tr>
                                    </tbody>
                                </table>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                        </div>

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td colspan="2"
                                        style="padding-left: 15px;padding-top: 15px;padding-right: 15px;padding-bottom: 5px;">

                                        <label style="color: #084B8A;font-size: 14px;"> Donde:</label><br>

                                        <label style="color: #084B8A;font-size: 14px;"> Plazas por Fuente de
                                            Financiamiento MINEDU:</label>

                                        <ul style="    padding-left: 20px; color: #084B8A;font-size: 13.5px;">
                                            <li><strong>Contrato Docente A: (Tiempo Completo)</strong> : Para ser
                                                considerado postulante se requiere poseer Grado Académico de Doctor,
                                                como requisito mínimo, adicionalmente a documentación complementaria
                                                establecida en las Bases para este concurso. </li>

                                            <li><strong>Contrato Docente B: (Tiempo Completo)</strong> Para ser
                                                considerado postulante se requiere poseer Grado Académico de Maestro,
                                                como requisito mínimo, adicionalmente a documentación complementaria
                                                establecida en las Bases para este concurso. </li>

                                            <li>Los expedientes deben ser presentados en la oficina de Secretaría
                                                General (mesa de partes, Av. Centenario Nº 200 –Independencia -Huaraz),
                                                en sobre manila sellado y lacrado por el encargado de la recepción al
                                                momento de la presentación del expediente</li>
                                        </ul>



                                        <label style="color: #084B8A;font-size: 14px;"> Plazas por Fuente de
                                            Financiamiento Recursos Ordinarios:</label>

                                        <ul style="    padding-left: 20px; color: #084B8A;font-size: 13.5px;">
                                            <li><strong>Contrato Docente B1: (Tiempo Completo)</strong> : Docente que
                                                desarrollara actividades a tiempo completo (32 horas, de las cuales 16
                                                horas corresponden a horas lectivas y 16 a horas no lectivas) en la
                                                universidad y requiere contar con grado académico de Maestro.</li>

                                            <li><strong>Contrato Docente B2: (Tiempo parcial)</strong> Docente que
                                                desarrollara actividades a tiempo parcial (16 horas, de las cuales 8
                                                horas corresponde a horas lectivas y 8 a horas no lectivas) en la
                                                universidad y requiere contar con grado académico de Maestro. </li>

                                        </ul>

                                        <!--<label style="color: #084B8A;margin-bottom: 0px;font-size: 14px">  Nota:</label>
                                            <ul style="    padding-left: 20px; color: #084B8A;font-size: 13.5px;">
                                            <strong><font color="red" size="6">*</font></strong>: Labores de supervisión en centros médicos u hospitalarios que desarrollarán los docentes contratados para la <strong>Facultad de Ciencias Médicas.</strong>
                                            </ul>-->

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
        <div class="col-md-12 espacio" style="height: 15px;"></div>
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
<?php echo $__env->make("web.layout.admin", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/Servconvocatoria.blade.php ENDPATH**/ ?>