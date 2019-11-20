<?php $__env->startSection('htmlheader_title'); ?>
	Inicio
<?php $__env->stopSection(); ?>

<style type="text/css">         
          
	#modaltamanio{
	  width: 70% !important;
	}
	
	</style>

<?php $__env->startSection('main-content'); ?>
	<div class="container-fluid spark-screen">
		<div class="row">
	
		<?php echo $__env->make('adminlte::layouts.partials.loaders', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


		<?php if(accesoUser([1])): ?>
		<template v-if="divhome" id="divhome" v-show="divhome">
		<?php echo $__env->make('inicio.menuAdmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		</template>
		<?php endif; ?>

			
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\USUARIO\Desktop\webFacultades\resources\views/inicio/home.blade.php ENDPATH**/ ?>