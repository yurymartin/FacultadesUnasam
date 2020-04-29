@extends('vendor.adminlte.layouts.app')

@section('htmlheader_title')
Gestión de Galerias de Imagenes
@endsection

<style type="text/css">
	#modaltamanio {
		width: 70% !important;
	}

	.swal2-popup {
		font-size: 1.175em !important;
	}
</style>
@section('main-content')
<div class="container-fluid spark-screen" id="contenidoItem">



	<div class="row">

		@include('vendor.adminlte.layouts.partials.loaders')

		<template v-if="divprincipal" id="divprincipal">
			@include('galeriaescuela.principal')
		</template>


	</div>
</div>
@endsection