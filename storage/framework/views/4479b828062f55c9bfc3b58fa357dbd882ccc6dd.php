<div class="container">
    <div class="row">

        <div id="contacto" class="container-fluid">
            <section class="row" style="background: #F2F2F2;">
                <div class="col-md-12">
                    <h1 class="titsec1" style="color: #084B8A;padding-top: 0px;padding-bottom: 0px;">Buzón
                        Santiaguino</h1>
                </div>
                <div class="container">
                    <div class="col-md-12">
                        <p style="color: #000;margin-bottom: 30px;">
                            Bienvenidos a la página web de la Universidad Nacional Santiago Antúnez de Mayolo
                            (Unasam). Con el ánimo de prestar el mejor servicio público,
                            la institución quiere establecer vías de comunicación eficaces entre los servicios
                            universitarios y las personas usuarias, a la vez
                            obtener las sugerencias formuladas por la ciudadanía sobre materias de competencia
                            universitaria y sobre el funcionamiento de los servicios de la
                            Unasam con el fin de que esta institución supervise su propia actividad y lleve a cabo
                            acciones de mejora.
                        </p>
                    </div>

                    <div class="col-md-12">
                        <form action="<?php echo e(route('mail.store')); ?>" method="post">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="idToken">
                            <div class="col-xs-12 col-md-4">
                                <div class="col-md-12">
                                    <input class="form-control contact" type="text" id="txtnombres" name="txtnombres"
                                        placeholder="Nombre / Seudónimo" value="">
                                </div>
                                <div class="espaciop col-md-12"></div>
                                <div class="col-md-12">
                                    <input class="form-control contact" type="text" id="txtemail" name="txtemail"
                                        placeholder="E-mail" value="">
                                </div>
                                <div class="espaciop col-md-12"></div>
                                <div class="col-md-12">
                                    <input class="form-control contact" type="text" id="txtasunto" name="txtasunto"
                                        placeholder="Asunto" value="">
                                </div>
                                <div class="espaciop col-md-12"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="col-md-12">
                                    <textarea class="form-control" id="txtmensaje" rows="8" cols="40" name="txtmensaje" 
                                        placeholder="Mensaje"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="col-md-12" type="submit">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div style="border-color:#084B8A;;border-top-width: 5px;border-top-style: solid;"></div>
            </section>
        </div>

    </div>
</div><?php /**PATH D:\Roger\Aplicaciones\webUNASAM2019\resources\views/web/contacto.blade.php ENDPATH**/ ?>