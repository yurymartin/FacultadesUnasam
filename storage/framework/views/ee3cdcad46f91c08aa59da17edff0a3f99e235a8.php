<div class="box box-primary panel-group">
  <div class="box-header with-border" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Gestión de los Permisos para Roles</h3>
    <a style="float: right;" type="button" class="btn btn-default" href="<?php echo e(URL::to('home')); ?>"><i class="fa fa-reply-all"
        aria-hidden="true"></i>
      Volver</a>
  </div>
</div>
<?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('read permisos', Model::class)): ?>
<div class="box box-primary" style="border: 1px solid #3c8dbc;">
  <div class="box-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
    <h3 class="box-title">Listado de permisos para cada rol de usuario</h3>

    <div class="box-tools">
      <div class="input-group input-group-sm" style="width: 300px;">
        <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar" v-model="buscar"
          @keyup.enter="buscarBtn()">

        <div class="input-group-btn">
          <button type="submit" class="btn btn-default" @click.prevent="buscarBtn()"><i
              class="fa fa-search"></i></button>
        </div>


      </div>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body table-responsive">
    <table class="table table-hover table-bordered table-dark table-condensed table-striped">
      <tbody>
        <tr>
          <th style="border:1px solid #ddd;padding: 5px; width: 1%;">#</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 20%;">Rol</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 60%;">permiso</th>
          <th style="border:1px solid #ddd;padding: 5px; width: 10%;">Gestión</th>
        </tr>
        <tr v-for="roles_permisos, key in roles_has_permisos">
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px">{{key+pagination.from}}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px">{{ roles_permisos.rol }}</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px">{{ roles_permisos.permiso }}({{ roles_permisos.descripcion}})</td>
          <td style="border:1px solid #ddd;font-size: 14px; padding: 5px;">
            <center>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('update permisos', Model::class)): ?>
              <a href="#" v-if="tema.activo=='1'" class="btn bg-navy btn-sm" v-on:click.prevent="bajadocente(tema)"
                data-placement="top" data-toggle="tooltip" title="Desactivar descripcion escuela"><i
                  class="fa fa-arrow-circle-down"></i></a>

              <a href="#" v-if="tema.activo=='0'" class="btn btn-success btn-sm" v-on:click.prevent="altadocente(tema)"
                data-placement="top" data-toggle="tooltip" title="Activar descripcion escuela"><i
                  class="fa fa-check-circle"></i></a>

              <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editbanner(tema)" data-placement="top"
                data-toggle="tooltip" title="Editar descripcion facultad"><i class="fa fa-edit"></i></a>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete permisos', Model::class)): ?>
              <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="borrardocente(tema)" data-placement="top"
                data-toggle="tooltip" title="Borrar docente"><i class="fa fa-trash"></i></a>
              <?php endif; ?>
            </center>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
  <!-- /.box-body -->
  <div style="padding: 15px;">
    <div>
      <h5>Registros por Página: {{ pagination.per_page }}</h5>
    </div>
    <nav aria-label="Page navigation example">
      <ul class="pagination">
        <li class="page-item" v-if="pagination.current_page>1">
          <a class="page-link" href="#" @click.prevent="changePage(1)">
            <span><b>Inicio</b></span>
          </a>
        </li>

        <li class="page-item" v-if="pagination.current_page>1">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page-1)">
            <span>Atras</span>
          </a>
        </li>
        <li class="page-item" v-for="page in pagesNumber" v-bind:class="[page=== isActived ? 'active' : '']">
          <a class="page-link" href="#" @click.prevent="changePage(page)">
            <span>{{ page }}</span>
          </a>
        </li>
        <li class="page-item" v-if="pagination.current_page< pagination.last_page">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page+1)">
            <span>Siguiente</span>
          </a>
        </li>
        <li class="page-item" v-if="pagination.current_page< pagination.last_page">
          <a class="page-link" href="#" @click.prevent="changePage(pagination.last_page)">
            <span><b>Ultima</b></span>
          </a>
        </li>
      </ul>
    </nav>
    <div>
      <h5>Registros Totales: {{ pagination.total }}</h5>
    </div>
  </div>
</div>
<?php endif; ?>

<form method="post" v-on:submit.prevent="updateBanner(fillrolpermiso.id)">
  <div class="modal bs-example-modal-lg" id="modalEditar" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document" id="modaltamanio">
      <div class="modal-content" style="border: 1px solid #3c8dbc;">
        <div class="modal-header" style="border: 1px solid #3c8dbc;background-color: #3c8dbc; color: white;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"
              style="font-size: 35px;">&times;</span></button>
          <h4 class="modal-title" id="desEditarTitulo" style="font-weight: bold;text-decoration: underline;">EDITAR
            EL TEMA DE ESTUDIO</h4>

        </div>
        <div class="modal-body">
          <div class="row">
            <div class="box" id="o" style="border:0px; box-shadow:none;">
              <!-- /.box-header -->
              <!-- form start -->
              <div class="box-body">

                <div class="col-md-12" style="padding-top: 10px;">
                  <div class="form-group">
                    <label for="tema" class="col-sm-2 control-label">Tema de Estudio:*</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tema" name="tema" placeholder="tema de estudio"
                        maxlength="200" autofocus v-model="fillrolpermiso.tema">
                    </div>
                  </div>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btnSaveE"><i class="fa fa-floppy-o"
                  aria-hidden="true"></i>
                Guardar</button>

              <button type="button" id="btnCancelE" class="btn btn-default" data-dismiss="modal"><i
                  class="fa fa-sign-out" aria-hidden="true"></i> Cerrar</button>

              <div class="sk-circle" v-show="divloaderEdit">
                <div class="sk-circle1 sk-child"></div>
                <div class="sk-circle2 sk-child"></div>
                <div class="sk-circle3 sk-child"></div>
                <div class="sk-circle4 sk-child"></div>
                <div class="sk-circle5 sk-child"></div>
                <div class="sk-circle6 sk-child"></div>
                <div class="sk-circle7 sk-child"></div>
                <div class="sk-circle8 sk-child"></div>
                <div class="sk-circle9 sk-child"></div>
                <div class="sk-circle10 sk-child"></div>
                <div class="sk-circle11 sk-child"></div>
                <div class="sk-circle12 sk-child"></div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form><?php /**PATH C:\Users\yuri_\OneDrive\Desktop\webFacultades\resources\views/rolesypermisos/principal.blade.php ENDPATH**/ ?>