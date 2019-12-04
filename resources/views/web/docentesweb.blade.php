@extends('web.layout.layout')
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
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="widget-main-title">
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                        <strong>PLANA DOCENTE</strong>
                    </h4>
                </div>
                <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">El
                    decanato
                    es un Órgano de Dirección y la máxima autoridad de gobierno de la Facultad, representa a la
                    Facultad
                    de Ciencias Sociales, Educación y de la Comunicación, dirige la gestión académica y
                    administrativa,
                    representa a la Facultad ante el Consejo Universitario y la Asamblea Universitaria conforme
                    lo
                    dispone
                    la Ley Universitaria N° 30220.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label style="font-size: 20px">Categoria:</label>
                            <select class="form-control form-control-lg">
                                <option>Todos</option>
                                @foreach ($categoria as $doc)
                                <option>{{$doc->categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                    @foreach ($docenteweb as $doc)
                    <div class="col-md-4">
                        <img src="{{ asset('/img/personas/'.$doc->foto)}}" alt="Responsive" class="img-thumbnail imagen imagen2"
                            >
                        <p class="widget-title image" style="text-align: center">{{$doc->nombres.' '.$doc->apellidos}}
                        </p>
                        <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="{{'#'.$doc->doc}}">
                            Ver Perfil...
                        </button>
                        <div class="modal fade" id="{{$doc->doc}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">PERFIL DEL DOCENTE</h5>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{ asset('/img/personas/'.$doc->foto)}}" alt="Responsive"
                                            class="img-thumbnail" width="200px" height="200px">
                                        <br><br>
                                        <ul class="text-left">
                                            <ol><strong>DNI: </strong>{{$doc->dni}}</ol><br>
                                            <ol><strong>Nombre: </strong>{{$doc->nombres.' '. $doc->apellidos}}</ol><br>
                                            @if ($doc->genero==1)
                                            <ol><strong>Genero:</strong> MASCULINO</ol>
                                            @else
                                            <ol><strong>Genero:</strong> FEMENINO</ol>
                                            @endif<br>
                                            <ol><strong>Carrera Profesional: </strong>{{$doc->tituloprofe}}</ol><br>
                                            <ol><strong>Grado Academico: </strong>{{$doc->grado}}</ol><br>
                                            <ol><strong>Categoria: </strong>{{$doc->categoria}}</ol><br>
                                            <ol><strong>Fecha Ingreso: </strong>{{$doc->fechaingreso}}</ol>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----------->
                    @endforeach
            </div>
            
            <!-- MODAL -->
        </div>
    </div>
</div>
@endsection