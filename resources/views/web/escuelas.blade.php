@extends('web/layout/layout')
@section('contenido')
<style>
    #campo-laboral:hover {
        transform: scale(1.03);
        transition: .5s;
        opacity: 90%;
    }

    #campo-laboral-imagen:hover {
        transform: scale(1.03);
        transition: .5s;
        opacity: 90%;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-slideshow" style="height: 500px">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($bannerescuelas as $bannerescuela)
                        <li>
                            <img src="/img/bannersEscuelas/{{$bannerescuela->imagen}}" style="height: 500px"
                                alt="{{$bannerescuela->imagen}}">
                            <div class="slider-caption">
                                <h2><a href="blog-single.html">{{$bannerescuela->titulo}}</a></h2>
                                <p>{{$bannerescuela->descripcion}}</p>
                            </div>
                        </li>
                        @endforeach
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
                    <div class="widget-main-title">
                        @if ($descripciones != null)
                        <h1 style="font-family: 'Times New Roman', Times, serif">
                            <strong>{{$descripciones->nombre}}</strong></h1>
                        @else
                        <h1><strong>Falta Datos...</strong></h1>
                        @endif

                        @if ($redesescuelas != null)
                        <p>
                            @if ($redesescuelas->facebook != null)
                            <a href="{{$redesescuelas->facebook}}" data-toggle="tooltip" title="Facebook"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-facebook"></i></a>
                            @endif
                            @if ($redesescuelas->google != null)
                            <a href="{{$redesescuelas->google}}" data-toggle="tooltip" title="Google+"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-google-plus"></i></a>
                            @endif
                            @if ($redesescuelas->youtube != null)
                            <a href="{{$redesescuelas->youtube}}" data-toggle="tooltip" title="Youtube"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-youtube-play"></i></a>
                            @endif
                            @if ($redesescuelas->twitter != null)
                            <a href="{{$redesescuelas->twitter}}" data-toggle="tooltip" title="Twitter"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-twitter"></i></a>
                            @endif
                            @if ($redesescuelas->instagram != null)
                            <a href="{{$redesescuelas->instagram}}" data-toggle="tooltip" title="Instagram"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-instagram"></i></a>
                            @endif
                            @if ($redesescuelas->linkedln != null)
                            <a href="{{$redesescuelas->linkedln}}" data-toggle="tooltip" title="Linkedln"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-linkedin-square"></i></a>
                            @endif
                            @if ($redesescuelas->pinterest != null)
                            <a href="{{$redesescuelas->pinterest}}" data-toggle="tooltip" title="Pinterest"
                                style="padding: 5px 8px 5px 8px;border-radius: 3px;background: #000"><i
                                    class="fa fa-pinterest"></i></a>
                            @endif

                        </p>
                        @endif
                    </div> <!-- /.widget-main-title -->
                    <div class="widget-inner">
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                <h3 class="text-primary"><strong>La Carrera</strong></h3>
                                @if ($descripciones != null)
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripciones->descripcion}}</p>
                                @else
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="our-campus clearfix">
                                @if ($descripciones != null)
                                <h3 class="text-primary"><strong>Grado Académico</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripciones->gradoacade}}</p>
                                <h3 class="text-primary"><strong>Titulo</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripciones->tituloprofesional}}</p>
                                <h3 class="text-primary"><strong>Duración</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    {{$descripciones->duracion}}</p>
                                @else
                                <h3 class="text-primary"><strong>Grado Académico</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <h3 class="text-primary"><strong>Titulo</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                <h3 class="text-primary"><strong>Duración</strong></h3>
                                <p
                                    style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                                    Falta Datos...</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div> <!-- /.widget-main -->
            </div>
            <div class="col-md-4">
                <div class="widget-main" id="tramites">
                    <br><br><br><br><br><br>
                    <div class="widget-inner text-center">
                        <div class="our-campus clearfix" style="background-color: #fafafa">
                            <br><br><br>
                            @if ($descripciones != null)
                            <a href="{{ asset('/img/descripcionEscuelas/'.$descripciones->logo)}}" class="fancybox"
                                rel="gallery1"><img src="{{ asset('/img/descripcionEscuelas/'.$descripciones->logo)}}"
                                    alt="{{$descripciones->nombre}}" style="width: 300px;height: 200px"></a>
                            @else
                            <a href="" class="fancybox" rel="gallery1"><img src="" alt="Falta Registar el Logo..."
                                    style="width: 300px;height: 200px"></a>
                            @endif
                            <br><br><br>
                        </div>
                    </div>
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
            </ul>

            <div class="tab-content">
                <div id="campo" class="tab-pane fade in active">
                    @foreach ($campoLaborales as $campoLaboral)
                    <div class="row"
                        style="background-color: #17478C;padding-top: 10px;padding-bottom: 10px;color: white;border-radius: 5px"
                        id="campo-laboral">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <h4 style="color: white;text-decoration: underline" class="text-center">
                                    <strong>{{$campoLaboral->titulo}}</strong></h4>
                                <p
                                    style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                                    {{$campoLaboral->campolab}}</p>
                            </div>
                            <div class="col-md-4">
                                <a href="{{ asset('/img/campolaboral/'.$campoLaboral->imagen)}}" class="fancybox"
                                    rel="gallery1"><img src="{{ asset('/img/campolaboral/'.$campoLaboral->imagen)}}"
                                        style="width: 300px;height: 200px"></a>
                            </div>
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
                <div id="perfil" class="tab-pane fade">
                    <h3>Perfil Profesional</h3>
                    <ul>
                        @foreach ($perfiles as $perfil)
                        <li>{{$perfil->perfil}}</li>
                        @endforeach
                    </ul>
                </div>
                <div id="malla" class="tab-pane fade">
                    <h3>Malla Curricular</h3>
                    @if ($mallas != null)
                    <a href="{{ asset('/img/mallaEscuelas/'.$mallas->imagen)}}" class="fancybox" rel="gallery1"><img
                            src="{{ asset('/img/mallaEscuelas/'.$mallas->imagen)}}" alt="{{$mallas->numcurricula}}"
                            style="width: 1100px;height: 500px"></a>
                    @else
                    <a href="" class="fancybox" rel="gallery1"><img src="" alt="Falta Malla Curricular..."
                            style="width: 1100px;height: 500px"></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>GALERIA DE IMAGENES</strong></h3>
            <hr>
            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox">
                @foreach ($galeriaEscuelas as $galeriaEscuela)
                <figure class="col-md-4">
                    <a href="{{ asset('/img/galeriaEscuelas/'.$galeriaEscuela->imagen)}}" data-size="500x500"
                        class="fancybox">
                        <img alt="picture" src="{{ asset('/img/galeriaEscuelas/'.$galeriaEscuela->imagen)}}"
                            class="img-fluid" width="350px" height="200px" id="campo-laboral-imagen">
                    </a>
                </figure>
                @endforeach
            </div>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <hr>
        <h3 class="text-center"><strong>GALERIA DE VIDEOS</strong></h3>
        <hr>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($videoescuelas as $videoescuela)
            <div class="col-md-6">
                @php
                echo $videoescuela->link;
                @endphp
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection