<?php

//Route::get('/', function () {
//    return view('web/index');
//});
//Route::get('/admin', function () {
//    return view('vendor/adminlte/layouts/app');
//});
//Route::get('/','IndexWebController@Index');

// ESCUELAS
//Route::get('WebAdministracion', 'IndexWebController@Administracion');
// Route::get('/', function () {
//     //return view('welcome');
//     return redirect('login');
// });
/*------------------------------------------------------------------------------------------------*/
Route::resource('/', 'IndexWebController');

Route::get('historia', 'IndexWebController@historiaF');
Route::get('decano', 'IndexWebController@decano');
Route::get('consejo', 'IndexWebController@consejo');
Route::get('departacademico', 'IndexWebController@departacademico');
Route::get('ingenieriadesistemaseinformatica', 'IndexWebController@ingenieriadesistemaseinformatica');
/*------------------------------------------------------------------------------------------------*/



Route::group(['middleware' => 'auth'], function () {

    Route::get('send', 'mailController@send');
    Route::get('sendSMS', 'SmsController@sendSms');

    Route::get('usuarios', 'UserController@index1');
    Route::resource('usuario', 'UserController');
    Route::get('usuario/altabaja/{id}/{var}', 'UserController@altabaja');
    Route::get('usuario/verpersona/{dni}', 'UserController@verpersona');

    Route::resource('mail', 'MailController');
    /* --------------------------------------------------- YURY --------------------------------------*/

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

    Route::get('nosotrosescuelas', 'NosotrosEscuelasController@index1');
    Route::resource('nosotrosescuela', 'NosotrosEscuelasController');
    Route::get('nosotrosescuela/altabaja/{id}/{var}', 'NosotrosEscuelasController@altabaja');

    Route::get('campolaborales', 'CampoLaboralesController@index1');
    Route::resource('campolaboral', 'CampoLaboralesController');
    Route::get('campolaboral/altabaja/{id}/{var}', 'CampoLaboralesController@altabaja');

    Route::get('perfiles', 'PerfilesController@index1');
    Route::resource('perfil', 'PerfilesController');
    Route::get('perfil/altabaja/{id}/{var}', 'PerfilesController@altabaja');

    Route::get('investigaciones', 'InvestigacionesController@index1');
    Route::resource('investigacion', 'InvestigacionesController');
    Route::get('investigacion/altabaja/{id}/{var}', 'InvestigacionesController@altabaja');

    Route::get('temas', 'TemasController@index1');
    Route::resource('tema', 'TemasController');
    Route::get('tema/altabaja/{id}/{var}', 'TemasController@altabaja');

    Route::get('libros', 'LibrosController@index1');
    Route::resource('libro', 'LibrosController');
    Route::get('libro/altabaja/{id}/{var}', 'LibrosController@altabaja');

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

    /* --------------------------------------------------- PACHAS --------------------------------------*/
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
    
    Route::get('misionvision', 'IndexWebController@misionvision');
    Route::get('filosofia', 'IndexWebController@filosofia');
    Route::get('organigrama', 'IndexWebController@organigrama');
    Route::get('revista', 'IndexWebController@revista');
    Route::get('librosweb', 'IndexWebController@librosweb');
});
