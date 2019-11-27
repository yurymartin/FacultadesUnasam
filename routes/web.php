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

    Route::resource('mail', 'MailController');
    /* --------------------------------------------------- YURY --------------------------------------*/
    Route::get('departamentos', 'DepartamentoAcademicosController@index1');
    Route::resource('departamento', 'DepartamentoAcademicosController');
    Route::get('departamento/altabaja/{id}/{var}', 'DepartamentoAcademicosController@altabaja');

    Route::get('facultades', 'FacultadesController@index1');
    Route::resource('facultad', 'FacultadesController');
    Route::get('facultad/altabaja/{id}/{var}', 'FacultadesController@altabaja');

    Route::get('cargos', 'CargoController@index1');
    Route::resource('cargo', 'CargoController');
    Route::get('cargo/altabaja/{id}/{var}', 'CargoController@altabaja');

    /* --------------------------------------------------- PACHAS --------------------------------------*/
    
    Route::get('escuelas', 'EscuelaController@index1');
    Route::resource('escuela', 'EscuelaController');
    Route::get('escuela/altabaja/{id}/{var}', 'EscuelaController@altabaja');

    Route::get('bannersescuelas', 'BannerEscuelaController@index1');
    Route::resource('bannerescuela', 'BannerEscuelaController');
    Route::get('bannerescuela/altabaja/{id}/{var}', 'BannerEscuelaController@altabaja');


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

    Route::get('libros', 'libroescuelaController@index1');
    Route::resource('libroescuela', 'libroescuelaController');
    Route::get('libroescuela/altabaja/{id}/{var}', 'libroescuelaController@altabaja');

    Route::get('mallaescuelas', 'MallaEscuelaController@index1');
    Route::resource('mallaescuela', 'MallaEscuelaController');
    Route::get('mallaescuela/altabaja/{id}/{var}', 'MallaEscuelaController@altabaja');

    Route::get('comiteestudiantil', 'ComiteEstudiantilController@index1');
    Route::resource('estudiantil', 'ComiteEstudiantilController');
    Route::get('estudiantil/altabaja/{id}/{var}', 'ComiteEstudiantilController@altabaja');
});
