<?php $__env->startSection('contenido'); ?>
<style>
    .imagen:hover {
        transform: scale(0.97);
        transition: .5s;
        border: 5px solid yellow;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center"><strong>Libros</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Lorem
                        ipsum dolor sit, amet consectetur adipisicing
                        elit. Odio magni inventore voluptas assumenda atque excepturi accusantium natus possimus
                        nesciunt vitae quo at, necessitatibus animi est molestias nobis ad reiciendis. </p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-size: 20px">TEMA:</label>
                                <select class="form-control form-control-lg">
                                        <option>Todos</option>
                                    <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option><?php echo e($lib->titulo); ?></option>   
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                <?php $__currentLoopData = $libros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lib): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <h5 class="blog-list-title"><a href="<?php echo e(asset('doc/investigaciones/'.$lib->ruta)); ?>" target="blank"><?php echo e($lib->titulo); ?></a></h5> 
                            <a href="<?php echo e(asset('doc/investigaciones/'.$lib->ruta)); ?>" target="blank"><img src="<?php echo e(asset('img/investigaciones/'.$lib->imagen)); ?>" alt=""
                                style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text"><?php echo e($lib->fechapublicacion); ?></p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif"><?php echo e($lib->descripcion); ?></p>
                            </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/libro.blade.php ENDPATH**/ ?>