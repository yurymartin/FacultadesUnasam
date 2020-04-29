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
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <div>
                <h3><strong>PLANA DOCENTE DE LA FACULTAD</strong></h3>
            </div>
            <div class="container">
                <hr>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="GET" class="form-inline">
                            <div class="form-group">
                                <label style="font-size: 20px">CATEGORIA:</label>
                            </div>
                            <div class="form-group" style="font-family: 'Times New Roman', Times, serif">
                                <select class="form-control form-control-lg" name="buscar" id="buscar"
                                    style="width: 500px">
                                    <option value='0'><strong>TODOS LOS DOCENTES</strong></option>
                                    @foreach ($categoria as $cat)
                                    <option value="{{$cat->id}}" id="buscar">DOCENTES {{$cat->categoria}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">BUSCAR</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                @foreach ($docenteweb as $doc)
                <div class="col-md-3" style="padding-bottom: 5px;padding-top: 5px">
                    <img src="{{ asset('/img/personas/'.$doc->foto)}}" alt="Responsive" class="imagen imagen2"
                        width="70%" height="70%" style="border-radius: 5px">
                    <h4><strong>{{$doc->abreviatura .' '. $doc->nombres.' '.$doc->apellidos}}</strong></h4>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                        data-target="{{'#'.$doc->doc}}">
                        Perfil del Docente
                    </button>
                    <div class="modal fade" id="{{$doc->doc}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content"
                                style="width: 450px;margin-left: auto;margin-right: auto">
                                <div class="modal-header" style="background-color: {{$estilos->fondoheader}};color: {{$estilos->textoheader}}">
                                    <h5 class="modal-title" id="exampleModalLongTitle"
                                        style="color: {{$estilos->textoheader}}">PERFIL DEL
                                        DOCENTE</h5>
                                    <div class="modal-footer"
                                        style="position: absolute;right: -5px;top: -23px;border-top: {{$estilos->fondoheader}};color: {{$estilos->textoheader}}">
                                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"
                                            style="color: white">X</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <img src="{{ asset('/img/personas/'.$doc->foto)}}" alt="Responsive"
                                        class="img-thumbnail" style="border-radius: 20px" width="200px" height="200px">
                                    <br><br>
                                    <ul class="text-left">
                                        <ol><strong>DNI: </strong>{{$doc->dni}}</ol>
                                        <ol><strong>Nombre: </strong>{{$doc->nombres.' '. $doc->apellidos}}</ol>
                                        @if ($doc->genero==1)
                                        <ol><strong>Genero:</strong> MASCULINO</ol>
                                        @else
                                        <ol><strong>Genero:</strong> FEMENINO</ol>
                                        @endif
                                        <ol><strong>Carrera Profesional: </strong>{{$doc->tituloprofe}}</ol>
                                        <ol><strong>Grado Academico: </strong>{{$doc->grado}}</ol>
                                        <ol><strong>Categoria: </strong>{{$doc->categoria}}</ol>
                                        <ol><strong>Fecha Ingreso: </strong>{{$doc->fechaingreso}}</ol>
                                    </ul>
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