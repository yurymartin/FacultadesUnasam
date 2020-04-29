<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="es">

@section('htmlheader')
@include('adminlte::layouts.partials.htmlheader')
@show

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
            @include('adminlte::layouts.partials.mainheader')
            @include('adminlte::layouts.partials.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper" style="background-image: url(../img/fondo_gris2.gif);">
                @include('adminlte::layouts.partials.contentheader')
                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    @yield('main-content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            @include('adminlte::layouts.partials.footer')
            @include('adminlte::layouts.partials.controlsidebar')
        </div><!-- ./wrapper -->
    </div>
    @section('scripts')
    @include('adminlte::layouts.partials.scripts')
    @show
</body>

</html>

@if($modulo=="facultades")
@include('facultades.vue')

@elseif($modulo=="departamentoacademicos")
@include('departamentoacademicos.vue')

@elseif($modulo=="cargos")
@include('cargo.vue')

@elseif($modulo=="escuelas")
@include('escuelas.vue')

@elseif($modulo=="bannersescuelas")
@include('bannerescuela.vue')

@elseif($modulo=="galeriaescuelas")
@include('galeriaescuela.vue')

@elseif($modulo=="mallaescuelas")
@include('mallaescuela.vue')

@elseif($modulo=="comiteestudiantil")
@include('comiteestudiantil.vue')

@elseif($modulo=="categoriadocentes")
@include('categoriadocentes.vue')

@elseif($modulo=="gradoacademicos")
@include('gradoacademicos.vue')

@elseif($modulo=="organigramafacultades")
@include('organigrama.vue')

@elseif($modulo=="docentes")
@include('docentes.vue')

@elseif($modulo=="bannersFacultad")
@include('bannersFacultad.vue')

@elseif($modulo=="descripcionfacultades")
@include('descripcionfacultades.vue')

@elseif($modulo=="descripcionescuelas")
@include('descripcionescuelas.vue')

@elseif($modulo=="campolaborales")
@include('campolaborales.vue')

@elseif($modulo=="perfiles")
@include('perfiles.vue')

@elseif($modulo=="temas")
@include('temas.vue')

@elseif($modulo=="publicaciones")
@include('publicaciones.vue')

@elseif($modulo=="eventoFacultades")
@include('eventoFacultades.vue')

@elseif($modulo=="noticiaFacultades")
@include('noticiaFacultades.vue')

@elseif($modulo=="galeriaFacultades")
@include('galeriaFacultades.vue')

@elseif($modulo=="videoFacultades")
@include('videoFacultades.vue')

@elseif($modulo=="documentoFacultades")
@include('documentoFacultades.vue')

@elseif($modulo=="autoridades")
@include('autoridades.vue')

@elseif($modulo=="alumnos")
@include('alumnos.vue')

@elseif($modulo=="inicioAdmin")
@include('inicio.vueAdmin')

@elseif($modulo=="videoEscuelas")
@include('videoEscuelas.vue')

@elseif($modulo=="usuarios")
@include('users.vue')

@elseif($modulo=="roles")
@include('roles.vue')

@elseif($modulo=="roles")
@include('roles.vue')

@elseif($modulo=="redesfacultades")
@include('redesfacultades.vue')

@elseif($modulo=="redesescuelas")
@include('redesescuelas.vue')

@elseif($modulo=="tipopublicaciones")
@include('tipopublicaciones.vue')


@endif