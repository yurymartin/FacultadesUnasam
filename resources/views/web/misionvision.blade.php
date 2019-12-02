@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h3><strong>MISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        @foreach ($misionvision as $mision)
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">{{$mision->mision}}</p>   
                        @endforeach
                       </div>
                </div>
                <div class="widget-main-title">
                    <h3><strong>VISIÓN</strong></h3>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                            @foreach ($misionvision as $vision)
                            <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">{{$vision->vision}}</p>   
                                @endforeach
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
        <div class="col-md-4">
            <div class="widget-main" id="tramites">
                <br><br>
                <div class="widget-inner text-center">
                    <div class="our-campus clearfix">
                        @foreach ($misionvision as $logo)
                        <img src="{{asset('img/descripcionFacultades/'.$logo->imagen)}}" alt="UNASAM" style="width: 300px">  
                        @endforeach
                    
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
@endsection