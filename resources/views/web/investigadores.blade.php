@extends('web/layout/layout')
@section('contenido')
<style>
    .imagen:hover {
        -webkit-transform: scale(1.3);
        transform: scale(0.97);
        transition: .5s;
        border: 2px solid yellow;
        ;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="widget-main" id="autoridades">
                <div class="widget-main-title">
                    <h1 style="font-family: 'Times New Roman', Times, serif"><strong>DOCENTES INVESTIGADORES</strong>
                    </h1>
                    <p style="text-align: justify;font-size: 16px;font-family: 'Times New Roman', Times, serif">Lorem
                        ipsum dolor, sit amet consectetur adipisicing elit. Repudiandae blanditiis deleniti, magni
                        officia quo ea eius. Assumenda corporis iusto exercitationem, iste, laboriosam laudantium et
                        voluptatibus a iure maiores quis doloribus.Voluptate facilis rerum expedita! Repellendus, culpa
                        beatae accusantium ipsam cumque tempora iste cum deserunt earum sint laboriosam eum perspiciatis
                        libero labore unde necessitatibus est asperiores harum nobis sapiente mollitia voluptates?</p>
                </div>
                <div class="widget-inner">
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <img src="images/prof/prof1.jpg" alt="Profesor Name">
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                            <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                            <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                        </div> <!-- /.prof-details -->
                        <br>
                        <h5><strong>INVESTIGACIONES</strong></h5>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>

                    </div> <!-- /.prof-list-item -->
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <img src="images/prof/prof2.jpg" alt="Profesor Name">
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">Prof. Victor Johns</h5>
                            <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                            <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                        </div> <!-- /.prof-details -->
                        <br>
                        <h5><strong>INVESTIGACIONES</strong></h5>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                    </div> <!-- /.prof-list-item -->
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <img src="images/prof/prof3.jpg" alt="Profesor Name">
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">Prof. Charles Conway</h5>
                            <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                            <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                        </div> <!-- /.prof-details -->
                        <br>
                        <h5><strong>INVESTIGACIONES</strong></h5>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                    </div> <!-- /.prof-list-item -->
                    <div class="prof-list-item clearfix">
                        <div class="prof-thumb">
                            <img src="images/prof/prof1.jpg" alt="Profesor Name">
                        </div> <!-- /.prof-thumb -->
                        <div class="prof-details">
                            <h5 class="prof-name-list">Prof. Betty Hunt</h5>
                            <p class="small-text"><strong>Cargo:</strong>Asesor</p>
                            <p class="small-text"><strong>Escuela:</strong>Ciencias de la Comunicación</p>
                        </div> <!-- /.prof-details -->
                        <br>
                        <h5><strong>INVESTIGACIONES</strong></h5>
                        <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                style="width: 80px;height: 100px" class="imagen"></a>
                    </div> <!-- /.prof-list-item -->
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div>
    </div>
</div>
@endsection