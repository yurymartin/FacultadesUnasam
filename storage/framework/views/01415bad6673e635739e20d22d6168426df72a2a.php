<?php $__env->startSection('contenido'); ?>
<style>
    #panel-imagen:hover {
        transform: scale(0.95);
        transition: .5s;
        border: 1px solid slategray;
        border-radius: 20px;
        opacity: 50%;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center"><strong>INVESTIGACIONES</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                        La investigación es una actividad orientada a la obtención de nuevos conocimientos y su aplicación para la solución a problemas o interrogantes de carácter científico. La investigación científica es el nombre general que obtiene el complejo proceso en el cual los avances científicos son el resultado de la aplicación del método científico para resolver problemas o tratar de explicar determinadas observaciones.1​ De igual modo la investigación tecnológica emplea el conocimiento científico para el desarrollo de tecnologías blandas o duras, así como la investigación cultural, cuyo objeto de estudio es la cultura, además existe a su vez la investigación técnico-policial y la investigación detectivesca y policial e investigación educativa. </p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <form action="" method="GET" class="form-inline">
                                <div class="form-group">
                                    <label style="font-size: 20px">TEMA:</label>
                                </div>
                                <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                    <select class="form-control form-control-lg" name="buscar" id="buscar">
                                        <option value=""><strong>TODOS LAS INVESTIGACIONES</strong></option>
                                        <?php $__currentLoopData = $temas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($tema->id); ?>" id="buscar"><?php echo e($tema->tema); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">BUSCAR</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
<div class="container">
    <hr>
</div>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <?php $__currentLoopData = $revista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3" style="border-radius: 20px;background-color: #fafafa;margin-left: 10px"
                id="panel-imagen">
                <h5 class="blog-list-title"><a href="<?php echo e(asset('doc/investigaciones/'.$rta->ruta)); ?>"
                        target="blank"><?php echo e($rta->titulo); ?></a></h5>
                <a href="<?php echo e(asset('doc/investigaciones/'.$rta->ruta)); ?>" target="blank"><img
                        src="<?php echo e(asset('img/investigaciones/'.$rta->imagen)); ?>" alt="" style="width: 150px;height: 150px"
                        class="imagen"></a>
                <p class="blog-list-meta small-text">Autor(es): <?php echo e($rta->autor); ?></p>
                <p class="blog-list-meta small-text">Fecha Publicacion: <?php echo e($rta->fechapublicacion); ?></p>
                <br>
                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif;text-align: center">Descripcion:</p>
                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif;text-align: justify">
                    <?php echo e($rta->descripcion); ?>

                </p>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/investigacionesfacultad.blade.php ENDPATH**/ ?>