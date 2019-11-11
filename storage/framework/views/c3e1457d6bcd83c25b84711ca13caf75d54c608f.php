<!DOCTYPE html>
<html>

<?php echo $__env->make('adminlte::layouts.partials.htmlheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<body>
    <div id="app" v-cloak>
        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            <?php echo $__env->yieldContent('main-content'); ?>
        </section>
    </div>
    <?php $__env->startSection('scripts'); ?>
        <?php echo $__env->make('adminlte::layouts.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldSection(); ?>
</body>
</html><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/vendor/adminlte/layouts/errors.blade.php ENDPATH**/ ?>