<?php $__env->startSection('contenido'); ?>
<style>
    #cortar {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    #cortar:hover {
        width: auto;
        white-space: initial;
        overflow: visible;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-slideshow" style="height: 500px; margin: 0px;">
                <div class="flexslider">
                    <ul class="slides">
                        <?php $__currentLoopData = $BannersFacultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $BannersFacultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <img src="/img/bannersFacultades/<?php echo e($BannersFacultad->imagen); ?>" style="height: 500px"
                                alt="<?php echo e($BannersFacultad->imagen); ?>">
                            <div class="slider-caption">
                                <h2><a href="blog-single.html"><?php echo e($BannersFacultad->titulo); ?></a></h2>
                                <p><?php echo e($BannersFacultad->descripcion); ?></p>
                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Here begin Main Content -->
        <div class="col-md-8">
            <div class="row">
                <!-- Show Latest Blog News -->
                <div class="col-md-6">
                    <div class="widget-main" id="noticias">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Ultimas Noticias</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <?php $__currentLoopData = $noticias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $noticia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="blog-list-post clearfix">
                                <div class="blog-list-thumb">
                                    <a href="/img/noticiaFacultad/<?php echo e($noticia->imagen); ?>" class="fancybox"
                                        rel="gallery1"><img src="/img/noticiaFacultad/<?php echo e($noticia->imagen); ?>" alt=""></a>
                                </div>
                                <div class="blog-list-details">
                                    <h5 class="blog-list-title"><a href="blog-single.html"><?php echo e($noticia->titulo); ?></a></h5>
                                    <p class="blog-list-meta small-text" id="cortar">
                                        <span><?php echo e($noticia->descripcion); ?></span></p>
                                </div>
                            </div> <!-- /.blog-list-post -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="/facultadweb/<?php echo e($facultad->id); ?>/noticiasf" class="btn btn-primary">Ver mas...</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /col-md-6 -->

                <!-- Show Latest Events List -->
                <div class="col-md-6">
                    <div class="widget-main" id="eventos">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Eventos</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <?php $__currentLoopData = $eventos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $evento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="event-small-list clearfix">
                                <div class="blog-list-thumb">
                                    <a href="<?php echo e(asset('/img/eventoFacultad/'.$evento->imagen)); ?>" class="fancybox"
                                        rel="gallery1"><img src="<?php echo e(asset('/img/eventoFacultad/'.$evento->imagen)); ?>"
                                            alt=""></a>
                                </div>
                                <div class="event-small-details">
                                    <h5 class="event-small-title"><a href="event-single.html"><?php echo e($evento->tittulo); ?></a>
                                    </h5>
                                    <p class="event-small-meta small-text" id="cortar"><?php echo e($evento->descripcion); ?></p>
                                    <p class="event-small-meta small-text"><strong>Inicio:
                                            <?php echo e($evento->fechainicio); ?></strong></p>
                                    <p class="event-small-meta small-text"><strong>Fin: <?php echo e($evento->fechafin); ?></strong>
                                    </p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="/facultadweb/<?php echo e($facultad->id); ?>/eventosf" class="btn btn-primary">Ver mas...</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-6 -->

            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget-main" id="tramites">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Tramites Documentarios</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <div class="our-campus clearfix">
                                <ul style="text-align: center">
                                    <?php $__currentLoopData = $documentos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $documento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3">
                                        <li
                                            style="border-radius: 3px;background-color: #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                                            <p style=><strong><?php echo e($documento->titulo); ?></strong></p>
                                            <a href="<?php echo e(asset('/doc/documentoFacultades/'.$documento->ruta)); ?>"
                                                target="_blank"><img
                                                    src="<?php echo e(asset('/img/documentoFacultades/'.$documento->imagen)); ?>"
                                                    alt="" width="150px" height="150px"></a>
                                        </li>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="container">
                            <a href="/facultadweb/<?php echo e($facultad->id); ?>/documentosf" class="btn btn-primary">Ver Todos los
                                Documentos</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget-main" id="carreras">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Carreras Profesionales</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <div class="our-campus clearfix">
                                <ul style="text-align: center">
                                    <?php $__currentLoopData = $carrerasprofesionales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrerasprofesional): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-4">
                                        <li
                                            style="border-radius: 3px;background-color: #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                                            <p>
                                                <strong><?php echo e($carrerasprofesional->nombre); ?></strong>
                                            </p>
                                            <a class="fancybox"
                                                href="/img/descripcionEscuelas/<?php echo e($carrerasprofesional->logo); ?>">
                                                <img src="/img/descripcionEscuelas/<?php echo e($carrerasprofesional->logo); ?>"
                                                    alt="" width="170px" height="113px">
                                            </a>
                                        </li>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->

        </div> <!-- /.col-md-8 -->

        <!-- Here begin Sidebar -->
        <div class="col-md-4">

            <div class="widget-main" id="autoridades">
                <div class="widget-main-title">
                    <h4 class="widget-title">Autoridades</h4>
                </div>
                <div class="widget-inner">
                    <?php $__currentLoopData = $autoridades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autoridad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <a href="<?php echo e(asset('/img/personas/'.$autoridad->foto)); ?>" class="fancybox" rel="gallery1"><img
                                    src="<?php echo e(asset('/img/personas/'.$autoridad->foto)); ?>"
                                    alt="<?php echo e($autoridad->nombres.' '.$autoridad->apellidos); ?>"></a>
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list"><?php echo e($autoridad->nombres.' '.$autoridad->apellidos); ?></h5>
                            <p class="small-text"><?php echo e($autoridad->cargo); ?></p>
                        </div> <!-- /.prof-details -->
                    </div> <!-- /.prof-list-item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->

            <div class="widget-main" id="misionyvision">
                <div class="widget-main-title">
                    <h4 class="widget-title">Mision y Visión</h4>
                </div>
                <div class="widget-inner">
                    <div id="slider-testimonials">
                        <ul>
                            <?php if($misionvision != null): ?>
                            <li>
                                <p><strong>misión</strong></p>
                                <p style="text-align: justify"><?php echo e($misionvision->mision); ?></strong></p>
                            </li>
                            <li>
                                <p><strong>visión</strong></p>
                                <p style="text-align: justify"><?php echo e($misionvision->vision); ?></strong></p>
                            </li>
                            <?php else: ?>
                            <li>
                                <p><strong>misión</strong></p>
                                <p style="text-align: justify">Falta datos</strong></p>
                            </li>
                            <li>
                                <p><strong>visión</strong></p>
                                <p style="text-align: justify">Falta datos</strong></p>
                            </li>
                            <?php endif; ?>
                        </ul>
                        <a class="prev fa fa-angle-left" href=""></a>
                        <a class="next fa fa-angle-right" href=""></a>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->

            <div class="widget-main" id="imagenes">
                <div class="widget-main-title">
                    <h4 class="widget-title">Galeria de imagenes</h4>
                </div>
                <div class="widget-inner">
                    <div class="gallery-small-thumbs clearfix">
                        <?php $__currentLoopData = $galeriaFacultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $galeriaFacultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="thumb-small-gallery">
                            <a class="fancybox" rel="gallery1" href="/img/galeriaFacultad/<?php echo e($galeriaFacultad->imagen); ?>"
                                title="<?php echo e($galeriaFacultad->imagen); ?>">
                                <img src="/img/galeriaFacultad/<?php echo e($galeriaFacultad->imagen); ?>" alt="" />
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- /.galler-small-thumbs -->
                </div> <!-- /.widget-inner -->
                <div class="container">
                    <a href="/facultadweb/<?php echo e($facultad->id); ?>/galeriaf" class="btn btn-primary">Ver mas...</a>
                    <p></p>
                </div>
            </div> <!-- /.widget-main -->
            <div class="widget-main" id="videos">
                <div class="widget-main-title">
                    <h4 class="widget-title">Galeria de videos</h4>
                </div>
                <div class="widget-inner">
                    <div class="gallery-small-thumbs clearfix">
                        <?php $__currentLoopData = $videosFacultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $videosFacultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="thumb-small-gallery">
                            <a class="fancybox" rel="gallery1" href="images/gallery/gallery1.jpg"
                                title="Gallery Tittle One">
                                <?php
                                echo $videosFacultad->link;
                                ?>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div> <!-- /.galler-small-thumbs -->
                </div> <!-- /.widget-inner -->
                <div class="container">
                    <a href="/facultadweb/<?php echo e($facultad->id); ?>/videosf" class="btn btn-primary">Ver mas...</a>
                    <p></p>
                </div>
            </div> <!-- /.widget-main -->
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/web/index.blade.php ENDPATH**/ ?>