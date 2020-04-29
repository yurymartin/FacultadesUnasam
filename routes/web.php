<?php
Route::get('/', 'IndexWebController@inicio');
Route::get('facultadweb/{idfacultad}', 'IndexWebController@index');
Route::get('facultadweb/{idfacultad}/historia', 'IndexWebController@historiaF');
Route::get('departacademico', 'IndexWebController@departacademico');
Route::get('facultadweb/{idfacultad}/publicacionesweb', 'IndexWebController@publicacionesweb');
Route::get('facultadweb/{idfacultad}/comestudiantil', 'IndexWebController@comestudiantil');
Route::get('facultadweb/{idfacultad}/misionvision', 'IndexWebController@misionvision');
Route::get('facultadweb/{idfacultad}/filosofia', 'IndexWebController@filosofia');
Route::get('facultadweb/{idfacultad}/organigrama', 'IndexWebController@organigrama');
Route::get('facultadweb/{idfacultad}/docentesweb', 'IndexWebController@docentesweb');
Route::get('facultadweb/{idfacultad}/escuelaweb/{idescuela}', 'IndexWebController@escuelas');
Route::get('facultadweb/{idfacultad}/autoridadesF/{idautoridad}', 'IndexWebController@autoridadesF');
Route::get('facultadweb/{idfacultad}/contacto', 'IndexWebController@contacto');
Route::get('facultadweb/{idfacultad}/noticiasf', 'IndexWebController@noticiasfacultad');
Route::get('facultadweb/{idfacultad}/eventosf', 'IndexWebController@eventosfacultad');
Route::get('facultadweb/{idfacultad}/documentosf', 'IndexWebController@documentosfacultad');
Route::get('facultadweb/{idfacultad}/galeriaf', 'IndexWebController@galeriasfacultad');
Route::get('facultadweb/{idfacultad}/videosf', 'IndexWebController@videosfacultad');

//Rutas para panel de Administracion
Route::group(['middleware' => 'auth'], function () {

    Route::resource('home', 'HomeController');
    
    Route::get('departamentos', 'DepartamentoAcademicosController@index1');
    Route::resource('departamento', 'DepartamentoAcademicosController');
    Route::get('departamento/altabaja/{id}/{var}', 'DepartamentoAcademicosController@altabaja');

    Route::get('facultades', 'FacultadesController@index1');
    Route::resource('facultad', 'FacultadesController');
    Route::get('facultad/altabaja/{id}/{var}', 'FacultadesController@altabaja');

    Route::get('cargos', 'CargoController@index1');
    Route::resource('cargo', 'CargoController');
    Route::get('cargo/altabaja/{id}/{var}', 'CargoController@altabaja');

    Route::get('catdocentes', 'CategoriaDocentesController@index1');
    Route::resource('catdocente', 'CategoriaDocentesController');
    Route::get('catdocente/altabaja/{id}/{var}', 'CategoriaDocentesController@altabaja');

    Route::get('gradoacademicos', 'GradoAcademicosController@index1');
    Route::resource('gradoacademico', 'GradoAcademicosController');
    Route::get('gradoacademico/altabaja/{id}/{var}', 'GradoAcademicosController@altabaja');

    Route::get('docentes', 'DocentesController@index1');
    Route::resource('docente', 'DocentesController');
    Route::get('docente/altabaja/{id}/{var}', 'DocentesController@altabaja');

    Route::get('bannersFacultades', 'BannersController@index1');
    Route::resource('bannersFacultad', 'BannersController');
    Route::get('bannersFacultad/altabaja/{id}/{var}', 'BannersController@altabaja');

    Route::get('descripcionfacultades', 'DescripcionFacultadesController@index1');
    Route::resource('descripcionfacultad', 'DescripcionFacultadesController');
    Route::get('descripcionfacultad/altabaja/{id}/{var}', 'DescripcionFacultadesController@altabaja');

    Route::get('descripcionescuelas', 'DescripcionEscuelasController@index1');
    Route::resource('descripcionescuela', 'DescripcionEscuelasController');
    Route::get('descripcionescuela/altabaja/{id}/{var}', 'DescripcionEscuelasController@altabaja');

    Route::get('campolaborales', 'CampoLaboralesController@index1');
    Route::resource('campolaboral', 'CampoLaboralesController');
    Route::get('campolaboral/altabaja/{id}/{var}', 'CampoLaboralesController@altabaja');

    Route::get('perfiles', 'PerfilesController@index1');
    Route::resource('perfil', 'PerfilesController');
    Route::get('perfil/altabaja/{id}/{var}', 'PerfilesController@altabaja');

    Route::get('temas', 'TemasController@index1');
    Route::resource('tema', 'TemasController');
    Route::get('tema/altabaja/{id}/{var}', 'TemasController@altabaja');

    Route::get('publicaciones', 'PublicacionesController@index1');
    Route::resource('publicacion', 'PublicacionesController');
    Route::get('publicacion/altabaja/{id}/{var}', 'PublicacionesController@altabaja');

    Route::get('eventos', 'EventoFacultadesController@index1');
    Route::resource('evento', 'EventoFacultadesController');
    Route::get('evento/altabaja/{id}/{var}', 'EventoFacultadesController@altabaja');

    Route::get('noticias', 'NoticiaFacultadesController@index1');
    Route::resource('noticia', 'NoticiaFacultadesController');
    Route::get('noticia/altabaja/{id}/{var}', 'NoticiaFacultadesController@altabaja');

    Route::get('galeriasfacultades', 'GaleriaFacultadesController@index1');
    Route::resource('galeriasfacultad', 'GaleriaFacultadesController');
    Route::get('galeriasfacultad/altabaja/{id}/{var}', 'GaleriaFacultadesController@altabaja');

    Route::get('videofacultades', 'VideoFacultadesController@index1');
    Route::resource('videofacultad', 'VideoFacultadesController');
    Route::get('videofacultad/altabaja/{id}/{var}', 'VideoFacultadesController@altabaja');

    Route::get('documentofacultades', 'DocumentoFacultadescontroller@index1');
    Route::resource('documentofacultad', 'DocumentoFacultadescontroller');
    Route::get('documentofacultad/altabaja/{id}/{var}', 'DocumentoFacultadescontroller@altabaja');

    Route::get('cargos', 'CargosController@index1');
    Route::resource('cargo', 'CargosController');
    Route::get('cargo/altabaja/{id}/{var}', 'CargosController@altabaja');

    Route::get('autoridades', 'AutoridadesController@index1');
    Route::resource('autoridad', 'AutoridadesController');
    Route::get('autoridad/altabaja/{id}/{var}', 'AutoridadesController@altabaja');

    Route::get('alumnos', 'AlumnosController@index1');
    Route::resource('alumno', 'AlumnosController');
    Route::get('alumno/altabaja/{id}/{var}', 'AlumnosController@altabaja');

    Route::get('videoescuelas', 'VideoEscuelasController@index1');
    Route::resource('videoescuela', 'VideoEscuelasController');
    Route::get('videoescuela/altabaja/{id}/{var}', 'VideoEscuelasController@altabaja');

    Route::get('cargos', 'CargoController@index1');
    Route::resource('cargo', 'CargoController');
    Route::get('cargo/altabaja/{id}/{var}', 'CargoController@altabaja');

    Route::get('escuelas', 'EscuelaController@index1');
    Route::resource('escuela', 'EscuelaController');
    Route::get('escuela/altabaja/{id}/{var}', 'EscuelaController@altabaja');

    Route::get('bannersescuelas', 'BannerEscuelaController@index1');
    Route::resource('banner', 'BannerEscuelaController');
    Route::get('banner/altabaja/{id}/{var}', 'BannerEscuelaController@altabaja');

    Route::get('galeriaescuelas', 'GalEscuelaController@index1');
    Route::resource('galeriaescuela', 'GalEscuelaController');
    Route::get('galeriaescuela/altabaja/{id}/{var}', 'GalEscuelaController@altabaja');

    Route::get('mallaescuelas', 'MallaEscuelaController@index1');
    Route::resource('mallaescuela', 'MallaEscuelaController');
    Route::get('mallaescuela/altabaja/{id}/{var}', 'MallaEscuelaController@altabaja');

    Route::get('comiteestudiantil', 'ComiteEstudiantilController@index1');
    Route::resource('estudiantil', 'ComiteEstudiantilController');
    Route::get('estudiantil/altabaja/{id}/{var}', 'ComiteEstudiantilController@altabaja');

    Route::get('organigramafacultades', 'OrganigramaController@index1');
    Route::resource('organigramafacultad', 'OrganigramaController');
    Route::get('organigramafacultad/altabaja/{id}/{var}', 'OrganigramaController@altabaja');

    Route::get('tipopublicaciones', 'TipopublicacionController@index1');
    Route::resource('tipopublicacion', 'TipopublicacionController');
    Route::get('tipopublicacion/altabaja/{id}/{var}', 'TipopublicacionController@altabaja');

    Route::get('redesfacultades', 'RedesFacultadesController@index1');
    Route::resource('redesfacultad', 'RedesFacultadesController');
    Route::get('redesfacultad/altabaja/{id}/{var}', 'RedesFacultadesController@altabaja');

    Route::get('redesescuelas', 'RedesEscuelasController@index1');
    Route::resource('redesescuela', 'RedesEscuelasController');
    Route::get('redesescuela/altabaja/{id}/{var}', 'RedesEscuelasController@altabaja');

    //Rutas Protegidas
    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::resource('roles','RolesController');
        Route::resource('users','UserController');
        Route::get('users/altabaja/{id}/{var}','UserController@altabaja');
        Route::get('estilos/edit/{idestilo}','IndexWebController@cambiar');
    });
});
