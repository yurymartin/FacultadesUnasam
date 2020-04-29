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
        transform: scale(0.95);
        transition: .5s;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4" style="padding-top: 80px">
                <div class="card" style="width: 35rem;">
                    <div class="card-header text-center">
                        <strong></strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background-color: royalblue;color: white">
                            <strong>AUTORIDADES</strong></li>
                        @foreach ($cargosAutoridades as $cargosAutoridad)
                        <li class="list-group-item"><a
                                href="/facultadweb/{{$facultad->id}}/autoridadesF/{{$cargosAutoridad->id}}"><strong>{{$cargosAutoridad->cargo}}</strong></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="widget-main-title">
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                        <strong>{{$autoridades->cargo}}</strong>
                    </h4>
                </div>
                <div class="widget-main-title">
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                        {{$autoridades->descripcioncargo}}</p>
                </div>
                <br><br>
                <div class="text-center">
                    <div class="col-md-6"
                        style="border-radius: 5px;background-color: #fafafa;padding-top: 10px;padding-bottom: 10px;text-align: center">
                        <a href="" data-toggle="modal" data-target="{{'#'.$autoridades->idauto}}">
                            <!--i class="fa fa-eye fa-4x"></i--><img
                                src="{{ asset('/img/personas/'.$autoridades->foto)}}" alt="Responsive image"
                                class="imagen2 imagen" width="300px" height="300px" style="border-radius: 5px"></a>
                        <br><br>
                        <button class="btn btn-primary" data-toggle="modal"
                            data-target="{{'#'.$autoridades->idauto}}">VER
                            PERFIL</button>
                    </div>
                    <!-- ----------------------------------- PANEL MODEL----------------------------------------------->
                    <div class="modal fade" id="{{$autoridades->idauto}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true"
                        style="font-family: 'Times New Roman', Times, serif;font-size: 16px">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content"
                                style="width: 500px;margin-left: auto;margin-right: auto">
                                <div class="modal-header" style="background-color: {{$estilos->fondoheader}}">
                                    <h5 class="modal-title" id="exampleModalLongTitle"
                                        style="color: {{$estilos->textoheader}}">
                                        <strong>PERFIL DE LA AUTORIDAD</strong>
                                    </h5>
                                    <div class="modal-footer"
                                        style="position: absolute;right: -5px;top: -23px;border-top: {{$estilos->fondoheader}};color: {{$estilos->textoheader}}">
                                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal"
                                            style="color: white">X</button>
                                    </div>
                                </div>
                                <div class="modal-body" style="text-align: center">
                                    <img src="{{ asset('/img/personas/'.$autoridades->foto)}}" alt="Responsive"
                                        style="border-radius: 20px" width="200px" height="200px">
                                    <br><br>
                                    <table style="text-align: left;margin-left: 15px">
                                        <tr>
                                            <td style="width: 200px"><b>DNI:</b></td>
                                            <td>{{$autoridades->dni}}</td>
                                            <hr>
                                        </tr>
                                        <tr>
                                            <td><b>NOMBRES:</b></td>
                                            <td>{{$autoridades->nombres.' '. $autoridades->apellidos}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>GENERO:</b></td>
                                            @if ($autoridades->genero==1)
                                            <td>MASCULINO</td>
                                            @else
                                            <td>FEMENINO</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td><b>GRADO ACADEMICOS:</b></td>
                                            <td>{{$autoridades->grado}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>CARGO:</b></td>
                                            <td>{{$autoridades->cargo}}</td>
                                        </tr>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection