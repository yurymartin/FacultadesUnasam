<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/stilo.css')); ?>">
    <link href="<?php echo e(asset('web/css/raleway.css')); ?>" rel='stylesheet' type='text/css'>

    <meta name="author" content="UNASAM, Universidad Nacional Santiago Antunez de Mayolo">
    <meta name="description"
        content="Universidad Nacional Santiago Antunez de Mayolo ubicada en la ciudad de Huaraz Ancash-Perú ">
    <meta name="keywords"
        content="universidad, Huaraz, Ancash, Perú, UNASAM, Universidad Nacional, universidad Huaraz, Santiago Antúnez, Santiago Antúnez de Mayolo, Antúnez de Mayolo">


    <title>UNASAM</title>

    <link rel="icon" type="image/png" href="<?php echo e(asset('web/img/unasamicono.png')); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/scroll/css/perfect-scrollbar.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/stylesgalery.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/admin.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/font-awesome.min.css')); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/ionicons.min.css')); ?>">
    <!-- fullCalendar 2.2.5-->
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/fullcalendar.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/fullcalendar.print.css')); ?>" media="print">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/AdminLTE.min.css')); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo e(asset('web/fullcalendar/_all-skins.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/ejes/jquery-ui.min.css')); ?>">


    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/font-awesome/css/font-awesome.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/prettyPhoto.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/footer.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('web/css/contenido.css')); ?>">

    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0">
    </script>
    <script src="<?php echo e(asset('web/js/jquery.js')); ?>"></script>
    <script src="<?php echo e(asset('web/js/bootstrap.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/js/jquery.prettyPhoto.js')); ?>"></script>
    <script src="<?php echo e(asset('web/scroll/js/perfect-scrollbar.jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/ejes/jquery.svg.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/ejes/jquery.svgdom.min.js')); ?>"></script>
    <!--<script type="text/javascript" src="<?php echo e(asset('web/ejes/jquery-ui.min.js')); ?>"></script>-->
    <script type="text/javascript" src="<?php echo e(asset('web/js/jqFancyTransitions.1.8.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('web/fullcalendar/moment.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('web/fullcalendar/fullcalendar.min.js')); ?>"></script>
</head>

<body style="background: #f6f6f6;">
    <div style="width: 100%;background: rgba(255, 255, 255, 0.97);border: 1px solid rgba(144, 141, 141, 0.16);"
        class="fixed">
        <div style="background-color: #f6f6f6; height:35px;">
            <div class="container">
                <div class="row">
                    <div style="height:30px;">
                        <div id="icos" style="float:left;">
                            <a href="https://www.facebook.com/UNASAMOFICIAL/" target="_blank"
                                style="padding:5px; display:inline-block;"> <img
                                    src="<?php echo e(asset('img/imagen/icos/ico01p.png')); ?>" class="img-responsive" alt="..."
                                    style="height: 20px;" data-toggle="tooltip" data-placement="top"
                                    title="Facebook Oficial">
                            </a>
                            <a href="https://www.youtube.com/channel/UCHUxOdDI4zrMgghSpTDxttw" target="_blank"
                                style="padding:5px; display:inline-block;"> <img
                                    src="<?php echo e(asset('img/imagen/icos/ico02p.png')); ?>" class="img-responsive" alt="..."
                                    style="height: 20px;" data-toggle="tooltip" data-placement="top"
                                    title="Youtube Oficial">
                            </a>
                            <a href="https://www.google.com.pe/maps/place/Unasam/@-9.5161573,-77.5257068,17z/data=!4m12!1m6!3m5!1s0x91a90d038b59076d:0x92819ea87f16be34!2sUNASAM+Facultad+de+Derecho!8m2!3d-9.5363618!4d-77.5234601!3m4!1s0x0000000000000000:0xf366faa38220b74b!8m2!3d-9.5176121!4d-77.5245802"
                                target="_blank" style="padding:5px; display:inline-block;" data-toggle="tooltip"
                                data-placement="top" title="Ubicación"> <img
                                    src="<?php echo e(asset('img/imagen/icos/ico03p.png')); ?>" class="img-responsive" alt="..."
                                    style="height: 20px;">
                            </a>
                            <a href="https://login.microsoftonline.com/common/oauth2/authorize?client_id=4345a7b9-9a63-4910-a426-35363201d503&amp;response_mode=form_post&amp;response_type=code+id_token&amp;scope=openid+profile&amp;state=OpenIdConnect.AuthenticationProperties%3dWDm-fp2bkrKUM07N6-0rNiv7qAfDexIvl4fCKgy9oW_uLqfRgdiDNM-a0snpG3aawMWKRxB-w7BTmqScmiYVb9h4_-hBcOYrDCC9Y37kQ060D7347QCddXqh23sLIHXd&amp;nonce=636522267011711837.YWMzY2Q0NDItODAxMi00NjJjLWJhYjEtZjQ1ZmVhYzU1YmI4ZDVjYjcxYmMtMDRkYS00ZjYwLWJjMjAtMjRkNmIwNGFiZmJh&amp;redirect_uri=https%3a%2f%2fwww.office.com%2f&amp;ui_locales=es-ES&amp;mkt=es-ES&amp;client-request-id=a55211ac-31da-4c79-8b14-ba31b726271a"
                                target="_blank" style="padding:5px; display:inline-block;" data-toggle="tooltip"
                                data-placement="top" title="Correo Electrónico Institucional"> <img
                                    src="<?php echo e(asset('img/imagen/icos/ico05p.png')); ?>" class="img-responsive" alt="..."
                                    style="height: 20px;">
                            </a>
                            <a href="http://ogtise.unasam.edu.pe/verDirectorio" target="_blank"
                                style="padding:5px; display:inline-block;" data-toggle="tooltip" data-placement="top"
                                title="Directorio de Anexos Oficial"> <img src="<?php echo e(asset('img/imagen/icos/ico06p.png')); ?>"
                                    class="img-responsive" alt="..." style="height: 20px;">
                            </a>
                        </div>

                        <div
                            style="font-weight: bold; display:inline-block; float:left; padding-top: 8px; padding-left: 10px; color: #56545d;">
                            N° Telf: 043-640020 </div>

                        <div style="float:right;" id="botonesArriva">


                            <a href="<?php echo e(URL::to('WebPagosVirtuales')); ?>"><button type="button" class="btn btn-info"
                                    style="font-size:13px; padding: 2px 5px 2px 5px; margin-top: 5px; "><i
                                        class="fa fa-money" aria-hidden="true"></i> Pagos Virtuales</button></a>

                            <a id="btncargarWifi" type="button" class="btn btn-info"
                                style="font-size:13px;padding: 2px 5px 2px 5px; margin-top: 5px; "><i class="fa fa-wifi"
                                    aria-hidden="true"></i> Registro Wifi</a>

                            <a href="http://campus.unasam.edu.pe/login/index.php" target="_blank"><button type="button"
                                    class="btn btn-info"
                                    style="font-size:13px;padding: 2px 5px 2px 5px; margin-top: 5px; "><i
                                        class="fa fa-university" aria-hidden="true"></i> Campus Virtual</button></a>

                            <a href="<?php echo e(URL::to('login')); ?>" target="_blank"><button type="button" class="btn btn-info"
                                    style="font-size:13px;padding: 2px 5px 2px 5px; margin-top: 5px; "><span
                                        class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                    Acceso</button></a>

                            <div class="btn btn-default"
                                style="    margin-left: 10px;background-color: white;font-weight: bold; display:inline-block; float:right; padding: 0px; color: #56545d;">
                                <a href="http://www.unasam.edu.pe/web-backup/portal.php" target="_blank"><img
                                        src="<?php echo e(asset('img/imagen/trans.png')); ?>" class="img img-responsive"
                                        style="height: 30px;"></a>
                            </div>
                        </div>

                        <audio style="right:0%; z-index: 99999999; position: fixed; width: 10%;top: 5%;" controls="" autoplay="on" preload="none" src="http://181.176.163.39:6970/radionet.ogg"></audio>


                    </div>
                </div>
            </div>
        </div>

        <center>
            <div class="container">
                <div class="row">

                    <div class="menufinal">

                        <div class="social">
                            <ul>
                                <li><a href="https://www.facebook.com/UNASAMOFICIAL/" target="_blank"
                                        style="background: #3b5998;"><span style="    line-height: 1.42857143;"
                                            class="fa fa-facebook"></span></a></li>
                                <li><a href="https://twitter.com/Unasam_Oficial" target="_blank"
                                        style="    background: #00abf0;"><span style="    line-height: 1.42857143;"
                                            class="fa fa-twitter"></span></a></li>
                                <li><a href="https://plus.google.com/u/0/+UnasamOficial" target="_blank"
                                        style="background: #666666;"><span style="    line-height: 1.42857143;"
                                            class="fa fa-google"></span></a></li>
                                <li><a href="https://www.youtube.com/channel/UCHUxOdDI4zrMgghSpTDxttw" target="_blank"
                                        style="background: #ae181f;"><span style="    line-height: 1.42857143;"
                                            class="fa fa-youtube"></span></a>
                                </li>
                            </ul>
                        </div>


                        <div class="navbar navbar-default navbar-static-top" role="navigation" id="idmenu">
                            <div class="container" style="max-width:100%">
                                <div class="row">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" id="btnnav"
                                            s="">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                        <a href="<?php echo e(URL::to('/')); ?>">
                                            <img class="img-responsive"
                                                style="max-height: 75px; padding-bottom: 5px; padding-top: 5px;"
                                                src="<?php echo e(asset('img/imagen/logofinal.jpg')); ?>">
                                        </a>
                                    </div>
                                    <div class="collapse navbar-collapse" id="menu" style="margin-top: 0em;">
                                        <ul class="nav navbar-nav " id="lista">
                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;">
                                                <a href="javascript:void(0);" class="dropdown-toggle linke "
                                                    data-toggle="dropdown" id="menuPrincipal">NOSOTROS
                                                    <br><label
                                                        style="font-size: 12px; font-weight: normal; color: #adadad;">¿Quiénes
                                                        Somos?</label><br>
                                                </a>
                                                <ul class="dropdown-menu" style="background: #084B8A;">
                                                    <li><a href="<?php echo e(URL::to('WebMisionVision')); ?>" class="linke">Misión
                                                            y Visión</a></li>


                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Plan de Gobierno Rector</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebPilares')); ?>">Pilares
                                                                    Fundamentales</a></li>
                                                            <li><a class="linke" href="<?php echo e(URL::to('WebEjes')); ?>">Ejes
                                                                    Estratégicos
                                                                    de
                                                                    Gestión</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebPoliticas')); ?>">Políticas
                                                                    Institucionales de Gestión</a></li>
                                                        </ul>
                                                    </li>

                                                    <li><a href="<?php echo e(URL::to('WebOrganigrama')); ?>"
                                                            class="linke">Organigrama
                                                            Institucional</a></li>
                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Órganos de Gobierno</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebRectorado')); ?>">Rector</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebVicerrectoradoAcademico')); ?>">Vicerrector
                                                                    Académico</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebVicerrectoradoInv')); ?>">Vicerrector
                                                                    de Investigación</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebAsambleaUniversitaria')); ?>">Asamblea
                                                                    Universitaria</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebConsejoUniversitario')); ?>">Consejo
                                                                    Universitario</a></li>
                                                        </ul>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Órganos</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebControlInstitucional')); ?>">Órgano
                                                                    de
                                                                    Control
                                                                    Institucional</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebProcuraduria')); ?>">Procuraduría
                                                                    Universitaria</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebSecretariaGeneral')); ?>">Secretaria
                                                                    General</a></li>

                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Direcciones</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDirGeneralAdministracion')); ?>">Dirección
                                                                    General
                                                                    de Administración</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDirAcadEstGenerales')); ?>">Dirección
                                                                    Académica de Estudios Generales</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDirInvestigacion')); ?>">Dirección
                                                                    del Instituto de Investigación</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDirCentrosInvestigacion')); ?>">Dirección
                                                                    General
                                                                    de Centros de Investigación y
                                                                    Experimentación</a>
                                                            </li>
                                                            <li><a class="linke" href="http://dgadcb.unasam.edu.pe/"
                                                                    target="_blank">Dirección de Gestión Ambiental,
                                                                    Defensa Civil y Bioseguridad</a></li>
                                                        </ul>
                                                    </li>

                                                    <li>
                                                        <a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Oficinas Generales</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebPlanificacionPresupuesto')); ?>">Planificación
                                                                    y
                                                                    Presupuesto</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebAsesoriaJuridica')); ?>">Asesoría
                                                                    Jurídica</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebImagenInstitucional')); ?>">Imagen
                                                                    Institucional</a></li>
                                                            <li><a class="linke" href="http://ogtise.unasam.edu.pe/"
                                                                    target="_blank">Tecnologías
                                                                    de
                                                                    Información, Sistemas y Estadística</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDesarrolloFisico')); ?>">Desarrollo
                                                                    Físico</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebResponsabilidadSocial')); ?>">Responsabilidad
                                                                    Social Universitaria</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebCalidadUniversitaria')); ?>">Calidad
                                                                    Universitaria</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebOficinaAdmision')); ?>">Admisión</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebOficGeneralEstudios')); ?>">De
                                                                    Estudios</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebServiciosAcademicos')); ?>">Servicios
                                                                    Académicos y Publicaciones</a></li>
                                                        </ul>
                                                    </li>

                                                    <li><a href="<?php echo e(URL::to('WebHistoria')); ?>" class="linke">Nuestra
                                                            Historia</a>
                                                    </li>
                                                    <li><a href="<?php echo e(URL::to('WebHimno')); ?>" class="linke">Himno
                                                            Institucional</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;">
                                                <a href="javascript:void(0);" class="dropdown-toggle linke"
                                                    data-toggle="dropdown" id="menuPrincipal1">PREGRADO
                                                    <br><label
                                                        style="    font-size: 12px; font-weight: normal; color: #adadad;">Facultades</label><br></a>

                                                <ul class="dropdown-menu" style="background: #084B8A;">



                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ciencias del
                                                            Ambiente</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngAmbiental')); ?>">Ingeniería
                                                                    Ambiental</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngSanitaria')); ?>">Ingeniería
                                                                    Sanitaria</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ciencias</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngSistemas')); ?>">Ingeniería
                                                                    de
                                                                    Sistemas e Informática</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebEstadistica')); ?>">Estadística
                                                                    e
                                                                    Informática</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebMatematica')); ?>">Matemática</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ciencias Médicas</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebEnfermeria')); ?>">Enfermería</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebObstetricia')); ?>">obstetricia</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Economía y
                                                            Contabilidad</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebEconomia')); ?>">Economía</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebContabilidad')); ?>">Contabilidad</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Administración y
                                                            Turismo</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL('WebAdministracion')); ?>">Administración</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebTurismo')); ?>">Turismo</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ciencias Agrarias</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngAgricola')); ?>">Ingeniería
                                                                    Agrícola</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngAgronomia')); ?>">Agronomía</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ingeniería Civil</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngCivil')); ?>">Ingeniería
                                                                    Civil</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebArquitectura')); ?>">Arquitectura
                                                                    y
                                                                    Urbanismo</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ingeniería de Minas,
                                                            Geología y
                                                            Metalurgia</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngMinas')); ?>">Ingeniería de
                                                                    Minas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Derecho y Ciencias
                                                            Politicas</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebDerecho')); ?>">Derecho y
                                                                    Ciencias
                                                                    Políticas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ingeniería de
                                                            Industrias
                                                            Alimentarias</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke" href="http://fiia.unasam.edu.pe/"
                                                                    target="_blank">Portal
                                                                    Institucional</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngAlimentaria')); ?>">Ingeniería
                                                                    de
                                                                    Industrias Alimentarias</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngIndustrial')); ?>">Ingeniería
                                                                    Industrial</a></li>
                                                        </ul>
                                                    </li>
                                                    <li><a href="javascript:void(0);"
                                                            class="dropdown-toggle estilos linke"
                                                            data-toggle="dropdown">Facultad de Ciencias Sociales,
                                                            Educación y de la
                                                            Comunicación</a>
                                                        <ul class="dropdown-menu"
                                                            style="background: #084B8A; color: #D8D8D8;">
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebComunicacion')); ?>">Ciencias de
                                                                    la
                                                                    Comunicación</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebArqueologia')); ?>">Arqueología</a>
                                                            </li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebMatematicaInformatica')); ?>">Matemática
                                                                    e
                                                                    Informática</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebLiteratura')); ?>">Comunicación
                                                                    Lingüística y Literatura</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebEducacion')); ?>">Primaria y
                                                                    Educación Bilingüe Intercultural</a></li>
                                                            <li><a class="linke"
                                                                    href="<?php echo e(URL::to('WebIngles')); ?>">Lengua
                                                                    Extranjera:
                                                                    Inglés</a></li>
                                                        </ul>
                                                    </li>

                                                </ul>
                                            </li>
                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;"><a
                                                    target="_blank" href="http://investiga.unasam.edu.pe/" class="linke"
                                                    id="menuPrincipal2">INVESTIGACIÓN
                                                    <br><label
                                                        style="font-size: 12px; font-weight: normal; color: #adadad;">Proyectos</label><br></a>
                                            </li>
                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;"
                                                class=""><a class="dropdown-toggle estilos linke" data-toggle="dropdown"
                                                    id="menuPrincipal3">RESPONSABILIDAD
                                                    <br><label
                                                        style="font-size: 12px; font-weight: normal; color: #adadad;">Social</label><br></a>

                                                <ul class="dropdown-menu" style="background: #084B8A; color: #D8D8D8;">
                                                    <li><a target="_blank" href="http://rsu.unasam.edu.pe"
                                                            class="linke">Portal de Responsabilidad Social
                                                            Universitaria</a></li>
                                                    <li><a target="_blank" href="http://unasam.trabajando.pe/"
                                                            class="linke">Bolsa de Trabajo</a></li>

                                                </ul>


                                            </li>

                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;"><a
                                                    href="javascript:void(0);" class="dropdown-toggle linke"
                                                    data-toggle="dropdown" id="menuPrincipal4">ADMISIÓN
                                                    <br><label
                                                        style="    font-size: 12px; font-weight: normal; color: #adadad;">Prestaciones</label><br></a>
                                                <ul class="dropdown-menu" style="background: #084B8A;">
                                                    <li><a class="linke" href="http://www.admisionunasam.com/"
                                                            target="_blank">Admisión Pregrado</a></li>
                                                    <li><a class="linke" href="http://postgrado.unasam.edu.pe"
                                                            target="_blank">Admisión Posgrado</a></li>
                                                </ul>
                                            </li>


                                            <li style="border-right: 1px solid  #ffffff;border-left:  #ffffff;"
                                                class=""><a href="javascript:void(0);" class="dropdown-toggle linke"
                                                    data-toggle="dropdown" id="menuPrincipal5">ADMINISTRACIÓN
                                                    <br><label
                                                        style="    font-size: 12px; font-weight: normal; color: #adadad;">Portales</label><br></a>
                                                <ul class="dropdown-menu" style="background: #084B8A;">
                                                    <li><a class="linke" target="_blank"
                                                            href="http://www.unasam.edu.pe/web-backup/portal.php">Portal
                                                            de Transparencia</a></li>
                                                    <li><a class="linke" target="_blank"
                                                            href="http://transparenciainstitucional.unasam.edu.pe/">Transparencia
                                                            Institucional</a></li>
                                                    <li><a class="linke"
                                                            href="http://licenciamiento.unasam.edu.pe/">Licenciamiento</a>
                                                    </li>
                                                    <li><a class="linke"
                                                            href="<?php echo e(URL::to('WebInstrumentosGestion')); ?>">Instrumentos de
                                                            Gestión</a></li>
                                                    <li><a class="linke" target="_blank"
                                                            href="http://transparenciainstitucional.unasam.edu.pe/#sec_concursos">Procesos
                                                            de Selección</a></li>
                                                    <li><a class="linke"
                                                            href="<?php echo e(URL::to('WebConvocatoria')); ?>">Convocatorias
                                                            Contratación Docente</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </div>

    <div>
        <?php echo $__env->yieldContent('contenido'); ?>
    </div>

    <div id="mymodal" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Gestión del potencial humano y
                        bienestar de la Comunidad Universitaria</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM1">

                    <h4 style="color: #084B8A;">Desarrollo Estudiantil</h4>
                    <p>El centro de atención en la universidad es el ESTUDIANTE, y en torno a él está orientada la
                        misión Institucional. </p>

                    <ul style="padding-left: 20px;">
                        <li>Fortalecer las estrategias de bienestar universitario en atención a las dimensiones del
                            desarrollo humano. </li>
                        <li>Promover y Mejorar los niveles de estilo de vida saludable en la población estudiantil de la
                            UNASAM. </li>
                        <li>Mejorar el entorno físico, psíquico y social de la comunidad estudiantil. </li>
                        <li>Implementación de un Plan de Estímulos para el Talento Académico, Deportivo, Cultural y
                            Artístico.</li>
                        <li>Fortalecimiento de los grupos deportivos, sociales, artísticos y culturales.</li>
                        <li>Creación del Plan de Becas.</li>
                        <li>Implementación de la Unidad de Emprendimiento y financiación de una bolsa para el desarrollo
                            de proyectos productivos y empresariales universitarios.</li>
                        <li>Mejoramiento del servicio del comedor universitario garantizando su calidad para una
                            alimentación saludable. </li>
                    </ul>


                    <h4 style="color: #084B8A;">Desarrollo Docente</h4>
                    <p>El Docente es la columna vertebral en la formación del estudiante universitario.</p>

                    <ul style="padding-left: 20px;">
                        <li>Crear un ambiente de calidad para fortalecer el bienestar y desarrollo integral del docente.
                        </li>
                        <li>Creación de Programas de incentivos a la productividad y Fortalecimiento de los estímulos
                            para los docentes que participen activamente en los campos de docencia, investigación y
                            extensión institucional.</li>
                        <li>Formación pos gradual para Docentes y actualización disciplinar.</li>
                        <li>Gestión para la Ampliación de plazas docentes para ascensos. </li>
                        <li>Movilidad Nacional e Internacional de Docentes.</li>
                        <li>Mejoramiento del Sistema de Evaluación Docente por resultados.</li>
                        <li>Creación del Fondo de Solidaridad Docente.</li>
                    </ul>

                    <h4 style="color: #084B8A;">Desarrollo Administrativo</h4>
                    <p>Reconocer a los agentes administrativos del sistema universitario como soporte de la gestión.</p>

                    <ul style="padding-left: 20px;">
                        <li>Implementación del Plan de Bienestar Social y Estímulos para el desempeño administrativo.
                        </li>
                        <li>Cualificación (El conjunto de competencias profesionales con significación para el empleo,
                            adquiridas a través de un proceso formativo formal o no formal, objeto de evaluación y
                            acreditación, constituye una cualificación profesional) y actualización del personal
                            administrativo.</li>
                        <li>Creación de un Plan de incentivos orientado a la productividad del trabajador
                            administrativo.</li>
                        <li>Fomentar el trabajo en equipo, favorecer la comunicación y Promover espacios que constituyan
                            lugares de trabajo saludables. </li>
                        <li>Ubicación y reubicación laboral en concordancia a su especialización y meritocracia.</li>

                    </ul>




                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal2" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Gestión Académica Orientada a
                        la excelencia, Eficiencia y Calidad</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM2">

                    <h4 style="color: #084B8A;">Excelencia Académica</h4>

                    <ul style="padding-left: 20px;">
                        <li>Modernización de los programas académicos a nivel de pregrado y postgrado pertinentes al
                            desarrollo regional y nacional.</li>
                        <li>Fortalecimiento de la cultura de autoevaluación y mejoramiento continuo.</li>
                        <li>Fortalecimiento de competencias comunicativas, investigativas y de uso y apropiación de la
                            TIC´s para estudiantes, egresados y docentes.</li>
                        <li>Cualificación docente y actualización por especialidad.</li>
                        <li>Acreditación y Certificación de las carreras profesionales. </li>
                        <li>Alianzas estratégicas con otras instituciones de educación superior para el desarrollo
                            académico e investigativo.</li>
                    </ul>


                    <h4 style="color: #084B8A;">Eficiencia y Calidad</h4>
                    <p>El Docente es la columna vertebral en la formación del estudiante universitario.</p>

                    <ul style="padding-left: 20px;">
                        <li>Instalación de Wi-Fi en el Campus universitario.</li>
                        <li>Construcción y Dotación de nuevas aulas.</li>
                        <li>Construcción y Dotación de Aulas Inteligentes. </li>
                        <li>Dotación de Laboratorios Especializados.</li>
                        <li>Construcción y dotación del centro de recreación universitaria.</li>
                        <li>Fortalecimiento de la Plataforma Virtual y la Conectividad.</li>
                        <li>Dotación y Actualización Permanente de Ayudas y Medios Educativos.</li>
                        <li>Sistemas de información y modernización tecnológica.</li>
                        <li>Fortalecimiento y dotación de las oficinas de: Planificación, Registro y Control Académico,
                            Recursos Físicos y Bienestar Universitario.</li>
                        <li>Sistema de Gestión de Calidad y certificación institucional.</li>
                        <li>Optimización del SIGA- Sistema Integrado de Gestión Académica, facilitando la ejecución de
                            los procesos académicos y administrativos.</li>
                        <li>Equipamiento tecnológico para la docencia.- (computadores, servidores, mayor ancho de banda
                            Wi-Fi, hardware y software), así como a la implementación de soluciones informáticas para
                            apoyo de la docencia en aulas y en educación a distancia (plataformas virtuales, sistemas
                            para enseñanza a distancia).</li>
                        <li>Hacer del dominio del inglés un aliado estratégico para interactuar en un mundo globalizado.
                        </li>
                        <li>Equipamiento del centro de idiomas.</li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal3" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Modernización de la Gestión
                        Institucional Orientada a Resultados</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM3">


                    <ul style="padding-left: 20px;">
                        <li>Consecución de recursos para construir una unidad administrativa moderna: eficiente,
                            transparente, inclusiva, con una organización sistémica.</li>
                        <li>Lograr una gestión eficiente para que satisfaga las necesidades al menor costo posible
                            manteniendo un estándar mínimo de calidad.</li>
                        <li>Buscar un modelo de gestión orientada a resultados que impacte en el bienestar de la
                            comunidad universitaria y ciudadanía; y que sea permanentemente evaluada y monitoreada.</li>
                        <li>Generar un sistema administrativo en la institución que sea el soporte y fundamento de
                            nuestros propósitos, direccionado hacia la excelencia en el desarrollo de las acciones
                            académico y administrativas.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal4" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Fomento y Pertinencia de la
                        Investigación</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM4">


                    <ul style="padding-left: 20px;">
                        <li>Propender por una cultura investigativa mediante la formación permanente del talento humano.
                        </li>
                        <li>Generar condiciones objetivas para el desarrollo de la investigación.</li>
                        <li>Articular la investigación con la docencia y la extensión.</li>
                        <li>Promover la generación del conocimiento fortaleciendo las líneas de investigación
                            prioritarias para la Universidad focalizados en temas emergentes de interés social.</li>
                        <li>Establecer el desarrollo de buenas prácticas en investigación en relación a los principios
                            éticos en la investigación, observancia de guías y pautas internacionales.</li>
                        <li>Valorar y transferir los resultados de la investigación con pertinencia ética y social.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal5" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Gestión Transparente
                        Participativa y Rendición de Cuentas</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM5">


                    <p>La autonomía universitaria responsable debe efectuar una rendición social de cuentas periódicas.
                    </p>

                    <ul style="padding-left: 20px;">
                        <li>Mejoramiento de la herramienta informática para divulgar las acciones de transparencia según
                            Ley de Transparencia y Acceso a la Información Pública mediante el Portal: <strong>
                                UnasamTransparente.</strong> </li>
                        <br>
                        <li>Asegurar que la ciudadanía haga la respectiva contraloría social mediante el Portal:
                            UnasamTransparente en los siguientes aspectos:</li>
                    </ul>

                    <ul style="padding-left: 40px;">
                        <li style="list-style-type: circle;">Compras y Adquisiciones</li>
                        <li style="list-style-type: circle;">Información presupuestaria</li>
                        <li style="list-style-type: circle;">Tramites de la entidad</li>
                        <li style="list-style-type: circle;">Personal y Remuneraciones</li>
                        <li style="list-style-type: circle;">Transferencias</li>
                        <li style="list-style-type: circle;">Marco normativo</li>
                        <li style="list-style-type: circle;">Participación Ciudadana</li>
                        <li style="list-style-type: circle;">Actos Resolutivos</li>
                        <li style="list-style-type: circle;">Trámite documentario</li>

                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal6" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Responsabilidad Social
                        universitaria</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM6">


                    <ul style="padding-left: 20px;">
                        <li>Tomar conciencia del verdadero rol de la universidad, de su entorno, y de su papel hacia la
                            solución de problemas para el desarrollo de la sociedad.</li>
                        <li>Superación del enfoque egocéntrico de la universidad convirtiéndola en global e integradora.
                        </li>
                        <li>Definir su posición estratégica en la Sociedad sin faltar a la coherencia con sus funciones
                            académicas y de investigación.</li>
                        <li>Fortalecer y/o gestionar Alianzas Estratégicas: Institutos Universidades, Empresas-Sociedad
                            - Estado, para el fortalecimiento de la educación universitaria, la ciencia, la tecnología y
                            la innovación. </li>
                        <li>Lograr una Universidad responsable y honesta ofreciendo el mejor servicio posible al
                            ciudadano. </li>

                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal7" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Concertación Para una Gestión
                        Sostenible</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM7">


                    <ul style="padding-left: 20px;">
                        <li>Adoptar prácticas y desarrollo de aptitudes, capacidades y destrezas de comunicación fluida
                            para la búsqueda de acuerdos.</li>
                        <li>Buscar en el diálogo generar espacios de confianza a través de la comunicación y el
                            intercambio fluido.</li>
                        <li>Dinamizar la participación universitaria para el fortalecimiento y profundización de la
                            democracia.</li>
                        <li>Orientar el desarrollo de los lineamientos en una comunicación fluida mediante el diálogo y
                            consenso para la legitimación de la decisión en la gestión.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodal8" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Internacionalización de la
                        Universidad:<br> "La Unasam en el Mundo"</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM8">


                    <ul style="padding-left: 20px;">
                        <li>Desarrollo de un PLAN DE INTERNACIONALIZACIÓN DE LA UNIVERSIDAD. </li>
                        <li>Fomentar el número de profesores visitantes extranjeros para el intercambio académico y de
                            investigación.</li>
                        <li>Dinamizar los convenios suscritos por la Universidad.</li>
                        <li>Dinamizar la Movilidad académica y científica interinstitucional.</li>
                    </ul>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="mymodalP" class="modal fade" role="dialog" style="top: 15%;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Políticas Institucionales de
                        Gestión</h3>
                </div>
                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM8">

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Gestión del potencial humano y bienestar de la Comunidad
                                Universitaria</h4>
                            <p>
                                1.1. Impulsar el plan de desarrollo humano y responsabilidad social de los miembros de
                                la comunidad universitaria orientado al cumplimiento de los objetivos
                                institucionales.<br><br>
                                1.2. Desarrollar el programa para el reforzamiento de las capacidades personales y de
                                formación para el trabajo, orientado a las mejoras del desempeño.

                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Gestión Académica Orientada a la excelencia, Eficiencia y
                                Calidad</h4>
                            <p>
                                2.1. Promover un diseño de modelo educativo y planes de estudio por competencias que
                                garantice localidad educativa.<br><br>
                                2.2. Impulsar el proceso de licenciamiento, autoevaluación y acreditación universitaria
                                para la calidad.<br><br>
                                2.3. Implementar la red de fibra óptica de banda ancha para sistematizar la gestión
                                académica y digitalización de la gestión pedagógica con el establecimiento del uso de
                                las TICs.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Modernización de la Gestión Institucional Orientada a Resultados
                            </h4>
                            <p>
                                3.3. Institucionalizar la gestión universitaria en el marco del proceso de planificación
                                y del presupuesto por resultados<br><br>
                                3.2. Fortalecimiento operativo de los sistemas administrativos, mediante la puesta en
                                marcha de la plataforma tecnológica en el marco de las tecnologías de la información y
                                gobierno electrónico.

                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Fomento y Pertinencia de la Investigación</h4>
                            <p>
                                4.1. Generar condiciones y políticas internas para la realización de la Investigación,
                                que tenga impacto de desarrollo.<br><br>
                                4.2. Publicar los resultados de la investigación en revistas indexaaas, publicaciones,
                                participación del Investigador en congresos, y foros especializados.<br><br>
                                4.3. Establecer como rol principal de la investigación en la UNASAM, fomentar el
                                desarrollo de los pueblos en la diversas áreas del conocimiento.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Gestión Transparente, Participativa y Rendición de Cuentas</h4>
                            <p>
                                5.1. Permanente control sobre las buenas prácticas en el desempeño de la función pública
                                e implementación de la normatividad en el proceso de transparencia y acceso a la
                                información universitaria.<br><br>
                                5.2. Difusión de la información universitaria, a través de las herramientas informáticas
                                y de información directa mediante las audiencias públicas y otros mecanismos
                                democráticos participativos.
                            </p>


                        </div>
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Responsabilidad Social universitaria</h4>
                            <p>
                                6.1. Adecuación de la curricula universitaria a través de la agenda de responsabilidad
                                social universitaria.<br><br>
                                6.2. Desarrollo de la formación universitaria basada en valores y
                                emprendimiento.<br><br>
                                6.3. Propiciar alianzas estratégicas interinstitucionales para impulsar el desarrollo de
                                los pueblos.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Concertación Para una Gestión Sostenible</h4>
                            <p>
                                7.1. Establecimiento de un clima laboral adecuado para el desarrollo de las capacidades
                                personales y bienestar laboral.<br><br>
                                7.2. Establecer prácticas de dialogo, respeto, tolerancia para adoptar
                                decisiones.<br><br>
                                7.3. Desarrollar mecanismos de comunicación válidas para una concertación universitaria.

                            </p>
                        </div>
                        <div class="col-md-6">
                            <h4 style="color: #084B8A;">Internacionalización de la Universidad: "La Unasam en el Mundo"
                            </h4>

                            <p>
                                8.1. Facilitar la colaboración Internacional para la movilidad estudiantil y docente que
                                permitan el fortalecimiento de sus capacidades de acuerdo a las exigencias del mundo
                                global.<br><br>
                                8.2. Fortalecer capacidades comunicativas en distintos idiomas para garantizar el
                                desempeño de nuestros estudiantes en el exterior.<br><br>
                                8.3. Establecer vínculos con docentes e investigadores extranjeros para el intercambio
                                científico, académico e investigativo.

                            </p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>

        </div>
    </div>

    <div id="modalWifi" class="modal fade" role="dialog" style="top: 15%; display: none;">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3 class="modal-title" style="font-weight: bold;    color: #084B8A;">Seleccione Formulario de
                        Registro Para Obtener Acceso al servicio WI-FI UNASAM</h3>
                </div>

                <div class="modal-body" style="overflow-y: auto; max-height: 400px;text-align: justify;" id="cuerpoM1">
                    <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=CTvSxQGv7EqrdHpdHaAQhOw_V2P0FJZJunT56b8SXfRURDJVUlM3OVROQ0xMSEo0VFBaSjFQOVgzUy4u"
                        target="_blank">
                        <h4 style="color: #084B8A;">Formulario Para Estudiantes</h4>
                    </a>

                    <a href="https://forms.office.com/Pages/ResponsePage.aspx?id=CTvSxQGv7EqrdHpdHaAQhAfYqDnD38BCmgEy0mqRhchUMUtSOUg1QkE0S05MUVAxQzRLREtJQzUyQi4u"
                        target="_blank">
                        <h4 style="color: #084B8A;">Formulario Para Personal Administrativo</h4>
                    </a>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

        <footer>
            <div class="container-fluid" style="justify-content: center;">
                <section class="">
                    <div class="col-md-12">
                        <section class="row" style="padding-top: 10px;padding-bottom: 10px;     margin: 0 auto;">
                            <div class="col-md-1"><br>
                                <img src="<?php echo e(asset('img/imagen/logo2.png')); ?>" alt="" style="height: 100; float: right;">
                            </div>

                            <div class="col-md-2">
                                <h1>Contáctenos</h1>

                                <p>Av. Centenario Nro. 200</p>
                                <p>Telf: (+51) 043-640020 + N° de Anexo</p>
                                <p>RUC: 20166550239</p>
                            </div>
                            <div class="col-md-2">
                                <h1>Nosotros</h1>
                                <a href="WebMisionVision">Misión y Visión</a><br>
                                <a href="WebHimno">Himno Institucional</a><br>
                                <a href="WebOrganigrama">Organigrama Institucional</a><br>
                                <a href="http://ogtise.unasam.edu.pe/verDirectorio" target="_blank">Directorio
                                    Institucional</a><br>
                            </div>

                            <div class="col-md-2">
                                <h1>Plataformas Web</h1>
                                <a href="http://104.196.12.118/landing" target="_blank">SIGA UNASAM</a><br>
                                <a href="http://std.unasam.edu.pe/" target="_blank">Sistema de Trámite Documentario
                                    (STD)</a><br>
                                <a href="http://calidad-gestion.esy.es/" target="_blank">Ejes Estratégicos</a><br>
                                <a href="http://sisres.unasam.edu.pe/" target="_blank">Sistema de Actas y Resoluciones
                                    (SISRES)</a><br>
                                <!--	<a href="http://gespersonal.unasam.edu.pe/system/" target="_blank">Gestión de Recursos Humanos</a><br>-->
                                <a href="http://visitas.unasam.edu.pe/" target="_blank">Sistema de Control de
                                    Visitas</a><br>
                                <a href="http://koha.unasam.edu.pe/" target="_blank">Acceso Koha - Sistema de Gestión de
                                    Bibliotecas</a>

                            </div>

                            <div class="col-md-2">
                                <h1>Plataformas Web</h1>
                                <a href="http://transparenciainstitucional.unasam.edu.pe/" target="_blank">UNASAM
                                    Transparente</a><br>
                                <a href="http://cid.unasam.edu.pe/login" target="_blank">Centro de Idiomas</a><br>
                                <a href="http://cpu.unasam.edu.pe/" target="_blank">Centro Pre Universitario</a><br>
                                <a href="http://repositorio.unasam.edu.pe/" target="_blank">Repositorio
                                    Institucional</a><br>
                                <a href="http://revistas.unasam.edu.pe/" target="_blank">Revistas
                                    Institucionales</a><br>
                                <a href="http://sisres.unasam.edu.pe/ResolucionFacultad/" target="_blank">Sistema de
                                    Actas y Resoluciones - Facultad</a><br>
                                <a href="http://campus.unasam.edu.pe/login/index.php" target="_blank">Campus Virtual
                                    (SVA)</a>
                            </div>

                            <div class="col-md-1">
                                <h1>Postgrago</h1>
                                <a href="http://postgrado.unasam.edu.pe/maestrias" target="_blank">Maestría</a><br>
                                <a href="http://postgrado.unasam.edu.pe/doctorados" target="_blank">Doctorado</a>

                            </div>

                            <div class="col-md-2">
                                <h1>Servicios</h1>
                                <a href="WebAuditorio">Auditorio</a><br>
                                <a href="WebCentroMedico">Centro Médico</a><br>
                                <a href="WebComedor">Comedor Universitario</a><br>
                                <a href="WebGimnasio">Gimnasio</a><br>
                            </div>
                        </section>

                        <div class="container-fluid">
                            <div class="logmin"
                                style="margin-right:auto;margin-left:auto; text-align: center;  justify-content: center;">

                                <p class="col-md-12 der">Copyright © 2019 Derechos Reservados por la Oficina General de
                                    Tecnologías de Información, Sistemas y Estadística</p>

                            </div>

                        </div>
                    </div>
                </section>
            </div>

        </footer>


        <!-- JavaScript -->
        <script>
            $(document).ready(function () {

        $(window).scroll(function() {
            if ($(this).scrollTop() > 200) {
                $('.go-top').fadeIn(200);
            } else {
                $('.go-top').fadeOut(200);
            }
        });
    
        $('.go-top').click(function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop: 0}, 300);
        })
    
        $("a[rel^='prettyPhoto']").prettyPhoto({
            social_tools: false
        });

        $('.navbar a.dropdown-toggle').on('click', function (e) {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").toggleClass('open');
    
            if (!$parent.parent().hasClass('nav')) {
                $el.next().css({
                    "top": $el[0].offsetTop,
                    "left": $parent.outerWidth() - 4
                });
            }
    
            $('.nav li.open').not($(this).parents("li")).removeClass("open");
    
            return false;
        });
    
    
        $("a .linke")
            .on("mouseenter", function () {
                $(this).css({
                    "color": "white"
                });
            })
            .on("mouseleave", function () {
                var styles = {
                    "color": "#D8D8D8"
                };
                $(this).css(styles);
            });
    
    
        $('.navbar a.dropdown-toggle').on("mouseenter", function () {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).parent("li").addClass('open');
            $(this).siblings("li").removeClass('open');
    
            if (!$parent.parent().hasClass('nav')) {
                $el.next().css({
                    "top": $el[0].offsetTop,
                    "left": $parent.outerWidth() - 4
                });
            }
    
            $('.nav li.open').not($(this).parents("li")).removeClass("open");
    
            return false;
        }).on("mouseleave", function () {
            var $el = $(this);
            var $parent = $(this).offsetParent(".dropdown-menu");
            $(this).not(parent("li")).removeClass('open');
    
            if (!$parent.parent().hasClass('nav')) {
                $el.next().css({
                    "top": $el[0].offsetTop,
                    "left": $parent.outerWidth() - 4
                });
                $(this).removeClass('open');
            }
    
            $('.nav li.open').not($(this).parents("li")).removeClass("open");
    
            return false;
        });
    
        $('li').on("mouseleave", function () {
            $(this).removeClass('open');
        });
    
        $('.navbar a.dropdown-toggle').on("mouseleave", function () {
            $('.nav li.open').not($(this).parents("li")).removeClass("open"); 
        });
    
        $('#home').on("mouseenter", function () {
            $('li').removeClass('open');
        });

        $("#btnnav").on("click", function () {
            $("#menu").toggle('slow');
        });

        $("#btnPoliticas").click(function() {
            $('#mymodalP').modal('show');
        });

        $("#btncargarWifi").click(function() {

        $('#modalWifi').modal('show');

        });

        $(".fc-button").click(function() {
            cargarEvt();
        });
        
    });

    
    function cargarEvt() {
        var mes = $(".fc-center > h2").html();
        var mesfinal = mes.replace(" ", "");

        var mesimp = mes.replace(" ", "-");
        $("#titulocalendar").html(mesimp + ":");

        $(".fechascalendar").hide();

        $("." + mesfinal).show();


    }
    
    window.inicializarMapa = function inicializarMapa(svgObj){

        jQuery('#_898218784').on('click', function(e){ 
            
            //alert("saludos eje1");
        $('#mymodal').modal('show');
            
        });

        jQuery('#_931338272').on('click', function(e){ 
            
            $('#mymodal2').modal('show');
            
        });

        jQuery('#_933281424').on('click', function(e){ 
            
            $('#mymodal3').modal('show');
            
        });

        jQuery('#_933507312').on('click', function(e){ 
            
            $('#mymodal4').modal('show');
            
        });

        jQuery('#_933273680').on('click', function(e){ 
            
            $('#mymodal5').modal('show');
            
        });

        jQuery('#_933270640').on('click', function(e){ 
            
            $('#mymodal6').modal('show');
            
        });

        jQuery('#_933261456').on('click', function(e){ 
            
            $('#mymodal7').modal('show');
            
        });

        jQuery('#_933265360').on('click', function(e){ 
            
            $('#mymodal8').modal('show');
            
        });
    };

    jQuery('#svgejes').svg({
        'loadURL': '<?php echo e(asset('web/ejes/ejes2.svg')); ?>',
        'onLoad': window.inicializarMapa
    }); 

    function verNoticia($idN) {
        $.get("verNoticia/" + $idN, function (response) {
            window.location.href = 'verNoticia/' + $idN;
        });
    }


        </script>

</body>

</html><?php /**PATH C:\Users\Yuri Martin\Desktop\webFacultades\resources\views/admin/layout/admin.blade.php ENDPATH**/ ?>