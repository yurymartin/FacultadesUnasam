<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

<?php $__env->startSection('htmlheader'); ?>
<?php echo $__env->make('adminlte::layouts.partials.htmlheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>

<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="skin-blue sidebar-mini">
    <div id="app" v-cloak>
        <div class="wrapper">
            <?php echo $__env->make('adminlte::layouts.partials.mainheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('adminlte::layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-image: url(../img/fondo_gris2.gif);">
                <?php echo $__env->make('adminlte::layouts.partials.contentheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    <?php echo $__env->yieldContent('main-content'); ?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php echo $__env->make('adminlte::layouts.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('adminlte::layouts.partials.controlsidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div><!-- ./wrapper -->
    </div>
    <?php $__env->startSection('scripts'); ?>
    <?php echo $__env->make('adminlte::layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</body>

</html>

<?php if($modulo=="facultades"): ?>
<?php echo $__env->make('facultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="departamentoacademicos"): ?>
<?php echo $__env->make('departamentoacademicos.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="cargos"): ?>
<?php echo $__env->make('cargo.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="escuelas"): ?>
<?php echo $__env->make('escuelas.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="bannersescuelas"): ?>
<?php echo $__env->make('bannerescuela.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="galeriaescuelas"): ?>
<?php echo $__env->make('galeriaescuela.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="mallaescuelas"): ?>
<?php echo $__env->make('mallaescuela.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="comiteestudiantil"): ?>
<?php echo $__env->make('comiteestudiantil.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="categoriadocentes"): ?>
<?php echo $__env->make('categoriadocentes.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="gradoacademicos"): ?>
<?php echo $__env->make('gradoacademicos.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="organigramafacultades"): ?>
<?php echo $__env->make('organigrama.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="docentes"): ?>
<?php echo $__env->make('docentes.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="bannersFacultad"): ?>
<?php echo $__env->make('bannersFacultad.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="descripcionfacultades"): ?>
<?php echo $__env->make('descripcionfacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="descripcionescuelas"): ?>
<?php echo $__env->make('descripcionescuelas.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="campolaborales"): ?>
<?php echo $__env->make('campolaborales.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="perfiles"): ?>
<?php echo $__env->make('perfiles.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="temas"): ?>
<?php echo $__env->make('temas.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="publicaciones"): ?>
<?php echo $__env->make('publicaciones.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="eventoFacultades"): ?>
<?php echo $__env->make('eventoFacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="noticiaFacultades"): ?>
<?php echo $__env->make('noticiaFacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="galeriaFacultades"): ?>
<?php echo $__env->make('galeriaFacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="videoFacultades"): ?>
<?php echo $__env->make('videoFacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="documentoFacultades"): ?>
<?php echo $__env->make('documentoFacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="autoridades"): ?>
<?php echo $__env->make('autoridades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="alumnos"): ?>
<?php echo $__env->make('alumnos.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="inicioAdmin"): ?>
<?php echo $__env->make('inicio.vueAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="videoEscuelas"): ?>
<?php echo $__env->make('videoEscuelas.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="usuarios"): ?>
<?php echo $__env->make('users.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="roles"): ?>
<?php echo $__env->make('roles.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="roles"): ?>
<?php echo $__env->make('roles.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="redesfacultades"): ?>
<?php echo $__env->make('redesfacultades.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="redesescuelas"): ?>
<?php echo $__env->make('redesescuelas.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php elseif($modulo=="tipopublicaciones"): ?>
<?php echo $__env->make('tipopublicaciones.vue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php endif; ?><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/vendor/adminlte/layouts/app.blade.php ENDPATH**/ ?>