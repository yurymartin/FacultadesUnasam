<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar" style="background: rgb(3, 33, 76)">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <div class="no-print user-panel-unasam">
            <div class="no-print image" style="text-align: center;">
                <img src="{{asset('/img/unasam.png')}}" alt="User Image" style="margin-top: 15px;height: 80px;">
                <ul class="no-print sidebar-menu">
                    <li class="no-print stroke treeview"
                        style="font-family: Monotype Corsiva;font-size: 21px;color: #f9c52c;margin-top: 5px;">"Una Nueva
                        Universidad<br>Para el Desarrollo"</li>
                </ul>
            </div>
        </div>

        <hr style="border-top: 1px solid #4d4d4d;">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('/img/masculino.png') }}" class="img-circle" alt="User Image"
                    style="background: white" />
            </div>
            <div class="pull-left info">
                <p style="overflow: hidden;text-overflow: ellipsis;max-width: 160px;" data-toggle="tooltip"
                    title="{{ Auth::user()->name }}">{{ Auth::user()->name }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
            </div>
        </div>
        @endif

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MENÚ PRINCIPAL</li>
            <!-- Optionally, you can add icons to the links -->
            <li v-bind:class="classMenu0"><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>Inicio</span></a>
            </li>

            <li class="treeview" v-bind:class="classMenu1">
                <a href="#"><i class="fa fa-university"></i> <span>Facultad</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read facultad', Model::class)
                    <li><a href="/facultades"><i class='fa fa-gg'></i>Facultad</a></li>
                    @endcan
                    @can('read descripcion facultad', Model::class)
                    <li><a href="/descripcionfacultades"><i class='fa fa-gg'></i>Descripcion de Facultad</a></li>
                    @endcan
                    @can('read redes sociales facultad', Model::class)
                    <li><a href="/redesfacultades"><i class='fa fa-gg'></i>Redes Sociales</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu2">
                <a href="#"><i class="fa fa-archive"></i><span>Contenido Web Facultad</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read banners facultad', Model::class)
                    <li><a href="/bannersFacultades"><i class='fa fa-gg'></i> Gestión de Banners</a></li>
                    @endcan
                    @can('read eventos facultad', Model::class)
                    <li><a href="/eventos"><i class='fa fa-gg'></i> Gestión de Eventos</a></li>
                    @endcan
                    @can('read noticias facultad', Model::class)
                    <li><a href="/noticias"><i class='fa fa-gg'></i> Gestión de Noticias</a></li>
                    @endcan
                    @can('read galerias facultad', Model::class)
                    <li><a href="/galeriasfacultades"><i class='fa fa-gg'></i> Gestión de Galerias</a></li>
                    @endcan
                    @can('read videos facultad', Model::class)
                    <li><a href="/videofacultades"><i class='fa fa-gg'></i> Gestión de Videos</a></li>
                    @endcan
                    @can('read documentos', Model::class)
                    <li><a href="/documentofacultades"><i class='fa fa-gg'></i> Gestión de Documentos</a></li>
                    @endcan
                    @can('read organigramas', Model::class)
                    <li><a href="/organigramafacultades"><i class='fa fa-gg'></i> Gestión de Organigramas</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu3">
                <a href="#"><i class="fa fa-graduation-cap"></i> <span>Escuelas</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read escuelas', Model::class)
                    <li><a href="/escuelas"><i class='fa fa-gg'></i>Escuelas Profesionales</a></li>
                    @endcan
                    @can('read descripcion escuelas', Model::class)
                    <li><a href="/descripcionescuelas"><i class='fa fa-gg'></i>Descripcion de Escuelas</a></li>
                    @endcan
                    @can('read campolaboral escuelas', Model::class)
                    <li><a href="/campolaborales"><i class='fa fa-gg'></i>Campo Laboral</a></li>
                    @endcan
                    @can('read perfilprofesional escuelas', Model::class)
                    <li><a href="/perfiles"><i class='fa fa-gg'></i>Perfil Profesional</a></li>
                    @endcan
                    @can('read redes sociales escuelas', Model::class)
                    <li><a href="/redesescuelas"><i class='fa fa-gg'></i>Redes Sociales</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu4">
                <a href="#"><i class="fa fa-archive"></i> <span>Contenido Web Escuelas</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read banners escuelas', Model::class)
                    <li><a href="/bannersescuelas"><i class='fa fa-gg'></i> Gestión de Banners</a></li>
                    @endcan
                    @can('read videos escuelas', Model::class)
                    <li><a href="/videoescuelas"><i class='fa fa-gg'></i> Gestión de Videos</a></li>
                    @endcan
                    @can('read galerias escuelas', Model::class)
                    <li><a href="/galeriaescuelas"><i class='fa fa-gg'></i> Gestión de Galerias</a></li>
                    @endcan
                    @can('read mallas escuelas', Model::class)
                    <li><a href="/mallaescuelas"><i class='fa fa-gg'></i> Gestión de Mallas Curriculares</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu5">
                <a href="#"><i class='fa fa-user-secret'></i> <span>Autoridades</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read grados academicos', Model::class)
                    <li><a href="/gradoacademicos"><i class='fa fa-gg'></i>Grados Academicos</a></li>
                    @endcan
                    @can('read cargos', Model::class)
                    <li><a href="/cargos"><i class='fa fa-gg'></i>Cargos</a></li>
                    @endcan
                    @can('read autoridades', Model::class)
                    <li><a href="/autoridades"><i class='fa fa-gg'></i>Autoridades</a></li>
                    @endcan
                </ul>
            </li>

            @can('read departamentoacademico', Model::class)
            <li v-bind:class="classMenu6"><a href="{{ url('departamentos') }}"><i class="fa fa-university"></i>
                    <span>Departamentos Academicos</span></a>
            </li>
            @endcan

            <li class="treeview" v-bind:class="classMenu7">
                <a href="#"><i class="fa fa-users"></i><span>Docentes</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read grados academicos', Model::class)
                    <li><a href="/gradoacademicos"><i class='fa fa-gg'></i>Grados Academicos</a></li>
                    @endcan
                    @can('read categoriadocente', Model::class)
                    <li><a href="/catdocentes"><i class='fa fa-gg'></i>Categoria Docentes</a></li>
                    @endcan
                    @can('read docentes', Model::class)
                    <li><a href="/docentes"><i class='fa fa-gg'></i>Docentes</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu8">
                <a href="#"><i class="fa fa-child"></i><span>Alumnos</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read comitestudiantil', Model::class)
                    <li><a href="/comiteestudiantil"><i class='fa fa-gg'></i>Comites Estudiantiles</a></li>
                    @endcan
                    @can('read alumnos', Model::class)
                    <li><a href="/alumnos"><i class='fa fa-gg'></i>Alumnos</a></li>
                    @endcan
                </ul>
            </li>

            <li class="treeview" v-bind:class="classMenu9">
                <a href="#"><i class='fa fa-book'></i> <span>Publicaciones</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read temainvestigacion', Model::class)
                    <li><a href="/temas"><i class='fa fa-gg'></i>Tema de Estudio</a></li>
                    @endcan
                    @can('read tipo publicacion', Model::class)
                    <li><a href="/tipopublicaciones"><i class='fa fa-gg'></i>Tipos de Publicaciones</a></li>
                    @endcan
                    @can('read publicaciones', Model::class)
                    <li><a href="/publicaciones"><i class='fa fa-gg'></i>Publicaciones</a></li>
                    @endcan
                </ul>
            </li>


            <li class="treeview" v-bind:class="classMenu10">
                <a href="#"><i class='fa fa-users'></i> <span>Usuarios</span> <i
                        class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    @can('read usuario', Model::class)
                    <li><a href="/users"><i class='fa fa-gg'></i> Gestión de Usuarios</a></li>
                    @endcan
                    @can('read roles', Model::class)
                    <li><a href="/roles"><i class='fa fa-gg'></i> Roles </a></li>
                    @endcan
                </ul>
            </li>


            {{-- <li><a href="#"><i class='fa fa-link'></i> <span>Link 1</span></a></li> --}}
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>