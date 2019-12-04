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
                                    {{$descripcion->tituloprofesional}}</p>
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
            </ul>

            <div class="tab-content">
                <div id="campo" class="tab-pane fade in active">
                    @foreach ($campoLaborales as $campoLaboral)
                    <div class="row"
                        style="background-color: #17478C;padding-top: 10px;padding-bottom: 10px;color: white;border-radius: 5px"
                        id="campo-laboral">
                        <div class="col-md-12">
                            <div class="col-md-8">
                                <h4 style="color: white;text-decoration: underline" class="text-center"><strong>{{$campoLaboral->titulo}}</strong></h4>
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
                    @foreach ($mallas as $malla)
                    <a href="{{ asset('/img/mallaEscuelas/'.$malla->imagen)}}" class="fancybox" rel="gallery1"><img
                            src="{{ asset('/img/mallaEscuelas/'.$malla->imagen)}}" alt="{{$malla->numcurricula}}"
                            style="width: 1100px;height: 500px"></a>
                    @endforeach
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
                    <a href="{{ asset('/img/galeriaEscuelas/'.$galeriaEscuela->imagen)}}" data-size="500x500">
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
        <div class="col-md-12">
            <hr>
            <h3 class="text-center"><strong>GALERIA DE VIDEOS</strong></h3>
            <hr>
            @foreach ($videoescuelas as $videoescuela)
            <div class="col-md-12">
                <div class="col-md-6">
                    @php
                    echo $videoescuela->link;
                    @endphp
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>
@endsection