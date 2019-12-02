@extends('web/layout/layout')
@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-3" style="padding-top: 90px">
                <div class="card" style="width: 25rem;">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center" style="background-color: royalblue;color: white">
                            <strong>AUTORIDADES</strong></li>
                        <li class="list-group-item"><a href="decano"><strong>DECANO</strong></a></li>
                        <li class="list-group-item"><a href="consejo"><strong>CONSEJO DE FACULTAD</strong></a></li>
                        <li class="list-group-item"><a href="departacademico"><strong>DEPARTAMENTOS
                                    ACADEMICOS</strong></a></li>
                        <br>
                        <li class="list-group-item"><a href="organigrama"><strong>ORGANIGRAMA</strong></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="widget-main">
                    <div class="widget-main-title">
                        @foreach ($consejos as $consejo)
                        <h4 class="widget-title" style="text-align: left;font-size: 16px;">
                            <strong>{{$consejo->cargo}}</strong>
                        </h4>
                        @break
                        @endforeach
                    </div>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Odit fugiat aspernatur a, sequi ea
                        repellendus voluptatem iure magnam consectetur labore illo magni at eum suscipit temporibus
                        dolor iste aut tenetur!Totam eum incidunt porro! Labore omnis quos tenetur repellendus
                        similique consequuntur repudiandae, rerum nesciunt, temporibus quae reprehenderit dolorem
                        neque provident voluptatem laborum saepe? Voluptatum, doloremque sint id repellat qui
                        incidunt!</p>
                    <div class="widget-inner">
                        @foreach ($consejos as $consejo)
                        <div class="prof-list-item clearfix">
                            <div class="prof-thumb">
                                <a href="{{ asset('/img/personas/'.$consejo->foto)}}" class="fancybox"
                                    rel="gallery1"><img src="{{ asset('/img/personas/'.$consejo->foto)}}"
                                        alt="{{$consejo->nombres.' '.$consejo->apellidos}}"></a>
                            </div> <!-- /.prof-thumb -->
                            <div class="prof-details">
                                <h5 class="prof-name-list">{{$consejo->nombres.' '.$consejo->apellidos}}</h5>
                                <p class="small-text"><strong>CARGO: </strong>{{$consejo->cargo}}</p>
                            </div> <!-- /.prof-details -->
                        </div> <!-- /.prof-list-item -->
                        @endforeach
                    </div> <!-- /.widget-inner -->
                </div> <!-- /.widget-main -->
            </div>
        </div>
    </div>
</div>
@endsection