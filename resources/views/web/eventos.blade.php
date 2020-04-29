@extends('web/layout/layout')
@section('contenido')
<style>
    img:hover {
        transform: scale(0.97);
        transition: .5s;
        border: 3px solid yellow;
    }

    #cortar {
        text-overflow: ellipsis;
        white-space: nowrap;
        overflow: hidden;
    }

    #cortar:hover {
        width: auto;
        white-space: initial;
        overflow: visible;
        cursor: pointer;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title" style="text-align: center">
                    <h1><strong>EVENTOS DE LA FACULTAD</strong></h1>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            @foreach ($eventos as $evento)
                            <div class="col-md-3" style="border-radius: 20px;background-color: #fafafa;margin-left: 10px;margin-bottom: 10px;width: 24%">
                                <h5 class="blog-list-title"><strong>{{$evento->titulo}}</strong></h5>
                                <br>
                                <a href="/img/eventoFacultad/{{$evento->imagen}}" class="fancybox" rel="gallery1"><img
                                        src="/img/eventoFacultad/{{$evento->imagen}}" alt=""
                                        style="width: 200px;height: 250px;border-radius: 5px"></a>
                                        <p><strong>Descripcion</strong></p>
                                <p class="blog-list-meta small-text" style="text-align: justify" id="cortar">{{$evento->descripcion}}</p>
                                <br>
                                <p class="blog-list-meta small-text" style="text-align: center">Fecha Inicio: <strong>{{$evento->fechainicio}}</strong></p>
                                <p class="blog-list-meta small-text" style="text-align: center">Fecha Finalizacion: <strong>{{$evento->fechafin}}</strong></p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
@endsection