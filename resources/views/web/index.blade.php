@extends("web.layout.admin")

@section('contenido')


<div style="width: 100%;background: #F6F6F6;">
    <div class="container" id="maincontenido">
        <div class="row">

            <div class="container-fluid ban">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->

                    <!-- Wrapper for slides -->
                    <ol class="carousel-indicators" style="bottom: 1px;">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        @foreach ($banner as $bann )
                        <li data-target="#carousel-example-generic" data-slide-to="{{ $contador++}}" class=""></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">

                        @foreach ($bannerActivo as $bannActivo )
                        <div class="item active">
                            <img src="{{asset('img/banners/'. $bannActivo->ruta )}}" class="img-responsive banner"
                                alt="..." style=" width:100%;">
                            <div class="carousel-caption" style="padding-bottom: 5px;">
                                <h3>{{$bannActivo->tituloBanner}}</h3>
                                <p>{{$bannActivo->descrBanner}}</p>
                            </div>
                        </div>
                        @endforeach

                        @foreach ($banner as $bann )
                        <div class="item">
                            <img src="{{asset('img/banners/'. $bann->ruta )}}" class="img-responsive banner" alt="..."
                                style=" width:100%;">
                            <div class="carousel-caption" style="padding-bottom: 5px;">
                                <h3>{{$bann->tituloBanner}}</h3>
                                <p>{{$bann->descrBanner}}</p>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="espacio"></div>
            <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>

        </div>
    </div>
</div>

<div style="width: 100%;background: #F2F2F2;">
    <div class="container">
        <div class="row">
            <div class="container-fluid">
                <section id="noticia" class="row" style="background: #F2F2F2;">
                    <h1 class="col-md-12 titsec2 noticia" style="padding-bottom: 0px; ">Lo más reciente
                        <div style="float: right; color: rgb(8, 75, 138); font-family: &quot;Source Sans Pro&quot;, sans-serif; font-size: 22px; width: 265px; display: none;"
                            id="txtAfiche1">

                        </div>
                    </h1>
                    <div class="col-md-3" style="">
                        <center>
                            <div class="container-fluid ban">
                                <div id="myCarousel2" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        @foreach ($agendaRectoral as $agen )
                                        <a href="{{asset('img/agendarectorals/'. $agen->ruta )}}"
                                            rel="prettyPhoto[agenda]">
                                            <img src="{{asset('img/agendarectorals/'. $agen->ruta )}}"
                                                alt="Agenda Rectoral" class="img img-responsive shadow-lg"
                                                style="height:370px;">
                                        </a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </center>
                    </div>

                    @foreach ($noticia as $noti )
                    <div class="col-md-3 not" style="height: auto; padding-right:5px; padding-left:5px;">
                        <div class="col-md-12" style="padding-right:0px; padding-left:0px;">
                            <a href="{{asset('img/noticias/'. $noti->ruta )}}" rel="prettyPhoto[noticia-portada]"
                                title="{{$noti->tituloNoticia}}">
                                <img src="{{asset('img/noticias/'. $noti->ruta )}}"
                                    class="col-md-12 col-xs-12 img-resposible" alt="" style="z-index: 10;">
                            </a>
                            <div class="col-md-12">
                                <div class="noticias col-md-12" style="height:200px; overflow-y:auto;">
                                    <div>
                                        <div class="col-md-12" style="padding-right:0px; padding-left:0px;">
                                            <a onclick="verNoticia('{{$noti->id}}')" style="cursor: pointer;">
                                                <h2>{{$noti->tituloNoticia}}</h2>
                                            </a>
                                        </div>
                                        <div class="col-md-12 notdes"
                                            style="padding-left: 0px;    padding-right: 0px; padding-bottom: 0px;">
                                            <p><strong>{{$noti->fechaNoticia}}</strong></p>
                                        </div>
                                    </div>
                                    <center><a onclick="verNoticia('{{$noti->id}}')" style="cursor: pointer;">Leer más...</a><br><br>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                    <div class="col-md-3" style="">
                        <center>
                            <div class="container-fluid ban">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <!-- Indicators -->

                                    <!-- Wrapper for slides -->
                                    <div class="carousel-inner">

                                        @foreach ($eventoActivo as $evtA )
                                        <div class="item active" id="divcambiar1">
                                            <a href="{{asset('img/eventos/'. $evtA->rutaPDF )}}" target="_blank">
                                                <img src="{{asset('img/eventos/'. $evtA->rutaImg )}}"
                                                    alt="{{$evtA->tituloEvento}}" class="img-responsive"
                                                    style="height:370px;">
                                            </a>
                                            <div class="carousel-caption">
                                                <h3></h3>
                                                <p> </p>
                                            </div>
                                        </div>
                                        @endforeach

                                        @foreach ($evento as $evt )
                                        <div class="item" id="divcambiar{{++$contadore}}">
                                            <a href="{{asset('img/eventos/'. $evt->rutaPDF )}}" target="_blank">
                                                <img src="{{asset('img/eventos/'. $evt->rutaImg )}}"
                                                    alt="{{$evt->tituloEvento}}" class="img-responsive"
                                                    style="height:370px;">
                                            </a>
                                            <div class="carousel-caption">
                                                <h3> </h3>
                                                <p> </p>
                                            </div>
                                        </div>
                                        @endforeach

                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </center>
                    </div>

                    <br>

                    <div class="col-md-12 todo" style="    margin-bottom: 27px;">
                        <a class="vern" href="{{ URL::to('WebNoticias') }}">Ver Todos</a>
                    </div>

                    <div class="col-md-4" style="padding-left: 0px;padding-right: 0px;">
                        <div class="col-md-12">
                            <h3 style="font-weight: bold;color: #084B8A;">ONLINE</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="embed-responsive embed-responsive-4by3" id="videoFb"
                                style="height: 360px;">
                                @foreach ($videoFace as $videoF )
                                <?php echo $videoF->ruta ?>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4" style="    padding-left: 0px;    padding-right: 0px;">
                        <div class="col-md-12">
                            <h3 style="font-weight: bold;    color: #084B8A;">GALERÍA</h3>
                        </div>
                        <div class="col-md-12">
                            <center>
                                <div class="container-fluid ban">
                                    <div id="myGaleria" class="carousel slide" data-ride="carousel">
                                        <!-- Indicators -->

                                        <!-- Wrapper for slides -->
                                        <div class="carousel-inner">

                                            @foreach ($galeriaActivo as $galA )
                                            <div class="item active" id="divcambiar1">
                                                <a href="{{asset('img/galerias/'. $galA->ruta )}}"
                                                    rel="prettyPhoto[file]" title="{{$galA->tituloFoto}}">
                                                    <img src="{{asset('img/galerias/'. $galA->ruta )}}"
                                                        alt="{{$galA->tituloFoto}}" class="img-responsive"
                                                        style="height:300px;width: 390px;">
                                                </a>
                                                <div class="carousel-caption">
                                                    <h3></h3>
                                                    <p> </p>
                                                </div>
                                            </div>
                                            @endforeach

                                            @foreach ($galeria as $gal )
                                            <div class="item" id="divcambiar{{++$contadores}}">
                                                <a href="{{asset('img/galerias/'. $gal->ruta )}}"
                                                    rel="prettyPhoto[file]" title="{{$gal->tituloFoto}}">
                                                    <img src="{{asset('img/galerias/'. $gal->ruta )}}"
                                                        alt="{{$gal->tituloFoto}}" class="img-responsive"
                                                        style="height:300px;width: 390px;">
                                                </a>
                                                <div class="carousel-caption">
                                                    <h3> </h3>
                                                    <p> </p>
                                                </div>
                                            </div>
                                            @endforeach

                                            <a class="left carousel-control" href="#myGaleria" data-slide="prev">
                                                <span class="glyphicon glyphicon-chevron-left"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="right carousel-control" href="#myGaleria" data-slide="next">
                                                <span class="glyphicon glyphicon-chevron-right"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </center>
                        </div>
                    </div>

                    <div class="col-md-4" style="    padding-left: 0px;    padding-right: 0px;">
                        <div class="col-md-12">
                            <h3 style="font-weight: bold;    color: #084B8A;">VIDEO DESTACADO</h3>
                        </div>
                        <div class="col-md-12">
                            <div class="embed-responsive embed-responsive-4by3" id="videoYoutube"
                                style="min-height: 300px; min-width: auto; ">
                                @foreach ($videoYoutube as $videoY )
                                <?php echo $videoY->ruta ?>
                                @endforeach
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 espacio" style=""></div>
                </section>

            </div>

        </div>
    </div>
</div>

<div style="width: 100%;background: #ffffff;">
    <div class="container">
        <div class="row">

            <section id="submenu" class="row" style="background: #ffffff;">

                <!-- <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>-->
                <div class="col-md-12 espacio"></div>

                <ul class="nav nav-tabs nav-justified" style="padding-left:15px; padding-right:15px;">
                    <li class="sublinke active"><a href="#tab_a" data-toggle="tab" style="min-width: 140px;"
                            aria-expanded="false">Bienestar Social</a></li>
                    <li class="sublinke"><a href="#tab_b" data-toggle="tab" style="min-width: 170px;"
                            aria-expanded="false">Centros de Formación</a></li>
                    <li class="sublinke"><a href="#tab_g" data-toggle="tab" style="min-width: 190px;"
                            aria-expanded="false">Centros de Investigación</a></li>
                    <li class="sublinke"><a href="#tab_c" data-toggle="tab" aria-expanded="false">Postgrado</a></li>
                    <li class="sublinke"><a href="#tab_d" data-toggle="tab" aria-expanded="false">Plataformas</a></li>
                    <li class="sublinke" style="width: 240px;"><a href="#tab_e" data-toggle="tab"
                            aria-expanded="false">Publicaciones de Licenciamiento</a></li>
                    <li class="sublinke"><a href="#tab_f" data-toggle="tab" aria-expanded="true">Transparencia</a></li>

                    <li style="width:auto;"></li>
                </ul>
                <div class="sublinke2" style=""></div>
                <div class="tab-content" style="padding-left:15px; padding-right:15px;">

                    <div class="tab-pane fade in active" id="tab_a" style="padding-left: 15px; padding-right: 15px;">
                        <h3 style="font-weight: bold;color: #084B8A;">Servicios de la Universidad</h3>

                        <div class="col-md-4">
                            <center>
                                <div id="myCarousel3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">

                                        <div class="item" id="">
                                            <img src="{{asset('img/imagen/bienestar1.jpg')}}" alt="Biblioteca"
                                                class="img-responsive" style="height:300px;">
                                            <div class="carousel-caption">

                                                <h3> </h3>
                                                <p> </p>
                                            </div>
                                        </div>


                                        <div class="item active" id="">

                                            <img src="{{asset('img/imagen/comedor1.jpg')}}" alt="Comedor Unviersitario"
                                                class="img-responsive" style="height:300px;">

                                            <div class="carousel-caption">
                                                <h3></h3>
                                                <p> </p>
                                            </div>
                                        </div>

                                        <div class="item" id="">

                                            <img src="{{asset('img/imagen/gym1.jpg')}}" alt="Comedor Unviersitario"
                                                class="img-responsive" style="height:300px;">

                                            <div class="carousel-caption">
                                                <h3></h3>
                                                <p> </p>
                                            </div>
                                        </div>

                                        <div class="item" id="">

                                            <img src="{{asset('img/imagen/salud1.jpg')}}" alt="Comedor Unviersitario"
                                                class="img-responsive" style="height:300px;">

                                            <div class="carousel-caption">
                                                <h3></h3>
                                                <p> </p>
                                            </div>
                                        </div>




                                        <a class="left carousel-control" href="#myCarousel3" data-slide="prev">
                                            <span class="glyphicon glyphicon-chevron-left"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="right carousel-control" href="#myCarousel3" data-slide="next">
                                            <span class="glyphicon glyphicon-chevron-right"></span>
                                            <span class="sr-only">Next</span>
                                        </a>


                                    </div>

                                </div>








                            </center>
                        </div>

                        <div class="col-md-4" style="">

                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="WebAuditorio" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-university" aria-hidden="true"></i> Auditorio</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="http://koha.unasam.edu.pe/" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-book" aria-hidden="true"></i> Biblioteca Universitaria</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="WebCentroMedico" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-medkit" aria-hidden="true"></i> Centro Médico</a>
                            </div>

                        </div>

                        <div class="col-md-4" style="">

                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="WebComedor" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-beer" aria-hidden="true"></i> Comedor Universitario</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="WebGimnasio" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-users" aria-hidden="true"></i> Gimnasio</a>
                            </div>


                        </div>


                        <div class="col-md-4"></div>

                        <div class="col-md-4">
                            <div class="col-md-12" style="padding-top: 20px;padding-bottom: 20px;">
                                <a class="col-md-12 botonServicios" href="WebServicios" target="_blank"
                                    style="padding-top: 20px;">
                                    <i class="fa fa-slideshare" aria-hidden="true"></i> Ver Servicios</a>
                            </div>
                        </div>

                        <div class="col-md-4"></div>

                    </div>




                    <div class="tab-pane fade" id="tab_b" style="padding-left: 15px; padding-right: 15px;">

                        <div class="col-md-6">
                            <a href="http://cid.unasam.edu.pe/" target="_blank">
                                <div class="col-md-12">
                                    <section style="background: #eee;">
                                        <h2 class="subtitulo1" id="titulo1">Centro de Idiomas</h2>
                                    </section>
                                </div>

                                <div class="col-md-12">
                                    <img src="{{asset('img/imagen/cid.jpg')}}" class="img-responsive" alt="...">
                                </div>
                            </a> </div>

                        <div class="col-md-6">
                            <a href="http://cpu.unasam.edu.pe/" target="_blank">
                                <div class="col-md-12">
                                    <section style="background: #eee;">
                                        <h2 class="subtitulo1" id="titulo1">Centro Preuniversitario</h2>
                                    </section>
                                </div>

                                <div class="col-md-12">
                                    <img src="{{asset('img/imagen/cepre.jpg')}}" class="img-responsive" alt="...">
                                </div>
                            </a></div>

                    </div>

                    <div class="tab-pane fade" id="tab_g" style="padding-left: 15px; padding-right: 15px;">

                        <div class="col-md-3">
                            <a href="http://lca.unasam.edu.pe" target="_blank"><img
                                    src="{{asset('img/imagen/lca.jpg')}}" class="img-responsive" alt=""
                                    style="padding-top: 15px"></a>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="tab_c" style="padding-left: 15px; padding-right: 15px;">


                        <div class="col-md-8">
                            <div class="col-md-12" style="margin-top: 20px;">
                                <a href="http://postgrado.unasam.edu.pe/" target="_blank"> <img
                                        src="{{asset('img/imagen/postgrado.jpg')}}" class="img-responsive"
                                        alt="..."></a>
                            </div>

                        </div>

                        <div class="col-md-4">
                            <div class="col-md-12">
                                <a href="http://postgrado.unasam.edu.pe/" target="_blank">
                                    <h3 style="font-weight: bold;color: #084B8A;">Escuela de Postgrado</h3>
                                {{-- </a><a href="docs/POST INGR 2015-2016 POSTGRADO-MAESTRIA POSTGRADO.pdf" target="_blank">
                                    <h4>Ingresantes Maestría</h4>
                                </a><a href="docs/POST INGR 2015-2016 POSTGRADO-DOCTORADO.pdf" target="_blank">
                                    <h4>Ingresantes Doctorado</h4>
                                </a>
                                <a href="docs/egresadospostgrado2016.pdf" target="_blank">
                                    <h4>Egresados</h4>
                                </a> --}}
                                <a href="http://unasam.edu.pe/file/REGLAMENTO%20DE%20ADMSION%20DE%20POSTGRADO.pdf"
                                    target="_blank">
                                    <h4>Reglamento de Admisión</h4>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab_d" style="padding-left: 15px; padding-right: 15px;">

                        <div class="col-md-4">

                            <div class="col-md-12" style="padding-top: 40px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://sisres.unasam.edu.pe/" target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Sistema de Actas y Resoluciones (SISRES)</a>
                            </div>


                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://104.196.12.118/landing"
                                    target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    SIGA UNASAM Académico</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://std.unasam.edu.pe/" target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Sistema de Trámite Documentario (STD)</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://calidad-gestion.esy.es/login"
                                    target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Ejes Estratégicos</a>
                            </div>
                        </div>

                        <div class="col-md-4">


                            <div class="col-md-12" style="padding-top: 40px;padding-bottom: 10px;">
                                <a href="http://ogtise.unasam.edu.pe/" target="_blank">
                                    <center> <img src="{{asset('img/imagen/ogtose4.jpg')}}" class="img-responsive"
                                            id="ogtise" alt="...">
                                    </center>
                                </a></div>



                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://campus.unasam.edu.pe/" target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Campus Virtual Universitario (SVA)</a>
                            </div>


                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://visitas.unasam.edu.pe/"
                                    target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Sistema de Control de Visitas</a>
                            </div>



                        </div>

                        <div class="col-md-4">

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://koha.unasam.edu.pe/" target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Sistema de Gestión de Bibliotecas (KOHA)</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios"
                                    href="http://transparenciainstitucional.unasam.edu.pe/" target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    UNASAM Transparente</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://cid.unasam.edu.pe"
                                    target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Centro de Idiomas</a>
                            </div>

                            <div class="col-md-12" style="padding-top: 10px;padding-bottom: 10px;">
                                <a class="col-md-12 botonServicios" href="http://cpu.unasam.edu.pe/inicio/"
                                    target="_blank">
                                    <img src="{{asset('img/imagen/software.png')}}" class="img-responsive" alt="..."
                                        style="width: 25px; display:inline-block; margin-right: 5px; float: left;">
                                    Centro Pre Universitario</a>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="tab_e" style="padding-left: 15px; padding-right: 15px;">
                        <div class="col-md-12">
                            <center>
                                <a href="http://licenciamiento.unasam.edu.pe/">
                                    <h4 style="font-weight: bold;">Información Referida a Licenciamiento en Cumplimiento
                                        del Art. 11 de la Ley Universitaria: <br>"Transparencia de las Universidades"
                                    </h4>
                                </a></center>
                        </div>

                        <div class="col-md-6">
                            <ul>

                                <h4 style="font-weight: bold;color: #3c8dbc;">Indicadores Generales</h4>
                                <li><a href="WebMisionVision">Misión y Visión</a></li>
                                <li><a href="WebPoliticas">Políticas Institucionales de Gestión</a></li>
                                <li><a href="{{asset('img/file/plan de gobierno rector.pdf')}}">Plan de Gobierno
                                        Rector</a></li>

                                <li><a href="{{asset('img/file/MV1-PLAN-DE-GESTION-DE-LA-CALIDAD.pdf')}}"
                                        target="_blank">Plan de Gestión
                                        de la Calidad</a></li>

                                <li><a href="{{asset('img/file/RESEÑA HISTORICA Y LINEA DE TIEMPO_INSTRUMENTOS DE GESTION.pdf')}}"
                                        target="_blank">Reseña Histórica y Línea de Tiempo de los Instrumentos de
                                        Gestión</a></li>
                                <li><a href="{{asset('img/file/CARGOS DE RESPONSABILIDAD DIRECTIVA.pdf')}}"
                                        target="_blank">Cargos de
                                        Responsabilidad Directiva</a></li>
                                <li><a href="{{asset('img/file/Reseña Historica - linea de tiempo de los reglamentos academicos.pdf')}}"
                                        target="_blank">Reseña Histórica y Línea de Tiempo de los Reglamentos
                                        Académicos</a></li>
                                <li><a href="{{asset('img/file/RESEÑA HISTORICA Y LINEA DE TIEMPO DE LA UNIVERSIDAD Y SU FORMA DE GOBIERNO.pdf')}}"
                                        target="_blank">Reseña Histórica y Línea de Tiempo de la Universidad y Su Forma
                                        de Gobierno</a></li>

                                <li><a
                                        href="{{asset('img/file/HISTORIAL SOBRE RESPONSABILIDAD SOCIAL UNIVERSITARIA.pdf')}}">Historial
                                        Sobre La Responsabilidad Social Universitaria</a></li>



                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Reglamento de
                                        Admisión Pregrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Cronograma de
                                        Admisión Pregrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv3" target="_blank">Temario del examen
                                        de admisión Pregrado</a></li>



                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Reglamento de
                                        Admisión Postgrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Cronograma de
                                        Admisión Postgrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv3  " target="_blank">Items de
                                        Entrevista de Admisión Postgrado (Reglamento)</a></li>


                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.10" target="_blank">Número de
                                        Postulantes, e Ingresantes Pregrado según modalidades de ingreso de los últimos
                                        dos años</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.10" target="_blank">Número de
                                        Postulantes, e Ingresantes Postgrado según modalidades de ingreso de los últimos
                                        dos años</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.10"
                                        target="_blank">Postulantes, Ingresantes, Matriculados y Egresados por Programas
                                        de Estudio de Posgrado </a></li>
                                <!--   <li><a href="file/POST%20INGR%20POSTGRADO-DOCTORADO.pdf" target="_blank">Ingresantes Postgrado Doctorado</a></li>-->

                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Número de estudiantes
                                        matriculados por facultad</a></li>
                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Numero de estudiantes
                                        matriculados por programas de estudio</a></li>

                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Número de estudiantes
                                        egresados por facultad</a></li>
                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Numero de estudiantes
                                        egresados por programas de estudio</a></li>



                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.7" target="_blank">Tarifario
                                        de Pagos</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv11" target="_blank">Conformación del
                                        Cuerpo Docente</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv11" target="_blank">Plana de Docentes
                                        Investigadores</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.4" target="_blank">Becas y/o
                                        Semibecas</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv5" target="_blank">Convocatorias de
                                        selección para docentes y personal general, según corresponda</a></li>


                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Malla curricular de
                                        todos sus programas de estudios de pregrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv12" target="_blank">Malla curricular
                                        de todos sus programas de estudios de postgrado</a></li>

                                <h4 style="font-weight: bold;color: #3c8dbc;">Estados Financieros</h4>
                                <!--  <li><a href="InsGestion/07-46-15estado2015.pdf" target="_blank">Año 2015-2016</a></li> -->
                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.3" target="_blank">Año
                                        2017</a></li>


                            </ul>
                        </div>


                        <div class="col-md-6">

                            <a href="Servicios.php" target="_blank">
                                <h4 style="font-weight: bold;">Ambientes o espacios destinados a brindar los servicios
                                    sociales, deportivos o culturales</h4>
                            </a>
                            <ul>
                                <li><a href="WebAuditorio" target="_blank">Auditorio</a></li>
                                <li><a href="WebCentroMedico" target="_blank">Centro médico</a></li>
                                <li><a href="WebComedor" target="_blank">Comedor universitario</a></li>
                                <li><a href="WebGimnasio" target="_blank">Gimnasio</a></li>
                            </ul>

                            <h4 style="font-weight: bold;color: #3c8dbc;">Reglamentos</h4>
                            <ul>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-432-2016-UNASAM.pdf"
                                        target="_blank">Reglamento de Gestión de la Programación, Ejecución y Control de
                                        las Actividades Académicas</a></li>

                                <li><a href="{{asset('img/file/Reglamento de Grados y Titulos.pdf')}}"
                                        target="_blank">Reglamento General
                                        de Grados y Títulos</a></li>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/367-2016.pdf"
                                        target="_blank">Reglamento del Procedimiento Disciplinario General</a></li>
                            </ul>

                            <h4 style="font-weight: bold;color: #3c8dbc;">Reglamentos de la Carrera Docente</h4>
                            <ul>

                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-475-2017-UNASAM.pdf"
                                        target="_blank">Reglamento de Concurso Público de Admisión a la Docencia</a>
                                </li>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-256-2017-UNASAM.pdf"
                                        target="_blank">Reglamento de ratificación y ascensos en la categoría
                                        docente</a></li>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-041-2017-UNASAM.pdf"
                                        target="_blank">Reglamento de Cambio de Dedicación del Personal Docente</a></li>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-040-2017-UNASAM.pdf"
                                        target="_blank">Reglamento de Capacitación Docente</a></li>
                                <li><a href="http://sisres.unasam.edu.pe/Resoluciones/RCUR/RCUR-437-2016-UNASAM.pdf"
                                        target="_blank">Reglamento de otorgamiento el año sabático</a></li>
                            </ul>
                        </div>

                    </div>

                    <div class="tab-pane fade" id="tab_f" style="padding-left: 15px; padding-right: 15px;">
                        <div class="col-md-4">
                            <h4 style="font-weight: bold;">Ley Universitaria Nº 30220, Artículo 11. Documentos de
                                Gestión</h4>

                            <ul>
                                @foreach ($instrumentos as $inst )

                                <li class="docGes"><a class="adocGes" href="{{asset('img/instrumentos/'. $inst->ruta)}}"
                                        download="{{$inst->nombreInstrumento}}">{{$inst->nombreInstrumento }}</a>
                                </li>
                                @endforeach
                            </ul>


                        </div>
                        <div class="col-md-4">
                            <h4 style="font-weight: bold;">Información de Transparencia</h4>
                            <ul>
                                <li class="docsTrans"><a class="adocsTrans"
                                        href="{{asset('img/file/RR-023-2019-UNASAM.pdf')}}" target="_blank">
                                        Delegación de facultades administrativas a los titulares de la Dirección General
                                        de Administración, Dirección de Recursos Humanos y Oficina General de
                                        Planificación y Presupuesto.
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans" href="http://sisres.unasam.edu.pe/"
                                        target="_blank">
                                        Actas de sesiones Asamblea universitaria
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans" href="http://sisres.unasam.edu.pe/"
                                        target="_blank">
                                        Actas de sesiones Consejo universitario
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="http://sisres.unasam.edu.pe/ResolucionFacultad" target="_blank">
                                        Actas de sesiones de consejo de facultad
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="http://licenciamiento.unasam.edu.pe/numeralR">
                                        Publicación referida a las remuneraciones del personal
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans" href="WebBecas" target="_blank">
                                        Becas y/o Semibecas
                                    </a></li>


                                <li class="docsTrans"><a class="adocsTrans"
                                        href="http://licenciamiento.unasam.edu.pe/numeral11.7" target="_blank">
                                        Tarifario de Pagos
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="{{asset('img/file/Directiva 001-2018-UNASAM-DGF-UT Normas y Procedimientos para la Administracion del Fondo Caja Chica.pdf')}}"
                                        target="_blank">
                                        Directiva 001-2018-UNASAM-DGF-UT Normas y Procedimientos para la Administracion
                                        del Fondo Caja Chica
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="{{asset('img/file/Directiva 001-2017-UNASAM-DASA-UA Normas para las contrataciones cuyos montos sean iguales o inferiores a 08 UITs.pdf')}}"
                                        target="_blank">
                                        Directiva 001-2017-UNASAM-DASA-UA Normas para las contrataciones cuyos montos
                                        sean iguales o inferiores a 08 UITs
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="{{asset('img/file/Directiva 001-2018-UNASAM-DGF-D otorgamiento de viaticos y pasajes para viajes en comision de servicios.pdf')}}"
                                        target="_blank">
                                        Directiva 001-2018-UNASAM-DGF-D otorgamiento de viaticos y pasajes para viajes
                                        en comision de servicios
                                    </a></li>

                                <li class="docsTrans"><a class="adocsTrans"
                                        href="{{asset('img/file/plan anual de control 2018.pdf')}}" target="_blank">
                                        Directiva N° 006-2016-CG/GPROD Estado de Implementación de las Recomendaciones
                                        del Informe de Auditoría Orientadas a la Mejora de la Gestión 2018
                                    </a></li>

                                <li class="docsTrans">
                                    <a class="adocsTrans"
                                        href="{{asset('img/file/RR 100-2018-DIRECTIVA 01-2017-DASA.pdf')}}" download="">
                                        DIRECTIVA N° 001-2017-UNASAM-DASA-UA "Normas para las contrataciones cuyos
                                        montos sean iguales o inferiores a ocho (08) unidades impositivas tributarias"
                                        Aprobado con RR--001-2018-UNASAM
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h4 style="font-weight: bold;">Información General</h4>

                            <ul>
                                <li><a href="WebMisionVision" target="_blank">Misión y Visión</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Reglamento de
                                        Admisión Pregrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Cronograma de
                                        Admisión Pregrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv3">Temario del examen de admisión
                                        Pregrado</a></li>


                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Reglamento de
                                        Admisión Postgrado</a></li>
                                <li><a href="http://licenciamiento.unasam.edu.pe/mv2" target="_blank">Cronograma de
                                        Admisión Postgrado</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.9" target="_blank">Número de
                                        Postulantes, e Ingresantes Pregrado según modalidades de ingreso de los últimos
                                        dos años</a></li>


                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.9"
                                        target="_blank">Postulantes, Ingresantes, Matriculados y Egresados por Programas
                                        de Estudio de Posgrado </a></li>

                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Número de estudiantes
                                        matriculados por facultad</a></li>
                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Numero de estudiantes
                                        matriculados por programas de estudio</a></li>

                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Número de estudiantes
                                        egresados por facultad</a></li>
                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Numero de estudiantes
                                        egresados por programas de estudio</a></li>



                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.7" target="_blank">Tarifario
                                        de Pagos</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv11" target="_blank">Conformación del
                                        Cuerpo Docente</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv11" target="_blank">Plana de Docentes
                                        Investigadores</a></li>
                                <li><a href="becas.php" target="_blank">Becas y/o Semibecas</a></li>

                                <li><a href="http://licenciamiento.unasam.edu.pe/mv5" target="_blank">Convocatorias de
                                        selección para docentes y personal general, según corresponda</a></li>


                                <li><a href="http://sga.unasam.edu.pe/reportes" target="_blank">Malla curricular de
                                        todos sus programas de estudios</a></li>



                                <li><a href="http://licenciamiento.unasam.edu.pe/numeral11.3" target="_blank">Estados
                                        Financieros</a></li>
                            </ul>
                        </div>

                    </div>

                </div><!-- tab content -->


                <div class="col-md-12 espacio"></div>
            </section>
            <div style="border-color:#084B8A;;border-top-width: 3px;border-top-style: solid;"></div>

        </div>
    </div>
</div>

<div style="width: 100%;background: #F2F2F2;">
    <div class="col-md-12 espacio" style=""></div>
    <div class="container">
        <div class="row">
            <div style="border-color:#084B8A;;border-top-width: 2px;border-top-style: solid;"></div>
            <div class="container-fluid">
                <section id="eventos" class="row" style="background: #F2F2F2;">
                    <h1 class="col-md-12 titsec1 evento" style="color: #084B8A;padding-top: 0px;padding-bottom: 0px;">
                        Calendario de actividades</h1>
                    <div class="col-md-12">
                        <section class="content">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="box box-primary">
                                        <div class="box-body no-padding">
                                            <!-- THE CALENDAR -->
                                            {!! $calendar->calendar()!!}
                                            {!! $calendar->script()!!}
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /. box -->
                                </div>
                                <!-- /.col -->


                                <div class="col-md-3">
                                    <div class="box box-solid">
                                        <div class="box-header with-border" id="tituloactividades">
                                            <h4 class="box-title"><strong>Actividades en el Mes</strong></h4>
                                        </div>
                                        <div class="box-body" id="descactividades" style="overflow-y: auto">
                                            <!-- the events -->
                                            <div id="external-events">

                                                <h4 style='margin-top: 0px;  margin-bottom: 20px; font-weight:bold;'
                                                    id="titulocalendar"></h4>

                                                @foreach ($cargarFechas as $fech)
                                                    @php
                                                    $nummes = $fech->mesfechaini;
                                                    switch ($nummes){
                                                    case '1': $nummes="Enero"; break;
                                                    case '2': $nummes="Febrero"; break;
                                                    case '3': $nummes="Marzo"; break;
                                                    case '4': $nummes="Abril"; break;
                                                    case '5': $nummes="Mayo"; break;
                                                    case '6': $nummes="Junio"; break;
                                                    case '7': $nummes="Julio"; break;
                                                    case '8': $nummes="Agosto"; break;
                                                    case '9': $nummes="Setiembre"; break;
                                                    case '10': $nummes="Octubre"; break;
                                                    case '11': $nummes="Noviembre"; break;
                                                    case '12': $nummes="Diciembre"; break;
                                                    }
                                                    @endphp 

                                                    @if($fech->cant > 0)                                               
                                                        <div class="external-event"
                                                            style="background-color: {{$fech->color}}; border-color: {{$fech->color}}; color: white;  position: relative;">
                                                            {{$fech->diafechaini}} <?php echo $nummes?>  
                                                            <br>
                                                            {{$fech->tituloCalendario}}
                                                        </div>
                                                        <p class="">{{$fech->descrCalendario}}</p>
                                                    </div>
                                                    @else
                                                        <div class="external-event" 
                                                            style="background-color: {{$fech->color}}; border-color: {{$fech->color}}; color: white;  position: relative;">
                                                            {{$fech->diafechaini}} <?php echo $nummes?>  
                                                            <br>
                                                            {{$fech->tituloCalendario}}
                                                        </div>
                                                        <p class="">{{$fech->descrCalendario}}</p>
                                                    @endif
                                                @endforeach


                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                        <!-- /. box -->

                                    </div>
                                    <!-- /.col -->

                                </div>
                                <!-- /.row -->
                        </section>

                    </div>
                    <div class="espacio col-md-12"></div>
                </section>
            </div>
        </div>
    </div>
</div>

<div style="width: 100%;background: #ffffff;">
    <div class="container">
        <div class="row">

            <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>
            <div class="container-fluid">
                <section id="rec" class="row" style="background: #ffffff;">

                    <h1 class="col-md-12 titsec2" style="padding-bottom: 20;">Ejes Estratégicos de Gestión</h1>
                    <div class="container">
                        <div class="col-md-1"></div>
                        <div class="col-md-10">

                            <div id="svgejes"></div>

                        </div>
                        <div class="col-md-1"></div>
                        <div class="col-md-12 espacio"></div>
                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <center><a href="javascript:void(0);" id="btnPoliticas">
                                    <div class="lee col-md-4">Ver las Políticas Institucionales de Gestión</div>
                                </a></center>
                            <div class="col-md-4"></div>
                        </div>
                        <div class="col-md-12 espacio"></div>


                    </div>
                    <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>
                </section>
            </div>

        </div>
    </div>
</div>

<div style="width: 100%;background: #F2F2F2;">
    @include('web.contacto')
</div>

<div style="width: 100%;background: #FFFFFF;">
    <div class="container">
        <div class="row">

            <div id="contactanos" class="container-fluid">
                <section class="row" style="background: #FFFFFF; padding-bottom: 40px;">
                    <div class="col-md-4">
                        <h3 style="color: #084B8A; padding-bottom: 30px;">FRONTIS</h3>
                        <img class="img-responsive" src="{{asset('img/imagen/frontis3.jpg')}}" alt="">
                    </div>
                    <div class="col-md-4">
                        <h3 style="color: #084B8A; padding-bottom: 30px;">UBÍCANOS</h3>
                        <div class="embed-responsive embed-responsive-4by3" id="mapaGoogle" style="height: 360px; ">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15739.416581506297!2d-77.528699!3d-9.521399!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdf2165a086c6087!2sUnasam+Local+Central!5e0!3m2!1ses!2spe!4v1487624383692"
                                width="360" height="360" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <h3 style="color: #084B8A; padding-bottom: 30px;">CONTÁCTANOS</h3>
                        <div class="col-md-12">

                        </div>
                        <div class="col-md-12">

                        </div>
                        <div class="row">
                            <div class="col-md-12" style="padding-bottom: 35px;">
                                <div class="col-md-3">
                                    <a class="glyphicon glyphicon-phone conticon"></a>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h5><strong>Teléfono</strong></h5>
                                    <p>043-043-640020 + N° de Anexo</p>
                                </div>
                            </div>

                            <div class="col-md-12" style="padding-bottom: 35px;">
                                <div class="col-md-3">
                                    <a class="glyphicon glyphicon-envelope conticon"></a>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h5><strong>Correo Institucional</strong></h5>
                                    <p>rectorado@unasam.edu.pe</p>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <a class="glyphicon glyphicon-map-marker conticon"></a>
                                </div>
                                <div class="col-md-6 col-md-offset-1">
                                    <h5><strong>Dirección</strong></h5>
                                    <p>Av. Centenario 200</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </div>

        </div>
    </div>
</div>

<div style="width: 100%;background: #F2F2F2;">
    <div class="container">
        <div class="row">
            <div id="contactanos" class="container-fluid">
                <section class="row" style="background: #F2F2F2;">
                    <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>
                    <div class="col-md-12">
                        <h1 class="titsec1" style="color: #084B8A;padding-top: 0; padding-bottom: 20px;">ENLACES DE
                            INTERÉS</h1>
                    </div>
                    <div class="container-fluid" style=" padding-bottom: 20px;">
                        <div class="logmin"
                            style="margin-right:auto;margin-left:auto; text-align: center;  justify-content: center;">
                            <iframe src="{{asset('web/enlacesSlider/index.php')}}" class="col-md-12" frameborder="0"
                                style="border: solid 0px #6a62e8; height:120px ;padding:0; "
                                allowfullscreen=""></iframe>
                        </div>
                    </div>
                </section>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection

