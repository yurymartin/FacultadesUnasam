<?php $__env->startSection('contenido'); ?>
<div class="container">
    <!-- Page Heading/Breadcrumbs -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contáctanos<h1>

        </div>
    </div>
    <!-- /.row -->

    <!-- Content Row -->
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-6">
                    <h3>Enviar un Mensaje</h3>
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Apellidos y Nombres:</label>
                                <input type="text" class="form-control" id="name" required
                                    data-validation-required-message="Por favor ingrese su nombre.">
                                <p class="help-block"></p>
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Numero de Celular:</label>
                                <input type="tel" class="form-control" id="phone" required
                                    data-validation-required-message="Por favor ingrese su n&uacute;mero de celular.">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Correo Electronico:</label>
                                <input type="email" class="form-control" id="email" required
                                    data-validation-required-message="Por favor ingrese su correo electr&oacute;nico">
                            </div>
                        </div>
                        <div class="control-group form-group">
                            <div class="controls">
                                <label>Mensaje:</label>
                                <textarea rows="10" cols="100" class="form-control" id="message" required
                                    data-validation-required-message="Por favor ingrese su mensaje" maxlength="999"
                                    style="resize:none"></textarea>
                            </div>
                        </div>
                        <div id="success"></div>
                        <!-- For success/fail messages -->
                        <button id="enviar_msg" class="btn btn-primary btn-block">Enviar Mensaje</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <!-- Embedded Google Map -->
                    <iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3934.8561138943655!2d-77.530925185653!3d-9.521228102652989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91a90d12eb234bf1%3A0xc860f66d7ad8abd9!2sUNIVERSIDAD%20NACIONAL%20SANTIAGO%20ANT%C3%9ANEZ%20DE%20MAYOLO!5e0!3m2!1ses!2spe!4v1572455805548!5m2!1ses!2spe"
                        width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                    <h3>Detalle de Contacto</h3>
                    <p>
                        Av. Universitaria<br>Shancayan<br>
                    </p>
                    <p><i class="fa fa-phone"></i>
                        <abbr title="Telefono"><strong>Teléfono: </strong></abbr>(043) 640020 Anexo: 3102</p>
                    <p><i class="fa fa-envelope-o"></i>
                        <abbr title="Correo Electronico"><strong>Correo: </strong></abbr>: <a
                            href="mailto:admepg2015@unasam.edu.pe">Fcsec.unasam@gmail.com</a>
                    </p>
                    <p><i class="fa fa-clock-o"></i>
                        <abbr title="Horario"><strong>Horario:</strong></abbr>Lunes – Viernes: 08:00 AM a 01:00 PM –
                        02:00 PM a 04:00 PM</p>
                    <ul class="list-unstyled list-inline list-social-icons">
                        <li>
                            <a href="https://www.facebook.com/pages/Escuela-De-Postgrado-Unasam/622620077867912"
                                target="_blank"><i class="fa fa-facebook-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://twitter.com/PostgradoUnasam" target="_blank"><i
                                    class="fa fa-twitter-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://plus.google.com/u/0/104801099476623072119/" target="_blank"><i
                                    class="fa fa-google-plus-square fa-2x"></i></a>
                        </li>
                        <li>
                            <a href="https://www.youtube.com/channel/UCCoeuyr3fZuLid2_KlHnGnQ" target="_blank"><i
                                    class="fa fa-youtube-square fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/web/contacto.blade.php ENDPATH**/ ?>