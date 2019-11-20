<?php

Route::get('/', function () {
    return view('web/index');
});
Route::get('/admin', function () {
    return view('vendor/adminlte/layouts/app');
});
//Route::get('/','IndexWebController@Index');

// ESCUELAS
Route::get('WebAdministracion', 'IndexWebController@Administracion');
Route::get('WebArqueologia', 'IndexWebController@Arqueologia');
Route::get('WebArquitectura', 'IndexWebController@Arquitectura');
Route::get('WebContabilidad', 'IndexWebController@Contabilidad');
Route::get('WebComunicacion', 'IndexWebController@Comunicacion');
Route::get('WebDerecho', 'IndexWebController@Derecho');
Route::get('WebEconomia', 'IndexWebController@Economia');
Route::get('WebEducacion', 'IndexWebController@Educacion');
Route::get('WebEnfermeria', 'IndexWebController@Enfermeria');
Route::get('WebEstadistica', 'IndexWebController@Estadistica');
Route::get('WebIngAgricola', 'IndexWebController@IngAgricola');
Route::get('WebIngAgronomia', 'IndexWebController@IngAgronomia');
Route::get('WebIngAlimentaria', 'IndexWebController@IngAlimentaria');
Route::get('WebIngAmbiental', 'IndexWebController@IngAmbiental');
Route::get('WebIngCivil', 'IndexWebController@IngCivil');
Route::get('WebIngIndustrial', 'IndexWebController@IngIndustrial');
Route::get('WebIngles', 'IndexWebController@Ingles');
Route::get('WebIngMinas', 'IndexWebController@IngMinas');
Route::get('WebIngSanitaria', 'IndexWebController@IngSanitaria');
Route::get('WebIngSistemas', 'IndexWebController@IngSistemas');
Route::get('WebLiteratura', 'IndexWebController@Literatura');
Route::get('WebMatematica', 'IndexWebController@Matematica');
Route::get('WebMatematicaInformatica', 'IndexWebController@MatematicaInformatica');
Route::get('WebObstetricia', 'IndexWebController@Obstetricia');
Route::get('WebTurismo', 'IndexWebController@Turismo');

// ORGANOS DE GOBIERNO
Route::get('WebAsambleaUniversitaria', 'IndexWebController@AsambleaUniversitaria');
Route::get('WebConsejoUniversitario', 'IndexWebController@ConsejoUniversitario');
Route::get('WebEjes', 'IndexWebController@Ejes');

// OFICINAS
Route::get('WebAsesoriaJuridica', 'IndexWebController@AsesoriaJuridica');
Route::get('WebDirAcadEstGenerales', 'IndexWebController@DirAcadEstGenerales');
Route::get('WebDirCentrosInvestigacion', 'IndexWebController@DirCentrosInvestigacion');
Route::get('WebDirGeneralAdministracion', 'IndexWebController@DirGeneralAdministracion');
Route::get('WebDirInvestigacion', 'IndexWebController@DireccionInvestigacion');
Route::get('WebOficinaAdmision', 'IndexWebController@OficinaAdmision');
Route::get('WebBienestarUniversitario', 'IndexWebController@BienestarUniversitario');
Route::get('WebCalidadUniversitaria', 'IndexWebController@CalidadUniversitaria');
Route::get('WebDesarrolloFisico', 'IndexWebController@DesarrolloFisico');
Route::get('WebOficGeneralEstudios', 'IndexWebController@OficGeneralEstudios');
Route::get('WebImagenInstitucional', 'IndexWebController@ImagenInstitucional');
Route::get('WebCooperacionTecnica', 'IndexWebController@CooperacionTecnica');
Route::get('WebPlanificacionPresupuesto', 'IndexWebController@PlanificacionPresupuesto');
Route::get('WebProcuraduria', 'IndexWebController@Procuraduria');
Route::get('WebResponsabilidadSocial', 'IndexWebController@ResponsabilidadSocial');
Route::get('WebSecretariaGeneral', 'IndexWebController@SecretariaGeneral');
Route::get('WebServiciosAcademicos', 'IndexWebController@ServiciosAcademicos');
Route::get('WebTecnologiasInformacion', 'IndexWebController@TecnologiasInformacion');
Route::get('WebControlInstitucional', 'IndexWebController@ControlInstitucional');
Route::get('WebRectorado', 'IndexWebController@Rectorado');
Route::get('WebVicerrectoradoAcademico', 'IndexWebController@VicerrectoradoAcademico');
Route::get('WebVicerrectoradoInv', 'IndexWebController@VicerrectoradoInv');


// AMBIENTES
Route::get('WebAuditorio', 'IndexWebController@Auditorio');
Route::get('WebBiblioteca', 'IndexWebController@Biblioteca');
Route::get('WebComedor', 'IndexWebController@Comedor');

// SERVICIOS
Route::get('WebBecas', 'IndexWebController@Becas');
Route::get('WebCentroMedico', 'IndexWebController@CentroMedico');
Route::get('WebConvocatoria', 'IndexWebController@Convocatorias');

//Otros
Route::get('WebGaleria', 'IndexWebController@Galeria');
Route::get('WebGimnasio', 'IndexWebController@Gimnasio');
Route::get('WebHimno', 'IndexWebController@Himno');
Route::get('WebHistoria', 'IndexWebController@Historia');
Route::get('WebInstrumentosGestion', 'IndexWebController@InstrumentosGestion');
Route::get('WebMisionVision', 'IndexWebController@MisionVision');
Route::get('WebNoticias', 'IndexWebController@Noticias');
Route::get('WebOrganigrama', 'IndexWebController@Organigrama');
Route::get('WebPagosVirtuales', 'IndexWebController@PagosVirtuales');
Route::get('WebPilares', 'IndexWebController@Pilares');
Route::get('WebPoliticas', 'IndexWebController@Politicas');
Route::get('WebServicios', 'IndexWebController@Servicios');
Route::get('verNoticia/{idN}', 'IndexWebController@verNoticia');






// Route::get('/', function () {
//     //return view('welcome');
//     return redirect('login');
// });



Route::group(['middleware' => 'auth'], function () {

    Route::get('send', 'mailController@send');
    Route::get('sendSMS', 'SmsController@sendSms');

    Route::get('usuarios', 'UserController@index1');
    Route::resource('usuario', 'UserController');
    Route::get('usuario/altabaja/{id}/{var}', 'UserController@altabaja');
    Route::get('usuario/verpersona/{dni}', 'UserController@verpersona');

    Route::get('banners', 'BannerController@index1');
    Route::resource('banner', 'BannerController');
    Route::get('banner/altabaja/{id}/{var}', 'BannerController@altabaja');

    Route::get('agendarectorals', 'AgendaRectoralController@index1');
    Route::resource('agendarectoral', 'AgendaRectoralController');
    Route::get('agendarectoral/altabaja/{id}/{var}', 'AgendaRectoralController@altabaja');

    Route::get('noticias', 'NoticiaController@index1');
    Route::resource('noticia', 'NoticiaController');
    Route::get('noticia/altabaja/{id}/{var}', 'NoticiaController@altabaja');

    Route::get('videoyoutubes', 'VideoYoutubeController@index1');
    Route::resource('videoyoutube', 'VideoYoutubeController');
    Route::get('videoyoutube/altabaja/{id}/{var}', 'VideoYoutubeController@altabaja');

    Route::get('videofbs', 'VideoFbController@index1');
    Route::resource('videofb', 'VideoFbController');
    Route::get('videofb/altabaja/{id}/{var}', 'VideoFbController@altabaja');

    Route::get('instrumentos', 'InstrumentoController@index1');
    Route::resource('instrumento', 'InstrumentoController');
    Route::get('instrumento/altabaja/{id}/{var}', 'InstrumentoController@altabaja');

    Route::get('convocatorias', 'ConvocatoriaController@index1');
    Route::resource('convocatoria', 'ConvocatoriaController');
    Route::get('convocatoria/altabaja/{id}/{var}', 'ConvocatoriaController@altabaja');

    Route::get('galerias', 'GaleriaController@index1');
    Route::resource('galeria', 'GaleriaController');
    Route::get('galeria/altabaja/{id}/{var}', 'GaleriaController@altabaja');

    Route::get('calendarios', 'CalendarioController@index1');
    Route::resource('calendario', 'CalendarioController');
    Route::get('calendario/altabaja/{id}/{var}', 'CalendarioController@altabaja');

    Route::get('eventos', 'EventoController@index1');
    Route::resource('evento', 'EventoController');
    Route::get('evento/altabaja/{id}/{var}', 'EventoController@altabaja');

    Route::resource('mail', 'MailController');
    /* --------------------------------------------------- YURY --------------------------------------*/
    Route::get('departamentos', 'DepartamentoAcademicosController@index1');
    Route::resource('departamento', 'DepartamentoAcademicosController');
    Route::get('departamento/altabaja/{id}/{var}', 'DepartamentoAcademicosController@altabaja');

    Route::get('facultades', 'FacultadesController@index1');
    Route::resource('facultad', 'FacultadesController');
    Route::get('facultad/altabaja/{id}/{var}', 'FacultadesController@altabaja');
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

});
