@extends('web/layout/layout')
@section('contenido')
<style>
    .imagen:hover {
        transform: scale(0.97);
        transition: .5s;
        border: 5px solid yellow;
    }
</style>
<div class="container">
    <div class="row">
        <!-- Show Latest Blog News -->
        <div class="col-md-12">
            <div class="widget-main" id="noticias">
                <div class="widget-main-title">
                    <h1><strong>REVISTAS PUBLICADAS DE LA FCSEC</strong></h1>
                    <p></p>
                    <p style="font-size: 16px;text-align: justify;font-family: 'Times New Roman', Times, serif">Lorem
                        ipsum dolor sit, amet consectetur adipisicing
                        elit. Odio magni inventore voluptas assumenda atque excepturi accusantium natus possimus
                        nesciunt vitae quo at, necessitatibus animi est molestias nobis ad reiciendis. Iure.Sunt
                        recusandae, provident sed obcaecati voluptate facere dignissimos voluptatibus possimus nostrum
                        aut minima iure voluptas harum reprehenderit, vel omnis ducimus sequi error amet dolorum
                        deleniti itaque quae! Voluptatem, eos sint.</p>
                </div> <!-- /.widget-main-title -->
                <p></p>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label style="font-size: 20px">TEMA:</label>
                                <select class="form-control form-control-lg">
                                    <option>Todos</option>
                                    <option>Educación</option>
                                    <option>Arqueologia</option>
                                    <option>Ciencias de Comunicación</option>
                                    <option>Idiomas Extranjeros</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-inner text-center">
                    <div class="blog-list-post clearfix">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="blog-list-title"><a href="blog-single.html">Revista de FCSEC</a></h5>
                                <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                        style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text">29 de septiembre 2019</p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Iusto fuga placeat eum a sed
                                    temporibus praesentium reiciendis architecto similique aliquam voluptatum et
                                    corporis dicta autem quam, eligendi ex tenetur debitis!</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="blog-list-title"><a href="blog-single.html">Revista de FCSEC</a></h5>
                                <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                        style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text">29 de septiembre 2019</p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Iusto fuga placeat eum a sed
                                    temporibus praesentium reiciendis architecto similique aliquam voluptatum et
                                    corporis dicta autem quam, eligendi ex tenetur debitis!</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="blog-list-title"><a href="blog-single.html">Revista de FCSEC</a></h5>
                                <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                        style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text">29 de septiembre 2019</p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Iusto fuga placeat eum a sed
                                    temporibus praesentium reiciendis architecto similique aliquam voluptatum et
                                    corporis dicta autem quam, eligendi ex tenetur debitis!</p>
                            </div>
                            <div class="col-md-4">
                                <h5 class="blog-list-title"><a href="blog-single.html">Revista de FCSEC</a></h5>
                                <a href="blog-single.html"><img src="images/portada.jpg" alt=""
                                        style="width: 200px;height: 300px" class="imagen"></a>
                                <p class="blog-list-meta small-text">29 de septiembre 2019</p>
                                <p style="font-size: 14px;font-family: 'Times New Roman', Times, serif">Lorem ipsum
                                    dolor sit amet, consectetur adipisicing elit. Iusto fuga placeat eum a sed
                                    temporibus praesentium reiciendis architecto similique aliquam voluptatum et
                                    corporis dicta autem quam, eligendi ex tenetur debitis!</p>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.widget-inner -->
            </div> <!-- /.widget-main -->
        </div> <!-- /col-md-6 -->
    </div>
</div>
@endsection