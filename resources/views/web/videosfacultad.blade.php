@extends('web/layout/layout')
@section('contenido')
<style>
    img:hover {
        transform: scale(1.07);
        transition: .5s;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title" style="text-align: center">
                    <h1><strong>VIDEOS DE LA FACULTAD</strong></h1>
                </div> <!-- /.widget-main-title -->
                <p></p>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach ($videofacultades as $videofacultad)
            <div class="col-md-6">
                @php
                echo $videofacultad->link;
                @endphp
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection