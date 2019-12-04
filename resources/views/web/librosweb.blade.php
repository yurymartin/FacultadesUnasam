@extends('web/layout/layout')
@section('contenido')
<style>
    #panel-imagen:hover {
        transform: scale(0.95);
        transition: .5s;
        border: 1px solid slategray;
        border-radius: 20px;
        opacity: 50%;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center"><strong>LIBROS PUBLICADOS</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Lorem
                        ipsum dolor sit, amet consectetur adipisicing
                        elit. Odio magni inventore voluptas assumenda atque excepturi accusantium natus possimus
                        nesciunt vitae quo at, necessitatibus animi est molestias nobis ad reiciendis. </p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <form action="" method="GET" class="form-inline">
                                <div class="form-group">
                                    <label style="font-size: 20px">TEMA:</label>
                                </div>
                                <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                    <select class="form-control form-control-lg" name="buscar" id="buscar">
                                        <option value=""><strong>TODOS LAS INVESTIGACIONES</strong></option>
                                        @foreach ($temas as $tema)
                                        <option value="{{$tema->id}}" id="buscar">{{$tema->tema}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">BUSCAR</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
<div class="container">
    <hr>
</div>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            @foreach ($librosweb as $libro)
            <div class="col-md-3" style="border-radius: 20px;background-color: #fafafa;margin-left: 10px"
                id="panel-imagen">
                <h5 class="blog-list-title"><a href="{{asset('doc/libros/'.$libro->ruta) }}"
                        target="blank">{{$libro->titulo}}</a></h5>
                <a href="{{asset('doc/libros/'.$libro->ruta)}}" target="blank"><img
                        src="{{asset('img/libros/'.$libro->imagen)}}" alt="" style="width: 150px;height: 150px"
                        class="imagen"></a>
                <p class="blog-list-meta small-text">Autor(es): {{$libro->autor}}</p>
                <p class="blog-list-meta small-text">Fecha Publicacion: {{$libro->fechapublicacion}}</p>
                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">
                    {{$libro->descripcion}}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection