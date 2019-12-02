@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="main-slideshow" style="height: 500px; margin: 0px;">
                <div class="flexslider">
                    <ul class="slides">
                        @foreach ($BannersFacultades as $BannersFacultad)
                        <li>
                            <img src="/img/bannersFacultades/{{$BannersFacultad->imagen}}" style="height: 500px"
                                alt="{{$BannersFacultad->imagen}}">
                            <div class="slider-caption">
                                <h2><a href="blog-single.html">{{$BannersFacultad->titulo}}</a></h2>
                                <p>{{$BannersFacultad->descripcion}}</p>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <!-- Here begin Main Content -->
        <div class="col-md-8">
            <div class="row">
                <!-- Show Latest Blog News -->
                <div class="col-md-6">
                    <div class="widget-main" id="noticias">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Ultimas Noticias</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            @foreach ($noticias as $noticia)
                            <div class="blog-list-post clearfix">
                                <div class="blog-list-thumb">
                                    <a href="/img/noticiaFacultad/{{$noticia->imagen}}" class="fancybox"
                                        rel="gallery1"><img src="/img/noticiaFacultad/{{$noticia->imagen}}" alt=""></a>
                                </div>
                                <div class="blog-list-details">
                                    <h5 class="blog-list-title"><a href="blog-single.html">{{$noticia->titulo}}</a></h5>
                                    <p class="blog-list-meta small-text"><span><a
                                                href="#">{{$noticia->descripcion}}</a></span></p>
                                </div>
                            </div> <!-- /.blog-list-post -->
                            @endforeach
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver mas...</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /col-md-6 -->

                <!-- Show Latest Events List -->
                <div class="col-md-6">
                    <div class="widget-main" id="eventos">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Eventos</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            @foreach ($eventos as $evento)
                            <div class="event-small-list clearfix">
                                <div class="blog-list-thumb">
                                    <a href="{{ asset('/img/eventoFacultad/'.$evento->imagen) }}" class="fancybox"
                                        rel="gallery1"><img src="{{ asset('/img/eventoFacultad/'.$evento->imagen) }}"
                                            alt=""></a>
                                </div>
                                <div class="event-small-details">
                                    <h5 class="event-small-title"><a href="event-single.html">{{$evento->tittulo}}</a>
                                    </h5>
                                    <p class="event-small-meta small-text">{{$evento->descripcion}}</p>
                                    <p class="event-small-meta small-text">Inicio: {{$evento->fechainicio}}</p>
                                    <p class="event-small-meta small-text">Fin: {{$evento->fechafin}}</p>
                                </div>
                            </div>
                            @endforeach
                        </div> <!-- /.widget-inner -->
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver mas...</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-6 -->

            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget-main" id="tramites">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Tramites Documentarios</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <div class="our-campus clearfix">
                                <ul style="text-align: center">
                                    @foreach ($documentos as $documento)
                                    <div class="col-md-3">
                                        <li
                                            style="border-radius: 3px;background-color: #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                                            <p style=><strong>{{$documento->titulo}}</strong></p>
                                            <a href="{{ asset('/doc/documentoFacultades/'.$documento->ruta)}}"
                                                target="_blank"><img
                                                    src="{{ asset('/img/documentoFacultades/'.$documento->imagen)}}"
                                                    alt=""></a>
                                        </li>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="container">
                            <a href="" class="btn btn-primary">Ver Todos los Documentos</a>
                            <p></p>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="widget-main" id="carreras">
                        <div class="widget-main-title">
                            <h4 class="widget-title">Carreras Profesionales</h4>
                        </div> <!-- /.widget-main-title -->
                        <div class="widget-inner">
                            <div class="our-campus clearfix">
                                <ul style="text-align: center">
                                    @foreach ($carrerasprofesionales as $carrerasprofesional)
                                    <div class="col-md-4">
                                        <li
                                            style="border-radius: 3px;background-color: #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                                            <p>
                                                <strong>{{$carrerasprofesional->nombre}}</strong>
                                            </p>
                                            <a class="fancybox"
                                                href="/img/descripcionEscuelas/{{$carrerasprofesional->logo}}">
                                                <img src="/img/descripcionEscuelas/{{$carrerasprofesional->logo}}"
                                                    alt="" width="170px" height="113px">
                                            </a>
                                        </li>
                                    </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div> <!-- /.widget-main -->
                </div> <!-- /.col-md-12 -->
            </div> <!-- /.row -->

        </div> <!-- /.col-md-8 -->

        <!-- Here begin Sidebar -->
        <div class="col-md-4">

            <div class="widget-main" id="autoridades">
                <div class="widget-main-title">
                    <h4 class="widget-title">Autoridades</h4>
                </div>
                <div class="widget-inner">
                    @foreach ($decano as $deca)
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <a href="{{ asset('/img/personas/'.$deca->foto)}}" class="fancybox" rel="gallery1"><img
                                    src="{{ asset('/img/personas/'.$deca->foto)}}"
                                    alt="{{$deca->nombres.' '.$deca->apellidos}}"></a>
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">{{$deca->nombres.' '.$deca->apellidos}}</h5>
                            <p class="small-text">{{$deca->cargo}}</p>
                        </div> <!-- /.prof-details -->
                    </div> <!-- /.prof-list-item -->
                    @endforeach
                    @foreach ($autoridades as $autoridad)
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <a href="{{ asset('/img/personas/'.$autoridad->foto)}}" class="fancybox" rel="gallery1"><img
                                    src="{{ asset('/img/personas/'.$autoridad->foto)}}"
                                    alt="{{$autoridad->nombres.' '.$autoridad->apellidos}}"></a>
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">{{$autoridad->nombres.' '.$autoridad->apellidos}}</h5>
                            <p class="small-text">{{$autoridad->cargo}}</p>
                        </div> <!-- /.prof-details -->
                    </div> <!-- /.prof-list-item -->
                    @endforeach
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->

            <div class="widget-main" id="misionyvision">
                <div class="widget-main-title">
                    <h4 class="widget-title">Mision y Visión</h4>
                </div>
                <div class="widget-inner">
                    <div id="slider-testimonials">
                        <ul>
                            @foreach ($misionvision as $misiovisio)
                            <li>
                                <p><strong>misión</strong></p>
                                <p style="text-align: justify">{{$misiovisio->mision}}</strong></p>
                            </li>
                            @endforeach
                            @foreach ($misionvision as $misiovisio)
                            <li>
                                <p><strong>visión</strong></p>
                                <p style="text-align: justify">{{$misiovisio->vision}}</strong></p>
                            </li>
                            @endforeach
                        </ul>
                        <a class="prev fa fa-angle-left" href=""></a>
                        <a class="next fa fa-angle-right" href=""></a>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->

            <div class="widget-main" id="imagenes">
                <div class="widget-main-title">
                    <h4 class="widget-title">Galeria de imagenes</h4>
                </div>
                <div class="widget-inner">
                    <div class="gallery-small-thumbs clearfix">
                        @foreach ($galeriaFacultades as $galeriaFacultad)
                        <div class="thumb-small-gallery">
                            <a class="fancybox" rel="gallery1" href="/img/galeriaFacultad/{{$galeriaFacultad->imagen}}"
                                title="{{$galeriaFacultad->imagen}}">
                                <img src="/img/galeriaFacultad/{{$galeriaFacultad->imagen}}" alt="" />
                            </a>
                        </div>
                        @endforeach
                    </div> <!-- /.galler-small-thumbs -->
                </div> <!-- /.widget-inner -->
                <div class="container">
                    <a href="" class="btn btn-primary">Ver mas...</a>
                    <p></p>
                </div>
            </div> <!-- /.widget-main -->
            <div class="widget-main" id="videos">
                <div class="widget-main-title">
                    <h4 class="widget-title">Galeria de videos</h4>
                </div>
                <div class="widget-inner">
                    <div class="gallery-small-thumbs clearfix">
                        @foreach ($videosFacultades as $videosFacultad)
                        <div class="thumb-small-gallery">
                            <a class="fancybox" rel="gallery1" href="images/gallery/gallery1.jpg"
                                title="Gallery Tittle One">
                                @php
                                echo $videosFacultad->link;
                                @endphp
                            </a>
                        </div>
                        @endforeach
                    </div> <!-- /.galler-small-thumbs -->
                </div> <!-- /.widget-inner -->
                <div class="container">
                    <a href="" class="btn btn-primary">Ver mas...</a>
                    <p></p>
                </div>
            </div> <!-- /.widget-main -->
        </div>
    </div>
</div>
<script>
    window.sr = ScrollReveal();
            sr.reveal('#noticias',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#eventos',{
                duration: 2000,
                origin: 'top',
                distance: '300px'
            }); 
        window.sr = ScrollReveal();
            sr.reveal('#autoridades',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#tramites',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#carreras',{
                duration: 2000,
                origin: 'left',
                distance: '300px'
            }); 
        window.sr = ScrollReveal();
            sr.reveal('#misionyvision',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#imagenes',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            });
        window.sr = ScrollReveal();
            sr.reveal('#videos',{
                duration: 2000,
                origin: 'right',
                distance: '300px'
            }); 
</script>
@endsection