@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h3 style="font-family: cursive"><strong>MISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        @if ($misionvision != null)
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            {{$misionvision->mision}}</p>
                        @else
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            FALTA DATOS</p>
                        @endif
                    </div>
                </div>
                <div class="widget-main-title">
                    <h3 style="font-family: cursive"><strong>VISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        @if ($misionvision != null)
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            {{$misionvision->vision}}</p>
                        @else
                        <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                            FALTA DATOS</p>
                        @endif
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br>
                <div class="widget-inner text-center">
                    <div class="our-campus clearfix">
                        @if ($misionvision != null)
                        <img src="{{asset('img/descripcionFacultades/'.$misionvision->imagen)}}" alt="UNASAM"
                            style="width: 300px">
                        @else
                        <img src="" alt="FALTA DATOS"
                            style="width: 300px">
                        @endif
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
@endsection