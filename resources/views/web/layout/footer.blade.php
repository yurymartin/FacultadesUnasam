<!-- begin The Footer -->
<footer class="site-footer footer" id="footer" style="background: {{$estilos->fondofooter}}">
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="col1">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: {{$estilos->textofooter}}">Contáctenos</h4>
                    <ul class="list-links" style="color: {{$estilos->textofooter}}">
                        <li><a href="#" style="color: {{$estilos->textofooter}}">{{$facultad->direccion}}</a></li>
                        <li><a href="#" style="color: {{$estilos->textofooter}}">Central Telefónica:
                                {{$facultad->telefono}}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col2">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: {{$estilos->textofooter}}">Nosotros</h4>
                    <ul class="list-links" style="color: {{$estilos->textofooter}}">
                        <li><a href="/facultadweb/{{$facultad->id}}/misionvision"
                                style="color: {{$estilos->textofooter}}">Misión y Visión</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/historia"
                                style="color: {{$estilos->textofooter}}">Reseña Histórico</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/organigrama"
                                style="color: {{$estilos->textofooter}}">Organigrama</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col3">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: {{$estilos->textofooter}}">Infórmate</h4>
                    <ul class="list-links" style="color: {{$estilos->textofooter}}">
                        <li><a href="http://sga.unasam.edu.pe/login" style="color: {{$estilos->textofooter}}">Sistema de
                                Gestión Académica</a></li>
                        <li><a href="http://koha.unasam.edu.pe/" style="color: {{$estilos->textofooter}}">Biblioteca</a>
                        </li>
                        <li><a href="http://investiga.unasam.edu.pe/Convenio?type=Universidades"
                                style="color: {{$estilos->textofooter}}">Convenios</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col4">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: {{$estilos->textofooter}}">Otros</h4>
                    <ul class="list-links" style="color: {{$estilos->textofooter}}">
                        <li><a href="http://cid.unasam.edu.pe/" style="color: {{$estilos->textofooter}}">Centro de
                                Idiomas</a></li>
                        <li><a href="http://cpu.unasam.edu.pe/inicio/" style="color: {{$estilos->textofooter}}">CPU
                                UNASAM</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <ul class="footer-media-icons">
                        @if ($redesfacultades != null)
                        @if ($redesfacultades->facebook != 'null')
                        <li id="top"><a href="{{$redesfacultades->facebook}}" class="fa fa-facebook fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->google != 'null')
                        <li id="top"><a href="{{$redesfacultades->google}}" class="fa fa-google-plus fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->youtube != 'null')
                        <li id="bottom"><a href="{{$redesfacultades->youtube}}" class="fa fa-youtube fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->twitter != 'null')
                        <li id="bottom"><a href="{{$redesfacultades->twitter}}" class="fa fa-twitter fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->instagram != 'null')
                        <li id="bottom"><a href="{{$redesfacultades->instagram}}" class="fa fa-instagram fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->linkedln != 'null')
                        <li id="top"><a href="{{$redesfacultades->linkedln}}" class="fa fa-linkedin-square fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @if ($redesfacultades->pinterest != 'null')
                        <li id="bottom"><a href="{{$redesfacultades->pinterest}}" class="fa fa-pinterest fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        @endif
                        @endif
                    </ul>
                </div>
            </div>
        </div> <!-- /.row -->

        <div class="bottom-footer">
            <div class="row">
                <div class="col-md-6">
                    
                    <p class="small-text" style="color: {{$estilos->textofooter}}">&copy; Copyright 2019.<a
                            href="http://ogtise.unasam.edu.pe/" style="color: {{$estilos->textofooter}}"> OGTISE</a>.
                        Developed by: <a href="https://www.facebook.com/yurizito.martin"
                            style="color: {{$estilos->textofooter}}">Martin Chauca Yury</a> && <a
                            href="https://www.facebook.com/Dayvid.PQ.9" style="color: {{$estilos->textofooter}}">Pachas
                            Quenua Dayvid </a>.</p>
                    
                </div> <!-- /.col-md-5 -->
                <div class="col-md-6">
                    <ul class="footer-nav">
                        <li><a href="#" style="color: {{$estilos->textofooter}}">Inicio</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/noticiasf"
                                style="color: {{$estilos->textofooter}}">Noticias</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/eventosf"
                                style="color: {{$estilos->textofooter}}">Eventos</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/documentosf"
                                style="color: {{$estilos->textofooter}}">Documentos</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/galeriaf"
                                style="color: {{$estilos->textofooter}}">Imagenes</a></li>
                        <li><a href="/facultadweb/{{$facultad->id}}/videosf"
                                style="color: {{$estilos->textofooter}}">Videos</a></li>
                    </ul>
                </div> <!-- /.col-md-7 -->
            </div> <!-- /.row -->
        </div> <!-- /.bottom-footer -->
    </div> <!-- /.container -->
</footer> <!-- /.site-footer -->