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
                        @foreach ($historia as $historias)
                        <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">
                            {{$historias->reseñahistor}}
                        </p>
                        @endforeach
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br><br><br>
                <div class="widget-inner text-right">
                    <div class="our-campus clearfix">
                        @foreach ($logos as $logo)
                        <a href="{{ asset('/img/descripcionFacultades/'.$logo->imagen)}}" class="fancybox" rel="gallery1"><img src="{{ asset('/img/descripcionFacultades/'.$logo->imagen)}}" alt="UNASAM" style="width: 350px"></a>
                        @endforeach
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
@endsection