@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h1><strong>HISTORIA</strong></h1>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        @if ($historia != null)
                        <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                            {{$historia->reseñahistor}}
                        @else
                        <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                            FALTA DATOS
                        @endif
                        </p>
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br><br><br>
                <div class="widget-inner text-right">
                    <div class="our-campus clearfix">
                        @if ($logos != null)
                        <a href="{{ asset('/img/descripcionFacultades/'.$logos->imagen)}}" class="fancybox"
                            rel="gallery1"><img src="{{ asset('/img/descripcionFacultades/'.$logos->imagen)}}"
                                alt="UNASAM" style="width: 350px"></a>
                        @else
                        <a href="" class="fancybox"
                            rel="gallery1"><img src=""
                                alt="FALTA DATOS" style="width: 350px"></a>
                        @endif
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
@endsection