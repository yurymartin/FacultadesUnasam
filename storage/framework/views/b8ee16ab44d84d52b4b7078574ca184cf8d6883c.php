<!-- begin The Footer -->
<footer class="site-footer footer" id="footer" style="background: <?php echo e($estilos->fondofooter); ?>">
    <div class="container">
        <div class="row">
            <div class="col-md-3" id="col1">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: <?php echo e($estilos->textofooter); ?>">Contáctenos</h4>
                    <ul class="list-links" style="color: <?php echo e($estilos->textofooter); ?>">
                        <li><a href="#" style="color: <?php echo e($estilos->textofooter); ?>"><?php echo e($facultad->direccion); ?></a></li>
                        <li><a href="#" style="color: <?php echo e($estilos->textofooter); ?>">Central Telefónica:
                                <?php echo e($facultad->telefono); ?></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col2">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: <?php echo e($estilos->textofooter); ?>">Nosotros</h4>
                    <ul class="list-links" style="color: <?php echo e($estilos->textofooter); ?>">
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/misionvision"
                                style="color: <?php echo e($estilos->textofooter); ?>">Misión y Visión</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/historia"
                                style="color: <?php echo e($estilos->textofooter); ?>">Reseña Histórico</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/organigrama"
                                style="color: <?php echo e($estilos->textofooter); ?>">Organigrama</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col3">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: <?php echo e($estilos->textofooter); ?>">Infórmate</h4>
                    <ul class="list-links" style="color: <?php echo e($estilos->textofooter); ?>">
                        <li><a href="http://sga.unasam.edu.pe/login" style="color: <?php echo e($estilos->textofooter); ?>">Sistema de
                                Gestión Académica</a></li>
                        <li><a href="http://koha.unasam.edu.pe/" style="color: <?php echo e($estilos->textofooter); ?>">Biblioteca</a>
                        </li>
                        <li><a href="http://investiga.unasam.edu.pe/Convenio?type=Universidades"
                                style="color: <?php echo e($estilos->textofooter); ?>">Convenios</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2" id="col4">
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: <?php echo e($estilos->textofooter); ?>">Otros</h4>
                    <ul class="list-links" style="color: <?php echo e($estilos->textofooter); ?>">
                        <li><a href="http://cid.unasam.edu.pe/" style="color: <?php echo e($estilos->textofooter); ?>">Centro de
                                Idiomas</a></li>
                        <li><a href="http://cpu.unasam.edu.pe/inicio/" style="color: <?php echo e($estilos->textofooter); ?>">CPU
                                UNASAM</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3">
                <div class="footer-widget">
                    <ul class="footer-media-icons">
                        <?php if($redesfacultades != null): ?>
                        <?php if($redesfacultades->facebook != 'null'): ?>
                        <li id="top"><a href="<?php echo e($redesfacultades->facebook); ?>" class="fa fa-facebook fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->google != 'null'): ?>
                        <li id="top"><a href="<?php echo e($redesfacultades->google); ?>" class="fa fa-google-plus fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->youtube != 'null'): ?>
                        <li id="bottom"><a href="<?php echo e($redesfacultades->youtube); ?>" class="fa fa-youtube fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->twitter != 'null'): ?>
                        <li id="bottom"><a href="<?php echo e($redesfacultades->twitter); ?>" class="fa fa-twitter fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->instagram != 'null'): ?>
                        <li id="bottom"><a href="<?php echo e($redesfacultades->instagram); ?>" class="fa fa-instagram fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->linkedln != 'null'): ?>
                        <li id="top"><a href="<?php echo e($redesfacultades->linkedln); ?>" class="fa fa-linkedin-square fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php if($redesfacultades->pinterest != 'null'): ?>
                        <li id="bottom"><a href="<?php echo e($redesfacultades->pinterest); ?>" class="fa fa-pinterest fa-2x" style="background-color: #000;border-radius: 5px"></a></li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div> <!-- /.row -->

        <div class="bottom-footer">
            <div class="row">
                <div class="col-md-6">
                    
                    <p class="small-text" style="color: <?php echo e($estilos->textofooter); ?>">&copy; Copyright 2019.<a
                            href="http://ogtise.unasam.edu.pe/" style="color: <?php echo e($estilos->textofooter); ?>"> OGTISE</a>.
                        Developed by: <a href="https://www.facebook.com/yurizito.martin"
                            style="color: <?php echo e($estilos->textofooter); ?>">Martin Chauca Yury</a> && <a
                            href="https://www.facebook.com/Dayvid.PQ.9" style="color: <?php echo e($estilos->textofooter); ?>">Pachas
                            Quenua Dayvid </a>.</p>
                    
                </div> <!-- /.col-md-5 -->
                <div class="col-md-6">
                    <ul class="footer-nav">
                        <li><a href="#" style="color: <?php echo e($estilos->textofooter); ?>">Inicio</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/noticiasf"
                                style="color: <?php echo e($estilos->textofooter); ?>">Noticias</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/eventosf"
                                style="color: <?php echo e($estilos->textofooter); ?>">Eventos</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/documentosf"
                                style="color: <?php echo e($estilos->textofooter); ?>">Documentos</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/galeriaf"
                                style="color: <?php echo e($estilos->textofooter); ?>">Imagenes</a></li>
                        <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/videosf"
                                style="color: <?php echo e($estilos->textofooter); ?>">Videos</a></li>
                    </ul>
                </div> <!-- /.col-md-7 -->
            </div> <!-- /.row -->
        </div> <!-- /.bottom-footer -->
    </div> <!-- /.container -->
</footer> <!-- /.site-footer --><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/web/layout/footer.blade.php ENDPATH**/ ?>