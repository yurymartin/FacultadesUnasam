@extends('web/layout/layout')
@section('contenido')
<style>
    .imagen {
        -webkit-filter: grayscale(100%);
        filter: grayscale(100%);
    }

    .imagen2:hover {
        -webkit-filter: grayscale(0%);
        filter: none;
        transform: scale(0.98);
        transition: .5s;
    }
</style>
@foreach ($comiestudiantiles as $comite)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="widget-main">
                    <div class="widget-main-title">
                        <h2 class="text-center text-primary"><strong>{{$comite->titulo}}</strong></h2>
                        <p>{{$comite->descripcion}}</p>
                    </div>
                </div>
                @foreach ($alumnos as $alumno)
                @if ($alumno->comiestudiantil_id == $comite->id)
                <div class="col-md-3 text-center" style="padding-bottom: 5px;padding-top: 5px">
                    <img src="{{ asset('/img/personas/'.$alumno->foto)}}" alt="Responsive" class="imagen imagen2"
                        width="70%" height="70%" style="border-radius: 5px">
                    <h5 style="font-family: 'Times New Roman', Times, serif"><strong>Nombre:
                        </strong>{{$alumno->nombres.' '.$alumno->apellidos}}</h5>
                    <h5 style="font-family: 'Times New Roman', Times, serif"><strong>DNI: </strong>{{$alumno->dni}}</h5>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection