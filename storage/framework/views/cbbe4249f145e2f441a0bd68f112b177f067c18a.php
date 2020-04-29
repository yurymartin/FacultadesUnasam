<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read facultad', Model::class)): ?>
<div class="col-lg-3 col-xs-6" style="border-radius: 10px">
  <!-- small box -->
  <div class="small-box bg-aqua" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Facultad</h3>
      <p>Gestión de Facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="facultades" id="#" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read descripcion facultad', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Descrip. Facultad</h3>

      <p>Descripcion de la Facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="descripcionfacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read redes sociales facultad', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Redes Sociales Fac.</h3>

      <p>Redes Sociales de la Facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="redesfacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read banners facultad', Model::class)): ?>
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Banners Facultad</h3>
      <p>Gestión de los Banners de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="bannersFacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read eventos facultad', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
    <div class="inner">
      <h3 style="font-size: 30px;">Eventos Facultad</h3>
      <p>Gestión de Eventos de la facultad </p>
    </div>
    <div class="icon" style="top: 7px;"><i class="fa fa-university"></i>
    </div>
    <a href="eventos" id="recibosH" class="small-box-footer" style="height: 37px;"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px;"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read noticias facultad', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-primary" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Noticias Facultad</h3>

      <p>Gestión de las noticias de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="noticias" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read galerias facultad', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-fuchsia" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Galeria Facultad</h3>

      <p>Gestión de la galeria de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="galeriasfacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read videos facultad', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-light-blue-active" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Videos Facultad</h3>

      <p>Gestión de los videos de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="videofacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read documentos', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-orange" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Documet. Facultad</h3>

      <p>Gestión de los documentos de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="documentofacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read organigramas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-maroon" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Organi. Facultad</h3>

      <p>Gestión de organigramas de la facultad</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="organigramafacultades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Escuelas</h3>
      <p>Gestión de las escuelas profesionales</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="escuelas" id="#" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read descripcion escuelas', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Descrip. Escuelas</h3>

      <p>Gestión de la Descripcion de las Escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="descripcionescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read campolaboral escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-yellow" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Campo Laboral</h3>
      <p>Gestión del campo laboral de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="campolaborales" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read perfilprofesional escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
    <div class="inner">
      <h3 style="font-size: 30px;">Perfil Profesional</h3>
      <p>Perfiles profesionales de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;"><i class="fa fa-university"></i>
    </div>
    <a href="perfiles" id="recibosH" class="small-box-footer" style="height: 37px;"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px;"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read redes sociales escuelas', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Redes Sociales Escu.</h3>

      <p>Redes Sociales de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="redesescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read banners escuelas', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-primary" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Banners Escuelas</h3>

      <p>Gestión de los banners de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="bannersescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read videos escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-fuchsia" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Videos Escuelas</h3>

      <p>Gestión de los videos de la escuela</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="videoescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read galerias escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-light-blue-active" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Galeria Escuelas</h3>

      <p>Gestión de la galeria de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="galeriaescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read mallas escuelas', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-orange" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Mallas Escuelas</h3>

      <p>mallas curriculas de las escuelas</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="mallaescuelas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read grados academicos', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-maroon" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Grados Academicos</h3>

      <p>Gestión de los grados academicos</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="gradoacademicos" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read cargos', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-aqua" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Cargos</h3>
      <p>Gestión de los cargos</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="cargos" id="#" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read autoridades', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-green" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Autoridades</h3>

      <p>Gestión de las autoridades</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="autoridades" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read departamentoacademico', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-yellow" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Depart. Acad.</h3>
      <p>departamentos academicos</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="departamentos" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read categoriadocente', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <div class="small-box bg-red" style="box-shadow: rgb(141, 134, 134) 0px 10px 30px 0px;">
    <div class="inner">
      <h3 style="font-size: 30px;">Categoria Doc.</h3>
      <p>Categorias de los docentes</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="catdocentes" id="recibosH" class="small-box-footer" style="height: 37px;"><i
        class="fa fa-arrow-circle-right" style="font-size: 30px;"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read docentes', Model::class)): ?>
<!-- ./col -->
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-primary" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Docentes</h3>

      <p>Gestión de los docentes</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="docentes" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read comitestudiantil', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-fuchsia" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Comit.Estudiantil</h3>

      <p>Gestión de los comites estudiantiles</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="comiteestudiantil" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read alumnos', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-light-blue-active" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Alumnos</h3>

      <p>Gestión de los Alumnos</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="alumnos" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read temainvestigacion', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-orange" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Temas</h3>
      <p>Gestion de temas de investigacion</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="temas" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read tipo publicacion', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-orange" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Tipo de Publicacion</h3>
      <p>Gestion de Tipos de publicacion</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="tipopublicaciones" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read publicaciones', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-maroon" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Publicaciones</h3>
      <p>Gestión de revistas y publicaciones</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="investigaciones" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read libros', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-fuchsia" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Libros</h3>

      <p>Gestión de los Libros</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="libros" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>

<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read usuario', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-primary" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Usuarios</h3>
      <p>Gestión de Usuarios</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="users" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?>


<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read roles', Model::class)): ?>
<div class="col-lg-3 col-xs-6">
  <!-- small box -->
  <div class="small-box bg-maroon" style="box-shadow: 0px 10px 30px 0px #8d8686;">
    <div class="inner">
      <h3 style="font-size: 30px">Roles</h3>
      <p>Gestión de Roles de usuarios</p>
    </div>
    <div class="icon" style="top: 7px;">
      <i class="fa fa-university"></i>
    </div>
    <a href="roles" class="small-box-footer" style="height: 37px"><i class="fa fa-arrow-circle-right"
        style="font-size: 30px"></i></a>
  </div>
</div>
<?php endif; ?><?php /**PATH C:\Users\yuri_\Desktop\webFacultades\resources\views/inicio/menuAdmin.blade.php ENDPATH**/ ?>