@extends('web/layout/layout')
@section('contenido')
<style>
    .imagen:hover {
        transform: scale(0.97);
        transition: .5s;
        border: 5px solid yellow;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1 class="text-center"><strong>Libros</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Lorem
                        ipsum dolor sit, amet consectetur adipisicing
                        elit. Odio magni inventore voluptas assumenda atque excepturi accusantium natus possimus
                        nesciunt vitae quo at, necessitatibus animi est molestias nobis ad reiciendis. </p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-size: 20px">TEMA:</label>
                                <select class="form-control form-control-lg">
                                        <option>Todos</option>
                                    @foreach ($librosweb as $lib)
                                    <option>{{$lib->titulo}}</option>   
                                    @endforeach
                                   
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            <div class="col-md-6">
                                @foreach ($librosweb as $lib)
                            <h5 class="blog-list-title"><a href="{{asset('doc/investigaciones/'.$lib->ruta) }}" target="blank">{{$lib->titulo}}</a></h5> 
                            <a href="{{asset('doc/investigaciones/'.$lib->ruta)}}" target="blank"><img src="{{asset('img/investigaciones/'.$lib->imagen)}}" alt=""
                                style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text">{{$lib->fechapublicacion}}</p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">{{$lib->descripcion}}</p>
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