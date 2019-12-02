<!-- This one in here is responsive menu for tablet and mobiles -->
<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">
<div class="responsive-navigation visible-sm visible-xs">
    <a href="#" class="menu-toggle-btn">
        <i class="fa fa-bars"></i>
    </a>
    <div class="responsive_menu">
        <ul class="main_menu">
            <li><a href="index.html">Inicio</a></li>
            <li><a href="#">Nosotros</a>
                <ul>
                    <li><a href="events-grid.html">Nuestra Facultad</a>
                        <ul>
                            <li><a href="#">Misión y Visión</a></li>
                            <li><a href="#">Historia</a></li>
                            <li><a href="#">Filosofia Institucional</a></li>
                        </ul>
                    </li>
                    <li><a href="events-list.html">Autoridades</a>
                        <ul>
                            <li><a href="#">consejo de Facultad</a></li>
                            <li><a href="#">Decano</a></li>
                            <li><a href="#">Departamento Academicos</a>
                                <ul>
                                    <li><a href="#">Educación</a></li>
                                    <li><a href="#">Ciencias Sociales y de la Comunicación</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dirección de Escuelas Profesionales</a>
                                <ul>
                                    <li><a href="#">Dirección de la escuela de Educación</a></li>
                                    <li><a href="#">Dirección de la escuela de ciencias de Comunicación</a></li>
                                    <li><a href="#">Dirección de la escuela de Arqueologia</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="#">Carreras Profesionales</a>
                <ul>
                    <li><a href="courses.html">Course List</a></li>
                    <li><a href="course-single.html">Course Single</a></li>
                </ul>
            </li>
            <li><a href="#">Investigación de la FCSEC</a>
                <ul>
                    <li><a href="revista">Revista Academica de la FCSEC</a></li>
                    <li><a href="http://repositorio.unasam.edu.pe/">Repositorio UNASAM</a></li>
                    <li><a href="biblioteca">Biblioteca de la FCSEC</a></li>
                    <li><a href="blog-disqus.html">Investigación de la FCSEC</a>
                        <ul>
                            <li><a href="#">Docentes Investigadores</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li><a href="">RSU</a>
                <ul>
                    <li><a href="archives.html">Proyectos de Responsabilidad Social</a></li>
                    <li><a href="shortcodes.html">Modelo de RSU</a></li>
                    <li><a href="gallery.html">Mapa de Proceso de RSU</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contactenos</a></li>
        </ul> <!-- /.main_menu -->
        <ul class="social_icons">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
        </ul> <!-- /.social_icons -->
    </div> <!-- /.responsive_menu -->
</div> <!-- /responsive_navigation -->

<header class="site-header">
    <div class="container">
        <div class="row" style="padding-top: 0px;padding-bottom: 0px">
            <div class="col-md-4 header-left" id="header-left">
                <p><i class="fa fa-phone"></i>043-640020 - Anexo 1402</p>
                <p><i class="fa fa-envelope"></i> <a href="mailto:email@universe.com">email@universe.com</a></p>
                <p>
                    <a href="https://www.facebook.com/fcsec.edu.pe/ " data-toggle="tooltip" title="Facebook"><i
                            class="fa fa-facebook"></i></a>
                    <a href="#" data-toggle="tooltip" title="Twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" data-toggle="tooltip" title="Google+"><i class="fa fa-google-plus"></i></a>

                </p>
            </div> <!-- /.header-left -->
            @foreach ($logos as $logo)
            <div class="col-md-4" id="logo">
                <div class="logo" style="text-align: center">
                    <a href="index.html" title="Universe" rel="home">
                        <img src="{{ asset('/img/descripcionFacultades/'.$logo->imagen)}}"
                            alt="{{ asset('/img/descripcionFacultades/'.$logo->imagen)}}" style="max-height: 100px;">
                    </a>
                </div> <!-- /.logo -->
            </div> <!-- /.col-md-4 -->
            @endforeach
            <div class="col-md-4 header-right" id="header-right">
                <ul class="small-links">
                    <li><a href="#">Eventos</a></li>
                    <li><a href="https://www.unasam.edu.pe">Visita UNASAM</a></li>
                    <li><a href="home">Acceso</a></li>
                </ul>
                <div>
                    <a href="https://www.unasam.edu.pe"><img src="images/logolicenciada.png" alt="UNASAM"
                            style="width:58%"></a>
                </div>
            </div> <!-- /.header-right -->
        </div>
    </div> <!-- /.container -->
    <div class="nav-bar-main" role="navigation" style="text-transform: uppercase;">
        <div class="container">
            <nav class="main-navigation clearfix visible-md visible-lg" role="navigation">
                <ul class="main-menu sf-menu">
                    <li class="active"><a href="/">Inicio</a></li>
                    <li><a href="#">Nosotros</a>
                        <ul class="sub-menu">
                            <li><a href="events-grid.html">Nuestra Facultad</a>
                                <ul class="sub-menu">
                                    <li><a href="misvis">Misión y Visión</a></li>
                                    <li><a href="historia">Historia</a></li>
                                    <li><a href="filosofia">Filosofia Institucional</a></li>
                                </ul>
                            </li>
                            <li><a href="events-list.html">Autoridades</a>
                                <ul class="sub-menu">
                                    <li><a href="decano">Decano</a></li>
                                    <li><a href="consejo">consejo de Facultad</a></li>
                                    <li><a href="departacademico">Departamentos Academicos</a></li>
                                </ul>
                            </li>
                            <li><a href="organigrama">Organigrama</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Carreras Profesionales</a>
                        <ul class="sub-menu">
                            @foreach ($escuelas as $escuela)
                            <li><a href="{{$escuela->descripcion}}">{{$escuela->nombre}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="#">Repositorio de la Facultad</a>
                        <ul class="sub-menu">
                            <li><a href="revista">Revista Académica E Investigaciones </a></li>
                            <li><a href="http://repositorio.unasam.edu.pe/" target="blank">Repositorio UNASAM</a></li>
                            <li><a href="biblioteca">Biblioteca Virtual</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Docentes</a>
                        <ul class="sub-menu">
                            <li><a href="docentes">Plana Docente</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Alumnos</a>
                        <ul class="sub-menu">
                            <li><a href="comestudiantil">Comisiones Estudiantiles</a></li>
                        </ul>
                    </li>
                    <li><a href="contacto">Contactenos</a></li>
                </ul> <!-- /.main-menu -->
            </nav> <!-- /.main-navigation -->
        </div> <!-- /.container -->
    </div> <!-- /.nav-bar-main -->
</header> <!-- /.site-header -->