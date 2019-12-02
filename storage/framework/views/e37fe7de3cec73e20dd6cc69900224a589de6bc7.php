<?php $__env->startSection('contenido'); ?>
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
                                    <p class="blog-list-meta small-text"><span><a
                                                href="#"><?php echo e($noticia->descripcion); ?></a></span></p>
                                </div>
                            </div> <!-- /.blog-list-post -->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver mas...</a>
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
                                    <p class="event-small-meta small-text"><?php echo e($evento->descripcion); ?></p>
                                    <p class="event-small-meta small-text">Inicio: <?php echo e($evento->fechainicio); ?></p>
                                    <p class="event-small-meta small-text">Fin: <?php echo e($evento->fechafin); ?></p>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver mas...</a>
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
                                                    alt=""></a>
                                        </li>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver Todos los Documentos</a>
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
                    <?php $__currentLoopData = $decano; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <a href="<?php echo e(asset('/img/personas/'.$deca->foto)); ?>" class="fancybox" rel="gallery1"><img
                                    src="<?php echo e(asset('/img/personas/'.$deca->foto)); ?>"
                                    alt="<?php echo e($deca->nombres.' '.$deca->apellidos); ?>"></a>
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list"><?php echo e($deca->nombres.' '.$deca->apellidos); ?></h5>
                            <p class="small-text"><?php echo e($deca->cargo); ?></p>
                        </div> <!-- /.prof-details -->
                    </div> <!-- /.prof-list-item -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                            <?php $__currentLoopData = $misionvision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misiovisio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <p><strong>misión</strong></p>
                                <p style="text-align: justify"><?php echo e($misiovisio->mision); ?></strong></p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $misionvision; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $misiovisio): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <p><strong>visión</strong></p>
                                <p style="text-align: justify"><?php echo e($misiovisio->vision); ?></strong></p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <a href="" class="btn btn-primary">Ver mas...</a>
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
                    <a href="" class="btn btn-primary">Ver mas...</a>
                    <p></p>
                </div>
            </div> <!-- /.widget-main -->
        </div>
    </div>
</div>
<script>
    window.sr = ScrollReveal();
            sr.reveal('#noticias',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#eventos',{
                duration: 2000,
                origin: 'top',
                distance: '300px'
            }); 
        window.sr = ScrollReveal();
            sr.reveal('#autoridades',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#tramites',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#carreras',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            }); 
        window.sr = ScrollReveal();
            sr.reveal('#misionyvision',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#imagenes',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#videos',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            }); 
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web/layout/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\Facus\webFacultades\resources\views/web/index.blade.php ENDPATH**/ ?>