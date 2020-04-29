<!-- This one in here is responsive menu for tablet and mobiles -->
<style>
    * {
        margin: 0px;
        padding: 0px;
    }

    #sidebar {
        position: fixed;
        width: 175px;
        background: rgb(213, 216, 220);
        left: 100%;
        transition: all 500ms linear;
        margin-top: 20px;
        border: solid 1px black;
        color: #000;
    }

    #sidebar.active {
        left: 88%;
    }

    #sidebar ul li {
        list-style: none;
        padding: 15px 10px;
        border-bottom: 1px solid rgba(100, 100, 100, );
        text-align: center;
    }

    .logo {
        border-radius: 50%;
        display: block;
        margin: 0 auto;
    }

    #sidebar .toggle-btn {
        position: absolute;
        left: 230px;
        top: 20px;
        cursor: pointer;
    }

    #sidebar .toggle-btn span {
        display: block;
        width: 40px;
        text-align: center;
        font-size: 30px;
        border: 3px solid #000;
    }
</style>
<div class="responsive-navigation visible-sm visible-xs">
    <a href="#" class="menu-toggle-btn">
        <i class="fa fa-bars"></i>
    </a>
    <div class="responsive_menu">
        <ul class="main_menu" style="background-color: <?php echo e($estilos->fondonavbar); ?>">
            <li class="active"><a href="/facultadweb/<?php echo e($facultad->id); ?>"
                    style="color: <?php echo e($estilos->textonavbar); ?>">Inicio</a></li>
            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Nosotros</a>
                <ul class="sub-menu" style="width: 200px">
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Nuestra Facultad</a>
                        <ul class="sub-menu">
                            <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/misionvision"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Misión y
                                    Visión</a></li>
                            <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/historia"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Historia</a></li>
                            <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/filosofia"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Filosofia Institucional</a></li>
                        </ul>
                    </li>
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Autoridades</a>
                        <ul class="sub-menu" style="width: 410px">
                            <?php $__currentLoopData = $cargosAutoridades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargosAutoridad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($cargosAutoridades != null): ?>
                            <li style="margin-left: 25px"><a
                                    href="/facultadweb/<?php echo e($facultad->id); ?>/autoridadesF/<?php echo e($cargosAutoridad->id); ?>"
                                    name='idescuela'
                                    style="color: <?php echo e($estilos->textonavbar); ?>"><?php echo e($cargosAutoridad->cargo); ?></a>
                            </li>
                            <?php else: ?>
                            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Falta Registrar los
                                    Datos</a></li>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/organigrama"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Organigrama</a></li>
                </ul>
            </li>
            <li><a href="#">Carreras Profesionales</a>
                <ul class="sub-menu" style="width: 235px">
                    <?php if($escuelas != null): ?>
                    <?php $__currentLoopData = $escuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/escuelaweb/<?php echo e($escuela->id); ?>"
                            name='idescuela' style="color: <?php echo e($estilos->textonavbar); ?>"><?php echo e($escuela->nombre); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                    <li></li>
                    <?php endif; ?>
                </ul>
            </li>
            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Repositorio de la Facultad</a>
                <ul class="sub-menu" style="width: 245px">
                    <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/publicacionesweb"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Publicaciones</a>
                    </li>
                    <li style="margin-left: 25px"><a href="http://repositorio.unasam.edu.pe/"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Repositorio
                            UNASAM</a></li>
                    <li style="margin-left: 25px"><a href="http://koha.unasam.edu.pe/"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Sistema de
                            bibliotecas KOHA</a></li>
                </ul>
            </li>
            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Docentes</a>
                <ul class="sub-menu">
                    <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/docentesweb"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Plana Docente</a></li>
                </ul>
            </li>
            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Alumnos</a>
                <ul class="sub-menu">
                    <li style="margin-left: 25px"><a href="/facultadweb/<?php echo e($facultad->id); ?>/comestudiantil"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Comisiones
                            Estudiantiles</a></li>
                </ul>
            </li>
            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/contacto"
                    style="color: <?php echo e($estilos->textonavbar); ?>">Contactenos</a></li>
        </ul>
        </li>
        </ul> <!-- /.main_menu -->
    </div> <!-- /.responsive_menu -->
</div> <!-- /responsive_navigation -->

<header class="site-header header" id="header" style="background: <?php echo e($estilos->fondoheader); ?>">
    <?php echo Form::open(array('url' => 'estilos/edit/' . $estilos->id, 'method' => 'GET')); ?>

    <?php echo csrf_field(); ?>
    <div id="sidebar">
        <ul>
            <li>
                <p style="background: red;padding-bottom: 5px;padding-top: 5px;border-radius: 5px;color: white">
                    HEADER</p>
                <div class="form-group">
                    <label for="fondoheader">Fondo Header:</label>
                    <input type="color" id="fondoheader" name="fondoheader" class="form-control"
                        value="<?php echo e($estilos->fondoheader); ?>">
                    <input type="hidden" id="codigofondoheader" name="codigofondoheader" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->fondoheader); ?>">
                </div>
                <div class="form-group">
                    <label for="fondoheader">Texto Header:</label>
                    <input type="color" id="textoheader" class="form-control" value="<?php echo e($estilos->textoheader); ?>">
                    <input type="hidden" id="codigotextoheader" name="codigotextoheader" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->textoheader); ?>">
                </div>
            </li>
            <li>
                <p style="background: red;padding-bottom: 5px;padding-top: 5px;border-radius: 5px;color: white">
                    FOOTER</p>
                <div class="form-group">
                    <label for="fondofooter">Fondo Footer:</label>
                    <input type="color" id="fondofooter" width="" class="form-control"
                        value="<?php echo e($estilos->fondofooter); ?>">
                    <input type="hidden" id="codigofondofooter" name="codigofondofooter" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->fondofooter); ?>">
                </div>
                <div class="form-group">
                    <label for="fondoheader">Texto Footer:</label>
                    <input type="color" id="textofooter" class="form-control" value="<?php echo e($estilos->textofooter); ?>">
                    <input type="hidden" id="codigotextofooter" name="codigotextofooter" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->textofooter); ?>">
                </div>
            </li>
            <li>
                <p style="background: red;padding-bottom: 5px;padding-top: 5px;border-radius: 5px;color: white">
                    NAVBAR</p>
                <div class="form-group">
                    <label for="fondofooter">Fondo Navbar:</label>
                    <input type="color" id="fondonavbar" width="" class="form-control"
                        value="<?php echo e($estilos->fondonavbar); ?>">
                    <input type="hidden" id="codigofondonavbar" name="codigofondonavbar" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->fondonavbar); ?>">
                </div>
                <div class="form-group">
                    <label for="fondoheader">Texto Navbar:</label>
                    <input type="color" id="textonavbar" class="form-control" value="<?php echo e($estilos->textonavbar); ?>">
                    <input type="hidden" id="codigotextonavbar" name="codigotextonavbar" class="form-control"
                        style="margin-top: 5px" value="<?php echo e($estilos->textonavbar); ?>">
                </div>
            </li>
            <li>
                <div class="text-center">
                    <button type="submit" class="btn btn-success" title="aplicar estilos"><i
                            class="fa fa-check-square"></i></button>
                    <button type="reset" class="btn btn-danger" title="cancelar" id="btncerrar"><i
                            class="fa fa-times-circle"></i></button>
                    <!--button type="reset" class="btn btn-primary" title="aplicar estilos por defecto"><i class="fa fa-repeat"></i></button-->

                </div>
            </li>
        </ul>
    </div>
    <?php echo Form::close(); ?>

    <div class="container">
        <div class="row" style="padding-top: 0px;padding-bottom: 0px;color: <?php echo e($estilos->textoheader); ?>">
            <div class="col-md-4 header-left" id="header-left">
                <p><i class="fa fa-phone"></i>Central Telefónica: <?php echo e($facultad->telefono); ?></p>
                <p><i class="fa fa-envelope"></i><a href="<?php echo e($facultad->email); ?>"
                        style="color: <?php echo e($estilos->textoheader); ?>"><?php echo e($facultad->email); ?></a></p>
                <p>
                    <?php if($redesfacultades != null): ?>
                    <?php if($redesfacultades->facebook != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->facebook); ?>" data-toggle="tooltip" title="Facebook"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-facebook"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->google != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->google); ?>" data-toggle="tooltip" title="Google+"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-google-plus"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->youtube != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->youtube); ?>" data-toggle="tooltip" title="Youtube"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-youtube-play"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->twitter != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->twitter); ?>" data-toggle="tooltip" title="Twitter"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-twitter"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->instagram != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->instagram); ?>" data-toggle="tooltip" title="Instagram"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-instagram"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->linkedln != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->linkedln); ?>" data-toggle="tooltip" title="Linkedln"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-linkedin-square"></i></a>
                    <?php endif; ?>
                    <?php if($redesfacultades->pinterest != 'null'): ?>
                    <a href="<?php echo e($redesfacultades->pinterest); ?>" data-toggle="tooltip" title="Pinterest"
                        style="padding: 7px 3px 7px 10px;border-radius: 3px;background: #000"><i
                            class="fa fa-pinterest"></i></a>
                    <?php endif; ?>
                    <?php endif; ?>
                </p>
            </div> <!-- /.header-left -->
            <div class="col-md-4" id="logo">
                <div class="logo" style="text-align: center">
                    <a href="/" title="<?php echo e($facultad->nombre); ?>" rel="home">
                        <?php if($logos != null): ?>
                        <!--strong style="padding-top: 10px"><?php echo e($facultad->nombre); ?></strong></p-->
                        <img src="<?php echo e(asset('/img/descripcionFacultades/'.$logos->imagen)); ?>"
                            alt="<?php echo e(asset('/img/descripcionFacultades/'.$logos->imagen)); ?>"
                            style="max-height: 90px;border-radius:10px;margin-top: 10px">
                        <p
                            style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;color: <?php echo e($estilos->textoheader); ?>">
                            <?php else: ?>
                            <img src="" alt="FALTA IMAGEN DE LA FACUTLAD" style="max-height: 100px;margin-top: 15px">
                            <?php endif; ?>
                    </a>
                </div> <!-- /.logo -->
            </div> <!-- /.col-md-4 -->
            <div class="col-md-4 header-right" id="header-right">
                <ul class="small-links">
                    <li><a href="http://sga.unasam.edu.pe/login" style="color: <?php echo e($estilos->textoheader); ?>"
                            target="_blank"><i class="fa fa-laptop"></i> SGA UNASAM</a></li>
                    <li><a href="https://www.unasam.edu.pe" style="color: <?php echo e($estilos->textoheader); ?>" target="_blank"><i
                                class="fa fa-tablet"></i> UNASAM</a>
                    </li>
                    <?php if(Auth::guest()): ?>
                    <li><a href="/home" style="color: <?php echo e($estilos->textoheader); ?>"><i class="fa fa-gear"></i> Acceso</a>
                    </li>
                    <?php else: ?>
                    <li>
                        <a href="/home" class="label label-danger"
                            title="Regresar al AdminPanelF"><?php echo e(Auth::user()->name); ?></a>
                        
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update estilos', Model::class)): ?>
                        <a href="#" class="label label-danger toggle-btn"><i class="fa fa-gears"></i></a>
                        <?php endif; ?>
                        
                    </li>
                    <?php endif; ?>
                </ul>
                <div>
                    <a href="https://www.unasam.edu.pe"><img src="/images/logolicenciada.png" alt="UNASAM"
                            style="width:58%"></a>
                </div>
            </div> <!-- /.header-right -->
        </div>
    </div> <!-- /.container -->
    <div class="nav-bar-main" role="navigation" style="text-transform: uppercase;">
        <div class="container">
            <nav class="main-navigation clearfix visible-md visible-lg navbar" role="navigation" id="navbar"
                style="background: <?php echo e($estilos->fondonavbar); ?>">
                <ul class="main-menu sf-menu">

                    <li><a href="/" style="color: <?php echo e($estilos->textonavbar); ?>"><i class="fa fa-home fa-1x"></i></a></li>

                    <li class="active"><a href="/facultadweb/<?php echo e($facultad->id); ?>"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Inicio</a></li>
                    <li style="width: 146px;"><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Nosotros</a>
                        <ul class="sub-menu" style="width: 200px">
                            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Nuestra Facultad</a>
                                <ul class="sub-menu" style="width: 200px">
                                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/misionvision"
                                            style="color: <?php echo e($estilos->textonavbar); ?>">Misión y
                                            Visión</a></li>
                                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/historia"
                                            style="color: <?php echo e($estilos->textonavbar); ?>">Historia</a></li>
                                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/filosofia"
                                            style="color: <?php echo e($estilos->textonavbar); ?>">Filosofia Institucional</a></li>
                                </ul>
                            </li>
                            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Autoridades</a>
                                <ul class="sub-menu" style="width: 410px">
                                    <?php $__currentLoopData = $cargosAutoridades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cargosAutoridad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($cargosAutoridades != null): ?>
                                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/autoridadesF/<?php echo e($cargosAutoridad->id); ?>"
                                            name='idescuela'
                                            style="color: <?php echo e($estilos->textonavbar); ?>"><?php echo e($cargosAutoridad->cargo); ?></a>
                                    </li>
                                    <?php else: ?>
                                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Falta Registrar los
                                            Datos</a></li>
                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/organigrama"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Organigrama</a></li>
                        </ul>
                    </li>
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Carreras Profesionales</a>
                        <ul class="sub-menu" style="width: 400px">
                            <?php if($escuelas != null): ?>
                            <?php $__currentLoopData = $escuelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $escuela): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/escuelaweb/<?php echo e($escuela->id); ?>" name='idescuela'
                                    style="color: <?php echo e($estilos->textonavbar); ?>"><?php echo e($escuela->nombre); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                            <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Falta Registrar los Datos</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Repositorio de la Facultad</a>
                        <ul class="sub-menu" style="width: 245px">
                            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/publicacionesweb"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Publicaciones</a>
                            </li>
                            <li><a href="http://repositorio.unasam.edu.pe/"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Repositorio UNASAM</a></li>
                            <li><a href="http://koha.unasam.edu.pe/" style="color: <?php echo e($estilos->textonavbar); ?>">Sistema de
                                    bibliotecas KOHA</a></li>
                        </ul>
                    </li>
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Docentes</a>
                        <ul class="sub-menu">
                            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/docentesweb"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Plana Docente</a></li>
                        </ul>
                    </li>
                    <li><a href="#" style="color: <?php echo e($estilos->textonavbar); ?>">Alumnos</a>
                        <ul class="sub-menu">
                            <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/comestudiantil"
                                    style="color: <?php echo e($estilos->textonavbar); ?>">Comisiones
                                    Estudiantiles</a></li>
                        </ul>
                    </li>
                    <li><a href="/facultadweb/<?php echo e($facultad->id); ?>/contacto"
                            style="color: <?php echo e($estilos->textonavbar); ?>">Contactenos</a></li>
                </ul> <!-- /.main-menu -->
            </nav> <!-- /.main-navigation -->
        </div> <!-- /.container -->
    </div> <!-- /.nav-bar-main -->
</header> <!-- /.site-header --><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/web/layout/header.blade.php ENDPATH**/ ?>