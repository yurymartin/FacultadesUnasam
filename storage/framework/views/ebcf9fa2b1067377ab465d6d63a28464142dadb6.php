<?php $__env->startSection('htmlheader_title'); ?>
Gestión de Publicaciones
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

		<template v-if="divprincipal" id="divprincipal">
			<?php echo $__env->make('investigaciones.principal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</template>


	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('vendor.adminlte.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/investigaciones/index.blade.php ENDPATH**/ ?>