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
                                <option>Nombrados</option>
                                <option>Contratados</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="row text-center">
                        <div class="col-md-2">
                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail imagen imagen2"
                                width="200px" height="200px">
                            <p class="widget-title image" style="text-align: center">Simeón Moisés Huerta Rosales
                            </p>
                            <!-- MODAL -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                Ver Perfil...
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">PERFIL DEL DOCENTE</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail"
                                                width="150px" height="150px">
                                            <ul class="text-left">
                                                <ol><strong>DNI:</strong>12345678</ol>
                                                <ol><strong>Nombre:</strong>Simeón Moisés Huerta Rosales</ol>
                                                <ol><strong>Genero:</strong>Masculino</ol>
                                                <ol><strong>Carrera Profesional:</strong>ingeniero industrial</ol>
                                                <ol><strong>Grado Academico:</strong>Doctor</ol>
                                                <ol><strong>Categoria:</strong>Nombrado</ol>
                                                <ol><strong>Fecha Ingreso:</strong>12/12/2012</ol>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------->
                        </div>
                        <div class="col-md-2">
                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail imagen imagen2"
                                width="200px" height="200px">
                            <p class="widget-title img" style="text-align: center">Simeón Moisés Huerta</p>
                            <!-- MODAL -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#modal1">
                                Ver Perfil...
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal1" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">PERFIL DEL DOCENTE</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail"
                                                width="150px" height="150px">
                                            <ul class="text-left">
                                                <ol><strong>DNI:</strong>12345678</ol>
                                                <ol><strong>Nombre:</strong>Simeón Moisés Huerta</ol>
                                                <ol><strong>Genero:</strong>Masculino</ol>
                                                <ol><strong>Carrera Profesional:</strong>ingeniero industrial</ol>
                                                <ol><strong>Grado Academico:</strong>Doctor</ol>
                                                <ol><strong>Categoria:</strong>Nombrado</ol>
                                                <ol><strong>Fecha Ingreso:</strong>12/12/2012</ol>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------->
                        </div>
                        <div class="col-md-2">
                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail imagen imagen2"
                                width="200px" height="200px">
                            <p class="widget-title img" style="text-align: center">Simeón Moisés </p>
                            <!-- MODAL -->
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#modal2">
                                Ver Perfil...
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="modal2" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">PERFIL DEL DOCENTE</h5>
                                        </div>
                                        <div class="modal-body">
                                            <img src="images/narrito.jpg" alt="Responsive" class="img-thumbnail"
                                                width="150px" height="150px">
                                            <ul class="text-left">
                                                <ol><strong>DNI:</strong>12345678</ol>
                                                <ol><strong>Nombre:</strong>Simeón Moisés</ol>
                                                <ol><strong>Genero:</strong>Masculino</ol>
                                                <ol><strong>Carrera Profesional:</strong>ingeniero industrial</ol>
                                                <ol><strong>Grado Academico:</strong>Doctor</ol>
                                                <ol><strong>Categoria:</strong>Nombrado</ol>
                                                <ol><strong>Fecha Ingreso:</strong>12/12/2012</ol>
                                            </ul>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----------->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection