<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Videos de Youtube
<?php $__env->stopSection(); ?>

<style type="text/css">
	#modaltamanio {
		width: 70% !important;
	}

	.swal2-popup {
		font-size: 1.175em !important;
	}
</style>
<?php $__env->startSection('main-content'); ?>
<div class="container-fluid spark-screen" id="contenidoItem">



	<div class="row">

		<?php echo $__env->make('vendor.adminlte.layouts.partials.loaders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<?php if(accesoUser([1,2])): ?>

		<template v-if="divprincipal" id="divprincipal">
			<?php echo $__env->make('videoyoutube.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</template>
		<?php endif; ?>


	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/videoyoutube/index.blade.php ENDPATH**/ ?>