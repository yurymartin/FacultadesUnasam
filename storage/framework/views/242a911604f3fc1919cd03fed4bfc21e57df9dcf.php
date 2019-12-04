<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FACULTADES | UNASAM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="College Education Responsive Template">
    <meta name="author" content="Esmet">
    <meta charset="UTF-8">

    <link rel="icon" type="image/png" href="<?php echo e(asset('/img/icon.png')); ?>" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800' rel='stylesheet'
        type='text/css'>

    <!-- CSS Bootstrap & Custom -->
    <link href="<?php echo e(asset('web/css/bootstrap.css')); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo e(asset('web/css/font-awesome.min.css')); ?>" rel="stylesheet" media="screen">
    <link href="<?php echo e(asset('web/css/animate.css')); ?>" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/font-awesome.min.css')); ?>">

    <link href="<?php echo e(asset('style.css')); ?>" rel="stylesheet" media="screen">
    <!-- Favicons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="stylesheet" href="<?php echo e(asset('web/css/bootstrap.css')); ?>">
    <!--link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    

    <!-- JavaScripts -->
    <script src="<?php echo e(asset('web/js/jquery-1.10.2.min.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/jquery-migrate-1.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/modernizr.js')); ?>"></script>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
    <!------------------ SCROLL REVEAL--------------------->
    <!----------------------------------------------------->

</head>

<body>
    <!--------------------------------------   HEADER --------------------------------------------->
    <?php echo $__env->make('web.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------------------------------------------------------------------------------------->
    <!--------------------------------------   BODY ----------------------------------------------->
    <?php echo $__env->yieldContent('contenido'); ?>
    <!--------------------------------------------------------------------------------------------->
    <!--------------------------------------   FOOTER  -------------------------------------------->
    <?php echo $__env->make('web.layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!--------------------------------------------------------------------------------------------->

    <!-- JavaScripts -->
    <script src="<?php echo e(asset('web/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/plugins.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/custom.js')); ?>"></script>
</body>

</html><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/layout/layout.blade.php ENDPATH**/ ?>