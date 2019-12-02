@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="widget-main" id="tramites">
                <div class="widget-main-title">
                    <h1><strong>FILOSOFIA</strong></h1>
                </div> <!-- /.widget-main-title -->
                <div class="widget-inner">
                    <div class="our-campus clearfix">
                        @foreach ($filosofia as $filo)
                        <p style="font-size: 16px;font-family: 'Times New Roman', Times, serif;text-align: justify">{{$filo->filosofia}}</p> 
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
                            @foreach ($filosofia as $logo)
                            <img src="{{asset('img/descripcionFacultades/'.$logo->imagen)}}" alt="UNASAM" style="width: 350px">  
                            @endforeach
                    </div>
                </div>
            </div> <!-- /.widget-main -->
        </div> <!-- /.col-md-12 -->
    </div> <!-- /.row -->
</div>
@endsection