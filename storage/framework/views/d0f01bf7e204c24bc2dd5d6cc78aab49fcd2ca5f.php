<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

            <div class="no-print user-panel-unasam">
                    <div class="no-print image" style="text-align: center;">
                        <img src="<?php echo e(asset('/img/unasam.png')); ?>"  alt="User Image" style="margin-top: 15px;height: 120px;" />
                        <ul class="no-print sidebar-menu">
                        <li class="no-print stroke treeview" style="font-family: Monotype Corsiva;font-size: 21px;color: #f9c52c;margin-top: 5px;">"Una Nueva Universidad<br>Para el Desarrollo"</li>
                        </ul>
                    </div>
                </div>

                <hr style="border-top: 1px solid #4d4d4d;">

        <!-- Sidebar user panel (optional) -->
        <?php if(! Auth::guest()): ?>
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo e(Gravatar::get($user->email)); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip" title="<?php echo e(Auth::user()->name); ?>"><?php echo e(Auth::user()->name); ?></p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> <?php echo e(trans('adminlte_lang::message.online')); ?></a>
                </div>
            </div>
        <?php endif; ?>

            <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->

            
            <li v-bind:class="classMenu0"><a href="<?php echo e(url('home')); ?>"><i class='fa fa-home'></i> <span>Inicio</span></a></li>
          
            <?php if(accesoUser([1,2,3])): ?>
            <li class="treeview" v-bind:class="classMenu1">
                <a href="#"><i class='fa fa-list-alt'></i> <span>Contenido Web</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="banners"><i class='fa fa-gg'></i> Gestión de Banners</a></li>
                    <li><a href="agendarectorals"><i class='fa fa-gg'></i> Gestión de Agendas</a></li>
                    <li><a href="eventos"><i class='fa fa-gg'></i> Gestión de Eventos</a></li>
                    <li><a href="noticias"><i class='fa fa-gg'></i> Gestión de Noticias</a></li>
                    <li><a href="galerias"><i class='fa fa-gg'></i> Gestión de Galerias</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(accesoUser([1,2,3])): ?>
            <li class="treeview" v-bind:class="classMenu2">
                <a href="#"><i class='fa fa-youtube'></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li><a href="videofbs"><i class='fa fa-gg'></i> Gestión de Videos de FB</a></li>
                        <li><a href="videoyoutubes"><i class='fa fa-gg'></i> Gestión de Videos de Youtube</a></li>
                </ul>
            </li>
            <?php endif; ?>

            <?php if(accesoUser([1,2,3])): ?>
            <li class="treeview" v-bind:class="classMenu3">
                    <a href="#"><i class='fa fa-file-pdf-o'></i> <span>Documentos</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="instrumentos"><i class='fa fa-gg'></i> Gestión de Instrumentos</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(accesoUser([1,2,3])): ?>
            <li class="treeview" v-bind:class="classMenu4">
                    <a href="#"><i class='fa fa-file'></i> <span>Convocatorias</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="convocatorias"><i class='fa fa-gg'></i> Gestión de Convocatorias</a></li>
                    </ul>
                </li>
            <?php endif; ?>
            
            <?php if(accesoUser([1,2,3])): ?>
            <li class="treeview" v-bind:class="classMenu5">
                    <a href="#"><i class='fa fa-calendar'></i> <span>Calendarios</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="calendarios"><i class='fa fa-gg'></i> Gestión de Calendarios</a></li>
                    </ul>
                </li>
            <?php endif; ?>

            <?php if(accesoUser([1])): ?>
            <li class="treeview" v-bind:class="classMenu6">
                <a href="#"><i class='fa fa-cogs'></i> <span>Configuraciones</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                        <li><a href="usuarios"><i class='fa fa-gg'></i> Gestión de Usuarios</a></li>
                </ul>
            </li>
            <?php endif; ?>



            
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
<?php /**PATH C:\Users\Yuri Martin\Desktop\webFacultades\resources\views/vendor/adminlte/layouts/partials/sidebar.blade.php ENDPATH**/ ?>