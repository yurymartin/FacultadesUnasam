@extends('web/layout/layout')
@section('contenido')
@foreach ($comiestudiantiles as $comite)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="widget-main">
                    <div class="widget-main-title">
                        <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                            <strong>{{$comite->titulo}}</strong>
                        </h4>
                    </div>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                        {{$comite->descripcion}}</p>
                    <div class="widget-inner" style="border-radius: 3px;background-color:   #fafafa;padding: 5px 5px 5px 5px;margin-top: 10px;margin-bottom: 10px">
                        @foreach ($alumnos as $alumno)
                        @if ($alumno->comiestudiantil_id == $comite->id)
                        <div class="prof-list-item" >
                            <div class="prof-thumb">
                                <a class="fancybox" href="/img/personas/{{$alumno->foto}}">
                                    <img src="/img/personas/{{$alumno->foto}}" alt=""
                                        width="170px" height="250px">
                                </a>
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">{{$alumno->nombres.' '.$alumno->apellidos}}</h5>
                                <p class="small-text"><strong>DNI:</strong>{{$alumno->dni}}</p> 
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        @endif
                        @endforeach
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection