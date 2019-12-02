@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-slideshow" style="height: 500px">
                <div class="flexslider">
                    <ul class="slides">
                        <li>
                            <img src="images/slide1.jpg" style="height: 500px" />
                            <div class="slider-caption">
                                <h2><a href="blog-single.html">When a Doctor’s Visit Is a Guilt Trip</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            </div>
                        </li>
                        <li>
                            <img src="images/slide2.jpg" style="height: 500px" />
                            <div class="slider-caption">
                                <h2><a href="blog-single.html">Unlocking the scrolls of Herculaneum</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            </div>
                        </li>
                        <li>
                            <img src="images/slide3.jpg" style="height: 500px" />
                            <div class="slider-caption">
                                <h2><a href="blog-single.html">Corin Sworn wins Max Mara Art Prize</a></h2>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            </div>
                        </li>
                    </ul> <!-- /.slides -->
                </div> <!-- /.flexslider -->
            </div> <!-- /.main-slideshow -->
        </div> <!-- /.col-md-12 -->
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <div class="widget-main">
                    @foreach ($descripciones as $descripcion)
                    <div class="widget-main-title">
                        <h1><strong>{{$descripcion->nombre}}</strong></h1>
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                <h3 class="text-primary"><strong>La Carrera</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripcion->descripcion}}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                <h3 class="text-primary"><strong>Grado Académico</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripcion->gradoacade}}</p>
                                <h3 class="text-primary"><strong>Titulo</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripcion->titulo}}</p>
                                <h3 class="text-primary"><strong>Duración</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripcion->duracion}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- /.widget-main -->
            </div>
            <div class="col-md-4">
                <div class="widget-main" id="tramites">
                    <br><br><br><br><br><br>
                    @foreach ($descripciones as $descripcion)
                    <div class="widget-inner text-center">
                        <div class="our-campus clearfix" style="background-color: #fafafa">
                            <br><br><br>
                            <a href="{{ asset('/img/descripcionEscuelas/'.$descripcion->logo)}}" class="fancybox"
                                rel="gallery1"><img src="{{ asset('/img/descripcionEscuelas/'.$descripcion->logo)}}"
                                    alt="{{$descripcion->nombre}}" style="width: 300px;height: 200px"></a>
                            <br><br><br>
                        </div>
                    </div>
                    @endforeach
                </div> <!-- /.widget-main -->
            </div> <!-- /.col-md-12 -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>NUESTRA ESCUELA PROFESIONAL</strong></h3>
            <hr>
            <ul class="nav nav-tabs nav-justified">
                <li class="active"><a data-toggle="tab" href="#campo">CAMPO LABORAL</a></li>
                <li><a data-toggle="tab" href="#perfil">PERFIL PROFESIONAL</a></li>
                <li><a data-toggle="tab" href="#malla">MALLA CURRICULAR</a></li>
                <li><a data-toggle="tab" href="#egresados">EGRESADOS</a></li>
                <li><a data-toggle="tab" href="#traslados">TRASLADOS</a></li>
            </ul>

            <div class="tab-content">
                <div id="campo" class="tab-pane fade in active">
                    @foreach ($campoLaborales as $campoLaboral)
                    <h3>Campo Laboral</h3>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">Lorem
                        {{$campoLaboral->campolab}}</p>
                    <hr>
                    <hr>
                    <a href="{{ asset('/img/campolaboral/'.$campoLaboral->imagen)}}" class="fancybox"
                        rel="gallery1"><img src="{{ asset('/img/campolaboral/'.$campoLaboral->imagen)}}"
                            alt="{{$campoLaboral->titulo}}" style="width: 300px;height: 200px"></a>
                    @endforeach
                </div>
                <div id="perfil" class="tab-pane fade">
                    <h3>Perfil Profesional</h3>
                    <ul>
                        @foreach ($perfiles as $perfil)
                        <li>{{$perfil->descripcion}}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="malla" class="tab-pane fade">
                    <h3>Malla Curricular</h3>
                    <img src="images/mallaccomunicacion.png" alt="UNASAM" style="width: 1100px;height: 500px">
                </div>
                <div id="egresados" class="tab-pane fade">
                    <h3>Egresados</h3>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof1.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof2.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Victor Johns</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof3.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Charles Conway</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                    </div> <!-- /.widget-inner -->
                </div>
                <div id="traslados" class="tab-pane fade">
                    <h3>Traslados</h3>
                    <div class="widget-inner">
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof1.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof2.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Victor Johns</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <img src="images/prof/prof3.jpg" alt="Profesor Name">
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">Prof. Charles Conway</h5>
                                <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                                <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                    </div> <!-- /.widget-inner -->
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>GALERIAS DE IMAGENES</strong></h3>
            <hr>
            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(145).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(145).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(150).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(150).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(152).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(152).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(42).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(42).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(151).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(151).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(40).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(40).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(148).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(148).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(147).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).jpg"
                            class="img-fluid" width="350px" height="200px">
                    </a>
                </figure>

                <figure class="col-md-4">
                    <a href="https://mdbootstrap.com/img/Photos/Lightbox/Original/img%20(149).jpg" data-size="500x500">
                        <img alt="picture" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(149).jpg"
                            class="img-fluid" width="350px" height="200px   ">
                    </a>
                </figure>

            </div>

        </div>
    </div>
</div>
@endsection