<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="<?php echo e(asset('/img/icon.png')); ?>" />
    <title>UNASAM - Facultades</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo e(asset('web/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?php echo e(asset('web/vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet'
        type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('web/css/agency.min.css')); ?>" rel="stylesheet">

    <style>
        #bienvenida {
            text-shadow: 4px -5px 1px rgba(0,0,0,0.6);
        }
    </style>

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">UNASAM</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#page-top">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#portfolio">Facultades</a>
                    </li>

                    <?php if(Auth::guest()): ?>
                    <li class="nav-item">
                        <a href="/home" class="nav-link js-scroll-trigger"><i class="fa fa-gear"></i> Acceso</a>
                    </li>
                    <?php else: ?>
                    <li class="nav-item">
                        <a href="/home" class="nav-link js-scroll-trigger"
                            title="Regresar al AdminPanelF"><?php echo e(Auth::user()->name); ?></a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-heading text-uppercase text-warning"
                    style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif"
                    id="bienvenida">BIENVENIDO ALAS FACULTADES DE LA UNASAM</div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid -->
    <section class="bg-light page-section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Facultades</h2>
                    <h3 class="section-subheading text-muted">Paginas web de las Facultades de la UNASAM</h3>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $facultades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $facultad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-md-4 col-sm-4 portfolio-item">
                    <a class="portfolio-link" href="/facultadweb/<?php echo e($facultad->idfac); ?>">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fas fa-eye fa-4x"></i>
                            </div>
                        </div>
                        <img class="img-fluid" src="<?php echo e(asset('img/descripcionFacultades/'.$facultad->imagen)); ?>"
                            alt="<?php echo e($facultad->imagen); ?>" style="width: 800px;height: 300px;padding: 5px 5px 5px 5px">
                    </a>
                    <div class="portfolio-caption" style="height: 180px">
                        <h5><?php echo e($facultad->nombre); ?></h5>
                        <p class="text-muted"><?php echo e($facultad->abreviatura); ?></p>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo e(asset('web/vendor/jquery/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('web/vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>

    <!-- Plugin JavaScript -->
    <script src="<?php echo e(asset('web/vendor/jquery-easing/jquery.easing.min.js')); ?>"></script>

    <!-- Contact form JavaScript -->
    <script src="<?php echo e(asset('web/js/jqBootstrapValidation.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/contact_me.js')); ?>"></script>

    <!-- Custom scripts for this template -->
    <script src="<?php echo e(asset('web/js/agency.min.js')); ?>"></script>

</body>

</html><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/web/inicio.blade.php ENDPATH**/ ?>