@extends('web/layout/layout')
@section('contenido')
<style>
    #panel-imagen:hover {
        transform: scale(0.95);
        transition: .5s;
        border: 1px solid slategray;
        border-radius: 10px;
        opacity: 50%;
    }
</style>


<div class="container" style="margin-top: 40px;text-align: center">
    <div class="row">
        <div class="col-md-12">
            <form action="" method="GET" class="form-inline">
                <div class="form-group">
                    <label style="font-size: 20px">TEMA:</label>
                </div>
                <div class="form-group" style="font-family: 'Times New Roman', Times, serif;width: 50%">
                    <select class="form-control form-control-lg" name="buscar" id="buscar" >
                        <option value=""><strong>TODOS LAS PUBLICACIONES</strong></option>
                        @foreach ($temas as $tema)
                        <option value="{{$tema->id}}" id="buscar">{{$tema->tema}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-warning">BUSCAR</button>
            </form>
        </div>
    </div>
</div>
@foreach ($tipopublicaciones as $tipopublicacion)
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center text-primary"><strong>{{$tipopublicacion->tipo}}</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Los
                        {{$tipopublicacion->descripcion}}</p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="row text-center" style="margin-top: 30px">
                    <div class="col-md-12">
                        @foreach ($librosweb as $libro)
                        @if ($tipopublicacion->id == $libro->tipopublicacion_id)
                        <div class="col-md-3" style="background-color: #fafafa" id="panel-imagen">
                            <h5 class="blog-list-title"><a href="{{asset('doc/libros/'.$libro->ruta) }}"
                                    target="blank">{{$libro->titulo}}</a></h5>
                            <a href="{{asset('doc/libros/'.$libro->ruta)}}" target="blank"><img
                                    src="{{asset('img/libros/'.$libro->imagen)}}" alt=""
                                    style="width: 150px;height: 150px" class="imagen"></a>
                            <p class="blog-list-meta small-text">Autor(es): {{$libro->autor}}</p>
                            <p class="blog-list-meta small-text">Fecha Publicacion: {{$libro->fechapublicacion}}</p>
                            <br>
                            <p class="blog-list-meta small-text">descripcion:</p>
                            <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif;text-align: justify">
                                {{$libro->descripcion}}</p>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div> <!-- /.widget-main -->
    </div> <!-- /col-md-6 -->
</div>
@endforeach

@endsection