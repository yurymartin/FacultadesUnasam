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
            <div class="col-md-3" style="padding-top: 80px">
                <div class="card" style="width: 25rem;">
                    <div class="card-header text-center">
                        <strong></strong>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background-color: royalblue;color: white">
                            <strong>AUTORIDADES</strong></li>
                        <li class="list-group-item"><a href="decano"><strong>DECANO</strong></a></li>
                        <li class="list-group-item"><a href="directoresacademicos"><strong>DIRECTORES DE ESCUELAS</strong></a></li>
                        <li class="list-group-item"><a href="consejo"><strong>CONSEJO DE FACULTAD</strong></a></li>
                        <li class="list-group-item"><a href="departacademico"><strong>DEPARTAMENTOS
                                    ACADEMICOS</strong></a></li>
                        <br>
                        <li class="list-group-item"><a href="organigrama"><strong>ORGANIGRAMA</strong></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget-main-title">
                    @foreach ($decanos as $deca)
                    <h4 class="widget-title" style="text-align: left;font-size: 16px;"><strong>{{$deca->cargo}}</strong>
                    </h4>
                    @endforeach
                </div>
                <div class="widget-main-title">
                    @foreach ($decanos as $deca)
                    <p style="text-align: justify;font-family: 'Times New Roman', Times, serif;font-size: 16px">
                        {{$de->descripcion}}</p>
                    @endforeach

                </div>
                <br><br>
                <div class="text-center">
                    @foreach ($decanos as $deca)
                    <a href="{{ asset('/img/personas/'.$deca->foto)}}" class="fancybox" rel="gallery1"><img
                            src="{{ asset('/img/personas/'.$deca->foto)}}" alt="Responsive image"
                            class="img-thumbnail imagen2 imagen" style="  width:50%;
                            height:50%;"></a>
                    <hr width="50px">
                    <p class="widget-title" style="text-align: center">
                        {{$deca->abreviatura.' '.$deca->nombres.' '.$deca->apellidos}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection