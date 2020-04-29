<?php $__env->startSection('contenido'); ?>
<style>
    #panel-imagen:hover {
        transform: scale(0.95);
        transition: .5s;
        border: 1px solid slategray;
        border-radius: 10px;
        opacity: 50%;
    }
</style>


<div class="container" style="margin-top: 40px;text-align: center">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="GET" class="form-inline">
                <div class="form-group">
                    <label style="font-size: 20px">TEMA:</label>
                </div>
                <div class="form-group" style="font-family: 'Times New Roman', Times, serif;width: 50%">
                    <select class="form-control form-control-lg" name="buscar" id="buscar" >
                        <option value=""><strong>TODOS LAS PUBLICACIONES</strong></option>
                        <?php $__currentLoopData = $temas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($tema->id); ?>" id="buscar"><?php echo e($tema->tema); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">BUSCAR</button>
            </form>
        </div>
    </div>
</div>
<?php $__currentLoopData = $tipopublicaciones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tipopublicacion): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center text-primary"><strong><?php echo e($tipopublicacion->tipo); ?></strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Los
                        <?php echo e($tipopublicacion->descripcion); ?></p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="row text-center" style="margin-top: 30px">
                    <div class="col-md-12">
                        <?php $__currentLoopData = $librosweb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $libro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($tipopublicacion->id == $libro->tipopublicacion_id): ?>
                        <div class="col-md-3" style="background-color: #fafafa" id="panel-imagen">
                            <h5 class="blog-list-title"><a href="<?php echo e(asset('doc/libros/'.$libro->ruta)); ?>"
                                    target="blank"><?php echo e($libro->titulo); ?></a></h5>
                            <a href="<?php echo e(asset('doc/libros/'.$libro->ruta)); ?>" target="blank"><img
                                    src="<?php echo e(asset('img/libros/'.$libro->imagen)); ?>" alt=""
                                    style="width: 150px;height: 150px" class="imagen"></a>
                            <p class="blog-list-meta small-text">Autor(es): <?php echo e($libro->autor); ?></p>
                            <p class="blog-list-meta small-text">Fecha Publicacion: <?php echo e($libro->fechapublicacion); ?></p>
                            <br>
                            <p class="blog-list-meta small-text">descripcion:</p>
                            <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif;text-align: justify">
                                <?php echo e($libro->descripcion); ?></p>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div> <!-- /.widget-main -->
    </div> <!-- /col-md-6 -->
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/librosweb.blade.php ENDPATH**/ ?>