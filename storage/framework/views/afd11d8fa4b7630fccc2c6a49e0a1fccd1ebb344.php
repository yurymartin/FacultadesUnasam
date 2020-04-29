<?php $__env->startSection('contenido'); ?>
<style>
    #campo-laboral:hover {
        transform: scale(1.03);
        transition: .5s;
        opacity: 90%;
    }

    #campo-laboral-imagen:hover {
        transform: scale(1.03);
        transition: .5s;
        opacity: 90%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-slideshow" style="height: 500px">
                <div class="flexslider">
                    <ul class="slides">
                        <?php $__currentLoopData = $bannerescuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bannerescuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <img src="/img/bannersEscuelas/<?php echo e($bannerescuela->imagen); ?>" style="height: 500px"
                                alt="<?php echo e($bannerescuela->imagen); ?>">
                            <div class="slider-caption">
                                <h2><a href="blog-single.html"><?php echo e($bannerescuela->titulo); ?></a></h2>
                                <p><?php echo e($bannerescuela->descripcion); ?></p>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul> <!-- /.slides -->
                </div> <!-- /.flexslider -->
            </div> <!-- /.main-slideshow -->
        </div> <!-- /.col-md-12 -->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <div class="widget-main">
                    <div class="widget-main-title">
                        <?php if($descripciones != null): ?>
                        <h1 style="font-family: 'Times New Roman', Times, serif">
                            <strong><?php echo e($descripciones->nombre); ?></strong></h1>
                        <?php else: ?>
                        <h1><strong>Falta Datos...</strong></h1>
                        <?php endif; ?>

                        <?php if($redesescuelas != null): ?>
                        <p>
                            <?php if($redesescuelas->facebook != null): ?>
                            <a href="<?php echo e($redesescuelas->facebook); ?>" data-toggle="tooltip" title="Facebook"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-facebook"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->google != null): ?>
                            <a href="<?php echo e($redesescuelas->google); ?>" data-toggle="tooltip" title="Google+"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-google-plus"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->youtube != null): ?>
                            <a href="<?php echo e($redesescuelas->youtube); ?>" data-toggle="tooltip" title="Youtube"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-youtube-play"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->twitter != null): ?>
                            <a href="<?php echo e($redesescuelas->twitter); ?>" data-toggle="tooltip" title="Twitter"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-twitter"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->instagram != null): ?>
                            <a href="<?php echo e($redesescuelas->instagram); ?>" data-toggle="tooltip" title="Instagram"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-instagram"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->linkedln != null): ?>
                            <a href="<?php echo e($redesescuelas->linkedln); ?>" data-toggle="tooltip" title="Linkedln"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-linkedin-square"></i></a>
                            <?php endif; ?>
                            <?php if($redesescuelas->pinterest != null): ?>
                            <a href="<?php echo e($redesescuelas->pinterest); ?>" data-toggle="tooltip" title="Pinterest"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-pinterest"></i></a>
                            <?php endif; ?>

                        </p>
                        <?php endif; ?>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                <h3 class="text-primary"><strong>La Carrera</strong></h3>
                                <?php if($descripciones != null): ?>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    <?php echo e($descripciones->descripcion); ?></p>
                                <?php else: ?>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                <?php if($descripciones != null): ?>
                                <h3 class="text-primary"><strong>Grado Académico</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    <?php echo e($descripciones->gradoacade); ?></p>
                                <h3 class="text-primary"><strong>Titulo</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    <?php echo e($descripciones->tituloprofesional); ?></p>
                                <h3 class="text-primary"><strong>Duración</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    <?php echo e($descripciones->duracion); ?></p>
                                <?php else: ?>
                                <h3 class="text-primary"><strong>Grado Académico</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <h3 class="text-primary"><strong>Titulo</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <h3 class="text-primary"><strong>Duración</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.widget-main -->
            </div>
            <div class="col-md-4">
                <div class="widget-main" id="tramites">
                    <br><br><br><br><br><br>
                    <div class="widget-inner text-center">
                        <div class="our-campus clearfix" style="background-color: #fafafa">
                            <br><br><br>
                            <?php if($descripciones != null): ?>
                            <a href="<?php echo e(asset('/img/descripcionEscuelas/'.$descripciones->logo)); ?>" class="fancybox"
                                rel="gallery1"><img src="<?php echo e(asset('/img/descripcionEscuelas/'.$descripciones->logo)); ?>"
                                    alt="<?php echo e($descripciones->nombre); ?>" style="width: 300px;height: 200px"></a>
                            <?php else: ?>
                            <a href="" class="fancybox" rel="gallery1"><img src="" alt="Falta Registar el Logo..."
                                    style="width: 300px;height: 200px"></a>
                            <?php endif; ?>
                            <br><br><br>
                        </div>
                    </div>
                </div> <!-- /.widget-main -->
            </div> <!-- /.col-md-12 -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>NUESTRA ESCUELA PROFESIONAL</strong></h3>
            <hr>
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#campo">CAMPO LABORAL</a></li>
                <li><a data-toggle="tab" href="#perfil">PERFIL PROFESIONAL</a></li>
                <li><a data-toggle="tab" href="#malla">MALLA CURRICULAR</a></li>
            </ul>

            <div class="tab-content">
                <div id="campo" class="tab-pane fade in active">
                    <?php $__currentLoopData = $campoLaborales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $campoLaboral): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="row"
                        style="background-color: #17478C;padding-top: 10px;padding-bottom: 10px;color: white;border-radius: 5px"
                        id="campo-laboral">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <h4 style="color: white;text-decoration: underline" class="text-center">
                                    <strong><?php echo e($campoLaboral->titulo); ?></strong></h4>
                                <p
                                    style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                                    <?php echo e($campoLaboral->campolab); ?></p>
                            </div>
                            <div class="col-md-4">
                                <a href="<?php echo e(asset('/img/campolaboral/'.$campoLaboral->imagen)); ?>" class="fancybox"
                                    rel="gallery1"><img src="<?php echo e(asset('/img/campolaboral/'.$campoLaboral->imagen)); ?>"
                                        style="width: 300px;height: 200px"></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div id="perfil" class="tab-pane fade">
                    <h3>Perfil Profesional</h3>
                    <ul>
                        <?php $__currentLoopData = $perfiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $perfil): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($perfil->perfil); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div id="malla" class="tab-pane fade">
                    <h3>Malla Curricular</h3>
                    <?php if($mallas != null): ?>
                    <a href="<?php echo e(asset('/img/mallaEscuelas/'.$mallas->imagen)); ?>" class="fancybox" rel="gallery1"><img
                            src="<?php echo e(asset('/img/mallaEscuelas/'.$mallas->imagen)); ?>" alt="<?php echo e($mallas->numcurricula); ?>"
                            style="width: 1100px;height: 500px"></a>
                    <?php else: ?>
                    <a href="" class="fancybox" rel="gallery1"><img src="" alt="Falta Malla Curricular..."
                            style="width: 1100px;height: 500px"></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>GALERIA DE IMAGENES</strong></h3>
            <hr>
            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">
                <?php $__currentLoopData = $galeriaEscuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeriaEscuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <figure class="col-md-4">
                    <a href="<?php echo e(asset('/img/galeriaEscuelas/'.$galeriaEscuela->imagen)); ?>" data-size="500x500"
                        class="fancybox">
                        <img alt="picture" src="<?php echo e(asset('/img/galeriaEscuelas/'.$galeriaEscuela->imagen)); ?>"
                            class="img-fluid" width="350px" height="200px" id="campo-laboral-imagen">
                    </a>
                </figure>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <hr>
        <h3 class="text-center"><strong>GALERIA DE VIDEOS</strong></h3>
        <hr>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php $__currentLoopData = $videoescuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videoescuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
                <?php
                echo $videoescuela->link;
                ?>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/escuelas.blade.php ENDPATH**/ ?>