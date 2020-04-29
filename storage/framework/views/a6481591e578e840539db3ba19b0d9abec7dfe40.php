<head>
    <meta charset="UTF-8">
    <title> UNASAM - <?php echo $__env->yieldContent('htmlheader_title', 'Your title here'); ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link href="<?php echo e(asset('/css/all.css')); ?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link href="<?php echo e(asset('/css/dataTables.bootstrap.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/css/sweetalert2.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/css/select2.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/css/datepicker3.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/css/alertify.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/css/fileinput.css')); ?>" rel="stylesheet" type="text/css" /> 
    <link href="<?php echo e(asset('/icheck/skins/all.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/color/bootstrap-colorpicker.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/spinkit.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('css/toastr.css')); ?>" rel="stylesheet" type="text/css" />

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <link rel="icon" type="image/png" href="<?php echo e(asset('/img/icon.png')); ?>" />

    <script>
        //See https://laracasts.com/discuss/channels/vue/use-trans-in-vuejs
        window.trans = <?php
            // copy all translations from /resources/lang/CURRENT_LOCALE/* to global JS variable
            $lang_files = File::files(resource_path() . '/lang/' . App::getLocale());
            $trans = [];
            foreach ($lang_files as $f) {
                $filename = pathinfo($f)['filename'];
                $trans[$filename] = trans($filename);
            }
            $trans['adminlte_lang_message'] = trans('adminlte_lang::message');
            echo json_encode($trans);
        ?>
    </script>
</head>
<?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/vendor/adminlte/layouts/partials/htmlheader.blade.php ENDPATH**/ ?>